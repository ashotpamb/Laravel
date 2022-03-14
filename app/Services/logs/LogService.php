<?php

namespace App\Services\logs;

use Illuminate\Support\Facades\Storage;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LogService
{
    public function addLog()
    {
        $exists = Storage::disk('resources/logs')->exists('project.log');
        if (!$exists)
        {
            Storage::disk('resources/logs')->put('project.log','');
        }
        $path = Storage::url("project.log");
        $log = new Logger('name');
        $log->pushHandler(new \Monolog\Handler\StreamHandler($path, Logger::INFO));
        $log->info("sd");
    }
}
