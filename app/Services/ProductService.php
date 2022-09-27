<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ProductRepository;

/**
 * Product service
 * 
 * @package App\Repositories
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
class ProductService
{

    /**
     * Product repository
     *
     * @var ProductRepository
     */
    private ProductRepository $productRepo;

    /**
     * Init service with repository
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    /**
     * Return all procuts
     *
     * @return object
     */
    public function allProducts(): object
    {
        return $this->productRepo->allProducts();
    }

    /**
     * Add new product repository
     *
     * @param array $data
     * @return void
     */
    public function createNewProduct(array $data): void
    {
        $this->productRepo->storeNewProduct($data);
    }

    /**
     * Search product
     *
     * @param string $productData
     * @return void
     */
    public function searchProduct(string $productData)
    {
        $productResult = $this->productRepo->searchProductData($productData);

        return $productResult->isEmpty()
            ? null
            : $productResult;
    }
}
