<?php

namespace OnDezk\Estimate\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use OnDezk\Estimate\Database\Seeds\DatabaseSeeder;

class InstallCommand extends Command
{
    protected $name = 'estimate:install';
    protected $description = 'Install package estimate.';

    public function handle()
    {
        $this->info('Init installation package estimate');
        Artisan::call('migrate', [
            '--path' => 'extensions/estimate/src/database/migrations',
        ]);
        Artisan::call('db:seed', [
            '--class' => DatabaseSeeder::class,
        ]);
        $this->info('Successfully installation package estimate :)');
    }
}
