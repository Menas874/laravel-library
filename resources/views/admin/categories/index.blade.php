@extends('admin.template.main')

@section('title', 'Lista de categorías')

@section('linkcss')

@section('linkjs')

@section('header', 'Lista de categorías')

@section('content')

  <div class="form-group col-sm-12 control-label">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-green form-control">
      <i class="fa fa-plus fa-fw"></i>
      Crear nueva categoría
    </a>
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
                                Categoría
                              </th>
                              <th>
                                Acción
                              </th>
                            </thead>
                            <tbody>
                              @foreach ($categories as $category)
                                <tr>
                                  <td>{{ $category->id }}</td>
                                  <td>{{ $category->name }}</td>
                                  <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">
                                      <i class="fa fa-pencil-square-o fa-fw"></i>
                                      Editar
                                    </a>
                                    <a href="{{ route('admin.categories.destroy', $category->id) }}" onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')" class="btn btn-danger">
                                      <i class="fa fa-trash fa-fw"></i>
                                      Eliminar
                                    </a>
                                  </td>

                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                            {!! $categories->render() !!}
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
