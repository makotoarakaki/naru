@extends('layouts.dashboard')

@section('content')
<div class="w-50">
      <h1>入金登録</h1>
  
      <hr>

     <form method="POST" action="/payments" class="mb-5" enctype="multipart/form-data">
     {{ csrf_field() }}
        <div class="form-inline mt-4 mb-4 row">
          <label for="product-price" class="col-3 d-flex justify-content-start">入金を追加</label>
          <input type="number" name="deposit" id="product-deposit" class="form-control col-4">
          <button type="submit" class="btn btn-primary form-control col-4">追加</button>
        </div>
        <input type="hidden" name="price" value="{{ $product->price }}">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="user_id" value="{{ $product->user_id }}">
     </form>
      <div class="form-inline mt-4 mb-4 row">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No.</th><th>日付</th><th>入金額</th>
          </tr>
        </thead>
        <tbody>
        <?php  $cnt =1;  ?>
        @foreach ($payments as $payment)
        <tr>
            <td>
              {{ $cnt }}    
          </td>
          <td>
              {{$payment->created_at->format('Y年m月d日')}}
          </td>
          <td>
              {{$payment->deposit}}
          </td>
          <td>
            <a href="/payments/{{ $payment->id }}" onclick="event.preventDefault(); document.getElementById('payment-form{{ $payment->id }}').submit();" class="text-danger">
                削除
            </a>

            <form id="payment-form{{ $payment->id }}" action="/payments/{{ $payment->id }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <!-- <button type="submit" class="btn btn-danger">削除</button> -->

            </form>
          </td>
        </tr>
        <?php  $cnt++;  ?>
        @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-end">
          <a href="/dashboard/products">商品一覧に戻る</a>
      </div>
      <div class="d-flex justify-content-end mx-5">
          <a href="/payments/{{$product->user_id}}">入金一覧</a>
      </div>
  </div>
@endsection 