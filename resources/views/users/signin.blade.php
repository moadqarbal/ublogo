<x-layout>
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Sign in</h2>
                        <p class="text-center">Create an account and post a blog</p>
                        <form method="POST" action="authenticate">

                            @csrf
                            @method('POST')
                            
                            <div class="mb-3">
                                <label for="email_or_username" class="form-label">Email or Username</label>
                                <input type="text" value="{{ old('email_or_username') }}" class="form-control" id="email_or_username" name="email_or_username">
                                @error('email_or_username')
                                <small class="text-danger">Please Enter your email or username</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @error('password')
                                <small class="text-danger">Please Enter your password</small>
                                @enderror
                            </div>

                            <button type="submit" style="background-color: #FF7C00;" class="btn btn-block text-white">Sign In</button>
                        </form>
                        <p class="mt-3 text-center">Do not have an account? <a href="signup"  style="color: #FF7C00;">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>