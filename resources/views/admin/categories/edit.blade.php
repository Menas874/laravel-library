@extends('admin.template.main')

@section('title', 'Editar Categoría')

@section('linkcss')

@section('linkjs')

@section('header', 'Editar Categoría')

@section('content')

  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">
                        {!! Form::open(['route' => ['admin.categories.update', $category->id], 'method' => 'PUT', 'class' =>'form-horizontal']) !!}
                          <div class="form-group">
                              {!! Form::label('name', 'Categoría', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoría', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group col-sm-3 control-label pull-right">
                              {!! Form::submit('Registrar', ['class' => 'btn btn-green form-control']) !!}
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
