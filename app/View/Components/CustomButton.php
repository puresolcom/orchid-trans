<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    // public $functionName;
    // public $parameters = [];
    // public $btnName;

    public function __construct()
    {
        // $this->functionName = $functionName;
        // $this->parameters = $parameters;
        // $this->btnName = $btnName;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return <<<'blade'
        <div data-controller="invoice">
                    <button data-action="click->invoice#addMoreCharge"> Add more charge  </button>
                    </div<
        blade;
    }
}
