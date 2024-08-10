<article class="single-article">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center py-3">
                    <!-- Post Title -->
                    <h1 class="text-center fw-bold mt-5 mb-3">
                        {{ $blogpost->title }}
                    </h1>

                    <!-- Post Meta (Author & Date) -->
                    <h5 class="mt-5 mb-3">
                        <img src="https://via.placeholder.com/150" class="rounded-circle mx-3" style="width: 50px;" alt="">
                        Written by {{ auth()->user()->firstname }} • {{ $blogpost->created_at->translatedFormat('F j, Y') }}
                    </h5>
                    
                    <!-- Categories Component -->
                    <x-categories :categories="$categories" />
                </div>
            </div>

            <!-- Post Image -->
            <div class="row my-5">
                <div class="col-md-12">
                    <img src="https://via.placeholder.com/150" style="width: 100%; height: 700px;" class="rounded-3 mb-5" alt="">
                </div>
            </div>

            <!-- Post Content -->
            <div class="row justify-content-center">
                <div class="col-md-8 mb-5">
                    {!! $blogpost->content !!}
                </div>
            </div>
        </div>
    </div>
</article>
