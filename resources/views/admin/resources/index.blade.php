@extends('admin.template.main')

@section('title', 'Lista de recursos literarios')

@section('linkcss')

@section('linkjs')

@section('header', 'Lista de recursos literarios')

@section('content')

    <div class="form-group col-sm-12 control-label">
      <a href="{{ route('admin.resources.create') }}" class="btn btn-green form-control">
        <i class="fa fa-plus fa-fw"></i>
        Crear nuevo recurso literario
      </a>
    </div>
    {{-- Buscador tags --}}
    <div class="form-group col-sm-12">
      {!! Form::open(['route' => 'admin.resources.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
      <div class="input-group">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar recurso...', 'aria-decribedby' => 'search',  ]) !!}
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
                                  Titulo
                                </th>
                                <th>
                                  Cartegoría
                                </th>
                                <th>
                                  Usuario
                                </th>
                                <th>
                                  Acción
                                </th>
                              </thead>
                              <tbody>
                                @foreach ($resources as $resource)
                                  <tr>
                                    <td>{{ $resource->id }}</td>
                                    <td>{{ $resource->title }}</td>
                                    <td>{{ $resource->category->name }}</td>
                                    <td>{{ $resource->user->name }}</td>
                                    <td>
                                      <a href="{{ route('admin.resources.edit', $resource->id) }}" class="btn btn-warning">
                                        <i class="fa fa-pencil-square-o fa-fw"></i>
                                        Editar
                                      </a>
                                      <a href="{{ route('admin.resources.destroy', $resource->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este tag?')" class="btn btn-danger">
                                        <i class="fa fa-trash fa-fw"></i>
                                        Eliminar
                                      </a>
                                    </td>

                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <div class="text-center">
                              {!! $resources->render() !!}
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
