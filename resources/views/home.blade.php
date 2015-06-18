@extends('app')

@section('nav')
  <div class="navbar-header">
    <a class="navbar-brand" href="{{ url('/') }}">{{ Auth::user()->hostel->name  }}</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="{{ url('/livers') }}">Проживаючі</a></li>
      <li><a href="{{ url('/rooms') }}">Кімнати</a></li>
      <li><a href="{{ url('/violations') }}">Порушення</a></li>
      <li><a href="{{ url('/payments') }}">Розрахунки</a></li>
      <li><a href="{{ url('/reports') }}">Звіти</a></li>
      @if(Auth::user()->name == 'admin')
      <li><a href="{{ url('/settings') }}">Налаштування</a></li>
      @endif
    </ul>
    <ul class="nav navbar-nav navbar-right">
      @if (Auth::guest())
        <li><a href="{{ url('/auth/login') }}">Війти</a></li>
      @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/auth/logout') }}">Вийти</a></li>
          </ul>
        </li>
      @endif
    </ul>
  </div>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Останні заселенні</div>
				<div class="panel-body"></div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Останні порушення</div>
        <div class="panel-body"></div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Home</div>
        <div class="panel-body">

        </div>
      </div>
		</div>
	</div>
</div>
@endsection
