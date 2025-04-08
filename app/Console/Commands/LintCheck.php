<?php

namespace App\Console\Commands;

use App\Console\Lint as LintBase;

class LintCheck extends LintBase
{
    protected $signature = 'lint:check';

    protected $description = 'Checking code style';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        parent::executeCommand(config('linters.checkers'));

        $lintFixer = app(LintFix::class);
        $this->info("Run 'php artisan {$lintFixer->getName()}' to correct the code.");
    }
}
