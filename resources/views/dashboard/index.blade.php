@extends('layouts.dashboard')

@section('content')

<h1>日程一覧</h1>
<hr>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>名前</th><th>日付</th><th>今月の意気込み</th><th>特に力を入れたいこと</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($schedules as $schedule)
  <tr>
      <td>
         <a href="dashboard/{{$schedule->user_id}}">
            {{$schedule->user->name}}
         </a> 
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
  @endforeach
  </tbody>
</table>
{{ $schedules->links() }}
@endsection 