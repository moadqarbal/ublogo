<x-layout>
    <div class="container">
        
        <div class="row my-5 justify-content-center">
            <div class="col-md-6">
                <div class="row">
                    <!-- Left Column: Profile Image and Delete Account -->
                    <div class="col-md-12 mb-4 text-center d-flex flex-column align-items-center">
                        <h2 class="mb-4">Edit Profile : {{ $user->username }}</h2>
                        <p class="text-center">You can edit your profile below</p>
                        <div class="mb-3">
                            <label for="profileImage" class="form-label">Profile Image</label>
                            <div class="mb-3">
                                <img id="previewImage" src="https://via.placeholder.com/150" alt="Profile Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            <input type="file" class="form-control" id="profileImage" name="profileImage" accept="image/*" onchange="previewImage(event)">
                        </div>
                        
                    </div>
                </div>
                <!-- Spacer to push delete button to the bottom -->
                <div class="mt-5 text-center">
                    <form action="/delete-account" method="post">
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </form>
                </div>
            </div>
    
    
    
            <div class="col-md-6">
                <!-- Right Column: Profile Details Form -->
                <form action="/your-endpoint" method="post" enctype="multipart/form-data">
                    @csrf
    
                    <!-- Firstname -->
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" value="{{ $user->firstname }}" class="form-control" id="firstname" name="firstname" >
                    </div>
    
                    <!-- Lastname -->
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" value="{{ $user->lastname }}" class="form-control" id="lastname" name="lastname" >
                    </div>
    
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" value="{{ $user->username }}" class="form-control" id="username" name="username" >
                    </div>
    
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email" >
                    </div>
    
                    <!-- Website -->
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" value="{{ $user->website }}" class="form-control" id="website" name="website" >
                    </div>

    
                    
    
                    <button type="submit" class="btn btn-block text-white" style="background-color: #FF7C00;">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('previewImage');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-layout>