<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Http\Requests\RequestProductApi;
use App\Http\Resources\Product;
use App\Repositories\ProductInterface;
use App\Services\ProductService;
use Illuminate\Support\Facades\Validator;

class ProductControllerApi extends Controller
{
    protected $productRepository;
    protected $productService;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->productService = new ProductService($productRepository);
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $products = $this->productRepository->allProduct();
        $arr = [
            'status' => true,
            'message' => 'Danh sach san pham',
            'data' => $products
        ];
        return response()->json($arr, 200);
//        return "tset";
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(RequestProductApi $request)
    {
        $data = $request->all();
        $product = $this->productRepository->storeProduct($data);
        $arr = [
            'success' => true,
            'message' => 'Them moi thanh cong',
            'data' => $product
        ];
        return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     *
     *
     */
    public function show($id)
    {
        $product = $this->productRepository->findProduct($id);
        if(empty($product)){
            $arr = [
                'success' => false,
                'message' => 'Khong tim thay product',
                'data' => $product
            ];
            return response()->json($arr, 200);
        }
        $arr = [
            'success' => true,
            'message' => 'Tim thay product',
            'data' => $product
        ];
        return response()->json($arr, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(RequestProductApi $request, $id)
    {
        $data = $request->all();
        $product = $this->productRepository->updateProduct($data, $id);
        dd($product);
        $arr = [
            'success' => true,
            'message' => 'update thanh cong',
            'data' => $product
        ];
        return response()->json($arr, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy($id)
    {
        $this->productRepository->deleteProduct($id);
        $arr = [
            'status' => true,
            'message' => 'Sản phẩm đã được xóa',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
