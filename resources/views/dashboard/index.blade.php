@extends('layouts.dashboard')

@section('content')

<table class="table table-hover">
  <thead>
    <tr>
      <th>名前</th><th>日付</th><th>今月の意気込み</th><th>特に力を入れたいこと</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($schedules as $schedule)
    <tr>
      <td>
        {{$schedule->user->name}}    
     </td>
     <td>
        {{$schedule->schedule}}
     </td>
     <td>
        {{$schedule->best}}
     </td>
     <td>
        {{$schedule->power}}
    </td>
    </tr>
    <tr>
    @endforeach
  </tbody>
</table>

@endsection 