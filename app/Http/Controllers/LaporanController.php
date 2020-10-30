<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LaporanAnak;
use App\Traits\UploadTrait;

class LaporanController extends Controller
{
    use UploadTrait;
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
        $file = $this->uploadFile($request->file('file'),'laporan');
        $input = $request->except('_token','_method','file');
        $input['file_pendukung_id'] = $file->id;
        $model = LaporanAnak::create($input);
        return redirect()->route($this->route.'index',$id);
    }

    public function edit($id,$id_laporan,Request $request)
    {
        $data['model'] = LaporanAnak::find($id_laporan);
        return view($this->view.'edit',$data);
    }

    public function update($id,$id_laporan,Request $request)
    {
        $file = $this->uploadFile($request->file('file'),'laporan');
        $input = $request->except('_token','_method','file');
        $input['file_pendukung_id'] = $file->id;
        $model = LaporanAnak::find($id_laporan);
        $model->update($input);
        return redirect()->route($this->route.'index',$id);
    }

    public function delete($id,Request $request)
    {

    }
}
