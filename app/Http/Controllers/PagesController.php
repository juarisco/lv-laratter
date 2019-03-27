<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $links = [
            'https://juarisco.dev/laravel' => 'Curso de Laravel',
            'https://laravel.com' => 'Página de Laravel',
        ];

        return view('welcome', [
            // 'teacher' => 'Mr. Juarisco',
            'links' => $links
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
