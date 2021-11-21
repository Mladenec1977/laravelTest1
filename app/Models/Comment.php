<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function addUser()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'name');
    }

    public function addClike()
    {
        return $this->hasMany(Clike::class);
    }
}
