@extends('layouts.dashboard')

@section('content')
<div class="w-50">
      <h1>入金状況</h1>
  
      <hr>

      <div class="form-inline mt-4 mb-4 row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No.</th><th>日付</th><th>入金額</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($payments as $payment)
        <tr>
            <td>
              {{$payment->id}}    
          </td>
          <td>
              {{$payment->created_at->format('Y年m月d日')}}
          </td>
          <td>
              {{$payment->deposit}}
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      <div class="d-flex flex-row bd-highlight mt-3 mb-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>金 額</th><th>入金済</th><th>残額</th>
                </tr>
            </thead>
            <tbody>
                @if(!isset($payment))
                <tr>
                    <td>
                        {{ number_format($payment->price) }}
                    </td>
                    <td>
                        {{ number_format($payment->deposit) }}
                    </td>
                    <td>
                        {{ number_format($payment->price - $payment->deposit) }}
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-end">
          <a href="/dashboard/products">商品一覧に戻る</a>
      </div>
  </div>
@endsection 