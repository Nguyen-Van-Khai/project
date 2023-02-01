<?php

namespace App\Services;

use App\Http\Requests\Request;
use App\Repositories\ProductInterface;
use Nette\Utils\Image;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createImage(Request $request)
    {
        if ($request->has('avatar')) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $avatar = time() . '-' . $avatar;
            // Tạo thư mục upload chứa các file sẽ tải lên
            $dir_uploads = public_path('uploads');
            $is_upload = $request->file('avatar')->move($dir_uploads, $avatar);
            return $avatar;
        }
        return false;
    }

    public function handleImage(Request $request, $id)
    {
        $product = $this->productRepository->findProduct($id);
        if ($request->has('avatar')) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $avatar = time() . '-' . $avatar;
            if (file_exists(public_path('uploads/' . $product->avatar))) {
                unlink(public_path('uploads/' . $product->avatar));
            }
            $request->file('avatar')->move(public_path('uploads'), $avatar);
            return $avatar;
        }
        return false;
    }
    public  function  resize($id){
        $product = $this->productRepository->findProduct($id);
        $image = \Intervention\Image\Facades\Image::make(asset('upload/'.$product->avatar));
        $image->fit(600, 600)->save(asset('upload/'.$product->avatar));
        $image->fit(400, 400)->save(asset('upload/'.$product->avatar));
        $image->fit(150, 150)->save(asset('upload/'.$product->avatar));
        return 'Done';
    }

}
