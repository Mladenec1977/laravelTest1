<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="py-12">    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="needs-validation" novalidate method="post" action="{{route('posts.update', $post->id)}}">
                @method('PATCH')
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                <div class="container">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                        </div>
                    @endif            
                    <div class="mb-3">
                        <label for="title" class="form-label">Heading</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Textarea</label>
                        <input class="form-control" name="text" id="text" rows="3" value="{{ $post->text }}" required>
                    </div>
                    <div class="col-sm-4 text-center">
                            <button class="btn btn-warning" type="submit">save edit</button>
                    </div>
                </div>        
            </form>            
        </div>
    </div>
</x-app-layout>