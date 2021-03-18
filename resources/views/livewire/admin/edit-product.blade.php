<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <!-- Registeration Form -->
        <form wire:submit.prevent='editItems'>
            <div class="row">
                <div class="input-group mb-3 col-lg-6" >
                    <div class="input-group-prepend w-100">
                        <div class="custom-file">
                            <input type="file" wire:model="photo" class="custom-file-input " id="inputGroupFile01">
                            <label class="custom-file-label @error('photo') border-danger @enderror" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="text-bold">
                        <div wire:loading wire:target="photo" for="inputGroupFile01">
                            Uploading...
                        </div>
    
                        @error('photo') 
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror
                    </div>
                </div>
                <!-- Name product -->
                <div class="input-group col-lg-6 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text @error('name') border-danger @enderror bg-white px-4 border-md border-right-0">
                            <i class="fa fa-user text-muted"></i>
                        </span>
                    </div>
                    <input wire:model='name' id="name" type="text" placeholder="Product name ..." class="@error('name') is-invalid @enderror form-control bg-white border-left-0 border-md">
                    @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Price  -->
                <div class="input-group col-lg-6 mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text @error('price') border-danger @enderror bg-white px-4 border-md border-right-0">
                            <i class="fa fa-user text-muted"></i>
                        </span>
                    </div>
                    <input wire:model='price' id="lastName" type="number" placeholder="Price" class="@error('price') is-invalid @enderror form-control bg-white border-left-0 border-md">
                    @error('price')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Available ?-->
                <div class="mb-4">
                    <select wire:model='available' class="border shadow p-2 bg-white @error('available') border-danger @enderror form-select">
                        <option wire:key= >Available</option>
                        <option wire:key="true" >True</option>
                        <option wire:key="false">False</option>
                    </select>
                    @error('available')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="form-group col-lg-12 mx-auto mb-0 mt-4">
                    <button type="submit" class="btn btn-primary btn-block py-2">
                        <span class="font-weight-bold">Edit Product</span>
                    </button>
                </div>

            </div>
        </form>
        <div class="mt-2">
            <button wire:click="back" class="btn btn-success">
                Back
            </button>
        </div>
    </div>
</div>