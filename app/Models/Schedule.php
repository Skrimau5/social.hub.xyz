<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'day_id', 'time'];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function day()
    {
        return $this->belongsTo(Days::class);
    }
}
