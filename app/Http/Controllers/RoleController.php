<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RoleController extends Controller {
    //TODO DELETE ENTRUST MIGRATION !!!
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
        $roles = Role::all();
		return view('role.index')->with('roles', $roles);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('role.create');
	}

	/**
	*	Controller function for making view for assigning roles to users
	*
	* @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	*/
	public function assign()
	{
		$users = User::all();
		$roles = Role::all();
		$userRoleData = array('users'=>$users, 'roles'=>$roles);

		return view('role.assign', $userRoleData);
	}

    /**
     *    Saving the mapping for user to role assignment
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function saveUserRoleAssignment(Request $request)
	{
		$arrayUserRoleMapping = $request->get('userRoles');
		$users = User::all();
		$roles = Role::all();

		foreach ($users as $userkey => $user) {
			foreach ($roles as $roleKey => $role) {
				//If checkbox is clicked attach the role
				if(!empty($arrayUserRoleMapping[$userkey][$roleKey]))
				{
//					$user->attachRole($role);
					$user->assignRole($role);
				}
				//If checkbox is NOT clicked detatch the role
				elseif (empty($arrayUserRoleMapping[$userkey][$roleKey])) {
//					$user->detachRole($role);
                    $user->removeRole($role);

                }
			}
		}

		$url = Session::get('SOURCE_URL');
		return redirect($url)->with('message', trans('messages.success-updating-role'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function store(Request $request)
	{
//		$rules = array('name' => 'required|unique:roles|min:3', 'description' => 'max:200');
		$rules = array('name' => 'required|min:3', 'description' => 'max:200');
		$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			return redirect()->route('role.create')->withInput()->withErrors($validator);
		}
		else
		{
//
////			$role = new Role;
////			$role->name = $request->get('name');
////			$role->guard_name = 'web';
////			$role->description = $request->get('description'); //TODO Add description column in spatie_roles table

			try
			{
                Role::findOrCreate($request->get('name'));
//				$role->save();
				$url = Session::get('SOURCE_URL');
				return redirect($url)->with('message', trans('messages.success-adding-role'));
			}
			catch (QueryException $e)
			{
				Log::error($e);
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//No need for showing
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$role = Role::find($id);
		return view('role.edit')->with('role', $role);
	}


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Request $request, $id)
	{
		$rules = array('name' => "required|unique:roles,name,$id|min:3", 'description' => 'max:200');
		$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			return redirect()->route('role.edit', array($id))->withInput()->withErrors($validator);
		}
		else
		{
			$role = Role::find($id);
			$role->name = $request->get('name');
			$role->description = $request->get('description');

			try
			{
				$role->save();
				$url = Session::get('SOURCE_URL');
				return redirect($url)->with('message', trans('messages.success-updating-role'))
							->with('activerole', $role ->id);
			}
			catch (QueryException $e)
			{
				Log::error($e);
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete($id)
	{
		//Soft delete the role
        $role = Role::find($id);
        $role->delete();
        // redirect

        $url = Session::get('SOURCE_URL');

		return redirect($url)->with('message', trans('messages.success-deleting-role'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
