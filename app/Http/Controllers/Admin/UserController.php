<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

    public function index()
    {
        $users = User::all();
        return view('admin.stuff.user.index', compact('users'));
    }

    public function create()
    {
        $roles = DB::table('roles')->lists('name', 'id');
        return view('admin.stuff.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])]);

        $user->syncRoles([$request['role_id']]);

        return redirect(route('admin.stuff.users.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações cadastradas com sucesso!'
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = DB::table('roles')->lists('name', 'id');

        return view('admin.stuff.user.edit', compact('user', 'roles'));

    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->syncRoles([$request['role_id']]);
        return redirect(route('admin.stuff.users.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações atualizadas com sucesso!'
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('admin.stuff.users.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
    }

}
