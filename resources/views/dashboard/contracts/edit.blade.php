@extends('layouts.dashboard')

@section('content')
<div class="w-50">
      <h1>契約書作成</h1>
  
      <hr>

      <div class="form-inline mt-4 mb-4 row">
      <div class="mt-3">
      <!-- <a href="{{route('contracts.show', $contract)}}"> -->
          @if ($contract->image !== "")
              <img src="{{ asset('public/storage') }}/{{ $contract->id }}/{{ $contract->image }}" class="img-thumbnail">
          @else
              <img src="{{ asset('img/noimage.jpg')}}" class="img-thumbnail">
          @endif
      <!-- </a> -->

      <form id="file_upload_form" method="post" action="/dashboard/contracts" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div id="file_drag_drop_area" class="text-center p-3 rounded col-md-10 mx-auto" style="border:3px #000000 dashed;">
          ここにファイルをドラッグ&ドロップ<br/>
          <span>または</span><br/>
          <input id="file_input" type="file" name="image" multiple />
        </div>
        <div class="d-flex justify-content-center mt-2">
          <input type="submit" value="次へ" class="btn btn-primary pl-3 pr-3" />
        </div>
      </form>
    </div>
      </div>
      <div class="d-flex justify-content-end mx-5">
      <a href="/dashboard/products">商品一覧に戻る</a>
  </div>
  </div>
@endsection