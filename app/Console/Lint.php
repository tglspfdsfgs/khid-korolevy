<?php

namespace App\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandConstants;
use Symfony\Component\Process\Process;

class Lint extends Command
{
    /** override in children */
    /* protected $signature = 'lint:check'; */
    /* protected $description = 'Checking code style'; */

    private bool $isSuccessful = true;

    /**
     * Specify a linter.
     */
    private function processLinter(string $command, string $linerName): void
    {
        $this->info("Running $linerName. . .");
        $script = Process::fromShellCommandline($command);
        $script->run(function ($type, $buffer) {
            echo $buffer;
        });

        if (! $script->isSuccessful()) {
            $this->error("$linerName failed!");

            $this->isSuccessful = false;
        }
    }

    /**
     * Retrieve linters from configs/linters.php and checks the code.
     */
    private function processAllLinters($linters): void
    {
        $this->info(strtoupper($this->description));
        foreach ($linters as $linter => $command) {
            $this->processLinter($command, $linter);
        }
    }

    /**
     * Execute the console command.
     *
     * @param array<string, string> $linters The associative array of liner names and their commands
     *
     * @return int The exit code
     */
    protected function executeCommand(array $linters): int
    {
        $this->processAllLinters($linters);

        if ($this->isSuccessful) {
            $this->info('Linting is successful.');

            return CommandConstants::SUCCESS;
        } else {
            $this->warn('Linting is failed.');

            return CommandConstants::FAILURE;
        }
    }
}
