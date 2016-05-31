@extends('admin.template.main')

@section('title', $resource->title)

@section('linkcss')

@section('linkjs')
  <script id="dsq-count-scr" src="//virtuallibraryv111.disqus.com/count.js" async></script>
@endsection

@section('header', '')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <br>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="list-group">
        <a href="" class="list-group-item active btn-green">
          <h3 class="list-group-item-heading">{{ $resource->title }}</h3>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('front.search.category', $resource->category->name) }}" class="resources-resume"><i class="fa fa-folder-open-o"></i>  {{ $resource->category->name }}</a></li>
        <li class="list-group-item"><a href="{{ route('front.search.latest') }}" class="resources-resume"><i class="fa fa-calendar"></i>  {{ $resource->created_at->diffForHumans() }}</a></li>
        <li class="list-group-item"><i class="fa fa-comments"></i> <a href="{{ $actual_link . '#disqus_thread' }}" class="resources-resume">Te invitamos comentar</a></li>

      </ul>
    </div>
    <div class="col-lg-6">
      <ul class="list-group">
        @if ($resource->tags)
          @foreach ($ay_tags as $ay_tag)
            <li class="list-group-item"><a href="{{ route('front.search.tag', $ay_tag->name) }}" class="resources-resume"><i class="fa fa-tag"></i> {{ $ay_tag->name }}</a></li>
          @endforeach
        @endif
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          {!! $resource->content !!}
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <button class="btn btn-green" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Mostrar link de descarga
          </button>
          <div class="collapse" id="collapseExample">
              <a href="{{ route('front.download.resource', $resource->book->name) }}">
                <div class="well">
                <i class="fa fa-file"></i> Click para descargar
              </div>
              </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div id="disqus_thread"></div>
            <script>
            /**
            * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
            */
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');

            s.src = '//virtuallibraryv111.disqus.com/embed.js';

            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
        </div>
      </div>
    </div>
  </div>

@endsection
