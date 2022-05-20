テスト
@foreach($values as $value)
{{ $value->id }}
{{-- 結果 1 --}}
{{ $value->text }}
{{-- 結果 テスト1 --}}
@endforeach
{{-- 
    {{ }} でエスケープ処理して表示
    (自動的にhtmlspecialchairsを設定しXSS攻撃を防ぐ)
    @csrfでCSRF対策
    @foreach @endforeach で配列表示
    @section @yieldなどでテンプレート読み込み 
--}}