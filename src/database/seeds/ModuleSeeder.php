<?php

namespace OnDezk\Estimate\Database\Seeds;

use Illuminate\Database\Seeder;
use Phantom\App\Models\Module;

class ModuleSeeder extends Seeder
{

    public function run()
    {
        $this->register();
    }

    public function register()
    {
        $this->module();
    }

    public function module()
    {
        $module = [
            'usmodname' => 'Estimate',
            'usmoddesc' => 'Modulo Gestion Presupuestos',
            'usmodvers' => '1.0.0',
            'usmodauth' => 'gonzalo.sinka.8@gmail.com',
            'usmodprfx' => 'estimate',
            'usmodcspc' => 9000
        ];
        return Module::firstOrCreate($module);
    }

}
