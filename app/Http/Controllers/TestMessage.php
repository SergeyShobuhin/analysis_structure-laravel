<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestMessage extends Controller
{
    /**
     * @return int $iterations
     */
    public function showMessage($iterations)
    {
        for ($i = 0; $i < $iterations; $i++) {
            echo 'habahaba' . PHP_EOL;
        }
    }
}
