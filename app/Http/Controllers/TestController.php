<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrCode;

class TestController extends Controller
{
    public function search()
    {
        // echo QrCode::size(300)->generate('RemoteStack');
    }
}
