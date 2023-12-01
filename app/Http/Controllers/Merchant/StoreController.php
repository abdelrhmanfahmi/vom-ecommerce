<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Interfaces\StoreRepositoryInterface;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function __construct(private StoreRepositoryInterface $storeRepository)
    {
        $this->middleware('auth:api');
    }

    public function saveStore(StoreRequest $request)
    {
        try{
            $data = $request->validated();
            $this->storeRepository->create($data);
            return response()->json(['message' => 'Store Created Successfuly'],200);
        }catch(\Exception $e){
            return $e;
        }
    }
}
