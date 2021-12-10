<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function search()
    {
        return response()->json($_GET['term']);
    }
}
