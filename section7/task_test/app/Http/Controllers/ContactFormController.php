<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;
use App\Services\CheckFormData;
use App\Http\Requests\StoreContactForm;

//php artisan make:controller ContactFormController --resource  で追加
class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //エロクアント ORマッパー
        // $contacts = ContactForm::all();
        // var_dump($contacts);
        /* 結果
        object(Illuminate\Database\Eloquent\Collection)#1373 (1) {
        ["items":protected]=>
        array(1) {
            [0]=>
            object(App\Models\ContactForm)#1372 (26) {
            ["connection":protected]=>
            string(5) "mysql"
            ["table":protected]=>
            string(13) "contact_forms"
            ["primaryKey":protected]=>
            string(2) "id"
            ["keyType":protected]=>
            string(3) "int"
            ["incrementing"]=>
            bool(true)
            ["with":protected]=>
            array(0) {
            }
            ["withCount":protected]=>
            array(0) {
            }
            ["perPage":protected]=>
            int(15)
            ["exists"]=>
            bool(true)
            ["wasRecentlyCreated"]=>
            bool(false)
            ["attributes":protected]=>
            array(10) {
                ["id"]=>
                int(1)
                ["your_name"]=>
                string(12) "レブロン"
                ["title"]=>
                string(12) "タイトル"
                ["email"]=>
                string(22) "taka01150810@gmail.com"
                ["url"]=>
                string(23) "https://www.google.com/"
                ["gender"]=>
                int(0)
                ["age"]=>
                int(3)
                ["contact"]=>
                string(9) "いいい"
                ["created_at"]=>
                string(19) "2022-05-23 13:31:58"
                ["updated_at"]=>
                string(19) "2022-05-23 13:31:58"
            }
            ["original":protected]=>
            array(10) {
                ["id"]=>
                int(1)
                ["your_name"]=>
                string(12) "レブロン"
                ["title"]=>
                string(12) "タイトル"
                ["email"]=>
                string(22) "taka01150810@gmail.com"
                ["url"]=>
                string(23) "https://www.google.com/"
                ["gender"]=>
                int(0)
                ["age"]=>
                int(3)
                ["contact"]=>
                string(9) "いいい"
                ["created_at"]=>
                string(19) "2022-05-23 13:31:58"
                ["updated_at"]=>
                string(19) "2022-05-23 13:31:58"
            }
            ["changes":protected]=>
            array(0) {
            }
            ["casts":protected]=>
            array(0) {
            }
            ["dates":protected]=>
            array(0) {
            }
            ["dateFormat":protected]=>
            NULL
            ["appends":protected]=>
            array(0) {
            }
            ["dispatchesEvents":protected]=>
            array(0) {
            }
            ["observables":protected]=>
            array(0) {
            }
            ["relations":protected]=>
            array(0) {
            }
            ["touches":protected]=>
            array(0) {
            }
            ["timestamps"]=>
            bool(true)
            ["hidden":protected]=>
            array(0) {
            }
            ["visible":protected]=>
            array(0) {
            }
            ["fillable":protected]=>
            array(0) {
            }
            ["guarded":protected]=>
            array(1) {
                [0]=>
                string(1) "*"
            }
            }
        }
        }

        必要のない情報もあるのでクエリビルダで行う
        */

        //クエリビルダ
        $contacts = DB::table('contact_forms')
        ->select('id', 'your_name','title', 'created_at')
        ->orderBy('created_at', 'desc')//orderByで並び替え
        ->get();
        // var_dump($contacts);
        /*
        object(Illuminate\Support\Collection)#408 (1) {
        ["items":protected]=>
        array(1) {
            [0]=>
            object(stdClass)#1285 (2) {
            ["id"]=>
            int(1)
            ["your_name"]=>
            string(12) "レブロン"
            }
        }
        }
        */
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactForm $request)
    {
        //ContactFormをインスタンス化
        $contact = new ContactForm;
        /*
        今までは$_POSTでPOSTデータを取得していた
        laravelではRequestでデータを取得できる
        */
        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        $contact->save();
        return redirect('contact/index');

        // dd($your_name);
        //結果 your_nameで入力した値
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contact = ContactForm::find($id);

        $gender = CheckFormData::checkGender($contact);
        $age = CheckFormData::checkAge($contact);

        return view('contact.show', 
        compact('contact','gender','age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactForm::find($id);

        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = ContactForm::find($id);

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        $contact->save();
        return redirect('contact/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactForm::find($id);
        $contact->delete();
 
        return redirect('contact/index');
    }
}
