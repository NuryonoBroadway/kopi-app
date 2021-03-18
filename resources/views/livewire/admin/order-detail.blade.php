<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            <div class="col-lg-6 border-bottom mb-5">
                <h5 class="text-uppercase text-center">{{ $order->users->name }}</h5>
            </div>
            <?php $total = 0;?>
            <h5 class="text-center mb-4">Product Details</h5>
            <!-- Shopping cart table -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 bg-light text-center">
                                <div class="p-2 px-3 text-uppercase">Product</div>
                            </th>
                            <th scope="col" class="border-0 bg-light text-center">
                                <div class="p-2 px-3 text-uppercase">Price</div>
                            </th>
                            <th scope="col" class="border-0 bg-light text-center">
                                <div class="py-2 text-uppercase">Quantity</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orders as $item)
                        <tr>
                            <td scope="row" class="border-0">
                                <div class="p-2">
                                    <div class="align-middle text-center">
                                        <h5 class="mb-0 text-dark">
                                            {{ $item->name_product }}</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <strong>{{ $item->total }}</strong>
                            </td>
                            <td class="align-middle text-center">
                                <strong>{{ $item->quantity }}</strong>
                            </td>
                        </tr>
                        <?php $total += $item->total ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End -->
            <div class="col-lg-6">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                <div class="p-4">
                    <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal
                            </strong><strong>Rp. {{ number_format($total)  }}</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                class="text-muted">Tax</strong><strong>Rp. 0</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                            <h5 class="font-weight-bold">Rp. {{ number_format($total) }}</h5>
                        </li>
                </div>
            </div>
            <div class="col-lg-6 d-flex w-100 justify-content-center">
                <button wire:click='back' class="btn btn-primary">Back</button>
                @if (!$order->process)
                <button wire:click='process({{ $order }})' class="btn btn-danger ml-1 w-75">Process</button>
                @else
                <button wire:click='done({{ $order }})' class="btn btn-danger ml-1 w-75">Done</button>
                @endif
            </div>
        </div>
    </div>
</div>