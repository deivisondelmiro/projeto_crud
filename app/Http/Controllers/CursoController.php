<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;

class CursoController extends Controller
{
   public function index() {
      $cursos = Curso::all();

      return view('welcome', ['cursos' => $cursos]);
   }

   public function create() {
      return view('cursos.create');
   }

   public function store(Request $request) {
      $curso = new Curso;

      $curso->title_curso = $request->title_curso;
      $curso->description = $request->description;
      $curso->duration = $request->duration;
      $curso->level = $request->level;

      // Image Upload

      if($request->hasFile('image') && $request->file('image')->isValid()) {
         $requestImage = $request->image;

         $extension = $requestImage->extension();

         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

         $requestImage->move(public_path('img/cursos'), $imageName);

         $curso->image = $imageName;
      }

      $curso->save();

      return redirect('/')->with('msg', 'Curso criado com sucesso!');
   }

   public function show($id) {
      $curso = Curso::findOrFail($id);

      return view('cursos.show', ['curso' => $curso]);
   }
}