<?php

namespace Spatie\ServerMonitor\CheckDefinitions;

use Symfony\Component\Process\Process;

final class Memcached extends CheckDefinition
{
    public $command = 'service memcached status';

    public function handleSuccessfulProcess(Process $process)
    {
        if (str_contains($process->getOutput(), 'memcached is running')) {
            $this->check->succeeded('is running');

            return;
        }

        $this->check->failed('is not running');
    }
}
