<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Http\Requests\StoreLibro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $libros = Libro::all();
            return jsend_success($libros);

        } catch (\Exception $error) {
            return jsend_error($error);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create() ¡NO LO REQUIERO PARA ESTE PROYECTO!
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibro $request)
    {
        try {
            $libro = Libro::create($request->all());
            return jsend_success($libro, status:201);
            // $libro = new Libro();
            // $libro->name = $request->name;
            // $libro->file = $request->file;
            // $libro->save();
        } catch (\Exception $error) {
            return jsend_error($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id) ¡NO LO REQUIERO PARA ESTE PROYECTO!
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id) ¡NO LO REQUIERO PARA ESTE PROYECTO!
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(Request $request)
    {
        try {
            $libro = Libro::findOrFail($request->id);
            $libro->name = $request->name;
            $libro->file = $request->file;
            $libro->save();
            return jsend_success($libro);

        } catch (\Exception $error) {
            return jsend_error($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Request $request)
    {
        try {
            $libro = Libro::destroy($request->id);
            return jsend_success($libro);
        } catch (\Exception $error) {
            return jsend_error($error);
        }
    }
}
