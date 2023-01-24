<?php

declare(strict_types=1);

namespace App\Contracts;

/**
 * Product Contract
 *
 * @package App\Contracts
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
interface ProductContract
{
    /**
     * Return all products
     *
     * @return object
     */
    public function productList(): object;

    /**
     * Find Product Data
     *
     * @param integer $productId
     * @return object|null
    */
    public function productFind(int $productId): object|null;

    /**
     * Create new product
     *
     * @param array $product
     * @return void
     */
    public function productCreate(array $product): void;

    /**
     * Delete product
     *
     * @param integer $productId
     * @return int
     */
    public function productDelete(int $productId): int;

    /**
     * Search for product data
     *
     * @param string $search
     * @return object
     */
    public function productSearch(string $search): object;
}
