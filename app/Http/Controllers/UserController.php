<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Just Users Logged in
     *
     * @return void
     */
    public function __construct(){
        $this->middleware("authAdmin");
    }


    /**
     * show users list
     *
     * @return view
     */
    public function index(){
        return view('users.index');
    }

   


    /**
     * make an user admin
     *
     * 
     */
    public function makeAdmin($user_id){
        $user = User::find($user_id);
        $this->authorize('makeAdmin', $user); //Access Controll using policies
        $user->role_id = 1;
        if($user->save()){
            return response('Ok', 200);
        }else{
            return response('err', 500);
        }
    }
    
    /**
     * assignPermission view
     * 
     * @param user_id
     */

    public function assignPermissions($user_id){
    	$user = User::find($user_id);
    	$this->authorize('assignPermissions', $user); //Access Controll using policies

    	$permissions = Permission::all();
    	return view('users.assign_permissions', compact('user', 'permissions'));
    }

    /**
     * store permissions
     * 
     * @param user_id
     */

    public function storePermissions(Request $request, $user_id){
    	$user = User::find($user_id);
    	$this->authorize('assignPermissions', $user); //Access Controll using policies

    	if(isset($request->permissions)){
    		foreach ($request->permissions as $permission_id) {
    			$user->permissions()->attach($permission_id);
    		}
    		\Session::flash('message', 'Permisos asignados correctamente');
    		return redirect('/admin/users');
    	}else{
    		return redirect('/admin/');
    	}
    }

    public function removePermission($permission_id, $user_id){
        $permission = Permission::find($permission_id);

        $permission->users()->detach($user_id);

        return response('Ok', 200);
    }

    /**
     * show profile
     * 
     * @return view
     */
    public function profile(){
    	$user =  \Auth::user();
    	return view('profiles.index', compact('user'));
    }

    /**
     * show profile edit view
     * 
     * @return view
     */
    public function profileEdit(){
    	$user =  \Auth::user();
    	return view('profiles.edit', compact('user'));
    }

    /**
     * update profile
     * 
     */
    public function profileUpdate(Request $request){
    	$user =  \Auth::user();

    	$oldEmail = $user->email;
    	$oldDNI = $user->dni;

    	$validator = [
    		'names' => ['nullable', 'string', 'max:255'],
            'lastnames' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'date', 'max:255'],
            'number' => ['nullable', 'integer', 'max:100000000000'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
			'image' => 'mimetypes:image/jpeg,image/png,image/webp',
    	];

    	if($oldDNI != $request->dni){
    		$validator['dni'] = ['required', 'integer', 'max:100000000000', 'unique:users'];
    	}

    	if($oldEmail != $request->email){
    		$validator['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
    	}

    	$this->validate($request, $validator);

    	if(isset($request->names)){
    		$user->names = $request->names;
    	}

    	if(isset($request->lastnames)){
    		$user->lastnames = $request->lastnames;
    	}
    	if(isset($request->address)){
    		$user->address = $request->address;
    	}
    	if(isset($request->birthday)){
    		$user->birthday = $request->birthday;
    	}
    	if(isset($request->number)){
    		$user->number = $request->number;
    	}
    	if(isset($request->password)){
    		$user->password = Hash::make($request->password);
    	}
    	if(isset($request->dni) and $oldDNI !== $request->dni){ //if issed in the request and is different to the old values then we apply the change in bd
    		$user->dni = $request->dni;
    	}
    	if(isset($request->email) and $oldEmail !== $request->email){ //if issed in the request and is different to the old values then we apply the change in bd
    		$user->email = $request->email;
    	}

    	$hasFile = $request->hasFile('image') && $request->image->isValid();

    	if($user->save()){
    		if($hasFile){
				$image = Image::make($request->image)->encode('webp')->save(storage_path('app/images/user_'.$user->id.'.webp'));
				$image = Image::make($request->image)->encode('jpg')->save(storage_path('app/images/user_'.$user->id.'.jpg'));
			}
    		\Session::flash('message', 'Perfil Actualizado! NOTA: si se realizo cambio de imagen, se debe esperar hasta que se actualice en cache, lo cual puede tardar hasta varios días');
    		return redirect('admin/profiles');
    	}else{
    		\Session::flash('errorMessage', 'Algo salió mal!');
    		return redirect('admin/profiles');
    	}
    }

    /**
     * get all users
     *
     * @return Datables
     */
    public function getAll(){
        $users = User::with('role');
        return Datatables()->of($users)->toJson();
    }

    /**
     * get auth user id
     *
     * @return auth user id
     */
    public function getAuth(){
        return \Auth::id();
    }
}
