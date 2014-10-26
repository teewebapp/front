<?php

namespace Tee\Front;

use Tee\Front\Widgets\MainMenu;

use App;
use Tee\System\Widget;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function register()
    {
        // registra os widgets
        Widget::register(
            'mainMenu',
            __NAMESPACE__.'\\Widgets\\MainMenu'
        );
    }
}
