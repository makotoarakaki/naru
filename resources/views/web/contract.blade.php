@extends('layouts.app')

@section('content')
<div class="mx-auto w-50">
      <h1>契約書</h1>
  
      <hr>

        <h4>
          <a href="{{ asset('public/storage') }}/{{ $contract->id }}/{{ $contract->image }}" target="_blank">
            契約書を確認する
          </a>
        </h4>
        <form method="POST" action="/contract_comp/{{ $contract->id }}" class="mb-5" enctype="multipart/form-data">
          @csrf
          <!-- <input type="hidden" name="_method" value="PUT"> -->
          <h2>書類を確認いただき、同意をお願いします。</h2>
          <div class="d-flex justify-content-center mt-2">
            <input type="submit" value="書類の内容に同意する" class="btn btn-danger btn-lg w-50 h-50 pl-3 pr-3" />
          </div>
        </form>
  </div>@endsection
