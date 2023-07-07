<?php

namespace OnDezk\Estimate\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class UpdateCommand extends Command
{
    protected $name = 'estimate:update';
    protected $description = 'Update package estimate.';

    public function handle()
    {
        $this->info('Init update package estimate');
        Artisan::call('migrate', [
            '--path' => 'extensions/estimate/src/database/migrations',
        ]);
        $this->info('Successfully update package estimate :)');
    }
}
