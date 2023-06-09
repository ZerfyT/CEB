<?php

namespace App\View\Components;

// use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BillModalComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $bill;

    public function __construct($bill)
    {
        $this->bill = $bill;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.bill-modal-component');
    }
}
