<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(){

        $products = $this->productRepository->allProduct();
        return view('admin.products.index', compact('products'));
    }
    public function create(){
        return view('admin.products.create');
    }
    public function store(Request $request){
        $rules = [
            'name' => ['required', 'min:3'],
            'price' => ['required', 'numeric'],
            'avatar' => ['image', 'max:2048'],
            'description' =>['required']//max:KB
        ];
        $messages = [
            'name.required' => 'Tên sp phải nhập',
            'name.min' => 'Tên ít nhất 3 ký tự',
            'price.required' => 'Giá phải nhập',
            'price.numeric' => 'Giả phải là số',
            'avatar.image' => 'File upload phải là ảnh',
            'avatar.max' => 'File upload ko đc vượt quá 2MB',
            'description.required' => 'Mô tả không được để trống'
        ];
        $request->validate($rules, $messages);
        $data = $request->all();
        $avatar = '';
        if (isset($data['avatar'])) {
            $obj_avatar = $data['avatar'];
            // Tạo tên file mang tính duy nhất
            $avatar = time() . '-' . $obj_avatar->getClientOriginalName();
            // Tạo thư mục upload chứa các file sẽ tải lên
            $dir_uploads = public_path('uploads');
            // Upload file vào thư mục upload
            $is_upload = $obj_avatar->move($dir_uploads, $avatar);
        }
        $data['avatar'] = $avatar;
        $checkCreate = $this->productRepository->storeProduct($data);
        if (!empty($checkCreate)) {
            session()->put('success', 'Thêm mới thành công');
        } else {
            session()->put('error', 'Thêm mới thất bại');
        }
        return redirect(url('backend/product'));
    }
    public function edit($id){
        $product = $this->productRepository->findProduct($id);
        return view('admin.products.update', compact('product'));
    }
    public function update(Request $request, $id){
        $rules = [
            'name' => ['required', 'min:3'],
            'price' => ['required', 'numeric'],
            'avatar' => ['image', 'max:2048'],
            'description' =>['required']//max:KB
        ];
        $messages = [
            'name.required' => 'Tên sp phải nhập',
            'name.min' => 'Tên ít nhất 3 ký tự',
            'price.required' => 'Giá phải nhập',
            'price.numeric' => 'Giả phải là số',
            'avatar.image' => 'File upload phải là ảnh',
            'avatar.max' => 'File upload ko đc vượt quá 2MB',
            'description.required' => 'Mô tả không được để trống'
        ];
        $request->validate($rules, $messages);
        $data = $request->all();
        $checkUpdate = $this->productRepository->updateProduct($data, $id);
        if (!empty($checkUpdate)) {
            session()->put('success', 'Update thành công');
        } else {
            session()->put('error', 'Update thất bại');
        }
        return redirect(url('backend/product'));
    }

    public function delete($id){
        $checkDelete = $this->productRepository->deleteProduct($id);
        if (!empty($checkDelete)) {
            session()->put('success', 'Xóa thành công');
        } else {
            session()->put('error', 'Xóa thất bại');
        }
        return redirect(url('backend/product'));
    }
}
