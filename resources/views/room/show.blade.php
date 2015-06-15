@extends('room.master')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Кімната #{{ $room->number }}</div>
    <div class="panel-body">
      @foreach($room->livers as $l)
        {{ $l }}
      @endforeach
    </div>
  </div>
@endsection