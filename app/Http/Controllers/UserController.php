<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $role = Role::whereNot('name', "=", "SUPERADMIN")->get();

        $data = [
            'user'  => $user,
            'role'  => $role,
        ];

        return view('pages.admin.user', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'role_id'   => 'required',
            'email'     => 'required',
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data           = new User();
        $data->name     = $request->name;
        $data->role_id  = $request->role_id;
        $data->email    = $request->email;
        $data->password = Hash::make($request->password);
        $data           = $data->save();

        if ($data) {
            return redirect()->route('user')->with('success', 'Data Berhasil Ditambah');
        } else {
            return redirect()->route('user')->with('failed', 'Data Gagal Ditambah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data   = User::findOrFail($id);

        $data->name     = $request->name;
        $data->role_id  = $request->role_id;
        $data->email    = $request->email;
        $data->password = $request->password != '' ? Hash::make($request->password) : $data->password;
        $response = $data->save();

        if ($response) {
            return redirect()->route('user')->with('success', 'Data Berhasil Ditambah');
        } else {
            return redirect()->route('user')->with('failed', 'Data Tidak Ditambah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus.',
        ]);
    }
}
