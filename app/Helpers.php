<?php

namespace App;

use Illuminate\Pagination\LengthAwarePaginator;

class Helpers
{
    public static function extractPaginator(array &$data): ?LengthAwarePaginator
    {
        if (array_key_exists('__paginator', $data)) {
            $paginator = $data['__paginator'];
            unset($data['__paginator']);
            $data = array_filter($data, fn ($v) => is_array($v) || ! empty($v));

            return $paginator;
        }

        return null;
    }
}
