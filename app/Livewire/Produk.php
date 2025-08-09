<?php

namespace App\Livewire;

use App\Models\Product as ModelProduct;
use Livewire\Component;

class Produk extends Component
{
    public $ChoseMenu = 'see';
    public $name;
    public $barcode;
    public $stock;
    public $price;
    public $choseProduct;

    public function chooseEdit($id)
    {
        $this->choseProduct = ModelProduct::findOrFail($id);
        $this->name = $this->choseProduct->name;
        $this->barcode = $this->choseProduct->barcode;
        $this->stock = $this->choseProduct->stock;
        $this->price = $this->choseProduct->price;
        $this->ChoseMenu = 'edit';
    }

    public function update()
    {
        // make validation
        $this->validate([
            'name' => 'required',
            'barcode' => ['required', 'unique:products,barcode, ' . $this->choseProduct->id],
            'stock' => 'required',
            'price' => 'required'
        ], [
            // Show massage if the condition not met
            'name.required' => 'Name is required',
            'barcode.required' => 'barcode is required',
            'barcode.unique' => 'The barcode is already registered',
            'stock.required' => 'stock is required',
            'price.required' => 'price is required',
        ]);
        $save = $this->choseProduct;
        $save->name = $this->name;
        $save->barcode = $this->barcode;
        $save->price = $this->price;
        $save->stock = $this->stock;
        $save->save();

        $this->reset();
        $this->ChoseMenu = 'see';
    }

    public function chooseDelete($id)
    {
        $this->choseProduct = ModelProduct::findOrFail($id);
        $this->ChoseMenu = 'delete';
    }

    public function delete()
    {
        $this->choseProduct->delete();
        $this->reset();
    }

    public function cancel()
    {
        $this->reset();
    }

    public function save()
    {
        // make validation
        $this->validate([
            'name' => 'required',
            'barcode' => ['required', 'unique:products,barcode'],
            'stock' => 'required',
            'price' => 'required'
        ], [
            // Show massage if the condition not met
            'name.required' => 'Name is required',
            'barcode.required' => 'barcode is required',
            'barcode.unique' => 'The barcode is already registered',
            'stock.required' => 'stock is required',
            'price.required' => 'price is required',
        ]);
        $save = new ModelProduct();
        $save->name = $this->name;
        $save->barcode = $this->barcode;
        $save->price = $this->price;
        $save->stock = $this->stock;
        $save->save();

        $this->reset(['name', 'barcode', 'stock', 'price']);
        $this->ChoseMenu = 'see';
    }


    public function choseMenu($menu)
    {
        $this->ChoseMenu = $menu;
    }

    public function render()
    {
        return view('livewire.produk')->with(['allProduct' => ModelProduct::all()]);
    }
}
