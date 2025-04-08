<?php

namespace App\Console\Commands;

use App\Console\Lint as LintBase;

class LintFix extends LintBase
{
    protected $signature = 'lint:fix';

    protected $description = 'Fixing code style';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        parent::executeCommand(config('linters.fixers'));
    }
}
