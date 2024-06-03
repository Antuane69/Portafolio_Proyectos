<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprar extends Model
{
    use HasFactory;

    public $table = 'comprar';

    protected $fillable = [
        'numcard',
        'cvc',
        'yearexp',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'cvc',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'cvc' => 'hashed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['name','username']);
    }

    public function post()
    {
        return $this->belongsTo(Post::class)->select(['user_id','id']);
    }

}
