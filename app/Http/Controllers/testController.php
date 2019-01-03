<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        file_put_contents($path, file_get_contents($pathCopyFrom));

        // $value = file_get_contents($path);

        /**return to client side */
        return response()->json('theme changed to ' . $mode . ' !', 200);
    }

    public function changeText(Request $request)
    {
        $path_cn = "C:\\xampp\\htdocs\\table\\config\\language_cn.php";
        $path_en = "C:\\xampp\\htdocs\\table\\config\\language_en.php";
        //var_export($bool, true) how to read boolean as boolean
        file_put_contents(
            $path_cn, str_replace(
                "'preorder_title' => " . "'" . \Config::get('language_cn.preorder_title') . "'",
                "'preorder_title' => " . "'" . $request->preorder_title_cn . "'",
                file_get_contents($path_cn)
            )
        );
        file_put_contents(
            $path_en, str_replace(
                "'preorder_title' => " . "'" . \Config::get('language_en.preorder_title') . "'",
                "'preorder_title' => " . "'" . $request->preorder_title_en . "'",
                file_get_contents($path_en)
            )
        );

        $language_cn = file_get_contents($path_cn);
        $language_en = file_get_contents($path_en);
        // $language_cn = \Config::get('language_cn');
        // $language_en = \Config::get('language_en');
        return response()->json(compact('language_cn', 'language_en'));
    }
}
