<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\ProductInterface;
class ProductRepository implements ProductInterface {

    public function allProduct()
    {
        return Product::latest()->paginate(8);
    }

    public function storeProduct($data)
    {
        return Product::create($data);
    }

    public function findProduct($id)
    {
        return Product::query()->find($id);
    }

    public function updateProduct($data, $id)
    {
        $product = Product::query()->where('id', $id)->first();
        if(isset($data['avatar'])){
            $avatar = $data['avatar']->getClientOriginalName();
            $avatar = time().'-'.$avatar;
            if(file_exists(public_path('uploads/'.$product->avatar))){
                unlink(public_path('uploads/'.$product->avatar));
            }
            $data['avatar']->move(public_path('uploads'), $avatar);
            $data['avatar'] = $avatar;
        }

        return $product->update($data);
    }

    public function deleteProduct($id)
    {
        $product = Product::query()->find($id);
        return $product->delete();
    }
}
