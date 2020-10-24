<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LaporanAnak;

class LaporanController extends Controller
{
    //
    protected $view = 'laporan.';
    protected $route = 'laporan.';

    public function index($id)
    {
        $data['model']=LaporanAnak::where('id_anak',$id)->get();
        $data['id']=$id;
        return view($this->view.'index',$data);
    }

    public function create($id)
    {
        $data['id'] = $id;
        return view($this->view.'create',$data);
    }

    public function store($id,Request $request)
    {
        $model = LaporanAnak::create($request->all());
        return redirect()->route($this->route.'index',$id);
    }

    public function edit($id,$id_laporan,Request $request)
    {
        $data['model'] = LaporanAnak::find($id_laporan);
        return view($this->view.'edit',$data);
    }

    public function update($id,$id_laporan,Request $request)
    {
        $model = LaporanAnak::find($id_laporan);
        $model->update($request->all());
        return redirect()->route($this->route.'index',$id);
    }

    public function delete($id,Request $request)
    {

    }
}
