<?php

namespace App\View\Components\Filter;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SortButton extends Component
{
    public string $nextValue;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $currentValue
    ) {
        $this->nextValue = match ($this->currentValue) {
            'asc' => 'desc',
            'desc' => 'asc',
            default => 'asc',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter.sort-button');
    }

    public function showAscIcon(): bool
    {
        return $this->currentValue === 'asc';
    }

    public function showDescIcon(): bool
    {
        return $this->currentValue === 'desc';
    }
}
