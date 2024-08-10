
<x-layout>
    @include('partials._adminnav')
    <div class="container">
        <h1 class="my-5">Manage blogposts</h1>
        <a href="/blogposts/create" class="mb-5 btn btn-success btn-lg">Add New Blog Post</a>
        @if($blogposts->isEmpty())
            <p>You have no blogposts.</p>
        @else
            <table class="table mb-5">
                <thead>
                    <tr>
                        <th>blogpost Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogposts as $blogpost)
                        <tr>
                            <td>{{ $blogpost->title }}</td>
                            <td>
                                <a href="{{ url($blogpost->slug) }}" class="btn btn-success">View</a>
                                <a href="{{ url('blogposts/'. $blogpost->id . '/edit') }}" class="btn btn-primary">Edit</a>
                                <form action="{{ url('blogposts/' . $blogpost->id) }}" method="POST" style="display:inline;">
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