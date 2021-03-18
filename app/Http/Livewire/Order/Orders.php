<?php

namespace App\Http\Livewire\Order;

use App\Models\Kopi;
use App\Models\Order;
use App\Models\Order_User;
use App\Models\Orders_kode;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Orders extends Component
{
    protected $listeners = ['checkoutItems'];

    public function render()
    {
        $orders = auth()->user()->orders->sortBy(function($orders){return $orders->created_at;});
        return view('livewire.order.orders', ['orders' => $orders]);
    }

    public function itemDelete($id) {
        $orders = Order::find($id);
        $orders->delete();

        session()->flash('status', 'Item Removed');
        $this->emit('removeItem');
        return back();
    }

    public function add(Order $order) {
        $order->update([
            'quantity' => $order->quantity + 1,
        ]);
        $order->total = $order->quantity * $order->original_price;
        $order->save();
        return back();
    }

    public function less(Order $order) {
        $order->update([
            'quantity' => $order->quantity - 1,
        ]);
        $order->total = $order->quantity * $order->original_price;
        $order->save();
        return back();
    }

    public function checkoutItems() {

    }

    public function checkout($items) {
        $kode_random = rand();
        foreach ($items as $item) {
            $result = Order::find($item['id']);
            $result->orders_id = $kode_random;
            $result->save();
        }
        Orders_kode::create([
            'kode_pemesanan' => $kode_random,
            'user_id' => Auth::user()->id
        ]);
        auth()->user()->is_orders = true;
        auth()->user()->save();
        session()->flash('status', 'thanks for ordering..');
        $this->emit('checkoutItems');
        return back();
    }
}
