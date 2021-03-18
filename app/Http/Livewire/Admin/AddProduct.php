<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kopi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{   
    use WithFileUploads;

    public $selectedValue;
    public $name;
    public $price;
    public $photo;

    protected $rules = [
        'selectedValue' => 'required',
        'name' => 'required',
        'price' => 'required',
        'photo' => 'image|max:1024',
    ];

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
        $genre = array("Coffee", "Milk Based", "Frappucino", "Squash", "Food");
        return view('livewire.admin.add-product', ['genres' => $genre]);
    }

    public function addItems() {
        $this->validate();
        switch ($this->selectedValue) {
            case 'Coffee':
                $category_id = 1;
                break;
            case 'Milk Based':
                $category_id = 2;
                break;
            case 'Frappucino':
                $category_id = 3;
                break;
            case 'Squash': 
                $category_id = 4;
                break;
            case 'Food':
                $category_id = 5;
            default:
                # code...
                break;
        }           
        $kopi = Kopi::create([
            'name' => $this->name,
            'category_id' => $category_id,
            'price' => $this->price,
            'photo' => $this->name,
        ]);     
        $this->photo->storeAs('public', $this->name.'.jpg');
        session()->flash('status', $kopi->name . ' Added');
        $this->resetValue();
        return back();
    }

    public function resetValue() {
        $this->selectedValue = null;
        $this->name = null;
        $this->price = null;
        $this->available = null;
    }
}
