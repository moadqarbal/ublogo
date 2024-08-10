<div class="container mt-5">
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item"><a href="{{ url('users/' . auth()->id()) . '/edit'}}">Profile</a></li>
        <li class="list-group-item"><a href="{{ url('categories/index')}}">Categories</a></li>
        <li class="list-group-item"><a href="{{ url('tags/index')}}">Tags</a></li>
        <li class="list-group-item"><a href="{{ url('blogposts/manage')}}">Blog Posts</a></li>
        <li class="list-group-item"><a href="#link5">Link 5</a></li>
    </ul>
</div>