<?php

use Nwidart\Modules\Facades\Module;


if (! function_exists('menu_modules')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function menu_modules()
    {
        $menu = Module::all();
        return $menu;
    }

}


?>