<div class="comment-section">
    <div class="container mt-5">
        <h1 class="mb-4">Comments</h1>

        <!-- Comment List -->
        <div class="d-flex mb-4 p-3 border rounded">
            <img src="https://via.placeholder.com/150" alt="User Thumbnail" class="rounded-circle me-3" style="width: 60px; height: 60px;">
            <div>
                <h5 class="mb-1">Jane Doe</h5>
                <p class="mb-1">This is a comment! It provides feedback or insight related to the content above.</p>
                <small class="text-muted">Posted on July 29, 2024</small>
            </div>
        </div>

        <div class="d-flex mb-4 p-3 border rounded">
            <img src="https://via.placeholder.com/150" alt="User Thumbnail" class="rounded-circle me-3" style="width: 60px; height: 60px;">
            <div>
                <h5 class="mb-1">John Smith</h5>
                <p class="mb-1">Another comment here. This can be a different perspective or additional information.</p>
                <small class="text-muted">Posted on July 28, 2024</small>
            </div>
        </div>

        <!-- Comment Form -->
        <div class="my-5">
            <h2>Leave a Comment</h2>
            <form action="/submit-comment" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea id="comment" name="comment" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn" style="background-color: #FF7C00; color: white;">Submit</button>
            </form>
        </div>
    </div>
</div>