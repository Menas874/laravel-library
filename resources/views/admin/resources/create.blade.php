@extends('admin.template.main')

@section('title', 'Crear Recurso literario')

@section('linkcss')
  <link href="{!! asset('bower_components/chosen/chosen.css') !!}" rel="stylesheet">
  <link href="{!! asset('bower_components/trumbowyg/dist/ui/trumbowyg.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') !!}" rel="stylesheet">

@endsection

@section('linkjs')
  <script src="{!! asset('bower_components/chosen/chosen.jquery.js') !!}"></script>
  <script src="{!! asset('bower_components/trumbowyg/dist/trumbowyg.min.js') !!}"></script>
  <script src="{!! asset('bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') !!}"></script>

  <script>
  $( document ).ready(function() {
    $('.select-tag').chosen({
      placeholder_text_multiple: 'Seleccione un maximo de 3 tags.',
      max_slelected_options: 3,
      search_contains: true,
      no_results_text: 'No se encontraron resultados'
      });
    $('.select-category').chosen({
      no_results_text: 'No se encontraron resultados'
    });

    $('.textarea-content').trumbowyg();
  });

  </script>
@endsection

@section('header', 'Crear Recurso literario')

@section('content')

  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">
                        {!! Form::open(['route' => 'admin.resources.store', 'method' => 'POST', 'class' =>'form-horizontal', 'files' => true, ]) !!}
                          <div class="form-group">
                              {!! Form::label('title', 'Título', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titulo del recurso literario', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('author', 'Autor', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::text('author', null, ['class' => 'form-control', 'placeholder' => 'Autor del recurso', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('editorial', 'Editorial', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::text('editorial', null, ['class' => 'form-control', 'placeholder' => 'Editorial del recurso', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('category_id', 'Categoría', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::select('category_id', $categories, null, ['class' => 'form-control select-category', 'placeholder'=>'Seleccione una categoría', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('content', 'Descripción', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::textarea('content', null, ['class' => 'form-control textarea-content', 'placeholder' => 'Descripción', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('tags', 'Tags', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {{-- se usan corchetes para indicar que lo que queremos enviar es un array --}}
                                  {!! Form::select('tags[]', $tags, null, ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('book', 'Recurso literario', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {{-- {!! Form::file('book', ['class' => 'form-control', 'required']) !!} --}}
                                  <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                      <i class="fa fa-file-text fileinput-exists"></i>
                                      <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Selecciona un archivo</span>
                                    <span class="fileinput-exists">Cambiar</span>
                                    <input type="file" name="book"></span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                  </div>
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
