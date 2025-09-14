<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator;
class PanelList extends Component
{
    /**
     * Create a new component instance.
     */
    public LengthAwarePaginator $items;
    public string $sort = 'titulo';
    public string $dir = 'asc';

    public function __construct(LengthAwarePaginator $items, string $sort = 'titulo', string $dir = 'asc')
    {
        $this->items = $items;
        $this->sort = $sort;
        $this->dir = $dir;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.list");
    }
}
