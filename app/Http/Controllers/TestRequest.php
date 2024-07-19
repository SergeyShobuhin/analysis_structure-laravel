<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestRequest extends Controller
{
    protected $testArray = [1, 8, 5, 11, 9, 3, 45, 4, 7];

    public function testGet(Request $request)
    {
        $itemNumber = $request->get('items');
        for ($i = 0; $i < $itemNumber; $i++) {
            echo $this->testArray[$i] . '<br>';
        }
    }

    public function testPost(Request $request)
    {
        $newItem = $request->get('item');
        $this->testArray[] = $newItem;

        print_r($this->testArray);
    }
}
