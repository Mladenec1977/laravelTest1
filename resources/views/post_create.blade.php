<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="py-12">    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="needs-validation" novalidate method="post" action="{{route('posts.store')}}">
                @method('POST')
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
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Textarea</label>
                        <textarea class="form-control" name="text" id="text" rows="3" required></textarea>
                    </div>
                    <div class="col-sm-4 text-center">
                            <button class="btn btn-warning" type="submit">save changes</button>
                    </div>
                </div>        
            </form>    
        </div>
    </div>
</x-app-layout>