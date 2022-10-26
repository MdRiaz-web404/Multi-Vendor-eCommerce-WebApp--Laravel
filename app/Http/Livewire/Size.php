<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Size as ModelSize;
use Carbon\Carbon;

class Size extends Component
{
    public $size;

    public function add_Size(){
        ModelSize::insert([
            'size_name'=>$this->size,
            'vendor_id'=>auth()->id(),
            'created_at'=>Carbon::now(),
        ]);
        $this->reset('size');
        session()->flash('message', 'Size successfully added.');
    }
    public function delete($id)
    {
        ModelSize::find($id)->delete();
        session()->flash('delete', 'Size deleted successfully!');

    }
    public function render()
    {
        $sizes= ModelSize::latest()->get();
        return view('livewire.size',compact('sizes'));
    }
}
