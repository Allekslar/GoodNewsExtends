<?php namespace Allekslar\GoodNewsExtends;

use Event;
use Backend;
use System\Classes\PluginBase;
use Allekslar\GoodNewsExtends\Classes\Event\Category\ExtendCategoryItem;
use Allekslar\GoodNewsExtends\Classes\Event\Components\ExtendArticleCategoryData;

/**
 * GoodNewsExtends Plugin Information File
 */
class Plugin extends PluginBase
{

        /** @var array Plugin dependencies */
        public $require = ['Lovata.GoodNews'];
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'GoodNewsExtends',
            'description' => 'add new method in GoodNews plugins',
            'author'      => 'Allekslar',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        
        Event::subscribe(ExtendArticleCategoryData::class);
        Event::subscribe(ExtendCategoryItem::class);
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Allekslar\GoodNewsExtends\Components\MyComponent' => 'myComponent',
        ];
    }




}
