<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Role;

class UserController extends Controller
{
    protected $view = 'user.';
    protected $route = 'user.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if($user->hasRole('pengurus'))
        {
            $donaturRole = Role::where('name','donatur')->first();
            $data['model'] = $donaturRole->users;
            
        }
        else if($user->hasRole('superadmin'))
        {
            $data['model'] = User::all();
        }
        if(!$data['model']){
            $data['model'] = [];
        }
        return view($this->view.'index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view($this->view.'create');
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
        $input = $request->except('_method'.'_token','role');
        $model = User::create($input);
        if($request->role == 'superadmin'){
            $model->attachRole('superadmin');
        }
        else if($request->role == 'pengurus'){
            $model->attachRole('pengurus');
        }
        else if($request->role == 'donatur'){
            $model->attachRole('donatur');
        }
            
        return redirect()->route($this->route.'index');
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
        $data['model'] = User::find($id);
        return view($this->view.'edit',$data);
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
        $input = $request->except('_method'.'_token','role');
        $model = User::find($id);
        $model->update($input);

        if($request->role == 'superadmin'){
            $model->syncRoles(['superadmin']);
        }
        else if($request->role == 'pengurus'){
            $model->syncRoles(['pengurus']);
        }
        else if($request->role == 'donatur'){
            $model->syncRoles(['donatur']);
        }
            
        return redirect()->route($this->route.'index');
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
