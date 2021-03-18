<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Kopi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListProduct extends Component
{
    public $selectedValue;
    public $items;
    public $getDeletedItem;
    public $getEditedItem;
    public $updateStatus = false;

    protected $listeners = ['itemDeleted', 'itemChanged', 'itemUpdated', 'searchProd'];

    protected $rules = [
        'selectedValue' => 'required',
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
        $this->getDeletedItem = null;
        $this->getEditedItem = null;
        $genre = array("Coffee", "Milk Based", "Frappucino", "Squash", "Food");
        return view('livewire.admin.list-product', ['genres' => $genre, 'items' => $this->items]);
    }

    public function listItems() {
        $this->validate();
        switch ($this->selectedValue) {
            case 'Coffee':
                $product = Category::find(1);
                break;
            case 'Milk Based':
                $product = Category::find(2);
                break;
            case 'Frappucino':
                $product = Category::find(3);
                break;
            case 'Squash':
                $product = Category::find(4);
                break;
            case 'Food':
                $product = Category::find(5);
                break;
            default:
                $this->selectedValue = null;
                $this->items = null;
                break;
        }
        $this->items = $product->kopis;
    }

    public function edit($item) {
        switch ($this->selectedValue) {
            case 'Coffee':
                $this->getEditedItem = Kopi::find($item['id']); 
                break;
            case 'Milk Based':
                $this->getEditedItem = Kopi::find($item['id']); 
                break;
            case 'Frappucino':
                $this->getEditedItem = Kopi::find($item['id']); 
                break;
            case 'Squash':
                $this->getEditedItem = Kopi::find($item['id']); 
                break;
            case 'Food':
                $this->getEditedItem = Kopi::find($item['id']); 
                break;
            
            
            default:
                # code...
                break;
        }
        $this->updateStatus = true;
        $this->emit('statusUpdate', $this->getEditedItem, $this->selectedValue);
    }

    public function delete($item) {
        switch ($this->selectedValue) {
            case 'Coffee':
                $this->getDeletedItem = Kopi::find($item['id']);
                break;
            case 'Milk Based':
                $this->getDeletedItem = Kopi::find($item['id']);
                break;
            case 'Frappucino':
                $this->getDeletedItem = Kopi::find($item['id']);
                break;
            case 'Squash':
                $this->getDeletedItem = Kopi::find($item['id']);
                break;
            case 'Food':
                $this->getDeletedItem = Kopi::find($item['id']);
                break;
            default:
                # code...
                break;
        }
        $this->getDeletedItem->delete();
        session()->flash('status', $this->getDeletedItem->name . ' was deleted');
        $this->emit('itemDeleted');
        return back();
    }

    public function itemDeleted() {

    }

    public function itemChanged() {
        $this->updateStatus = false;
    }

    public function itemUpdated() {
        session()->flash('status', 'Item updated');
    }

}
