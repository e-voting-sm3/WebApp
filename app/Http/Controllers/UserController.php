<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataUser = User::get();

        return response()->json([
            'data' => $dataUser
        ]);
    }

    public function update(Request $request, $id)
    {
        $validateData = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];

        $dataUser = User::find($id);

        $dataUser->name = $request->name;
        $dataUser->email = $request->email;
        $dataUser->password = $request->password;
        $dataUser->save();

        return response()->json([
            'data' => $dataUser
        ]);
    }

    public function destroy($id)
    {
        $dataUser = User::find($id);
        $dataUser->delete();

        return response()->json([
            'message'=>'data berhasil dihapus'
        ]);
    }
}
