<?php

namespace App\View\Components;

use Illuminate\View\Component;

class breadcrumb extends Component
{
    public $first;
    public $firstCrumb;
    public $firstRoute;
    public $second;
    public $secondCrumb;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($first=false,$firstCrumb="",$firstRoute="",$second=false,$secondCrumb="",)
    {
        $this->first = $first;
        $this->firstCrumb = $firstCrumb;
        $this->firstRoute = $firstRoute;
        $this->second = $second;
        $this->secondCrumb = $secondCrumb;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
