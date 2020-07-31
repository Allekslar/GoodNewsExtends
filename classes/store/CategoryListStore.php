<?php

namespace Allekslar\GoodNewsExtends\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;

use Allekslar\GoodNewsExtends\Classes\Store\Category\GetTypeList;

/**
 * Class CategoryListStore
 * @package Allekslar\GoodNewsExtends\Classes\Store
 * @property GetCustomList $my_custom
 */
class CategoryListStore extends AbstractListStore
{
    protected static $instance;

    /**
     * Init store method
     */
    protected function init()
    {
        $this->addToStoreList('type', GetTypeList::class);
    }
}