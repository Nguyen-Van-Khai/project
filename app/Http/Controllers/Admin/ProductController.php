<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Repositories\ProductInterface;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productRepository;
    protected $productService;
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->productService = new ProductService($productRepository);
    }

    public function index(){

        $products = $this->productRepository->allProduct();
        return view('admin.products.index', compact('products'));
    }
    public function create(){
        return view('admin.products.create');
    }
    public function store(Request $request){
        $data = $request->all();
        $data['avatar'] = $this->productService->createImage($request);
        $checkCreate = $this->productRepository->storeProduct($data);
        if (!empty($checkCreate)) {
            return redirect(url('backend/product'))->with('success', 'Thêm mới thành công');
        } else {
            return redirect(url('backend/product'))->with('error', 'Thêm mới thất bại');
        }
    }
    public function edit($id){
        $product = $this->productRepository->findProduct($id);
        return view('admin.products.update', compact('product'));
    }
    public function update(Request $request, $id){
        $data = $request->all();
        $data['avatar'] = $this->productService->handleImage($request, $id);
        $checkUpdate = $this->productRepository->updateProduct($data, $id);
        if (!empty($checkUpdate)) {
            return redirect(url('backend/product'))->with('success', 'Update thành công');
        } else {
            return redirect(url('backend/product'))->with('error', 'Update thất bại');
        }
    }

    public function delete($id){
        return response()->json(
            [
                'success' => $this->productRepository->deleteProduct($id)
            ]
        );
    }
}
