<?php

namespace Tee\Front\Widgets;

use View, Config;
use Tee\Page\Models\Page;
use Tee\Page\Models\PageCategory;
use Tee\System\Menu;

class MainMenu {
    public $menuName = 'mainMenu';
    public function register(array $options=array())
    {
        $category = PageCategory::where('type', '=', PageCategory::PAGE)->first();
        if(moduleEnabled('i18n'))
        {
            $pages = $category->pages()->where(function($query) {
                $query->where('language', '=', Config::get('app.locale'))
                    ->orWhere('language', '=', '')
                    ->orWhereNull('language');
            })->get();
        }
        else
        {
            $pages = $category->pages;
        }
        Menu::make($this->menuName, function($menu) use($pages) {
            $menu->add(trans('front::front.home'), route('home'));
            foreach($pages as $page) {
                $options = array();
                if($page->type == Page::LINKED)
                    $options['target'] = '_blank';
                $menu->add($page->title, $page->url)
                    ->link
                    ->attr($options);
            }
        });

        return Menu::get($this->menuName)->asUl($options['attributes']);
    }

} 