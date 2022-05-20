<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
        $values = Test::all();
        //dd($values);//dd = die + var_dump

        return view('tests.test', compact('values'));
        //view dd などLaravelが用意しているのがヘルパ関数
    }
}
