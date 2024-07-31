<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileRow extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $nombre = "",
        public string $url = "",
        public string $onRemove = "",
        public bool $hideRemove = false
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file-row');
    }
}

