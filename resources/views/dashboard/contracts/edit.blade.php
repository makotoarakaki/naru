@extends('layouts.dashboard')

@section('content')
<div class="w-50">
      <h1>契約書作成</h1>
  
      <hr>

        <h4>
          <a href="{{ asset('public/storage') }}/{{ $contract->id }}/{{ $contract->image }}" target="_blank">
            契約書を確認する
          </a>
        </h4>
        <form method="POST" action="/dashboard/contracts/{{ $contract->id }}" class="mb-5" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{ $contract->id }}">
          <input type="hidden" name="_method" value="PUT">
          <div class="form-inline mt-4 mb-4 row">
            <label for="product-price" class="col-3 d-flex justify-content-start">お名前</label>
            <input type="text" name="name" id="product-price" class="form-control col-8">
          </div>
          <div class="form-inline mt-4 mb-4 row">
            <label for="product-price" class="col-3 d-flex justify-content-start">メールアドレス</label>
            <input type="email" name="mail" id="product-price" class="form-control col-8">
          </div>
          <div class="d-flex justify-content-center mt-2">
            <input type="submit" value="送信" class="btn btn-primary pl-3 pr-3" />
          </div>
        </form>
      <div class="d-flex justify-content-end mx-5">
        <a href="/dashboard/contracts">戻る</a>
      </div>
  </div>
@endsection