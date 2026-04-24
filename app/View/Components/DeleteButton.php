<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    // 1. Deklarasikan variabel url
    public string $url;

    /**
     * Create a new component instance.
     */
    // 2. Tangkap datanya di sini
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-button');
    }
}