<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        $values = Test::all();

        /*
        データベースからデータを取得時はコレクション型になっている。
        コレクション型には専門の関数は多数あり、メソッドチェーンで記述可能。
        */
        //chunkメソッドはコレクションを指定したサイズで複数の小さなコレクションに分割
        $collection = collect([1, 2, 3, 4, 5, 6, 7]);
        $chunks = $collection->chunk(4);
        $chunks->toArray();
        var_dump($chunks);
        /* 結果
        object(Illuminate\Support\Collection)#1169 (1) {
        ["items":protected]=>
        array(2) {
            [0]=>
            object(Illuminate\Support\Collection)#362 (1) {
            ["items":protected]=>
            array(4) {
                [0]=>
                int(1)
                [1]=>
                int(2)
                [2]=>
                int(3)
                [3]=>
                int(4)
            }
            }
            [1]=>
            object(Illuminate\Support\Collection)#379 (1) {
            ["items":protected]=>
            array(3) {
                [4]=>
                int(5)
                [5]=>
                int(6)
                [6]=>
                int(7)
            }
            }
        }
        }
        */

        return view('tests.test', compact('values'));
        //view dd などLaravelが用意しているのがヘルパ関数
    }
}
