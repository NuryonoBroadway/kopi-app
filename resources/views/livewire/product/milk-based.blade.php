<div class="container mt-5 mb-5">
  <div class="d-flex justify-content-center row">
    @if (session()->has('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    <div class="col-md-10">
      @foreach ($kopis as $kopi)
      <div class="row p-2 bg-white border rounded mt-3">
        <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded" style="width: 100%;"
            src={{ asset('storage/'.$kopi->photo.'.jpg') }}></div>
        <div class="col-md-6 mt-1">
          <h4>{{$kopi->name}}</h4>
        </div>
        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
          <div class="d-flex flex-row align-items-center">
            <h5 class="mr-1">Rp. {{ number_format($kopi->price) }}</h5>
          </div>
          <div class="d-flex flex-column mt-4 text-center ">
            @if (in_array($kopi->name, $product_order))
            <h5 class="text-muted">Added to cart</h5>
            @else
            <button wire:click='order({{ $kopi }})'
              class="btn @if(!$kopi->available) disabled btn-danger @endif btn-primary btn-sm d-flex align-items-center justify-content-center">
              @if (!$kopi->available)
              Empty
              @else
              <span>Add</span>
              @endif
            </button>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>