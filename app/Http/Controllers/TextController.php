<?php

namespace App\Http\Controllers;

use App\Models\Storage;

//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TextController extends Controller
{

    // http://laravel.lc/telegraph
    public function index(Request $request)
    {


        $author = $request->get('author');
        $title = $request->get('title');
        $text = $request->get('text');

        $storage = new Storage();
        $storage->author = $author;
        $storage->title = $title;
        $storage->text = $text;

        $storage->update();
    }

    // http://laravel.lc/storages
    public function listPublication()
    {

        $storages = Storage::all();
        return view('telegraph', compact('storages'));
    }

    public function addPublication(Request $request)
    {

        // ИЗУЧИ $data = request()->validate([]);

        $author = $request->get('author');
        $title = $request->get('title');
        $text = $request->get('text');

        $storage = new Storage();
        $storage->author = $author;
        $storage->title = $title;
        $storage->text = $text;

        $storage->save();

        return redirect()->route('storage.listPublication');
    }

    public function updatePublication(Request $request, $id)
    {

        $author = $request->get('author');
        $title = $request->get('title');
        $text = $request->get('text');

        Storage::find($id)->update(['author' => $author, 'title' => $title, 'text' => $text]);

        return redirect()->route('storage.listPublication');
    }

    public function deletePublication($id)
    {

        Storage::where('id', '=', $id)->delete();
        return redirect()->route('storage.listPublication');
    }
}
