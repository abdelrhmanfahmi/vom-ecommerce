<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Setting;
use App\Models\Product;
use Illuminate\Auth\Access\Response;

class SettingPolicy
{
    /**
     * Determine whether the user can update the model.
    */
    public function update(User $user, Setting $setting)
    {
        $data = Product::pluck('has_vat')->toArray();
        if($setting->key == 'vat' && in_array('1' , $data)){
            return Response::deny('You cant update setting vat has already products assigned to it!');
        }

        return true;
    }
}
