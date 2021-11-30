@extends('layouts.app')

@section('content')
<div class="mx-auto w-50">
      <h1>契約書</h1>
  
      <hr>

        <h2>契約の締結が完了しました</h2>
          <a href="{{ asset('public/storage') }}/{{ $contract->id }}/{{ $contract->image }}" target="_blank">
            契約書を確認する
          </a>
          <div class="d-flex justify-content-center mt-2">
            <a href="/" class="btn btn-primary btn-lg w-50 h-50 pl-3 pr-3" >トップページ</a>
          </div>
  </div>
  @endsection
