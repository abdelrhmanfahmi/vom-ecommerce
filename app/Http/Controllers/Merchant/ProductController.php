<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\ActiveProductRequest;
use App\Repository\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    public function __construct(private ProductRepositoryInterface $productRepository)
    {
        $this->middleware('auth:api');
    }

    public function saveProduct(StoreProductRequest $request)
    {
        try{
            $data = $request->validated();
            $this->productRepository->create($data);
            return response()->json(['message' => 'Store Created Successfuly'],200);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function updateProductVat(ActiveProductRequest $request , $id)
    {
        try{
            $data = $request->validated();
            $model = $this->productRepository->find($id);
            $this->productRepository->ActivateProductUpdate($model,$data);
            return response()->json(['message' => 'Product Updated Successfully']);
        }catch(\Exception $e){
            return $e;
        }
    }
}
