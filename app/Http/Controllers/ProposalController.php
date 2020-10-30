<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonaturHasAnak;

class ProposalController extends Controller
{
    protected $view = 'proposal.';
    protected $route = 'proposal.';

    public function index()
    {
        $data['model']=DonaturHasAnak::orderBy('is_verified')->get();
        return view($this->view.'index',$data);
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function store(Request $request)
    {
        $model = Anak::create($request->all());
        return redirect()->route($this->route.'index');
    }

    public function edit($id,Request $request)
    {
        $data['model'] = Anak::find($id);
        return view($this->view.'edit',$data);
    }

    public function update($id,Request $request)
    {
        $model = Anak::find($id);
        $model->update($request->all());
        return redirect()->route($this->route.'index');
    }

    public function delete($id,Request $request)
    {

    }

    public function verify($id)
    {
        $model = DonaturHasAnak::find($id);
        $model->update(['is_verified'=>1]);
        return redirect()->route($this->route.'index');
    }

    public function reject($id)
    {
        $model = DonaturHasAnak::find($id);
        $model->update(['is_verified'=>2]);
        return redirect()->route($this->route.'index');
    }
}
