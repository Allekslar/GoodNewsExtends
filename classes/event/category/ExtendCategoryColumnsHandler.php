<?php

namespace Allekslar\GoodNewsExtends\Classes\Event\Category;

use Lovata\Toolbox\Classes\Event\AbstractBackendColumnHandler;
use Lovata\GoodNews\Models\Category;
use Lovata\GoodNews\Controllers\Categories;

/**
 * Class ExtendArticleColumnsHandler
 * @package Allekslar\Tags\Classes\Event\Article
 */
class ExtendCategoryColumnsHandler extends AbstractBackendColumnHandler
{
    /**
     * Extend columns model
     * @param \Backend\Widgets\Lists $obWidget
     */
    protected function extendColumns($obWidget)
    {
        $this->removeColumn($obWidget);
        $this->addColumn($obWidget);
    }

    /**
     * Remove columns model
     * @param \Backend\Widgets\Lists $obWidget
     */
    protected function removeColumn($obWidget)
    {
        $obWidget->removeColumn('');
    }

    /**
     * Add columns model
     * @param \Backend\Widgets\Lists $obWidget
     */
    protected function addColumn($obWidget)
    {
        $obWidget->addColumns([
            'type' => [
                'label' => 'type'
            ]
        ]);
    }

    /**
     * Get model class name
     * @return string
     */
    protected function getModelClass(): string
    {
        return Category::class;
    }

    /**
     * Get controller class name
     * @return string
     */
    protected function getControllerClass(): string
    {
        return Categories::class;
    }
}