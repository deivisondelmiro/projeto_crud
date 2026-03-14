<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;
use App\Models\User;

class CursoController extends Controller
{
   public function index() {

      $search = request('search');

      if($search) {
         $cursos = Curso::where([
            ['title_curso', 'like', '%'.$search.'%']
         ])->get();
      } else {
         $cursos = Curso::all();
      }
      
      return view('welcome', ['cursos' => $cursos, 'search' => $search]);
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
      $curso->items = $request->items;

      // Image Upload

      if($request->hasFile('image') && $request->file('image')->isValid()) {
         $requestImage = $request->image;

         $extension = $requestImage->extension();

         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

         $requestImage->move(public_path('img/cursos'), $imageName);

         $curso->image = $imageName;
      }

      $user = auth()->user();
      $curso->user_id = $user->id;

      $curso->save();

      return redirect('/')->with('msg', 'Curso criado com sucesso!');
   }

   public function show($id) {
      $curso = Curso::findOrFail($id);

      $cursoOwner = User::where('id', $curso->user_id)->first()->toArray();

      return view('cursos.show', ['curso' => $curso]);
   }
}