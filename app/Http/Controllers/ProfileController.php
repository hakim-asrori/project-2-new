<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class ProfileController extends Controller
{
    public function getUser()
    {
        $user = User::where('email', Session::get('logged_in')['email'])->first();
        return $user;
    }

    public function index()
    {   
        $user = $this->getUser();
        return view('profile.index', compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function teleponUpdate(Request $request)
    {
        if ($this->getUser()) {
            $cek = User::where('email', $this->getUser()->email)->update([
                'telepon' => handphone($request->telepon)
            ]);

            if ($cek) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }

    public function destroy($id)
    {
        //
    }
}
