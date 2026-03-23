<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_curso',
        'description',
        'duration',
        'level',
        'conteudomodel',
        'image',
    ];

    protected $casts = [
        'items' => 'array'
    ];

    protected $guarded = [];

    protected static function booted() {
        static::deleting(function($curso) {
            $curso->users()->detach();
        });
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User', 'user_curso');
    }

    public function isFinalizado()
    {
        if (!auth()->check()) return false;

        $curso = auth()->user()
            ->cursosAsParticipant()
            ->where('curso_id', $this->id)
            ->first();

        return $curso && $curso->pivot->completed;
    }
}