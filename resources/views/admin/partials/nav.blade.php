<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <i class="fa fa-book logofa-book template-brand fa-2x" aria-hidden="true"></i>
        <a class="navbar-brand" href="{{ route('front.index') }}">Biblioteca Virtual v1.0</a>
    </div>
    <!-- /.navbar-header -->
    @if (Auth::user())
      <ul class="nav navbar-top-links navbar-right">
        @if (Auth::user()->admin())
        <li class="toggle-background">
          <a class="" data-toggle="" href="{{ route('admin.users.index') }}">
            <i class="fa fa-user fa-fw"></i>
            Usuarios
          </a>
        </li>
        <li class="">
          <a class="" data-toggle="" href="{{ route('admin.categories.index') }}">
            <i class="fa fa-bookmark fa-fw"></i>
            Categorías
          </a>
        </li>
        <li class="">
          <a class="" data-toggle="" href="{{ route('admin.tags.index') }}">
            <i class="fa fa-tags fa-fw"></i>
            Tags
          </a>
        </li>
        @endif
        <li class="">
          <a class="" data-toggle="" href="{{ route('admin.resources.index') }}">
            <i class="fa fa-book fa-fw"></i>
            Recursos
          </a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-caret-down"></i>
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="{{ route('admin.auth.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
            </li>
          </ul>
        </li>
        <!-- /.dropdown -->
      </ul>
    @endif
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
      @if (!Auth::user())
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

              @if (!Request::is('/') || isset($_GET['title']))
                <li class="sidebar-search">
                  {!! Form::model(Request::all(), ['route' => 'front.index', 'method' => 'GET', 'class' =>'']) !!}
                  <div class="input-group custom-search-form">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar...', 'required']) !!}
                    <span class="input-group-btn">
                      {!! Form::submit('Buscar', ['class' => 'btn btn-default form-control']) !!}
                    </span>
                  </div>
                  {!! Form::close() !!}
                </li>
              @endif

                <li>
                    <a href="{{ route('front.index') }}"><i class="fa fa-home fa-fw"></i> Inicio</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-folder-open fa-fw"></i> Categorías<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      @foreach ($categories as $category)
                        <li>
                          <a href="{{ route('front.search.category', $category->name) }}">
                            <span class="badge">{{ $category->resources->count() }}</span>
                            {{ $category->name }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-tags fa-fw"></i> Tags<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      @foreach ($tags as $tag)
                        <li>
                          <a href="{{ route('front.search.tag', $tag->name) }}">
                            <span class="badge">{{ $tag->resources->count() }}</span>
                            {{ $tag->name }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{ route('front.search.latest') }}"><i class="fa fa-clock-o fa-fw"></i> Reciente</a>
                </li>
                <li>
                    <a href="{{ route('front.view.us') }}"><i class="fa fa-users fa-fw"></i> Nosotros</a>
                </li>
                <li>
                    <a href="{{ route('front.view.help') }}"><i class="fa fa-question fa-fw"></i> Ayuda</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
      @else
        <div class="alert alert-danger }} alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          Debe salir del panel de administración para ver este contenido.
        </div>
      @endif
    </div>
    <!-- /.navbar-static-side -->
</nav>
