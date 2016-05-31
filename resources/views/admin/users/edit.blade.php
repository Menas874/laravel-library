@extends('admin.template.main')

@section('title', 'Editar Usuario')

@section('linkcss')

@section('linkjs')

@section('header', 'Editar Usuario: ' . $user->name)

@section('content')

  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">
                        {!! Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT', 'class' =>'form-horizontal']) !!}
                          <div class="form-group">
                              {!! Form::label('name', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('email', 'Correo electronico', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('password', 'Contraseña', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '*************']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('type', 'Tipo', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], $user->type, ['class' => 'form-control', 'placeholder' => 'Tipo de usuario', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group col-sm-3 control-label pull-right">
                              {!! Form::submit('Editar', ['class' => 'btn btn-green form-control']) !!}
                          </div>
                        {!! Form::close() !!}
                      </div>
                      <!-- /.col-lg-12 (nested) -->
                  </div>
                  <!-- /.row (nested) -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->


@endsection
