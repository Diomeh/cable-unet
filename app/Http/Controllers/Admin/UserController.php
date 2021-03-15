<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function index()
    {
        return view('admin.users.list', [
            'users' => DB::table('users')
                ->select('id', 'name', 'email', 'role')
                ->orderBy('id')
                ->get()
        ]);
    }

    public function create()
    {
        return view('admin.users.update');
    }

    public function create_post(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        if ($validator->fails())
            return back()->withErrors($validator);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($user->save())
            return redirect('/admin/users')
                ->with(
                    'users',
                    DB::table('users')
                        ->select('id', 'name', 'email', 'role')
                        ->orderBy('id')
                        ->get()
                )
                ->with('action_status', 'success')
                ->with('action_msg', 'User created');

        return back()->with('fail', 'There was an error creating the user, please try again');
    }

    public function update($id)
    {
        return view('admin.users.update', [
            'user' => DB::table('users')
                ->select(['id', 'name', 'email', 'role', 'password'])
                ->where('id', '=', $id)
                ->get()
                ->all()[0]
        ]);
    }

    public function update_post(Request $request, $id)
    {
        $u = User::find($id);
        $rules = [];

        $newpwd = empty($request->input('password'))
            ? null
            : Hash::make($request->input('password'));

        if ($request->input('name') != $u->name)
            $rules['name'] = ['required', 'string', 'max:255'];

        if ($request->input('email') != $u->email)
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];

        if ($newpwd && $newpwd != $u->password)
            $rules['password'] = ['required', 'string', 'min:8'];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return back()->withErrors($validator);

        $u->name = $request->input('name') != $u->name
            ? $request->input('name')
            : $u->name;
        $u->email = $request->input('email') != $u->email
            ? $request->input('email')
            : $u->email;
        $u->role = $request->input('role') != $u->role
            ? $request->input('role')
            : $u->role;
        $u->password = ($newpwd && $newpwd != $u->password)
            ? $newpwd
            : $u->password;

        if ($u->save())
            return redirect('/admin/users')
                ->with(
                    'users',
                    DB::table('users')
                        ->select('id', 'name', 'email', 'role')
                        ->orderBy('id')
                        ->get()
                )
                ->with('action_status', 'success')
                ->with('action_msg', 'User data updated');

        return back()->with('fail', 'There was an error updating user data, please try again');
    }

    public function delete($id)
    {
        $status = User::find($id)->delete();

        return redirect('/admin/users')
            ->with(
                'users',
                DB::table('users')
                    ->select('id', 'name', 'email', 'role')
                    ->orderBy('id')
                    ->get()
            )
            ->with('action_status', $status ? 'info' : 'danger')
            ->with('action_msg', $status ? 'User deleted' : 'There was an error deleting the user');
    }
}
