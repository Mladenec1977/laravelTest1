<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Clike;

class CommentController extends Controller
{
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->all();
        $comment = [
            'comment' => $data["comment"],
            'post_id' => $id,
            'user_id' => $data["user_id"]
        ];
        
        $result = Comment::create($comment);        
        if ($result) {            
            return redirect()
                ->route('posts.show', $id)
                ->with(['success' => 'saved successfully']);
        } else {
            return back(['msg' => "Save error"])
                ->withErrors()
                ->withInput();
        }
    }

    public function commentLike($comment_id, $user_id)
    {        
        $data = [
            'user_id' => $user_id,
            'comment_id' => $comment_id            
        ];        
        $like = Clike::updateOrInsert($data);
        $countLike = Clike::where('comment_id', $comment_id)
            ->count();        
        return response($countLike);
    }
}
