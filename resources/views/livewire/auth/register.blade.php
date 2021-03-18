<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <!-- Registeration Form -->
        <form wire:submit.prevent='submit'>
            <div class="row">

                <!-- First Name -->
                <div class="input-group col-lg-6 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text @error('fname') border-danger @enderror bg-white px-4 border-md border-right-0">
                            <i class="fa fa-user text-muted"></i>
                        </span>
                    </div>
                    <input wire:model='fname' id="firstName" type="text" name="firstname" placeholder="First Name" class="@error('fname') is-invalid @enderror form-control bg-white border-left-0 border-md">
                    @error('fname')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <!-- Last Name -->
                <div class="input-group col-lg-6 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text @error('lname') border-danger @enderror bg-white px-4 border-md border-right-0">
                            <i class="fa fa-user text-muted"></i>
                        </span>
                    </div>
                    <input wire:model='lname' id="lastName" type="text" name="lastname" placeholder="Last Name" class="@error('lname') is-invalid @enderror form-control bg-white border-left-0 border-md">
                    @error('lname')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

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
                
                

                <!-- Password Confirmation -->
                <div class="input-group col-lg-6 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text @error('password_confirmation') border-danger @enderror bg-white px-4 border-md border-right-0">
                            <i class="fa fa-lock text-muted"></i>
                        </span>
                    </div>
                    <input wire:model='password_confirmation' id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" class="@error('password_confirmation') is-invalid @enderror form-control bg-white border-left-0 border-md">
                    @error('password_confirmation')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="col-lg-12 h-10 justify-content-center align-items-center">
                    <div class="border p-4">
                        <p class="mb-2">Password requirements</p>
                        <p class="small text-muted mb-2">To create a new password, you have to meet all of the following requirements:</p>
                        <ul class="small text-muted pl-4 mb-0">
                        <li>Minimum 8 character</li>
                        <li>At least one capital character</li>
                        <li>At least one number</li>
                        <li>Can’t be the same as a previous password</li>
                    </ul>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group col-lg-12 mx-auto mb-0 mt-4">
                    <button type="submit" class="btn btn-primary btn-block py-2">
                        <span class="font-weight-bold">Create your account</span>
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
                    <p class="text-muted font-weight-bold">Already Registered? <a href={{route('login')}} class="text-primary ml-2">Login</a></p>
                </div>

            </div>
        </form>
    </div>
</div>