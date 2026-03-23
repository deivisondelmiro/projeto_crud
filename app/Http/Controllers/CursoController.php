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
      $curso->conteudomodel = $request->conteudomodel;

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

      $user = auth()->user();
      $hasUserJoined = false;

      if($user) {
         $userCursos = $user->cursosAsParticipant->toArray();

         foreach($userCursos as $userCurso) {
            if($userCurso['id'] == $id) {
               $hasUserJoined = true;
            }
         }
      }

      // $cursoOwner = User::where('id', $curso->user_id)->first()->toArray();

      return view('cursos.show', ['curso' => $curso, 'hasUserJoined' => $hasUserJoined]);
   }

   public function dashboard() {
      $user = auth()->user();

      $cursos = $user->cursos;

      $cursosAsParticipant = $user->cursosAsParticipant;

      return view('cursos.dashboard', ['cursos' => $cursos, 'cursosAsParticipant' => $cursosAsParticipant]);
   }

   public function destroy($id) {
      Curso::findOrFail($id)->delete();

      return redirect('/dashboard')->with('msg', 'Curso excluído com sucesso!');
   }

   public function edit($id) {
      $user = auth()->user();

      $curso = Curso::findOrFail($id);

      if($user->id != $curso->user_id) {
         return redirect('/dashboard');
      }

      return view('cursos.edit', ['curso' => $curso]);
   }

public function update(Request $request)
{
    $data = $request->all();
    
    // Processa a imagem APENAS se for enviada
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Deleta a imagem antiga
        $curso = Curso::findOrFail($request->id);
        if ($curso->image && file_exists(public_path('img/cursos/' . $curso->image))) {
            unlink(public_path('img/cursos/' . $curso->image));
        }
        
        // Salva a nova imagem
        $requestImage = $request->image;
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('img/cursos'), $imageName);
        $data['image'] = $imageName;
    } else {
        // REMOVE o campo image do array para não substituir no banco
        unset($data['image']);
    }
    
    Curso::findOrFail($request->id)->update($data);
    
    return redirect('/dashboard')->with('msg', 'Curso editado com sucesso!');
}

   public function joinCurso($id) {
      $user = auth()->user();

      $user->cursosAsParticipant()->attach($id);

      $curso = Curso::findOrFail($id);

      return redirect('/dashboard')->with('msg', 'Sua inscrição no curso ' . $curso->title_curso . ' foi realizada com sucesso!');
   }

   public function leaveCurso($id) {
      $user = auth()->user();

      $user->cursosAsParticipant()->detach($id);

      $curso = Curso::findOrFail($id);

      return redirect('/dashboard')->with('msg', 'Você acabou de cancelar sua matrícula do curso: ' .$curso->title_curso);
   }

   public function finalizar($id) {
    $user = auth()->user();

    $user->cursosAsParticipant()->updateExistingPivot($id, [
        'completed' => true
    ]);

      return redirect()->back()->with('msg', 'Parabéns por concluir o curso!');
   }
}