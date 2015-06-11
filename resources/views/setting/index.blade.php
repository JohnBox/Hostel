@extends('setting.master')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Гуртожитки</div>
          <div class="panel-body">
            <table class="table table-striped">
              <tr>
                <th>Назва</th>
                <th>Адреса</th>
                <th>Телефон</th>
              </tr>
              @foreach($hostels as $hostel)
                <tr>
                  <td>{{ $hostel->name }}</td>
                  <td>{{ $hostel->address }}</td>
                  <td>{{ $hostel->phone }}</td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">Коменданти</div>
          <div class="panel-body">
            <table class="table table-striped">
              <tr>
                <th>Імя</th>
                <th>Ел. пошта</th>
                <th>Гуртожиток</th>
              </tr>
              @foreach($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->hostel->name }}</td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection