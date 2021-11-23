@extends('layouts.dashboard')

@section('content')

<table class="table table-hover">
  <thead>
    <tr>
      <th>No.</th><th>日付</th><th>入金額</th>
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
  </tr>
  @endforeach
  </tbody>
</table>
{{ $schedules->links() }}
@endsection 