<div class="container mt-5">
    <div class="row justify-content-center">
        @if ($histories->count())
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
        @else
        <div class="mt-5 mb-2 ">
            <h1 class="text-uppercase">History empty, <br> Add items to create a history</h1>
        </div>
        @endif
    </div>
</div>