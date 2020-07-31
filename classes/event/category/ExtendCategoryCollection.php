<?php

namespace Allekslar\GoodNewsExtends\Classes\Event\Category;

use Lovata\GoodNews\Models\Category;
use Lovata\GoodNews\Classes\Collection\CategoryCollection;
use Allekslar\GoodNewsExtends\Classes\Collection\GoodNewsExtendsCollection;

/**
 * Class ExtendCategoryCollection
 * @package Lovata\BaseCode\Classes\Event\Category
 */
class ExtendCategoryCollection
{
    public function subscribe()
    {
        CategoryCollection::extend(function ($obCategoryList) {
            $this->addCustomMethod($obCategoryList);
        });
    }

    /**
     * Add myCustomMethod method
     * @param CategoryCollection $obCategoryList
     */
    protected function addCustomMethod($obCategoryList)
    {
        $obCategoryList->addDynamicMethod('type', function () use ($obCategoryList) {

            $arResultIDList = GoodNewsExtendsCollection::make()->type();

            return $obCategoryList->intersect($arResultIDList);
        });
    }
}
