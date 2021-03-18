<div class="container mt-5">
    <div class="row justify-content-center">
        @if ($orders->count())
        <div class="mt-5 border-bottom mb-2">
            <h1 class="text-uppercase">Order list</h1>
        </div>

        @foreach ($orders as $order)
        <div class="row" wire:click="details({{ $order }})">
            <div class="d-flex justify-content-between col-lg-12 p-3 @if(!$order->readed)bg-white border-bottom border-success border-5 @else text-white bg-dark border-bottom border-danger border-5 @endif rounded shadow-sm mb-1" style="cursor: pointer;">
                <h5>{{ $order->kode_pemesanan }}</h5>
                <span class="fst-italic">@if(!$order->process) Unprocess @else Process @endif</span>
            </div>
        </div>
        @endforeach
        @else
        <div class="mt-5 mb-5">
            <h1>Order Empty</h1>
        </div>
        @endif

        <div class="mt-5 mb-2 border-bottom">
            <h1 class="text-uppercase">history</h1>
        </div>
        @foreach ($histories as $history)
        <div class="row" wire:click="history({{ $history }})">
            <div class="d-flex justify-content-between col-lg-12 p-3 text-white bg-danger rounded shadow-sm mb-1" style="cursor: pointer;">
                <h5>{{ $history->kode_pemesanan }}</h5>
                <h5 class="fst-italic">{{ $history->users->name}}</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>