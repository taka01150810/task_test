<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Shop;

class ShopController extends Controller
{
    //
    public function index(){
        //主 -> 従
        $area_tokyo = Area::find(1)->shops;
        var_dump($area_tokyo);
        /* 結果
        object(Illuminate\Database\Eloquent\Collection)#1363 (1) {
        ["items":protected]=>
        array(1) {
            [0]=>
            object(App\Models\Shop)#1362 (26) {
            ["attributes":protected]=>
            array(5) {
                ["id"]=>
                int(1)
                ["shop_name"]=>
                string(18) "高級食パン屋"
                ["area_id"]=>
                int(1)
                ["created_at"]=>
                NULL
                ["updated_at"]=>
                NULL
            }
        }
        */

        //主 <= 従
        $shop = Shop::find(3)->area->name;
        var_dump($shop);
        //結果 string(6) "福岡"
    }
}
