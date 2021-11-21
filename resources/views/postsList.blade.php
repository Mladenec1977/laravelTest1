<x-app-layout>
    <x-slot name="header">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
        @auth
        <a href="{{route('posts.create')}}" class="btn btn-primary">Create post</a>
        @endauth
    </x-slot>

    <div class="py-12">    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($posts as $item)            
            <div class="card text-center">
                <div class="card-header">
                    {{$item->addUser->name}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text">{{$item->text}}</p>
                    <a href="{{route('posts.show', $item->id)}}" class="btn btn-primary">Open</a>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        @auth                        
                            <a href="{{route('posts.edit', $item->id)}}" type="button" class="btn btn-outline-info"
                                @if (Auth::user()->id != $item->user_id)
                                hidden
                                @endif
                                >Edit</a>
                        @endauth
                        <a href="{{route('posts.show', $item->id)}}" class="btn btn-primary me-md-2" type="button">
                            Comment
                            <span class="badge rounded-pill bg-danger">
                                {{count($item->addComment)}}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                        <button class="btn btn-primary" type="button" @guest disabled @endguest>
                            Like
                            <span class="badge rounded-pill bg-danger">
                                {{count($item->addPlike)}}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$item->created_at}}
                </div>
            </div>
            <br>
            @endforeach
        </div>
        @if($posts->hasPages())
        <br>
        <div class="row justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{$posts->previousPageUrl()}}">Previous</a></li>
                    @for($i = 1; $i <= $posts->lastPage(); $i++)
                        @if ($i == $posts->currentPage())
                            <li class="page-item active" aria-current="page"><a class="page-link"
                                                                                href="{{$posts->url($i)}}">
                                    <span class="page-link">{{$i}}<span class="sr-only"></span></span></a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{$posts->url($i)}}">{{$i}}</a></li>
                        @endif
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{$posts->nextPageUrl()}}">Next</a></li>
                </ul>
            </nav>
        </div>
    @endif
    </div>
</x-app-layout>
