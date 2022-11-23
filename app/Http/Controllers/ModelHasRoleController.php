<?php

namespace App\Http\Controllers;

use App\ModelHasRole;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use DB;


/**
 * Class ModelHasRoleController
 * @package App\Http\Controllers
 */
class ModelHasRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $giveroles = DB::table('roles')
        ->select('roles.name AS role_name', 'model_has_roles.*','users.name','users.email')

        ->leftJoin('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->join('users','model_has_roles.model_id', '=' , 'users.id')
        ->orderBy('model_id')
        ->get();

        return view('model-has-role.index', compact('giveroles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $users = User::all();

        return view('model-has-role.create',compact('roles','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        DB::table('model_has_roles')->insert([
            'role_id' => $request->role_id,
            'model_type' => 'App\Models\User',
            'model_id' => $request->model_id,
        ]);
        

        return redirect()->route('giveroles.index')
            ->with('success', 'ModelHasRole created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelHasRole = DB::table('roles')
        ->select('roles.name AS role_name', 'model_has_roles.*','users.name','users.email')

        ->leftJoin('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->join('users','model_has_roles.model_id', '=' , 'users.id')
        ->where('model_id',$id)
        ->get();

        return view('model-has-role.show', compact('modelHasRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('model_has_roles')->where('model_id',$id)->get();

        $roles = Role::all();



        return view('model-has-role.edit', compact('data','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ModelHasRole $modelHasRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::table('model_has_roles')
              ->where('model_id', $id)
              ->update([
                  'role_id' => $request->role_id,
                ]);

        return redirect()->route('giveroles.index')
            ->with('success', 'ModelHasRole updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        return redirect()->route('giveroles.index')
            ->with('success', 'ModelHasRole deleted successfully');
    }
}
