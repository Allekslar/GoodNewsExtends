<?php

namespace Allekslar\GoodNewsExtends\Classes\Event\Category;

use Lovata\Toolbox\Classes\Event\ModelHandler;
use Lovata\GoodNews\Models\Category;
use Lovata\GoodNews\Classes\Item\CategoryItem;
use Allekslar\GoodNewsExtends\Classes\Store\CategoryListStore;

/**
 * Class ExtendCategoryModel
 * @package Lovata\BaseCode\Classes\Event\Category
 */
class ExtendCategoryModel
{
    public function subscribe()
    {
        Category::extend(function ($obCategory) {
            /** @var Category $obCategory */
            $obCategory->fillable[] = 'type';

            $obCategory->addCachedField(['type']);
        });
    }


    /**
     * After save event handler
     */
    protected function afterSave()
    {
        $this->checkFieldChanges('type', CategoryListStore::instance()->type);
    }

    /**
     * After delete event handler
     */
    protected function afterDelete()
    {
        if ($this->obElement->type) {
            CategoryListStore::instance()->type->clear();
        }
    }

    /**
     * Get model class
     * @return string
     */
    protected function getModelClass()
    {
        return Category::class;
    }

    /**
     * Get item class
     * @return string
     */
    protected function getItemClass()
    {
        return CategoryItem::class;
    }
}