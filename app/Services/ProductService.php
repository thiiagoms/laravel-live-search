<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ProductContract;

/**
 * Product service
 *
 * @package App\Repositories
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class ProductService
{
    /**
     * Init service with repository
     *
     * @param ProductContract $productContract
     */
    public function __construct(private ProductContract $productContract)
    {
    }

    /**
     * Return all procuts
     *
     * @return object
     */
    public function allProducts(): object
    {
        return $this->productContract->productList();
    }

    /**
     * Add new product repository
     *
     * @param array $data
     * @return void
     */
    public function createProduct(array $data): void
    {
        $this->productContract->productCreate($data);
    }

    /**
     * Search product
     *
     * @param string $productData
     * @return object|null
     */
    public function searchProduct(string $productData): object|null
    {
        $productResult = $this->productContract->productSearch($productData);

        return $productResult->isEmpty()
            ? null
            : $productResult;
    }

    /**
     * Delete product
     *
     * @param integer $productId
     * @return array
     */
    public function deleteProduct(int $productId): array
    {
        $product = $this->productContract->productFind($productId);

        if (is_null($product)) {
            return ['error' => "Product not found"];
        }

        $result = $this->productContract->productDelete($productId);

        return is_integer($result)
            ? ['success' => "Product {$product->name} deleted"]
            : ['error'  => "Product "];
    }
}
