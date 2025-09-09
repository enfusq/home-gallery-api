<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RotateTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rotate-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rotates user API tokens every 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //TODO: refresh all user api tokens every 24h
    }
}
