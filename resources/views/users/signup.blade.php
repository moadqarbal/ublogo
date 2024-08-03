<x-layout>
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <h2 class="text-center mb-4">REGISTER</h2>
                        <p class="text-center">Create an account and post a blog</p>
                        <form method="POST" action="users">
                            @csrf
                            @method('POST')

                            <div class="mb-3">
                                <label for="firstname" class="form-label">Firstname</label>
                                <input type="text" value="{{ old('firstname') }}" class="form-control" id="firstname" name="firstname" >
                                @error('firstname')
                                <small class="text-danger">Please Enter your Firstname</small>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input type="text" value="{{ old('lastname') }}" class="form-control" id="lastname" name="lastname" >
                                @error('lastname')
                                <small class="text-danger">Please Enter your lastname</small>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" value="{{ old('username') }}" class="form-control" id="username" name="username" >
                                @error('username')
                                <small class="text-danger">Please Enter your username</small>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" >
                                @error('email')
                                <small class="text-danger">Please Enter your email</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" value="{{ old('website') }}" class="form-control" id="website" name="website" >
                                @error('website')
                                <small class="text-danger">Please Enter your website</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" >
                                @error('password')
                                <small class="text-danger">Please Enter your password</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                                @error('confirmPassword')
                                <small class="text-danger">Please Confirm your password</small>
                                @enderror
                            </div>
                            <button type="submit" style="background-color: #FF7C00;" class="btn btn-block text-white">Sign Up</button>
                        </form>
                        <p class="mt-3 text-center">Already have an account? <a href="signin"  style="color: #FF7C00;">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>