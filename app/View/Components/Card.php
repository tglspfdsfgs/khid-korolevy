<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Locations of each card type.
     */
    private array $typeViewMap = [
        'article' => 'components.blocks.cards.articles.card',
        'tournament' => 'components.blocks.cards.tournaments.card',
        'gallery' => 'components.blocks.cards.gallery.card',
        'education' => 'components.blocks.cards.education.card',
        'comp_dev' => 'components.blocks.cards.comp_dev.card',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(public array $props)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|\Closure|string
    {
        $type = $this->props['type'];

        return view($this->typeViewMap[$type], Arr::except($this->props, [$type]));
    }
}
