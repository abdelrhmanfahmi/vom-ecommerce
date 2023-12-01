<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Interfaces\CartRepositoryInterface;
use App\Http\Requests\StoreCartRequest;
use App\Services\CartService;

class CartController extends Controller
{
    public function __construct(private CartRepositoryInterface $cartRepository , private CartService $cartService)
    {
        $this->middleware('auth:api');
    }

    public function saveCart(StoreCartRequest $request)
    {
        try{
            $data = $request->validated();
            $this->cartRepository->create($data);
            return response()->json(['message' => 'Cart Created Successfully']);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function getTotalPrice()
    {
        try{
            $paginate = Request()->paginate ?? true;
            $count = Request()->count ?? 10;
            $relations = ['product'];

            $data = $this->cartRepository->getAllCart($paginate,$count,$relations);
            $total = $this->cartService->calculateTotalPrice($data);
            return $total;
        }catch(\Exception $e){
            return $e;
        }
    }
}
