<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8 mx-auto">
            <div class="my-4">
                <form wire:submit.prevent='updateContact'>
                    <div class="row mt-5 align-items-center">
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                        <div class="col">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h1 class="mb-1 d-flex justify-content-center">Profile</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Name</label>
                            <input wire:model='name' type="text" id="firstname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Email</label>
                        <input wire:model='email' type="email" class="form-control" id="inputEmail4" />
                    </div>
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </form>
                <hr class="my-4" />
                {{-- password --}}
                <livewire:user.password :user="$users"/>
                <hr class="my-4" />
                <div class="pass">
                    <a wire:click="logout" class="bg-danger text-white logoutBtn">Logout <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    </div>