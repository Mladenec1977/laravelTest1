<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'user_id',
    ]; 

    public function addComment()
    {
        return $this->hasMany(Comment::class);
    }

    public function addPlike()
    {
        return $this->hasMany(Plike::class);
    }

    public function addUser()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'name');
    }
}
