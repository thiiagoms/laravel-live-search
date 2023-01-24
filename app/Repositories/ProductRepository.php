<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\ProductContract;
use App\Models\Product;

/**
 * Product Repository
 *
 * @package App\Repositories
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
class ProductRepository extends Repository implements ProductContract
{
    /**
     * Model injection
     *
     * @var object
     */
    protected $model = Product::class;

    /**
     * Return all products
     *
     * @return object
     */
    public function productList(): object
    {
        return $this->model->simplePaginate(5);
    }

    /**
     * Return if product exists or null instead
     *
     * @param integer $productId
     * @return object|null
     */
    public function productFind(int $productId): object|null
    {
        return $this->model->find($productId);
    }

    /**
     * Add new product
     *
     * @param array $data
     * @return void
     */
    public function productCreate(array $data): void
    {
        $this->model->create($data);
    }

    /**
     * Return data from product search
     *
     * @param string $productData
     * @return object
     */
    public function productSearch(string $productData): object
    {
        return $this->model->where('name', 'like', "%{$productData}%")
            ->orWhere('category', 'like', "%{$productData}%")
            ->get();
    }

    /**
     * Delete product
     *
     * @param integer $productId
     * @return integer
     */
    public function productDelete(int $productId): int
    {
        return $this->model->destroy($productId);
    }
}
