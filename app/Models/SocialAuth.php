<?php
// En el modelo SocialAuth

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAuth extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'social_id',
        'name',
        'email',
        'avatar'
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
