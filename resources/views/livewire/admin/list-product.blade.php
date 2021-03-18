<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        @if (session()->has('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <!-- Registeration Form -->
        @if ($updateStatus)
        <livewire:admin.edit-product></livewire:admin.edit-product>
        @else
        <form wire:submit.prevent='listItems'>
            <div class="row">

                <div class="mb-4 flex">
                    <select wire:model='selectedValue'
                        class="form-select-sm border @error('selectedValue') border-danger @enderror shadow p-2 bg-white form-select">
                        <option wire:key=''>Choose</option>
                        @foreach($genres as $genre)
                        <option wire:key={{ $genre }}>{{ $genre }}</option>
                        @endforeach
                    </select>
                    @error('selectedValue')
                    <span class="text-danger">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="form-group col-lg-12 mx-auto mb-0 mt-2">
                    <button type="submit" class="btn btn-primary btn-block py-2">
                        <span class="font-weight-bold">Search</span>
                    </button>
                </div>

            </div>
        </form>
        @if ($items)
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    @foreach ($items as $item)
                    <div class="row p-2 bg-white border rounded mt-3">
                        <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded" style="width: 100%;"
                                src={{ asset('storage/'.$item->photo.'.jpg') }}></div>
                        <div class="col-md-6 mt-1">
                            <h4>{{$item->name}}</h4>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h5 class="mr-1">Rp. {{ number_format($item->price) }}</h5>
                            </div>
                            <div class="flex mt-4 text-center ">
                                <div class="flex align-items-center w-100 justify-content-around">
                                    <button wire:click='edit({{ $item }})'
                                        class="btn btn-primary btn-sm d-flex align-items-center justify-content-center w-100">
                                        Edit
                                    </button>
                                    <button wire:click='delete({{ $item }})'
                                        class="btn btn-danger btn-sm d-flex align-items-center justify-content-center w-100">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        @endif
        @endif
    </div>
</div>