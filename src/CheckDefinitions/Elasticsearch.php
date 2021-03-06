<?php

namespace Spatie\ServerMonitor\CheckDefinitions;

use Symfony\Component\Process\Process;

final class Elasticsearch extends CheckDefinition
{
    public $command = 'curl http://localhost:9200';

    public function handleSuccessfulProcess(Process $process)
    {
        $checkSucceeded = str_contains($process->getOutput(), 'lucene_version');

        if ($checkSucceeded) {
            $this->check->succeeded('is running');

            return;
        }

        $this->check->failed('is not running');
    }
}
