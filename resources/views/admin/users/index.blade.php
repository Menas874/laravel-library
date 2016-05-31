@extends('admin.template.main')

@section('title', 'Lista de usuarios')

@section('linkcss')

@section('linkjs')

@section('header', 'Lista de usuarios')

@section('content')

  <div class="form-group col-sm-12 control-label">
    <a href="{{ route('admin.users.create') }}" class="btn btn-green form-control">
      <i class="fa fa-user-plus fa-fw"></i>
      Registrar nuevo usuario
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
                                Nombre
                              </th>
                              <th>
                                Correo
                              </th>
                              <th>
                                Tipo
                              </th>
                              <th>
                                Acción
                              </th>
                            </thead>
                            <tbody>
                              @foreach ($users as $user)
                                <tr>
                                  <td>{{ $user->id }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>
                                    @if ($user->type == 'admin')
                                      {{ 'Administrador' }}
                                    @else
                                      {{ 'Miembro' }}
                                    @endif
                                  </td>
                                  <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">
                                      <i class="fa fa-pencil-square-o fa-fw"></i>
                                      Editar
                                    </a>
                                    <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Seguro que deseas eliminar a este usuario?')" class="btn btn-danger">
                                      <i class="fa fa-trash fa-fw"></i>
                                      Eliminar
                                    </a>
                                  </td>

                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                            {!! $users->render() !!}
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
