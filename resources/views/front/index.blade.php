@extends('admin.template.main')

@section('title', 'Index')

@section('linkcss')

@section('linkjs')

@section('header', '')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <br>
    </div>
  </div>

  @if (Request::is('/') && !isset($_GET['title']))
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="login-panel panel panel-default">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        {!! Form::open(['route' => 'front.index', 'method' => 'GET', 'class' =>'']) !!}
                        <div class="form-group">
                          {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar...', 'required']) !!}
                          <p class="help-block">Escriba el texto o recurso literario a buscar en este repositorio.</p>
                        </div>
                        <div class="form-group col-sm-3 control-label pull-right">
                          {!! Form::submit('Buscar', ['class' => 'btn btn-green form-control']) !!}
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    @endif

    @if (isset($_GET['title']) || !Request::is('/'))
        <div class="row">
          <div class="col-lg-12">
            <ul class="chat">
              @foreach ($resources as $resource)
              <a href="{{ route('front.view.resource', $resource->slug) }}" class="resources-resume">
                <li class="left clearfix">
                  <span class="chat-img pull-left circulo"></span>
                  <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font">{{ $resource->title }}</strong>
                        <small class="pull-right text-muted">
                          <i class="fa fa-calendar fa-fw"></i> {{ $resource->created_at->diffForHumans() }}
                        </small>
                        <br>
                        <small class="pull-right text-muted">
                            <i class="fa fa-bookmark fa-fw"></i> {{ $resource->category->name }}
                        </small>
                    </div>
                    <p>
                        {!! substr_replace($resource->content,"...",130) !!}
                    </p>
                  </div>
                </li>
              </a>
              @endforeach
            </ul>
            <div class="text-center">
              {!! $resources->appends(Request::all())->render() !!}
            </div>
          </div>
        </div>
    @endif

@endsection
