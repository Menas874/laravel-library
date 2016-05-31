@extends('admin.template.main')

@section('title', 'Lista de tags')

@section('linkcss')

@section('linkjs')

@section('header', 'Lista de tags')

@section('content')

  <div class="form-group col-sm-12 control-label">
    <a href="{{ route('admin.tags.create') }}" class="btn btn-green form-control">
      <i class="fa fa-plus fa-fw"></i>
      Crear nuevo tag
    </a>
  </div>
  {{-- Buscador tags --}}
  <div class="form-group col-sm-12">
    {!! Form::open(['route' => 'admin.tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
    <div class="input-group">
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar tag...', 'aria-decribedby' => 'search',  ]) !!}
      <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
    </div>
    {!! Form::close() !!}
  </div>

  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <th>
                                ID
                              </th>
                              <th>
                                Tag
                              </th>
                              <th>
                                Acción
                              </th>
                            </thead>
                            <tbody>
                              @foreach ($tags as $tag)
                                <tr>
                                  <td>{{ $tag->id }}</td>
                                  <td>{{ $tag->name }}</td>
                                  <td>
                                    <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning">
                                      <i class="fa fa-pencil-square-o fa-fw"></i>
                                      Editar
                                    </a>
                                    <a href="{{ route('admin.tags.destroy', $tag->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este tag?')" class="btn btn-danger">
                                      <i class="fa fa-trash fa-fw"></i>
                                      Eliminar
                                    </a>
                                  </td>

                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                            {!! $tags->render() !!}
                          </div>
                        </div>
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
