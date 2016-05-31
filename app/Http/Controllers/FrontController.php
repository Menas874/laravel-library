<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Resource;
use App\Category;
use Carbon\Carbon;

class FrontController extends Controller
{

  public function __construct()
  {
    Carbon::setLocale('es');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $resources = Resource::filterAndPaginate($request->title);
      $resources->each(function($resources)
      {
          $resources->category;
      });

      if (count($resources) === 0) {
        $message = 'La busqueda "' . $request->title . '" no generó resultados. Intente con otra combinación de palabras.';
        $class = 'info';

        Session::flash('message', $message);
        Session::flash('class', $class);

        return redirect()->back();

      } else {

        return view('front.index')
        ->with('resources', $resources);
      }


    }

    /**
     * Muestra todos los recursos en una categoria.
     *
     */
    public function searchCategory($name)
    {
        $category = Category::searchCategory($name)->first();
        $resources = $category->resources()->paginate(10);
        $resources->each(function($resources)
        {
            $resources->category;
        });

        if (count($resources) === 0) {
          $message = 'La busqueda en la categoría "' . $name . '" no generó resultados.';
          $class = 'info';

          Session::flash('message', $message);
          Session::flash('class', $class);

          return redirect()->back();

        } else {

          return view('front.index')
          ->with('resources', $resources);

        }
    }

    /**
     * Muestra todos los recursos en un tag.
     *
     */
    public function searchTag($name)
    {
        $tag = Tag::searchTag($name)->first();
        $resources = $tag->resources()->paginate(10);
        $resources->each(function($resources)
        {
            $resources->category;
        });

        if (count($resources) === 0) {
          $message = 'La busqueda en el tag "' . $name . '" no generó resultados.';
          $class = 'info';

          Session::flash('message', $message);
          Session::flash('class', $class);

          return redirect()->back();

        } else {

          return view('front.index')
          ->with('resources', $resources);

        }

    }

    /**
     * Muestra el contenido de el recurso.
     *
     */
    public function viewResource($slug)
    {
        if ($resource = Resource::findBySlug($slug)) {
          // No se utiliza el metodo each() por que se trata de un solo recurso, no es necesario hacer un recorrido.
          $resource->category;
          $resource->tags;
          $resource->book;

          $ay_tags = $resource->tags;

          $actual_link = 'http://'.$_SERVER['HTTP_HOST'].'/resources/'.$slug;

          return view('front.resource')
          ->with('resource', $resource)
          ->with('ay_tags', $ay_tags)
          ->with('actual_link', $actual_link);
        }
        else {
          abort(404);
        }
    }

    /**
     * Descarga los archivos.
     *
     */

    public function downloadResource($src)
    {
        $path = public_path() . '/resources/'. $src;

        return response()->download($path);

    }

    /**
     * Descarga los archivos.
     *
     */

    public function searchLatest()
    {
      $resources = Resource::orderBy('id','DESC')->paginate(10);
      $resources->each(function($resources)
      {
          $resources->category;
      });

      return view('front.index')
        ->with('resources', $resources);
    }
    //
    //En esta funcion debes describir que y como quieres que se muestre este contedido.
    //
    public function viewUs()
    {
      abort(404);
    }
    //
    //En esta funcion debes describir que y como quieres que se muestre este contedido.
    //
    public function viewHelp()
    {
      abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
