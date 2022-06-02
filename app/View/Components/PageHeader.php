<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $href;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href,$title)
    {
        //
        $this->href = $href;
        $this->title = $title;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-header');
    }
}
