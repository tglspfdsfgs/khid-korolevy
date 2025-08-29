<?php

namespace App\Http\Middleware;

use App\Enums\GalleryType;
use App\Enums\State;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrepareQuery
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(Request): (Response) $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        $this->prepareState($request);

        $this->prepareGalleryType($request);

        return $next($request);
    }

    private function prepareState(Request $request): void
    {
        $states = [
            State::published->value,
            State::draft->value,
            State::deleted->value,
        ];

        $state = $request->query('state');

        if (auth()->check() && ! in_array($state, $states, true)) {
            $request->merge(['state' => State::published->value]);
        }

        if (! auth()->check()) {
            $request->merge(['state' => State::published->value]);
        }
    }

    private function prepareGalleryType(Request $request): void
    {
        $galleryTypes = [
            'all',
            GalleryType::club->value,
            GalleryType::tabletop->value,
            GalleryType::chess->value,
            GalleryType::sports->value,
            GalleryType::comp_dev->value,
        ];

        $galleryType = $request->query('galleryType');

        if (! in_array($galleryType, $galleryTypes, true)
            || 'all' === $galleryType) {
            $request->query->remove('galleryType');
        }
    }
}
