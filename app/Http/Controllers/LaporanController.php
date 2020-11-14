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

    public function index($id,$type)
    {
        $data['model']=LaporanAnak::where('id_anak',$id)->where('jenis_laporan',$type)->get();
        $data['id']=$id;
        $data['type']=$type;
        return view($this->view.'index',$data);
    }

    public function create($id,$type)
    {
        $data['id'] = $id;
        $data['type'] = $type;
        return view($this->view.'create',$data);
    }

    public function store($id,Request $request)
    {
        $input = $request->except('_token','_method','file');
        if($request->file('file')){
            $file = $this->uploadFile($request->file('file'),'laporan');
            $input['file_pendukung_id'] = $file->id;
        }
        $model = LaporanAnak::create($input);
        return redirect()->route($this->route.'index',[$id,$request->jenis_laporan]);
    }

    public function edit($id,$id_laporan,Request $request)
    {
        $data['model'] = LaporanAnak::find($id_laporan);
        $data['type'] = $data['model']->jenis_laporan;
        return view($this->view.'edit',$data);
    }

    public function update($id,$id_laporan,Request $request)
    {
        $input = $request->except('_token','_method','file');
        if($request->file('file')){
            $file = $this->uploadFile($request->file('file'),'laporan');
            $input['file_pendukung_id'] = $file->id;
        }
        $model = LaporanAnak::find($id_laporan);
        $model->update($input);
        return redirect()->route($this->route.'index',[$id,$request->jenis_laporan]);
    }

    public function delete($id,Request $request)
    {

    }
}
