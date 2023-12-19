<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = User::where('role', '!=', 'superAdmin')->paginate(5);

        return view('admin.akun.index', compact('akun'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'email' => 'required',

        ]);

            User::create([
                'email' => $request->email,
                'username' => $request->username,
                'role' => $request->role,
                'password' => Hash::make($request->password),

            ]);
        return redirect()->route('akun.index')->with('success', 'Berhasil Menyimpan Data!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $akun)
    {
        return view('admin.akun.edit', compact('akun'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $akun)
    {
        $rules = ([
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $validate = $request->validate($rules);

        $validate['password'] = bcrypt($request['password']);

        $akun->update($validate);

        return redirect()->route('admin.akun.index')->with('success', 'Berhasil Mengubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $akun)
    {
        $akun->delete();
        return redirect()->route('akun.index')->with('success', 'Berhasil Menghapus Data!');
    }

    public function deleteCheckedAkun(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id', $ids)->delete();
        return response()->json(['success' => "Delete Success!"]);
    }
}