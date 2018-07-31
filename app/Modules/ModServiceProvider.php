<?php

namespace App\Modules;

class ModServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function boot() {
        $modules = config("modules.modules");
        foreach ($modules as $module) {
            if (file_exists(__DIR__ . '/' . $module . '/routes.php')) {
                include __DIR__ . '/' . $module . '/routes.php';
            }
            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }
        }
    }

    public function register() {

    }

}
