<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Html\Html;

class StyledLabel extends Component
{
    public string $text;
    public string $for;

    /**
     * Create a new component instance.
     */
    public function __construct(string $text, string $for)
    {
        $this->text = $text;
        $this->for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return app(Html::class)
            ->label($this->text, $this->for)
            ->class('mt-2 block mb-2 text-lg font-medium text-gray-900 dark:text-white')
            ->toHtml();
    }
}
