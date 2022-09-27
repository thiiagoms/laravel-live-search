<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;

/**
 * Product repository
 * 
 * @package App\Repositories
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0-
 */
class ProductRepository
{

    /**
     * Product model
     *
     * @var Product
     */
    private Product $product;

    /**
     * Init repository with model
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Return all products
     *
     * @return object
     */
    public function allProducts(): object
    {
        return $this->product->simplePaginate(5);
    }

    /**
     * Add new product
     *
     * @param array $data
     * @return void
     */
    public function storeNewProduct(array $data): void
    {
        $this->product->create($data);
    }

    /**
     * Return data from product search
     *
     * @param string $productData
     * @return object
     */
    public function searchProductData(string $productData): object
    {
        return $this->product->where('name', 'like',  "%{$productData}%")
            ->orWhere('category', 'like', "%{$productData}%")
            ->get();
    }
}
