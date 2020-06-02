<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\posts;

/*
 * Spatie package
*/
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*
         * Start create your roles and permissions
        */
//        Role::create(['name' => 'admin']);
//        Permission::create(['name'=>'edit post']);


        /*
         * Start assign your roles and permissions
        */
//         $role = Role::findById(1);
//         $permission = Permission::findById(1);
//         $role->givePermissionTo($permission);


        /*
         *  Remove permissions
         */
//        $role = Role::findById(1);
//        $permission = Permission::findById(1);
//        $role->revokePermissionTo($permission);


        /*
         * Give permission to users
         */
//        auth()->user()->givePermissionTo('edit post');
//        auth()->user()->syncPermissions($permission);


        /*
         * Assign role to users
         */
//        auth()->user()->assignRole('writer');


        /*
         * Check permissions and roles for any users
         * */
//        return auth()->user()->permissions;
//        return auth()->user()->getDirectPermissions();
//        return auth()->user()->getPermissionsViaRoles();
//        return auth()->user()->getAllPermissions();
//        return(User::permission('edit post')->get());


        /*
         * Retrieve data from Posts table
         * */

        $datas = posts::all();


        return(view('posts', compact('datas')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Role::givePermissionTo('1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
