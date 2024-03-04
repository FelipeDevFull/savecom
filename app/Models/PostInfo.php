<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'date',
        'time',
        'description'
    ];


    // public function search($date = null)
    // {
    //     $result = $this->where(function($query) use($date) 
    //     {
    //        if($date){
    //         $query->where('date', '=', "{$date}")->get();
    //        }
    //     });//->toSql();
    
    //     return $result;
    // }


}
