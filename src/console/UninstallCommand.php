<?php

namespace OnDezk\Estimate\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class UninstallCommand extends Command
{
    protected $name = 'estimate:uninstall';
    protected $description = 'Uninstall package estimate !!!.';

    public function handle()
    {
        $this->info('Uninstall package estimate !!!');
        Artisan::call('migrate:rollback', [
            '--path' => 'extensions/estimate/src/database/migrations',
        ]);
        $this->info('Uninstall package estimate :)');
    }
}
