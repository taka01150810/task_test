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

        /* クエリビルダ
        Select,whereなどSQLに近い構文
        DB::table(テーブル名)-> とつなぐ
        */
        $tests = DB::table('tests')->get();
        var_dump($tests);
        /* 結果
        object(Illuminate\Support\Collection)#362 (1) {
        ["items":protected]=>
        array(2) {
            [0]=>
            object(stdClass)#1258 (4) {
            ["id"]=>
            int(1)
            ["text"]=>
            string(10) "テスト1"
            ["created_at"]=>
            NULL
            ["updated_at"]=>
            NULL
            }
            [1]=>
            object(stdClass)#1259 (4) {
            ["id"]=>
            int(2)
            ["text"]=>
            string(10) "テスト2"
            ["created_at"]=>
            NULL
            ["updated_at"]=>
            NULL
            }
        }
        }
        */
        $tests = DB::table('tests')->select('id')->get();
        var_dump($tests);//dd = die + var_dump
        /* 結果
        object(Illuminate\Support\Collection)#379 (1) {
        ["items":protected]=>
        array(2) {
            [0]=>
            object(stdClass)#1348 (1) {
            ["id"]=>
            int(1)
            }
            [1]=>
            object(stdClass)#1347 (1) {
            ["id"]=>
            int(2)
            }
        }
        }
        */

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
        /*
        DIというのは簡単に言うとクラスの内部でインスタンス生成(new)するのではなく、外部で用意して注入してね と言う事です。
        めっちゃ噛み砕いて言うとクラスの中でnewすんなってこと。
        ユーザーの携帯を鳴らすという簡単な処理を実行している処理で言えば

        class User
        {
            protected $phone;
        
            public function __construct()
            {
                $this->phone = new Phone();
            }
        
            public function UserCallPhone()
            {
                $this->phone->call();
            }
        }
        
        class Phone
        {
            public function call()
            {
                return "プルプル...";
            }
        }

        上記を

        class User
        {
            protected $phone;
        
            public function __construct(Phone $phone)
            {
                $this->phone = $phone;
            }
        
            public function UserCallPhone()
            {
                $this->phone->call();
            }
        }
        
        class Phone
        {
            public function call()
            {
                return "プルプル...";
            }
        }
        
        // ここでPhoneクラスをインスタンス化
        $phone = new Phone();
        // Phoneクラスのインスタンスを引数に渡す
        $user = new User($phone);

        */
        /*
        例によって、簡単に説明すると依存関係を解決するために行なっていた外部からの注入(上記DI参考)を
        まとめて担ってくれるのがサービスコンテナです。
        サービス => インスタンス化(new)
        コンテナ => 入れ物

        class User
        {
            protected $phone;

            //Phoneクラスのインスタンス(new)をサービスコンテナが代わりに作って渡してくれている。
            public function __construct()
            {
                //bind()にクラス名を渡してそのインスタンスの生成方法をサービスコンテナに登録する
                app()->bind('Phone', function(){
                    return new Phone();
                });

                //指定されたインスタンスをサービスコンテナが生成したインスタンスを取得
                $this->phone = app()->make('Phone');
            }

            // Phoneクラスのインスタンスを$phoneに渡している
            public function UserCallPhone()
            {
                $this->phone->call();
            }
        }

        class Phone
        {
            public function call()
            {
                return "プルプルプル...";
            }
        }

        $user = new User();
        */

        return view('tests.test', compact('values'));
        //view dd などLaravelが用意しているのがヘルパ関数
    }
}
