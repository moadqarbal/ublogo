@props(['categories'])

<div class="categories">
    @if(is_array($categories) && count($categories) > 0)
        @foreach($categories as $categoryId)
            @php
                $category = \App\Models\Category::find($categoryId);
            @endphp
            @if($category)
                <span class="text-dark badge bg-secondary">
                    <a href="#" class="p-3 d-inline-bnlock text-white text-decoration-none">{{ $category->name }}</a>
                </span>
            @endif
        @endforeach
    @else
        <h6 class="mb-5">No categories available.</h6>
    @endif
</div>
