<?php

namespace App\View\Components;

use App\Enums\PageType as Type;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Locations of each card type.
     */
    private array $typeViewMap = [
        Type::article->value => 'components.blocks.cards.articles.card',
        Type::tournament->value => 'components.blocks.cards.tournaments.card',
        Type::gallery->value => 'components.blocks.cards.gallery.card',
        Type::education->value => 'components.blocks.cards.education.card',
        Type::comp_dev->value => 'components.blocks.cards.comp_dev.card',
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
