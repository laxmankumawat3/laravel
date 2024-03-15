<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $label; // Update variable name
    public $name;
    public $demo;

    public function __construct($type, $label, $name,$demo = 0)
    {
        $this->type = $type;
        $this->label = $label; // Update variable name
        $this->name = $name;
        $this->demo = $demo;
    }

    public function render()
    {
        return view('components.input');
    }
}