<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Interfaces\SettingRepositoryInterface;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    public function __construct(private SettingRepositoryInterface $settingRepository)
    {
        $this->middleware('auth:api');
    }

    public function updateSettings(UpdateSettingRequest $request , $id){
        try{
            $model = $this->settingRepository->find($id);
            $this->authorize('update' , $model);

            $data = $request->validated();
            $this->settingRepository->update($model,$data);
            return response()->json(['message' => 'Setting Updated Successfully'] , 200);
        }catch(\Exception $e){
            return $e;
        }
    }
}
