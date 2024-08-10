<x-layout>
    @include('partials._adminnav')
    <div class="container">
        <h1 class="my-5">Manage Categories</h1>
        <a href="/categories/create" class="mb-5 btn btn-success btn-lg">Add New Category</a>
        @if($categories->isEmpty())
            <p>You have no Categories.</p>
        @else
            <table class="table mb-5">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ url('categories/'. $category->id . '/edit') }}" class="btn btn-primary">Edit</a>
                                <form action="{{ url('categories/' . $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirmDeletion()">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
        function confirmDeletion() {
            return confirm("Are you sure you want to delete? This action cannot be undone.");
        }
    </script>
</x-layout>
