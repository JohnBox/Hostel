@extends('liver.master')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Проживаючі</div>
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li role="presentation" class="active"><a>Всі</a></li>
          <li role="presentation"><a href="{{ url('/livers/active') }}">Заселені</a></li>
          <li role="presentation"><a href="{{ url('/livers/deative') }}">Виселені</a></li>
        </ul>
        <br/>
        <a type="button" class="btn btn-sm btn-default" href="{{ url('livers/create-liver') }}">Створити новий</a>
        <br/>
        <br/>
        <table class="table table-striped">
          <tr>
            <th>Прізвище Ім’я По батькові</th>
            <th>Дата народження</th>
            <th>Стать</th>
            <th>Студент</th>
            <th>Група</th>
            <th>Кімната</th>
            <th></th>
            <th></th>
          </tr>
          @foreach($livers as $liver)
            <tr>
              <td>
                <a href="{{ url('livers/show-liver') }}/{{ $liver->id }}">
                  {{ $liver->last_name }} {{ $liver->first_name }} {{ $liver->parent_name }}
                </a>
              </td>
              <td>{{ $liver->birth }}</td>
              <td>@if($liver->sex == 1) Ж @else Ч @endif</td>
              <td><input type="checkbox" @if($liver->student) checked @endif disabled style="cursor: text"/></td>

              <td>
                @if($liver->student)
                  {{ $liver->group->facult->short_name }}-{{ $liver->group->course }}{{ $liver->group->number }}</td>
                @else
                  -
                @endif
              <td>
                @if($liver->room)
                  {{ $liver->room->number }}
                @else
                  <a type="button" class="btn btn-xs btn-default" href="{{ url('livers/settle') }}/{{ $liver->id }}">Заселити</a>
                @endif</td>
              <td><a href="{{ url('liver/edit-liver') }}/{{ $liver->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
              <td><a href="{{ url('liver/delete-liver') }}/{{ $liver->id }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
@endsection