<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditButton extends Component
{
    // 1. Tambahkan property ini
    public string $url;

    /**
     * Create a new component instance.
     */
    // 2. Tambahkan parameter $url di construct
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-button');
    }
}