<?php

namespace App\Http\Livewire\Admin;

use App\Models\HistoryOrders;
use App\Models\Order;
use App\Models\Orders_kode;
use App\Models\Process;
use Livewire\Component;

class OrderDetail extends Component
{
    public $order;

    protected $listeners = ['updateProcess'];
    
    public function mount(Orders_kode $order) {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.admin.order-detail');
    }

    public function back() {
        return redirect()->route('order-product');
    }

    public function process(Orders_kode $order) {
        $order->process = true;
        $order->save();
        $this->emit('updateProcess');
        return back();
    }

    public function updateProcess() {

    }

    public function done(Orders_kode $order) {
        $order->users->is_orders = false;
        $order->users->save();
        Process::create([
            'kode_pemesanan' => $order->kode_pemesanan,
            'user_id' => $order->user_id,
            'name' => $order->users->name,
        ]);
        foreach ($order->orders as $item) {
            HistoryOrders::create([
                'kopi_id' => $item->kopi_id,
                'user_id' => $item->user_id,
                'orders_id' => $item->orders_id,
                'name_product' => $item->name_product,
                'quantity' => $item->quantity,
                'total' => $item->total
            ]);
            $product = Order::find($item->id);
            $product->delete();
        }
        $order->delete();

        return redirect()->route('order-product');
    }
}
