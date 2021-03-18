<form wire:submit.prevent='updatePassword'>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputPassword4">Old Password</label>
                <input wire:model="old_password" type="password" class="@error('old_password') is-invalid @enderror form-control" name="old_password" id="inputPassword5" />
                @error('old_password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputPassword5">New Password</label>
                <input wire:model='password' type="password" class="@error('password') is-invalid @enderror form-control" name="password" id="inputPassword5" />
                @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputPassword6">Confirm Password</label>
                <input wire:model="password_confirmation" type="password" class="form-control" name="password_confirmation" id="inputPassword6" />
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="border p-3">
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
    </div>
    <button type="submit" class="btn btn-primary">Save Change</button>
</form>