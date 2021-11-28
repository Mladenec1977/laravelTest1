<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="py-12">    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card text-center">
                <div class="card-header">
                    {{$post->addUser->name}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->text}}</p>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        @auth
                            @if (Auth::user()->id == $post->user_id)                
                                <a href="{{route('posts.edit', $post->id)}}" type="button" class="btn btn-outline-info">Edit</a>
                                <form method="post" action="{{route('posts.destroy', $post->id)}}">
                                    @method('DELETE')
                                    @csrf                                    
                                    <button type="button" class="btn btn-danger">DELETE</button>
                                </form>
                            @endif
                            <button id="addComment" type="submit" class="btn btn-warning" onclick="hiddenAddComment()">Add comment</button>
                        @endauth                        
                        <button class="btn btn-primary" type="button" @auth onclick="addPlike({{$post->id}}, {{Auth::user()->id}})" @endauth @guest disabled @endguest>
                            Like post
                            <span id="{{'likeAdd'. $post->id}}" class="badge rounded-pill bg-danger">
                                {{count($post->addPlike)}}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$post->created_at}}
                </div>
            </div>
        </div>
        <br>
        @auth
        <div id="divHiddenComment" hidden>        
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="card text-center">
                    <div class="card-header">
                        {{Auth::user()->name}}                    
                    </div>
                    <form method="post" action="{{route('addComment', $post->id)}}">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Heading</label>
                                <input type="text" class="form-control" name="comment" id="comment" required>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                
                            </div>
                        </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-warning">Add comment</button>
                    </div>
                    </form>
                </div>
                <br>
            </div>
        </div>
        @endauth
        @foreach($comment as $item)
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card text-center">
                <div class="card-header">
                    {{$item->addUser->name}}                    
                </div>
                <div class="card-body">
                    <p>{{$item->comment}}</P>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="button" @guest disabled @endguest>
                                Like
                                <span class="badge rounded-pill bg-danger">
                                    {{count($item->addClike)}}
                                </span>
                        </button>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$item->created_at}}
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>
    <script>
        function hiddenAddComment () {
            let addComment = document.getElementById("divHiddenComment");
            if (addComment != null) {
                if (addComment.hidden == true) {
                    addComment.hidden = false;
                } else {
                    addComment.hidden = true;
                }
            }   
        }
    </script>
</x-app-layout>