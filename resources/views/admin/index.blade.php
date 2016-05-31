@extends('admin.template.main')

@section('title', 'Index')

@section('linkcss')

@section('linkjs')

@section('header', 'Index')

@section('content')

  <div class="form-group col-sm-12 control-label pull-right">
    <a href="{{ route('admin.resources.create') }}" class="btn btn-green form-control">
      <i class="fa fa-plus fa-fw"></i>
      Crear nuevo recurso literario
    </a>
  </div>
  @if (Auth::user()->admin())
  <div class="form-group col-sm-12 control-label pull-right">
    <a href="{{ route('admin.users.create') }}" class="btn btn-green form-control">
      <i class="fa fa-user-plus fa-fw"></i>
      Registrar nuevo usuario
    </a>
  </div>

  <div class="form-group col-sm-12 control-label pull-right">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-green form-control">
      <i class="fa fa-plus fa-fw"></i>
      Crear nueva categoría
    </a>
  </div>

  <div class="form-group col-sm-12 control-label pull-right">
    <a href="{{ route('admin.tags.create') }}" class="btn btn-green form-control">
      <i class="fa fa-plus fa-fw"></i>
      Crear nuevo tag
    </a>
  </div>
  @endif

@endsection
