<?php

namespace Allekslar\GoodNewsExtends\Classes\Event\Components;


use Lovata\GoodNews\Components\ArticleCategoryPage;
use Cms;
use October\Rain\Router\Helper;

/**
 * Class ExtendCategoryItem
 * @package Allekslar\GoodNewsExtends\Classes\Event\Category
 */
class ExtendCategoryPage
{
    public function subscribe()
    {
        ArticleCategoryPage::extend(function ($obArticleCategoryPage) {
            $this->addCustomMethod($obArticleCategoryPage);
        });
    }

    /**
     * Add myCustomMethod method
     * @param ArticleCategoryPage $obArticleCategoryPage
     */
    protected function addCustomMethod($obArticleCategoryPage)
    {
        $obArticleCategoryPage->addDynamicMethod('getElementObject', function ($sElementSlug) use ($obArticleCategoryPage) {

            $arResultList = $this->getElementObject($obArticleCategoryPage, $sElementSlug);

            return $arResultList;
        });
        $obArticleCategoryPage->addDynamicMethod('onRun', function () use ($obArticleCategoryPage) {

            $arResultList = $this->onRun($obArticleCategoryPage);

            return $arResultList;
        });
    }

    /**
     * Get element object
     * @param string $sElementSlug
     * @return Category
     */
    protected function getElementObject($obArticleCategoryPage, $sElementSlug)
    {
        trace_log([self::class => $obArticleCategoryPage->property('slug')]);
        if (empty($sElementSlug)) {
            return null;
        }
        $arElement = explode("/", $sElementSlug);
        $sElement = end($arElement);
        $obElement = Category::active()->getBySlug($sElement)->first();
        return $obArticleCategoryPage->$obElement;
    }


    /**
     * Get element object
     * @return \Illuminate\Http\Response|null
     * @throws \Exception
     */
    public function onRun($obArticleCategoryPage)
    {

        //Get element slug
        $sElementSlug = $obArticleCategoryPage->property('slug');
        $arElement = explode("/", $sElementSlug);
        $sElement = end($arElement);
        $sElementSlug =  $sElement;
        if (empty($sElementSlug) && !$this->property('slug_required')) {
            return null;
        }

        if (empty($this->obElement)) {
            return $this->getErrorResponse();
        }

        return null;
    }
}
