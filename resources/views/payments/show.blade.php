@extends('layouts.dashboard')

@section('content')
<div class="w-50">
      <h1>入金状況</h1>
  
      <hr>

      <div class="form-inline mt-4 mb-4 row">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No.</th><th>日付</th><th>入金額</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $cnt = 1;
            $sum = 0;    
        ?> 
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
        </tr>
        <?php  
          $cnt++;
          $sum = $sum + $payment->deposit;  
        ?>
        @endforeach
        </tbody>
      </table>
      <div class="d-flex flex-row-reverse bd-highlight mt-4 mb-4 row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>商品代</th><th>入金済</th><th>残額</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($payments))
                <tr>
                    <td>
                        {{ number_format($price) }}
                    </td>
                    <td>
                        {{ number_format($sum) }}
                    </td>
                    <td class="bg-info">
                        {{ number_format($price - $sum) }}
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-end mx-5">
      <a href="/dashboard/products">商品一覧に戻る</a>
  </div>
  </div>
@endsection 