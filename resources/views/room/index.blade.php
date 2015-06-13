@extends('room.master')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Кімнати</div>
    <div class="panel-body">
      <div id="room_container">
        <ul>
        @foreach($rooms as $room)
            <li>
              <a class='normal' href='#'>
                <h2>{{ $room->number }}</h2>
              </a>
              <div class='info'>
                john box
                <br/>
                leila wong
                <br/>
                marty style
              </div>
            </li>
        @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    var room_container = document.getElementById('room_container');
    var nodes  = room_container.querySelectorAll('li'),
        _nodes = [].slice.call(nodes, 0);
    var getDirection = function (ev, obj) {
      var w = obj.offsetWidth,
          h = obj.offsetHeight,
          x = (ev.pageX - obj.offsetLeft - (w / 2) * (w > h ? (h / w) : 1)),
          y = (ev.pageY - obj.offsetTop - (h / 2) * (h > w ? (w / h) : 1));
      return Math.round( Math.atan2(y, x) / 1.57079633 + 5 ) % 4;
    };
    var addClass = function ( ev, obj, state ) {
      var direction = getDirection( ev, obj ),
          class_suffix = "";
      obj.className = "";
      switch ( direction ) {
        case 0 : class_suffix = '-top';    break;
        case 1 : class_suffix = '-right';  break;
        case 2 : class_suffix = '-bottom'; break;
        case 3 : class_suffix = '-left';   break;
      }
      obj.classList.add( state + class_suffix );
    };
    _nodes.forEach(function (el) {
      el.addEventListener('mouseover', function (ev) {
        addClass( ev, this, 'in' );
      }, false);
      el.addEventListener('mouseout', function (ev) {
        addClass( ev, this, 'out' );
      }, false);
    });
  </script>
@endsection