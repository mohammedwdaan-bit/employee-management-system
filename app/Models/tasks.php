<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    protected $table='tasks';

    protected $fillable=[

        'user_id',
        'title', 
        'description', 
        'status', 
        'priority',
        'start_date',
        'end_date', 
        'date_task',
    ];
    // use HasFactory;

    public function user() {

        return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class,'user_id');
        
    }
}
