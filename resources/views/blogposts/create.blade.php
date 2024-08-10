<x-layout>
    @include('partials._adminnav')
    <div class="container-fluid px-5 mt-5 mb-5">
        <h1 class="mb-4" style="color: #FF7C00">Create Post</h1>
        <form id="blogpostForm" action="{{ route('blogposts.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Content Fields -->
                <div class="col-md-8">
                    <div class="content-fields">
                        <!-- Post Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label fs-4 fw-bold">Post Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Post Content -->
                        <div class="mb-3">
                            <label for="editor" class="form-label fs-4 fw-bold">Content</label>
                            <div id="editor" style="height: 900px;"></div>
                            <input type="hidden" name="content" id="hiddenContent" value="{{ old('content') }}">
                            @error('content')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <!-- Additional Scripts -->
                        <div class="mb-3">
                            <label for="additional_scripts" class="form-label fs-4 fw-bold">Additional Scripts</label>
                            <textarea id="additional_scripts" name="additional_scripts" class="form-control" rows="4" placeholder="Add schema metadata or other custom scripts">{{ old('additional_scripts') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Options Fields -->
                <div class="col-md-4">
                    <div class="options-fields">
                        <div class="mb-3">
                            <label for="slug" class="form-label fs-4 fw-bold">Slug</label>
                            <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" readonly>
                            @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Canonical URL -->
                        <div class="mb-3">
                            <label for="canonical_url" class="form-label fs-4 fw-bold">Canonical URL</label>
                            <input type="text" id="canonical_url" name="canonical_url" class="form-control" placeholder="Canonical URL" value="{{ old('canonical_url') }}">
                        </div>

                        <!-- Post Tags -->
                        <div class="form-group mb-3">
                            <label for="tags">Tags</label>
                            <input type="text" id="tags" name="tags" class="form-control" placeholder="Enter tags separated by commas" value="{{ old('tags') }}">
                        </div>

                        <!-- Post Categories -->
                        <fieldset class="mb-3">
                            <legend class="col-form-label fs-4 fw-bold">Post Categories</legend>
                            @foreach($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="category{{ $category->id }}" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="category{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                            @error('categories')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </fieldset>

                        <hr class="my-4">

                        <!-- Meta Description -->
                        <div class="mb-3">
                            <label for="meta_description" class="form-label fs-4 fw-bold">Meta Description</label>
                            <input type="text" id="meta_description" name="meta_description" class="form-control" placeholder="Brief description of the post" value="{{ old('meta_description') }}">
                            @error('meta_description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Meta Robots -->
                        <fieldset class="mb-3">
                            <legend class="col-form-label fs-4 fw-bold">Meta Robots</legend>
                            <div class="form-check">
                                <input class="form-check-input" checked type="checkbox" id="index" name="meta_robots[]" value="index" {{ in_array('index', old('meta_robots', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="index">Index</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="noindex" name="meta_robots[]" value="noindex" {{ in_array('noindex', old('meta_robots', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="noindex">Noindex</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" checked type="checkbox" id="follow" name="meta_robots[]" value="follow" {{ in_array('follow', old('meta_robots', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="follow">Follow</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="nofollow" name="meta_robots[]" value="nofollow" {{ in_array('nofollow', old('meta_robots', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="nofollow">Nofollow</label>
                            </div>
                            @error('meta_robots')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </fieldset>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        // Initialize Quill editor
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['bold', 'italic', 'underline'],
                    [{ 'align': [] }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        // Handle form submission
        document.getElementById('blogpostForm').addEventListener('submit', function (e) {
            // Get HTML from Quill editor
            var content = quill.root.innerHTML;
            document.getElementById('hiddenContent').value = content;

            // Debugging: Log the content to check if it’s correctly set
            console.log('Content:', content);

            // If the content is empty, prevent form submission and alert the user
            if (content.trim() === '') {
                e.preventDefault();
                alert('Content field is required.');
            }
        });

        // Function to generate slug and canonical URL
        function generateSlugAndCanonicalUrl() {
            var title = document.getElementById('title').value;
            var slug = title.toLowerCase().trim()
                .replace(/[^a-z0-9\s-]/g, '') // Remove invalid characters
                .replace(/\s+/g, '-')         // Replace spaces with hyphens
                .replace(/-+/g, '-');         // Replace multiple hyphens with a single hyphen

            var canonicalUrlField = document.getElementById('canonical_url');
            var canonicalUrl = "{{ config('app.url') }}/" + slug;
            document.getElementById('slug').value = slug;
            canonicalUrlField.value = canonicalUrl;
        }

        // Add event listener to title input field
        document.getElementById('title').addEventListener('input', generateSlugAndCanonicalUrl);
    </script>

</x-layout>
