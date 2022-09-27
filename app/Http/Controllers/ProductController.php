<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Product service
     *
     * @var ProductService
     */
    private ProductService $productService;

    /**
     * Init controller with service
     *
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
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
        
        $this->productService->createNewProduct([
            'name' => $request->productName,
            'price' => $request->productPrice,
            'category' => $request->productCategory
        ]);
        
        return view('products.index');
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
}