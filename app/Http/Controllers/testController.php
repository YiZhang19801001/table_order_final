<?php

namespace App\Http\Controllers;

class testController extends Controller
{
    public function changeConfigValue($mode)
    {
        $basePath = getcwd();
        $path = $basePath . "\\css\\app.css";
        if ($mode === 'light') {
            $pathCopyFrom = $basePath . "\\css\\app_light.css";

        } else if ($mode === 'dark') {

            $pathCopyFrom = $basePath . "\\css\\app_dark.css";
        }

        // file_put_contents(
        //     $path, str_replace(
        //         "'show_options' => " . var_export(\Config::get('custom.show_options'), true),
        //         "'show_options' => " . var_export($bool, true),
        //         file_get_contents($path)
        //     )
        // );

        file_put_contents($path, file_get_contents($pathCopyFrom));

        // $value = file_get_contents($path);

        /**return to client side */
        return response()->json('theme changed to ' . $mode . ' !', 200);
    }
}
