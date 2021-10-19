@extends('layouts.applogin')

@section('content')
<div class="modal-dialog text-center">
 <div class="col-sm-8 main-section">
  <div class="modal-content">


<div class=""> <br>
  <h6>MUNICIPALIDAD PROVINCIAL DE PUNO</h6>
  <img src = "{{asset('dist/img/puno.png')}}" width = "100px" height = "120px" />
</div>
<br>
    <form class="col-12" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
<!--  {!! $errors->first('email','<span class="help-block">:message</span>') !!}  -->
          @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" name="password" required>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
        </div>
      <button type="submit" class="btn btn-success">Ingresar</button>
      <br>

      <font size="1">
      <a href="facebook.com">Recuperar Contraseña</a>  

      </font>
      
    </form>
<br>
   </div>
 </div>
</div>

@endsection
