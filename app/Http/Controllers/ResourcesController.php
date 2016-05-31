<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResourcesRequest;
use Illuminate\Support\Facades\Session;
use App\Book;
use App\Tag;
use App\Category;
use App\Resource;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $resources = Resource::Search($request->title)->orderBy('id', 'DESC')->paginate(10);
      $resources->each(function($resources)
      {
          $resources->category;
          $resources->user;
      });

      return view('admin.resources.index')
        ->with('resources',$resources);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->lists('name', 'id');
        $tags= Tag::orderBy('name', 'ASC')->lists('name', 'id');

        return view('admin.resources.create')
          ->with('categories', $categories)
          ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourcesRequest $request)
    {
        // Validacion del archivo si existe mas no el tipoy falta el else
        if ($request->file('book'))
        {
          $file = $request->file('book');
          $name = 'biblioteca_virtual_' . time() . '.' . $file->getClientOriginalExtension();
          $path = public_path() . '/resources/';
          $file->move($path, $name);
        }
        // Creacion del recurso
        $resource = new Resource($request->all());
        $resource->user_id = \Auth::user()->id;
        $resource->save();
        // Creacion de los tags
        $resource->tags()->sync($request->tags);
        // Manipulacion del archivo
        $book = new Book();
        $book->name = $name;
        $book->resource()->associate($resource);
        $book->save();
        // Entrega a la vista
        $message = 'El recurso literario ' . $resource->title . ' ha sido registrado.';
        $class = 'success';

        Session::flash('message', $message);
        Session::flash('class', $class);

        return redirect()->route('admin.resources.index');
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
      $resource = Resource::find($id);
      $resource->category;
      $ay_tags = $resource->tags->lists('id')->ToArray();

      $categories = Category::orderBy('name', 'DESC')->lists('name', 'id');
      $tags = Tag::orderBy('name', 'DESC')->lists('name', 'id');

        return view('admin.resources.edit')
          ->with('categories', $categories)
          ->with('resource', $resource)
          ->with('tags', $tags)
          ->with('ay_tags', $ay_tags);


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
      $resource = Resource::find($id);
      $resource->fill($request->all());
      $resource->save();

      $resource->tags()->sync($request->tags);

      $message = 'El recurso literario "' . $resource->title . '" fue modificado.';
      $class = 'warning';

      Session::flash('message', $message);
      Session::flash('class', $class);

      return redirect()->route('admin.resources.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Resource::find($id);

        if ($fileName = $resource->book->name) {
          $file = public_path() . '/resources/' . $fileName;
          unlink($file);
        }

        $resource->delete();

        $message = 'El recurso literario "' . $resource->title . '" ha sido eliminado.';
        $class = 'danger';

        Session::flash('message', $message);
        Session::flash('class', $class);

        return redirect()->route('admin.resources.index');
    }
}
