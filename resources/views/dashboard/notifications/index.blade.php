@extends('layouts.dashboard')

@section('content')
<h1>通知設定</h1>

<div class="w-75 mt-2">
    <div class="w-75">
    <form method="POST" action="/dashboard/notifications" class="mb-5">
        @csrf
            <div class="d-flex flex-inline form-group">
                <div class="d-flex align-items-center">
                    実施&nbsp;
                </div>
                <input type="number" name="time" class="form-controll col-xs-1">
                &nbsp;時間前
            </div>
            <button type="submit" class="btn samazon-submit-button">+ 追加</button>
        </form>
    </div>

    <table class="table table-responsive mt-5">

        <thead>
            <tr>
                <th scope="col" class="w-25">No.</th>
                <th scope="col">時間</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach($notifications as $notification)
            <tr>
                <th scope="row">{{ $no }}</td>
                <td>{{ $notification->time }}</td>
                <td>
                    <a href="/dashboard/notifications/{{ $notification->id }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger">
                        削除
                    </a>

                    <form id="logout-form" action="/dashboard/notifications/{{ $notification->id }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </td>
            </tr>
            <?php $no++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection