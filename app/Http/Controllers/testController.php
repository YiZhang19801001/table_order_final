<?php

namespace App\Http\Controllers;

class testController extends Controller
{
    public function changeConfigValue()
    {
        $values = \Config::get('custom');

        /**return app_conf to client side */
        return response()->json($values, 200);
    }
}
