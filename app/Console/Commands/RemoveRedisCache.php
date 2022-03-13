<?php

namespace App\Console\Commands;

use App\Services\CommandsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RemoveRedisCache extends Command
{

    private $commandsService;

    public function __construct(CommandsService $commandsService)
    {
        parent::__construct();
        $this->commandsService = $commandsService;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ccache:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Hello from flush redis');

        $this->commandsService->flushRedisCache();

    }
}
