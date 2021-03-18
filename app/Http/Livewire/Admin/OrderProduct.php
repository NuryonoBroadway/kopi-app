<?php

namespace App\Http\Livewire\Admin;

use App\Models\HistoryOrders;
use App\Models\Orders_kode;
use App\Models\Process;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderProduct extends Component
{
    public function mount(){
        if(Auth::user()) {
            if(Auth::user()->roles[0]->name !== 'admin') {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $order_menu = Orders_kode::latest()->get();
        $history_order = Process::latest()->get();
        return view('livewire.admin.order-product', ['orders' => $order_menu, 'histories' => $history_order]);
    }

    public function details(Orders_kode $order) {
        $order->readed = true;
        $order->save();
        
        return redirect()->route('detail', $order);
    }

    public function history(Process $history)  {
        return redirect()->route('history', $history);
    }
}
