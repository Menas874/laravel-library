@extends('admin.template.main')

@section('title', 'Ingresar Usuario')

@section('linkcss')

@section('linkjs')

@section('header', 'Ingresar Usuario')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <br>
    </div>
  </div>
  
  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Introduce tu usuario</h3>
                  </div>
                  <div class="panel-body">
                    {!! Form::open(['route' => 'admin.auth.login', 'method' => 'POST']) !!}
                      <div class="form-group">
                        {!! Form::label('email', 'Correo Electronico') !!}
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com',  ]) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '************',  ]) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::submit('Acceder', ['class' => 'btn btn-lg btn-green btn-block']) !!}
                      </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
    </div>
  <!-- /.row -->
@endsection
