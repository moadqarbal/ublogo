<x-layout>
    @include('partials._adminnav')
    <div class="container">
        <h1 class="my-5">Manage Tags</h1>
        <a href="/tags/create" class="mb-5 btn btn-success btn-lg">Add New Tag</a>
        @if($tags->isEmpty())
            <p>You have no Tags.</p>
        @else
            <table class="table mb-5">
                <thead>
                    <tr>
                        <th>Tag Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <a href="{{ url('tags/'. $tag->id . '/edit') }}" class="btn btn-primary">Edit</a>
                                <form action="{{ url('tags/' . $tag->id) }}" method="POST" style="display:inline;">
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
            return confirm("Are you sure you want to delete.");
        }
    </script>
</x-layout>
