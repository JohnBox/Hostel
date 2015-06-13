@extends('liver.master')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Кімнати</div>
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="{{ url('/livers') }}}">Всі</a></li>
          <li role="presentation" class="active"><a>Заселені</a></li>
          <li role="presentation"><a href="{{ url('/livers/deactive') }}">Виселені</a></li>
        </ul>
        <br/>
        <a type="button" class="btn btn-sm btn-default" href="{{ url('liver/create-liver') }}">Створити новий</a>
        <br/>
        <br/>
        <table class="table table-striped">
          <tr>
            <th>Факультет</th>
            <th>Курс</th>
            <th>Номер</th>
            <th>Наставник</th>
            <th>Телефон</th>
            <th></th>
            <th></th>
          </tr>
          @foreach($livers as $liver)
            <tr>
              <td>{{ $liver->name }}</td>
              <td>{{ $liver->course }}</td>
              <td>{{ $liver->number }}</td>
              <td>{{ $liver->leader }}</td>
              <td>{{ $liver->phone }}</td>
              <td><a href="{{ url('liver/edit-liver') }}/{{ $liver->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
              <td><a href="{{ url('liver/delete-liver') }}/{{ $liver->id }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
@endsection