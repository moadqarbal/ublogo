<x-layout>
    @include('partials._adminnav')
    <div class="container">
        <h1 class="my-5">Update Tag {{ $tag->name }}</h1>

        <a href="/tags/index" class="my-4 btn btn-dark"> < Back To Tags</a>

        <form action="{{ url('tags/' . $tag->id) }}" method="post">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="exampleInput"> Category Name</label>
                <input type="text" name="name" value="{{ $tag->name }}" class="form-control form-control-lg" id="exampleInput" placeholder="Enter tag">
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-lg btn-warning">Update</button>
            </div>
            
        </form>
        
    </div>
</x-layout>
