<?php

namespace Allekslar\GoodNewsExtends\Classes\Event\Components;

use Lovata\GoodNews\Models\Category;
use Lovata\GoodNews\Components\ArticleCategoryData;

/**
 * Class ExtendCategoryItem
 * @package Allekslar\GoodNewsExtends\Classes\Event\Category
 */
class ExtendArticleCategoryData
{
    public function subscribe()
    {
        ArticleCategoryData::extend(function ($obArticleCategoryData) {
            $this->addCustomMethod($obArticleCategoryData);
        });
    }

    /**
     * Add myCustomMethod method
     * @param ArticleCategoryData $obArticleCategoryData
     */
    protected function addCustomMethod($obArticleCategoryData)
    {
        $obArticleCategoryData->addDynamicMethod('getBySlug', function ($sElementSlug) use ($obArticleCategoryData) {

            $arResultList = $this->getBySlug($obArticleCategoryData, $sElementSlug);

            return $arResultList;
        });
    }

    /**
     * Get element object
     * @param string $sElementSlug
     * @return Category
     */
    public function getBySlug($obArticleCategoryData, $sElementSlug)
    {
 
        if (empty($sElementSlug)) {
            return null;
        }
        $arElementSlug = explode("/",$sElementSlug);
        $sElementSlug = end($arElementSlug);

        if (Category::active()->getBySlug($sElementSlug)->first()) {
            $obElement = Category::active()->getBySlug($sElementSlug)->firstOrFail();
            return $obArticleCategoryData->get($obElement->id);
        }else if (count($arElementSlug)>1) {
            $sElementSlug = prev($arElementSlug);
            $obElement = Category::active()->getBySlug($sElementSlug)->firstOrFail();
            return $obArticleCategoryData->get($obElement->id);
        }
    }
}