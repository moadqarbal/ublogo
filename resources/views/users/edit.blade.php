<x-layout>
    @include('partials._adminnav')
    <div class="container">
        <div class="row my-5 justify-content-center">
            <!-- Left Column: Profile Image -->
            <div class="col-md-6 text-center d-flex flex-column align-items-center">
                <h2 class="mb-4">Edit Profile: {{ $user->username }}</h2>
                <p class="text-center">You can edit your profile below</p>
                <form action="{{ url('users/' . $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    
                    <!-- Profile Image -->
                    
                    <div class="mb-3">
                        <label for="profileImage" class="form-label">Profile Image</label>
                        <div class="mb-3">
                            <img id="previewImage" 
                            src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/nouser.jpg') }}" 
                            alt="Profile Image" 
                            class="img-fluid rounded-circle" 
                            style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <input type="file" class="form-control" id="profileImage" name="profile_image" accept="image/*" onchange="previewImage(event)">
                    </div>
            </div>
            

            <!-- Right Column: Profile Details Form -->
            <div class="col-md-6">
                    <!-- Firstname -->
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" value="{{ old('firstname', $user->firstname) }}" class="form-control" id="firstname" name="firstname">
                        @error('firstname') <small class="text-danger">Please Enter Firstname</small> @enderror
                    </div>
    
                    <!-- Lastname -->
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" value="{{ old('lastname', $user->lastname) }}" class="form-control" id="lastname" name="lastname">
                        @error('lastname') <small class="text-danger">Please Enter Lastname</small> @enderror
                    </div>
    
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" value="{{ $user->username }}" disabled class="form-control" id="username" name="username">
                    </div>
    
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ $user->email }}" disabled class="form-control" id="email" name="email">
                    </div>
    
                    <!-- Website -->
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" value="{{ old('website', $user->website) }}" class="form-control" id="website" name="website">
                        @error('website') <small class="text-danger">Please Enter website</small> @enderror
                    </div>

                    <!-- Save Changes Button -->
                    <button type="submit" class="btn btn-block text-white" style="background-color: #FF7C00;">Save Changes</button>
                </form>

                
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Delete Account Button -->
                <div class="my-5">
                    <form method="post" action="{{ url('users/' . $user->id) }}" id="delete-account-form">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirmDeletion()">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
        
        <script>
            function confirmDeletion() {
                return confirm("Are you sure you want to delete your account? This action cannot be undone.");
            }
        </script>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('previewImage');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-layout>
