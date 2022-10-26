<?php

namespace App\Http\Livewire;
use App\Models\Color as ModelColor;
use Livewire\Component;
use Carbon\Carbon;

class Color extends Component
{
    public $color;
    public $color_code;
    public function add_Color(){
        ModelColor::insert([
            'color'=>$this->color,
            'color_code'=>$this->color_code,
            'vendor_id'=>auth()->id(),
            'created_at'=> Carbon::now(),
        ]);
        $this->reset('color','color_code');
        session()->flash('color_message', 'Color successfully added.');
    }
    public function delete($id)
    {
        ModelColor::find($id)->delete();
        session()->flash('color_delete', 'Color deleted successfully!');
    }
    public function render()
    {
        $colors=ModelColor::latest()->get();
        return view('livewire.color',compact('colors'));
    }
}
