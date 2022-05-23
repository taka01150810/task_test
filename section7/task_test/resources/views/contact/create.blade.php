{{-- home.blade.phpからコピペ --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="">
                        氏名
                        <input type="text" name="your_name"><br>
                        件名
                        <input type="text" name="title"><br>
                        メールアドレス
                        <input type="email" name="email"><br>
                        ホームページ
                        <input type="url" name="url"><br>
                        性別
                        <input type="radio" name="gender" value="0">男性<br>
                        <input type="radio" name="gender" value="1">女性<br>
                        年齢
                        <select name="age">
                            <option value="">選択してください</option><br>
                            <option value="1">〜19歳</option><br>
                            <option value="2">20歳〜29歳</option><br>
                            <option value="3">30歳〜39歳</option><br>
                            <option value="4">40歳〜49歳</option><br>
                            <option value="5">50歳〜59歳</option><br>
                            <option value="6">60歳</option><br>
                        </select><br>
                        お問い合わせ内容
                        <textarea name="contact"></textarea><br>
                        <input type="checkbox" name="caution" value="1">注意事項に同意する<br>
                        <input class="btn btn-info" type="submit" value="登録する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection