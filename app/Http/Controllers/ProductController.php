<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

/**
 * Product Controller package
 *
 * @package App\Http\Controllers
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class ProductController extends Controller
{
    /**
     * Init controller with service
     *
     * @param ProductService $productService
     */
    public function __construct(private ProductService $productService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => $this->productService->allProducts()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->productService->createProduct([
            'name'     => $request->productName,
            'price'    => $request->productPrice,
            'category' => $request->productCategory
        ]);

        return to_route('product.index');
    }

    /**
     * Return Product search in Json format
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $productData = filter_var($request->productData, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $productResult = $this->productService->searchProduct($productData);

        return response()->json(['products' => $productResult]);
    }

    public function edit(int $id)
    {
        // TODO
    }

    /**
     * Delete product
     *
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        $producId = filter_var($id, FILTER_VALIDATE_INT);

        if (!$producId) {
            return to_route('product.index', ['error' => 'Invalid id']);
        }

        $result = $this->productService->deleteProduct($producId);

        return to_route('product.index')->with(array_key_first($result), array_values($result)[0]);
    }
}
