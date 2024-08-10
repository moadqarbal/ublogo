<x-layout>
    @include('partials._adminnav')
    <div class="container">
        <h1 class="my-5">Update Category {{ $category->name }}</h1>

        <a href="/categories/index" class="my-4 btn btn-dark"> < Back To Categories</a>

        <form action="{{ url('categories/' . $category->id) }}" method="post">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="exampleInput"> Category Name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control form-control-lg" id="exampleInput" placeholder="Enter category">
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-lg btn-warning">Update</button>
            </div>
            
        </form>
        
    </div>
</x-layout>
