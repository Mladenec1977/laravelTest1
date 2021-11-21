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
                            <button type="button" class="btn btn-outline-info"
                                @if (Auth::user()->id != $post->user_id)
                                hidden
                                @endif
                                >Edit</button>
                        @endauth                        
                        <button class="btn btn-primary" type="button" @guest disabled @endguest>
                            Like post
                            <span class="badge rounded-pill bg-danger">
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
                                    <span class="visually-hidden">unread messages</span>
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
</x-app-layout>