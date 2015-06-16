@extends('liver.master')

@section('content')
  <div class="panel panel-default" style="overflow: hidden;">
    <div class="panel-heading">Проживаючі</div>
    <div class="panel-body">
      <ul id="tabs" class="nav nav-tabs">
        <li role="presentation" class="active"><a class="0">Обовязкові дані</a></li>
        <li role="presentation"><a class="1">Адреса проживання</a></li>
        <li role="presentation"><a class="2">Паспортні дані</a></li>
        <li role="presentation"><a class="3">Контакти</a></li>
      </ul>
      <form class="show" onsubmit="return false;">
        <br/>
        <div class="t">
          <div class="photo">
            <img src="https://habrastorage.org/files/d4f/59f/6b9/d4f59f6b94e14c1ebd34581c2731fd08.jpg" alt=""/>
          </div>
          <div class="form-group col-md-8">
            <label for="last_name">Прізвище</label>
            <input type="text" class="form-control" id="last_name" value="{{ $liver->last_name }}" disabled>
          </div>
          <div class="form-group col-md-8">
            <label for="first_name">Ім’я</label>
            <input type="text" class="form-control" id="first_name" value="{{ $liver->first_name }}" disabled>
          </div>
          <div class="form-group col-md-8">
            <label for="parent_name">По батькові</label>
            <input type="text" class="form-control" id="parent_name" value="{{ $liver->parent_name }}" disabled>
          </div>
          <div class="form-group col-md-8">
            <label for="birth">Дата народження</label>
            <input type="date" class="form-control" id="birth" name="birth" value="{{ $liver->birth }}" disabled>
          </div>
          <div class="form-group col-md-5">
            <label for="sex">Стать</label>
            <div class="radio">
              <label>
                <input type="radio" name="sex" id="sex" disabled checked>
                @if($liver->sex) Чоловіча @else Жіноча @endif
              </label>
            </div>
          </div>
          <div class="form-group col-md-7" style="height: 97px;">
            <div class="checkbox">
              <label>
                <input type="checkbox" id="student" @if ($liver->student) checked @endif disabled>Студент
              </label>
            </div>
          </div>
          @if($liver->student)
          <div id="st">
            <div class="form-group col-md-6">
              <label for="facult">Факультет</label>
              <select class="form-control" name="facult" disabled>
                <option value="">{{ $liver->group->facult->name }}</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="group">Група</label>
              <select class="form-control" name="group" disabled>
                <option value="">{{ $liver->group->facult->short_name }}-{{ $liver->group->course }}{{ $liver->group->number }}</option>
              </select>
            </div>
          </div>
          @endif
        </div>
        <div class="t hidden">
          <div class="form-group col-md-6">
            <label for="country">Країна</label>
            <input type="text" class="form-control" name="country" value="{{ $liver->country }}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="canton">Область</label>
            <input type="text" class="form-control" name="canton" value="{{ $liver->canton }}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="city">Місто/Село</label>
            <input type="text" class="form-control" name="city" value="{{ $liver->city }}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="street">Вулиця</label>
            <input type="text" class="form-control" name="street" value="{{ $liver->street }}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="house">Будинок</label>
            <input type="text" class="form-control" name="house" value="{{ $liver->house }}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="apart">Квартира</label>
            <input type="text" class="form-control" name="apart" value="{{ $liver->apart }}" disabled>
          </div>
        </div>
        <div class="t hidden">
          <div class="form-group col-md-6">
            <label for="series">Серія</label>
            <input type="text" class="form-control" name="series" value="{{ $liver->series }}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="number">Номер</label>
            <input type="text" class="form-control" name="number" value="{{ $liver->number }}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="which">Ким виданий</label>
            <input type="text" class="form-control" name="which" value="{{ $liver->which }}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="when">Коли виданий</label>
            <input type="date" class="form-control" name="when" value="{{ $liver->when }}" disabled>
          </div>
        </div>
        <div class="t hidden">
          <div class="form-group col-md-6">
            <label for="tel1">Телефон №1</label>
            <input type="tel" class="form-control" name="tel1" value="{{ $liver->tel1 }}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="tel2">Телефон №2</label>
            <input type="tel" class="form-control" name="tel2" value="{{ $liver->tel2 }}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="tel3">Телефон №3</label>
            <input type="tel" class="form-control" name="tel3" value="{{ $liver->tel3 }}" disabled>
          </div>
        </div>
        <div class="form-group col-md-12">
          <a href="{{ url('/livers/settle') }}/{{ $liver->id }}" id="settle" class="btn btn-default">Переселити</a>
          <a href="{{ url('/livers/remove') }}/{{ $liver->id }}" id="remove" class="btn btn-default" style="color: #f66">Виселити</a>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('script')
  <script>
    var tabs = document.getElementById('tabs').getElementsByTagName('li');
    var divs = document.getElementsByClassName('t');
    for (var i=0;i<tabs.length;i++) {
      tabs[i].onclick = function (e) {
        for (var i=0;i<tabs.length;i++) {
          tabs[i].classList.remove('active');
          divs[i].classList.add('hidden');
        }
        var curr = parseInt(e.target.className);
        tabs[curr].classList.add('active');
        divs[curr].classList.remove('hidden');
      }
    }
    var form = document.forms[0];
    var b = document.getElementById('submit');
    b.onclick = function (e) {
      var currtab = document.getElementById('tabs').getElementsByClassName('active')[0];
      var next = parseInt(currtab.getElementsByTagName('a')[0].className)+1;
      tabs[next].onclick({target: tabs[next].getElementsByTagName('a')[0]});
    };

    var student = document.getElementById('student');
    var div = document.getElementById('st');
    student.onchange = function (e) {
      if (e.target.checked) {
        div.classList.remove('hidden');
      } else {
        div.classList.add('hidden');
      }
    };
    if (student.checked) {
      div.classList.remove('hidden');
    } else {
      div.classList.add('hidden');
    }

  </script>
@endsection

