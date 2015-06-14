@extends('liver.master')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Проживаючі</div>
    <div class="panel-body">
      <ul id="tabs" class="nav nav-tabs">
        <li role="presentation" class="active"><a class="0">Обовязкові дані</a></li>
        <li role="presentation" class="disabled"><a class="1">Адреса проживання</a></li>
        <li role="presentation" class="disabled"><a class="2">Паспортні дані</a></li>
        <li role="presentation" class="disabled"><a class="3">Контакти</a></li>
      </ul>
      <form method="POST" action="{{ url('/livers/create-liver') }}" onsubmit="return false;">
        <br/>
        <div class="t">
          <div class="photo">
            <img src="https://habrastorage.org/files/d4f/59f/6b9/d4f59f6b94e14c1ebd34581c2731fd08.jpg" alt=""/>
          </div>
          <div class="form-group col-md-8">
            <label for="last_name">Прізвище</label>
            <input type="text" class="form-control" id="last_name">
          </div>
          <div class="form-group col-md-8">
            <label for="first_name">Ім’я</label>
            <input type="text" class="form-control" id="first_name">
          </div>
          <div class="form-group col-md-8">
            <label for="parent_name">По батькові</label>
            <input type="text" class="form-control" id="parent_name">
          </div>
          <div class="form-group col-md-4">
            <label for="sex">Стать</label>
            <div class="radio">
              <label>
                <input type="radio" name="sex" id="sex" value="m">
                Чоловіча
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="sex" id="sex" value="w">
                Жіноча
              </label>
            </div>
          </div>
          <div class="form-group col-md-6">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="student" id="student">Студент
              </label>
            </div>
          </div>
          <div id="st" class="hidden">
            <div class="form-group col-md-12">
              <label for="facult">Факультет</label>
              <select class="form-control" name="facult">
                @foreach($faculties as $facult)
                  <option value="{{ $facult->id }}">{{ $facult->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="group">Група</label>
              <select class="form-control" name="group">
                @foreach($groups as $group)
                  <option value="{{ $group->id }}">{{ $group->facult->short_name }}-{{ $group->course }}{{ $group->number }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-group col-md-12">
          <button id="submit" class="btn btn-default">Далі</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('script')
  <script>
    var form = document.forms[0];
    var b = document.getElementById('submit');
    b.onclick = function (e) {
      var that = this;
      if (this.innerHTML === 'Заселити') {
        form.onsubmit = null;
        form.submit();
      }
      var tabs = document.getElementById('tabs').getElementsByTagName('li');
      var divs = document.getElementsByClassName('t');
      var currtab = document.getElementById('tabs').getElementsByClassName('active')[0];
      var curr = parseInt(currtab.getElementsByTagName('a')[0].className);
      divs[curr].classList.add('hidden');
      currtab.onclick = function (e) {
        var curr = parseInt(e.target.className);
        for (var i=0;i<tabs.length;i++) {
          if (i == curr) {
            tabs[i].classList.add('active');
          } else {
            tabs[i].classList.remove('active');
          }
        }
        for (i=0;i<divs.length;i++) {
          if (i == curr) {
            divs[i].classList.remove('hidden');
          } else {
            divs[i].classList.add('hidden');
          }
        }
        if (curr == tabs.length-1) {
          that.innerHTML = 'Заселити';
        } else {
          that.innerHTML = 'Далі';
        }
      };
      currtab.classList.remove('active');
      var next = curr+1;
      divs[next].classList.remove('hidden');
      var nexttab = tabs[next];
      nexttab.onclick = currtab.onclick;
      nexttab.classList.remove('disabled');
      nexttab.classList.add('active');
      if (next == tabs.length-1) {
        this.innerHTML = 'Заселити';
      } else {
        this.innerHTML = 'Далі';
      }
    };
    var s = document.getElementById('student');
    var st = document.getElementById('st');
    s.onchange = function (e) {
      if (e.target.checked) {
        st.classList.remove('hidden');
      } else {
        st.classList.add('hidden');
      }
    }
  </script>
@endsection

