<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteApp;
use App\Mail\MainMails;
use App\Models\Agent;
use App\Models\AppNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AppController extends Controller
{
    public function index()
    {
        return view('appNote.appNote');
    }
    public function loginView()
    {
        return view('appNote.loginNote');
    }
    public function signupView(){
        return view('appNote.signup');
    }

    public function signupNote($request )
    {
        $parts = explode(" ", $request->ho_va_ten);
        if (count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        } else {
            $firstname = $request->ho_va_ten;
            $lastname = " ";
        }


        $data = $request->all();
        $data['Ucode']       =  rand(100000,999999);
        $data['ho_lot']     = $firstname;
        $data['ten']        = $lastname;
        $data['password']   = bcrypt($request->password);
        AppNote::create($data);

        // Gửi mail
        Mail::to($request->email)->send(new MainMails(
            $request->ho_va_ten,
            $data['Ucode'],
            'Kích Hoạt Tài Khoản NoteAPP'
        ));

        return response()->json(['status' => true]);
    }

    public function loginNote()
    {
    }


    public function create(NoteApp $request)
    {

        $note = $request->all();
        $diary = AppNote::create($note);

        return response()->json([
            'status'    => true,
            'nhatKi'   => $diary,
        ]);
    }
    public function noteData()
    {
        $note = AppNote::all();
        return response()->json([
            'noteData' => $note,
        ]);
    }
    public function deleteNote($id)
    {
        $note = AppNote::find($id);
        if ($note) {
            $note->delete();
            return response()->json([
                'status'    => true,
            ]);
        } else {
            return response()->json([
                'status'    => false,
            ]);
        }
    }


}
