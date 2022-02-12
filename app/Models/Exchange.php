<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;
    protected $fillable = [
        
        
        'user_id',
        'input_id',
        'output_id',
        'type_exchange_id',
        'exchange_state',
    ];
    
    public function user()
     {
        return $this->belongsTo(User::class,'user_id');
    }
    public function input()
     {
        return $this->hasOne(Input::class,'input_id');
    }
    public function output()
     {
        return $this->hasOne(Output::class,'input_id');
    }
    public function typeExchange()
     {
        return $this->belongsTo(Type_exchangue::class,'type_exchange_id');
    }
    public function exchange_state()
     {
        return $this->belongsTo(Exchange_state::class,'exchange_state_id');
    }
}
