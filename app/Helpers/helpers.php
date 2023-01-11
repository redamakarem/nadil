<?php

use App\Models\Restaurant;
use App\Models\User;

if(!function_exists('nadil_user_can_access')){
    function nadil_user_can_access(User $user,Restaurant $restaurant)
    {
        if($user->hasAnyRole('super-admin'))
            return true;
        if($restaurant->id==$user->restaurant_id)
            return true;

        return false;
    }
}