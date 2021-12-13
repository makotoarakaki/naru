@extends('layouts.dashboard')

@section('content')

<h1>{{ $user_name }}様</h1>
<hr>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>日付</th><th>今月の意気込み</th><th>特に力を入れたいこと</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($schedules as $schedule)
  <tr>
     <td class="bg-danger text-white">
        第一希望
     </td>
     <td>
        {{$schedule->schedule}}
     </td>
     <td rowspan=”3″>
        {{$schedule->best}}
     </td>
     <td rowspan=”3″>
        {{$schedule->power}}
     </td>
  </tr>
  <tr>
     <td class="bg-warning text-dark">
        第二希望
     </td>
     <td>
        {{$schedule->schedule2}}
     </td>
  </tr>
  <tr>
     <td class="bg-info text-white">
        第三希望
     </td>
     <td>
        {{$schedule->schedule2}}
     </td>
  </tr>
  @endforeach
  </tbody>
</table>
{{ $schedules->links() }}
@endsection 