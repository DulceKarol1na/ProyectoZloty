<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'stocks',
        'user_id',
        'type_exchange_id',
        'category_id',
        'state_id'
    ];
    public function user()
     {
        return $this->belongsTo(User::class,'user_id');
    }
    public function category()
     {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function state()
     {
        return $this->belongsTo(State::class,'state_id');
    }
    public function exchanges()
     {
        return $this->belongsTo(State::class,'type_exchange_id');
    }
    

}
