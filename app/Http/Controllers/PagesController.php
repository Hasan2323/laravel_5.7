<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
// 4 different way to send data to the view and another one is compact()
    public function home()
    {
        return view('hello')->with([
            'tasks' => [

                'Come back home soon',
                'Ele bele'
            ],
            'foo' => 'Daanguli'
        ]);
    }

    public function contact()
    {
        $tasks = [

            'Come back home soon',
            'In Contact page'
        ];
        return view('pages.contact')->withTasks($tasks)->withTitle('Daanguli');
    }

    public function about()
    {
        return view('pages.about', [
            'tasks' => [

                'Come back home soon',
                'in About page'
            ]
        ]);
    }

    public function culture()
    {
        $tasks = [

            'Come back home soon',
            'In Culture page'
        ];
        return view('pages.contact', [ //eta and Compact() er use beshi
            'tasks' => $tasks,
            'title' => 'Culture'
        ]);
    }
}
