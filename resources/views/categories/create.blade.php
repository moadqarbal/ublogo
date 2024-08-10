<x-layout>
    @include('partials._adminnav')
    <div class="container">
        <h1 class="my-5">Create New Category</h1>

        <form action="{{ url('/categories') }}" method="post">
            @csrf
            @method('POST')
            
            <div class="form-group">
                <label for="exampleInput"> Category Name</label>
                <input type="text" name="name" class="form-control form-control-lg" id="exampleInput" placeholder="Enter category">
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-lg btn-primary">Create</button>
            </div>
            
        </form>
        
    </div>
</x-layout>
