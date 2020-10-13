<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('authAdmin');
    }

    /**
     * Show the view index permissions.
     *
     * @return view
     */
    public function index()
    {
        return view('permissions.index');
    }

    /**
     * Show the Create permissions view.
     *
     * @return view
     */
    public function create()
    {
        $this->authorize('create', Permission::class);

        $permission = new Permission;
        return view('permissions.create', compact('permission'));
    }

    /**
     * Show the edit permissions .
     *
     * @return view
     */
    public function edit($id)
    {
        $this->authorize('update', Permission::class);

        $permission = Permission::find($id);
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Store a new Permission.
     *
     * 
     */
    public function store(Request $request)
    {
        $this->authorize('create', Permission::class);

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ]);
        $permission = new Permission($request->all());
        if($permission->save()){
            \Session::flash('message', 'Permiso Creado');
            return redirect('/admin/permissions');
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/admin/permissions');
        }
    }

    /**
     * Store a new Permission.
     *
     * 
     */
    public function update(Request $request, $id)
    {
        $this->authorize('create',  Permission::class);

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ]);

        $permission = Permission::find($id);


        if($permission->update($request->all())){
            \Session::flash('message', 'Permiso Actualizado');
            return redirect('/admin/permissions');
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/admin/permissions');
        }
    }

    /**
     * Delete a permissions.
     *
     * 
     */
    public function destroy($id)
    {
        $this->authorize('delete', Permission::class);

        $permission = Permission::find($id);
        if($permission->delete()){
            return response('OK', 200);
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/admin/permissions');
        }
    }


    /**
     * Get the permissions.
     *
     * @return all permissions
     */
    public function getPermissions()
    {
        return Datatables()->of(\DB::table('permissions'))->toJson();
    }
}
