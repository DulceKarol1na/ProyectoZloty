<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\State;
use App\Models\Type_exchangue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $products = Product::where('user_id','=',$user->id)->get();
        return view('product.list',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $categories = Category::all();
        $states = State::all();
        $type_Exchangues = Type_exchangue::all();

        return view('product.create',['product' => new Product(),'user_id'=>$user_id,'categories'=>$categories,'states'=>$states,'type_Exchangues'=>$type_Exchangues]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $product = request()->except('_token','type_exchangue_id');
        if ($request['type_exchangue_id'] == 'donacion') {
                
            if ($request->hasfile('image')) {

                    $product['image'] = $request->file('image')->store('uploads','public');
            }
            $id = DB::table('products')->insertGetId($product);
            DB::table('exchangues')
            ->insert([
                'quantity' => $request['stocks'],
                'type_exchangue_id' => $request['type_exchangue_id'],
                'user_id' => $request['user_id'],
                'product_id' => $id
            ]);
            return redirect()->route('users.index');
            
        }
        else{
            if ($request->hasfile('image')) {

                $product['image'] = $request->file('image')->store('uploads','public');
            }
            $id = DB::table('products')->insertGetId($product);
            DB::table('exchangues')
            ->insert([
                'quantity' => $request['stocks'],
                'type_exchangue_id' => $request['type_exchangue_id'],
                'user_id' => $request['user_id'],
                'product_id' => $id
            ]);
                $products = Product::where('user_id','!=',$request['user_id'])->with('category','state')->get();
                return view('product.exchange',['products'=>$products,'user'=>$request['user_id']]);
            }
    }

    public function exchange($id)
    {
        $product = Product::findOrfail($id);
        if($product->stocks > 0)
        {
            $stocks = $product->stoks - 1;
            Product::where('id','=',$id)->update(['stocks'=> $stocks]);
            return redirect()->route('users.index');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('user_id','=',$id)->with('category','state')->get();
        //return $products;
        return view('product.list', ['products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $user_id = auth()->user()->id;
        $categories = Category::all();
        $states = State::all();
        return view('product.edit',['product'=>$product,'user_id'=>$user_id,'categories'=>$categories,'states'=>$states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $id;
        $dataProduct = $request->except(['_token','_method']);

        if ($request->hasfile('photo')) {
            $product = Product::findOrfail($id);
            Storage::delete(['public/'. $product->image]);
            $dataProduct['image'] = $request->file('image')->store('uploads','public');
        }
        Product::where('id','=',$id)->update($dataProduct);
        $product = Product::findOrfail($id);
        //return redirect()->route('empleado.index',$empleado);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
