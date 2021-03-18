<div class="container mt-5">
  @if (session()->has('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
  @if ($orders->count()) 
    <div class="row">
      <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
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
                  <div class="py-2 text-uppercase">Price</div>
                </th>
                <th scope="col" class="border-0 bg-light text-center">
                  <div class="py-2 text-uppercase">Quantity</div>
                </th>
                @if (!Auth::user()->is_orders)
                <th scope="col" class="border-0 bg-light text-center">
                  <div class="py-2 text-uppercase">Remove</div>
                </th>
                @endif
              </tr>
            </thead>
            <?php $total = 0 ?>
            <tbody>
              @foreach ($orders as $order)
              <tr>
                <th scope="row" class="border-0">
                  <div class="p-2">
                    <div class="ml-3 align-middle">
                      <h5 class="mb-0 text-dark text-center align-middle">{{ $order->name_product }}</h5>
                    </div>
                  </div>
                </th>
                <td class="align-middle text-center"><strong>{{ $order->total }}</strong></td>
                <td class="align-middle text-center">
                @if (!Auth::user()->is_orders)
                  @if ($order->quantity > 1)
                    <span class="mr-2 clickAble" wire:click="less({{ $order }})">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                      </svg>
                    </span>
                  @endif
                  <strong>{{ $order->quantity }}</strong>
                  <span class="ml-2 clickAble" wire:click="add({{ $order }})">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                  </span>
                </td>
                <td class="align-middle text-center">
                  <button wire:click='itemDelete({{ $order->id }})' class="btn btn-danger mt-0">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
                @else
                <strong>{{ $order->quantity }}</strong>
                @endif
              </tr>
              <?php $total += $order->total ?>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- End -->
      </div>
    </div>

    <div class="row py-5 p-4 bg-white rounded shadow-sm">

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
          @if (!Auth::user()->is_orders)
            </ul><a wire:click="checkout({{$orders}})" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
          @else 
          @if (Auth::user()->ordersKode->process)
          <h4 class="text-muted mt-5 text-center fst-italic">Orders process, please pay first before enjoying your meal</h4></h4>
          @else
          <h4 class="text-muted mt-5 text-center fst-italic">Please wait, Confirmation....</h4>
          @endif
          @endif
        </div>
      </div>
    </div>
  @else
  <div class="row mt-5 py-4">
    <div class="text-center">
      <h1>Cart empty, go <a href={{ route('home') }} class=""><button class="btn btn-success">here</button></a> to order.
      </h1>
    </div>
  </div>
  @endif
</div>