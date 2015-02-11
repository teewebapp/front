<?php

namespace Tee\Front;

use Tee\Front\Widgets\MainMenu;

use App, Config, SassCompiler;
use Tee\System\Widget;
use Tee\System\Asset;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function register()
    {
        // registra o debugbar
        $this->app->register('Barryvdh\Debugbar\ServiceProvider');

        // registra os widgets
        Widget::register(
            'mainMenu',
            __NAMESPACE__.'\\Widgets\\MainMenu'
        );

        // Compila os sass (somente no ambiente local)
        if (App::environment('local'))
        {
            $themesPath = public_path().'/themes';
            foreach(['default', Config::get('site.theme')] as $theme) {
                $themePath = $themesPath.'/'.$theme;
                $sassPath = $themePath.'/assets/scss';
                $cssPath = $themePath.'/assets/css';
                if(file_exists($sassPath))
                {
                    if(!is_writable($cssPath))
                        throw new \Exception("$cssPath is not writable");
                    if(!file_exists($cssPath))
                        throw new \Exception("$cssPath not exists");
                    if(!is_dir($cssPath))
                        throw new \Exception("$cssPath is not a dir");
                    SassCompiler::run($sassPath.'/', $cssPath.'/');
                }
            }
        }
    }
}
