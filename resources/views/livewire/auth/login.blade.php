<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session()->has('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <!-- Registeration Form -->
        <form wire:submit.prevent='submit'>
            <div class="row">

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text @error('email') border-danger @enderror bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input wire:model='email' id="email" type="email" name="email" placeholder="Email Address" class="@error('email') is-invalid @enderror form-control bg-white border-left-0 border-md">
                        @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text @error('password') border-danger @enderror bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input wire:model='password' id="password" type="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror form-control bg-white border-left-0 border-md">
                        @error('password')
                            <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group col-lg-6 mb-4">
                        <div class="form-check">
                            <input wire:model="rememberMe" class="form-check-input" type="checkbox" value="" id="remember_me">
                            <label class="form-check-label" for="remember_me">
                              Remember Me
                            </label>
                        </div>
                    </div>

                <!-- Submit Button -->
                <div class="form-group col-lg-12 mx-auto mb-0">
                    <button type="submit" class="btn btn-primary btn-block py-2">
                        <span class="font-weight-bold">Login</span>
                    </button>
                </div>

                <!-- Divider Text -->
                <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                    <div class="border-bottom w-100 ml-5"></div>
                    <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                    <div class="border-bottom w-100 mr-5"></div>
                </div>

                <!-- Social Login -->

                <!-- Already Registered -->
                <div class="text-center w-100">
                    <p class="text-muted font-weight-bold">Are you new in here ? <a href={{ route('register')}} class="text-primary ml-2">Register</a></p>
                </div>

            </div>
        </form>
    </div>
</div>