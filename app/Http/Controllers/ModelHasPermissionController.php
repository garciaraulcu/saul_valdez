<?php

namespace App\Http\Controllers;

use App\ModelHasRole;
use App\ModelHasPermission;
use Illuminate\Http\Request;
use DB;


/**
 * Class ModelHasRoleController
 * @package App\Http\Controllers
 */
class ModelHasPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $givepermissions = DB::table('users')
        ->rightJoin('model_has_permissions', 'users.id', '=', 'model_has_permissions.model_id')
        ->get();

        return view('model-has-permission.index', compact('givepermissions'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('model-has-permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new ModelHasPermission;

        switch ($request->permission_id) {
            case 'index':
                # code...
                $permission->permission_id = 1;
                break;
            case 'show':
                # code...
                $permission->permission_id = 2;
                break;
            case 'store':
                # code...
                $permission->permission_id = 3;
                break;
            case 'create':
                # code...
                $permission->permission_id = 4;
                break;        
            case 'update':
                # code...
                $permission->permission_id = 5;
                break;
            case 'delete':
                # code...
                $permission->permission_id = 6;
                break;
            case 'edit':
                # code...
                $permission->permission_id = 7;
                break;
            default:
                # code...
                break;
        }
        $permission->model_type = 'App\Models\User';
        $permission->model_id = $request->model_id;
        

        $permission->save();

        return redirect()->route('givepermissions.index')
            ->with('success', 'ModelHasPermission created successfully.');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('model_has_permissions')->where('model_id',$id)->get();

        $table = ModelHasPermission::all();

        return view('model-has-permission.edit', compact('data','table'));  
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

          switch ($request->permission_id) {
            case 'index':
                # code...
                DB::table('model_has_permissions')
        ->where('model_id', $id)
        ->update([
            'permission_id' => '1'
          ]);
                break;
            case 'show':
                # code...
                # code...
                DB::table('model_has_permissions')
        ->where('model_id', $id)
        ->update([
            'permission_id' => '2'
          ]);
                break;
            case 'store':
                # code...
                # code...
                DB::table('model_has_permissions')
        ->where('model_id', $id)
        ->update([
            'permission_id' => '3'
          ]);
                break;
            case 'create':
                # code...
                # code...
                DB::table('model_has_permissions')
        ->where('model_id', $id)
        ->update([
            'permission_id' => '4'
          ]);
                break;        
            case 'update':
                # code...
                # code...
                DB::table('model_has_permissions')
        ->where('model_id', $id)
        ->update([
            'permission_id' => '5'
          ]);
                break;
            case 'delete':
                # code...
                # code...
                DB::table('model_has_permissions')
        ->where('model_id', $id)
        ->update([
            'permission_id' => '6'
          ]);
                break;
            case 'edit':
                # code...
                # code...
                DB::table('model_has_permissions')
        ->where('model_id', $id)
        ->update([
            'permission_id' => '7'
          ]);
                break;
            default:
                # code...
                break;
        }

  return redirect()->route('givepermissions.index')
      ->with('success', 'ModelHasPermission updated successfully');

       
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        DB::table('model_has_permissions')->where('model_id',$id)->delete();

        return redirect()->route('givepermissions.index')
            ->with('success', 'ModelHasPermissions deleted successfully');
    }
}
