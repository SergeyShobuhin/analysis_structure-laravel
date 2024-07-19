<?php

namespace App\Http\Controllers;

//use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArrayTest extends Controller
{
    //
    protected $testArray = ['yellow', 'red', 'blue', 'green'];

    public function showColor(Request $request)
    {
        $colorNumber = $request->get('color');

        $view = view('show-color')->with(['color' => $colorNumber, 'colorsArray' => $this->testArray]);
        return new Response($view);

    }
}
