<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Lint checkers
    |--------------------------------------------------------------------------
    |
    | This list specifies linter names and shell commands to check code
    |
    */

    'checkers' => [
        'Prettier' => 'prettier . --check',
        'Pint' => './vendor/bin/pint --test',
    ],

    /*
    |--------------------------------------------------------------------------
    | Lint fixers
    |--------------------------------------------------------------------------
    |
    | This list specifies linter names and shell commands to fix code
    |
    */
    'fixers' => [
        'Prettier' => 'prettier . --write',
        'Pint' => './vendor/bin/pint',
    ],
];
