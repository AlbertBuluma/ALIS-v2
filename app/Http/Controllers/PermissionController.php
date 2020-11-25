<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$permissions = Permission::all();
		$roles = Role::all();
//		dd($roles->toArray(), $permissions->toArray());
		$permissionsRolesData = array('permissions' => $permissions,'roles' => $roles,);
		return view('permission.index', $permissionsRolesData);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Permissions are created via code
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function store(Request $request)
	{
		$arrayPermissionRoleMapping = $request->get('permissionRoles');
		$permissions = Permission::all();
		$roles = Role::all();

		foreach ($permissions as $permissionkey => $permission) {
			foreach ($roles as $roleKey => $role) {
				//If checkbox is clicked attach the permission
				if(!empty($arrayPermissionRoleMapping[$permissionkey][$roleKey]))
				{
//					$role->attachPermission($permission);
					$role->givePermissionTo($permission);
				}
				//If checkbox is NOT clicked detatch the permission
				elseif (empty($arrayPermissionRoleMapping[$permissionkey][$roleKey])) {
//					$role->detachPermission($permission);
					$role->revokePermissionTo($permission);
				}
			}
		}
		return redirect()->route('permission.index')->with('message', trans('messages.success-updating-permission'));
	}


    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
	public function show(Request $request, $id)
	{
		//
	}


    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
	public function edit(Request $request, $id)
	{
		//
	}


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
	public function update(Request $request, $id)
	{
		//
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
	public function destroy(Request $request, $id)
	{
		//
	}


}
