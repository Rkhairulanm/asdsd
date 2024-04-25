<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        $user = User::paginate(10);
        $title = 'Kelola User';
        return view('layouts.user-kelola', compact('user', 'title'));
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        if ($user) {
            Session::flash('status', 'success');
            Session::flash('message', 'User berhasil dihapus.');
        }
        return redirect('/user-kelola');
    }
    public function edit($id){
        $user = User::findOrFail($id);
        $title = 'Kelola User';
        return view('layouts.user-edit', compact('user', 'title'));
    }
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->password = $request->password;
        $user->update();
        return redirect('/user-kelola');
    }
    //
}
