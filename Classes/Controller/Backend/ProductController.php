<?php
namespace Shop\Cadabra\Controller\Backend;

    /***************************************************************
     *  Copyright notice
     *  (c) 2016 Marcel Wieser <typo3dev@marcel-wieser.de>
     *
     *  All rights reserved
     *  This script is part of the TYPO3 project. The TYPO3 project is
     *  free software; you can redistribute it and/or modify
     *  it under the terms of the GNU General Public License as published by
     *  the Free Software Foundation; either version 3 of the License, or
     *  (at your option) any later version.
     *  The GNU General Public License can be found at
     *  http://www.gnu.org/copyleft/gpl.html.
     *  This script is distributed in the hope that it will be useful,
     *  but WITHOUT ANY WARRANTY; without even the implied warranty of
     *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *  GNU General Public License for more details.
     *  This copyright notice MUST APPEAR in all copies of the script!
     ***************************************************************/

/**
 * ProductController
 */
class ProductController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * Backend Template Container
     *
     * @var \TYPO3\CMS\Backend\View\BackendTemplateView
     */
    protected $defaultViewObjectName = \TYPO3\CMS\Backend\View\BackendTemplateView::class;

    /**
     * @var \Shop\Cadabra\Domain\Repository\ProductRepository
     * @inject
     */
    protected $productRepository;

    /**
     * @var \Shop\Cadabra\Domain\Repository\PageRepository
     * @inject
     */
    protected $pageRepository;

    /**
     * @var \Shop\Cadabra\Service\ArticleHashingService
     * @inject
     */
    protected $articleHashingService;

    /**
     * @var \Shop\Cadabra\Factory\ArticleFactory
     * @inject
     */
    protected $articleFactory;

    /**
     * @return void
     */
    public function indexAction() {
        $pages = $this->pageRepository->findPagesContainingRecordType('tx_cadabra_domain_model_product');
        $products = $this->productRepository->findAll();

        $this->view->assign('products', $products);
        $this->view->assign('pages', $pages);
    }
}