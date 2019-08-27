<?php

namespace App\Http\Controllers;
use App\Discipulo as DiscipuloModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\Test;
use Illuminate\Support\Facades\Crypt;

class DiscipuloController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
       return DiscipuloModel::all();
    }

    public function store(Request $request)
    {
       $discipulo = new DiscipuloModel();

       $name = $request->input('name');
       $email = $request->input('email');

       $discipulo->name = $name;
       $discipulo->email = $email;
       $discipulo->active = 0;
       $discipulo->activeCode = Crypt::encrypt(time());

       $discipulo->save();

       $mail = new Test();
       $mail->link = 'https://eusoucrisao.org/ativar/' . $discipulo->_id . '/' . $discipulo->activeCode;

       Mail::to($email)->send($mail);

       return $discipulo;
    }

    public function update($id, Request $request)
    {
       $discipulo = DiscipuloModel::find($id);

       $name = $request->input('name');
       $email = $request->input('email');

       $discipulo->name = $name;
       $discipulo->email = $email;
       $discipulo->save();

       return $discipulo;
    }

    public function show($id)
    {
       $discipulo = DiscipuloModel::find($id);

       return $discipulo;
    }

    public function delete($id)
    {
       $discipulo = DiscipuloModel::find($id);
       $discipulo->delete();

       return $discipulo;
    }

    public function active(Request $request)
    {
       $discipulo = new DiscipuloModel();
    }
}
