<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->with('addComment')
            ->with('addPlike')
            ->with('addUser')
            ->paginate(25);
        
        return view('postsList', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        // dd($request);
        // dd($data);        
        // dump();

        $result = Post::create($data);        
        if ($result) {            
            return redirect()
                ->route('posts.show', $result->id)
                ->with(['success' => 'saved successfully']);
        } else {
            return back(['msg' => "Save error"])
                ->withErrors()
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)
            ->with('addComment')
            ->with('addPlike')
            ->with('addUser')
            ->first();

        $comment = Comment::where('post_id', $id) 
            ->orderBy('created_at', 'desc')
            ->with('addClike')
            ->with('addUser')
            ->get();

        return view('post_id', compact('post', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)            
            ->first();

        return view('post_edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Post::find($id);
        if (empty($item)) {
            return back(['msg' => "Entry id =[{$id}] not found"])
                ->withErrors()
                ->withInput();
        }

        $data = $request->all();
        $result = $item->update($data);

        if ($result) {            
            return redirect()
                ->route('posts.show', $item->id)
                ->with(['success' => 'saved successfully']);
        } else {
            return back(['msg' => "Save error"])
                ->withErrors()
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedPost = Post::where('id', $id)->delete();
        return redirect()->route('postList');
    }
}
