<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class CommandsService
{

    public function flushRedisCache()
    {
        $flush = Redis::flushall();

        return $flush;
    }

}
