<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kopi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $selectedValue;
    public $name;
    public $price;
    public $items;
    public $photo;
    public $result;
    public $available;

    protected $rules = [
        'selectedValue' => 'required',
        'name' => 'required',
        'price' => 'required',
        'available' => 'required',
        'photo' => 'image|max:1024',
    ];


    protected $listeners = [
        'statusUpdate'
    ];

    public function mount() {
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
        return view('livewire.admin.edit-product');
    }    

    public function statusUpdate($getEditedItem, $selectedValue) {
        $this->selectedValue = $selectedValue;
        $this->name = $getEditedItem['name'];
        $this->price = $getEditedItem['price'];
        $this->photo = $getEditedItem['photo'];
        $this->getStore($getEditedItem);
    }

    public function getStore($getEditedItem) {
        $this->items = $getEditedItem;
    }


    public function back() {
        $this->emit('itemChanged');
    }

    public function editItems() {
        $this->validate();
        switch ($this->selectedValue) {
            case 'Coffee':
                $this->result = Kopi::find($this->items['id']);
                break;
            
            default:
                # code...
                break;
        }
        $this->result->update([
            'name' => $this->name,
            'price' => $this->price,
            'available' => $this->available,
            'photo' => $this->name,
        ]);
        $this->photo->storeAs('public', $this->name.'.jpg');
        $this->emit('itemChanged');
        $this->emit('itemUpdated');
        $this->back();
    }
}
