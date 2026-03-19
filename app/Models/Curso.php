<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_curso',
        'description',
        'duration',
        'level',
        'conteudomodel'
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
}