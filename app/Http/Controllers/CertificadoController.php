<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificadoController extends Controller
{
    public function gerar($id)
    {
        $curso = Curso::findOrFail($id);
        $usuario = User::findOrFail(auth()->id());

        $pdf = Pdf::loadView('certificados.pdf', [
            'curso' => $curso,
            'usuario' => $usuario,
        ]);

        return $pdf->stream('certificado.pdf');
    }
}