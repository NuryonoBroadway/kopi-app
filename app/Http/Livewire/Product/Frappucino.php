<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Frappucino as ModelsFrappucino;
use App\Models\Kopi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Frappucino extends Component
{
    public function render()
    {
        $idk = [];
        if(Auth::user()) {
            $collections = Auth::user()->orders;
            foreach($collections as $collection) {
                array_push($idk ,$collection->name_product);
            }
        }
        return view('livewire.homepage', ['kopis' => Category::find(3)->kopis, 'users' => User::get(), 'product_order' => $idk]);
    }  

    public function order(Kopi $kopi) {
        if(!Auth::user()) {
            session()->flash('danger', 'Log in to add items');
            return redirect()->route('login');
        }
        auth()->user()->orders()->create([
            'kopi_id' => $kopi->id,
            'name_product' => $kopi->name,
            'total' => $kopi->price,
            'original_price' => $kopi->price,
        ]);

        $this->emit('cartAdded');
        return back()->with('status', $kopi->name . ' has been Added');
    }
}
