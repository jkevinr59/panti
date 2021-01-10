<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LaporanAnak;
use App\Anak;
use Carbon\Carbon;
use App\Traits\UploadTrait;
use PDF;

class LaporanController extends Controller
{
    use UploadTrait;
    //
    protected $view = 'laporan.';
    protected $route = 'laporan.';

    public function index($id,$type,Request $request)
    {
        $input = $request;
        $query=LaporanAnak::where('id_anak',$id)->where('jenis_laporan',$type);
        if($input->month){
            $query = $query->whereMonth('tanggal_laporan',$input->month);
        }
        if($input->year){
            $query = $query->whereYear('tanggal_laporan',$input->year);
        }
        $data['model'] = $query->get();
        $data['id']=$id;
        $data['type']=$type;
        $data['anak'] = Anak::find($id);
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

    public function show($id,Request $request)
    {
        $data['month'] = Carbon::now()->month;
        $data['year'] = Carbon::now()->year;

        $query = LaporanAnak::where('id_anak',$id)->orderBy('created_at','desc');
        if(isset($request->month)){
            if($request->month !== 'default'){
                $query = $query->whereMonth('tanggal_laporan','=',$request->month);
                $data['month'] = $request->month;
                $data['monthName'] = $this->getMonth()[$data['month']];
            }
        };
        if(isset($request->year)){
            if($request->year !== 'default'){
                $query = $query->whereYear('tanggal_laporan','=',$request->year);
                $data['year'] = $request->year;
            }
        }
        $queryAkademis = $query;
        $data['laporan_akademis'] = $queryAkademis->where('jenis_laporan','akademis')->get();
        $queryNonAkademis = $query;
        $data['laporan_non_akademis'] = $queryNonAkademis->where('jenis_laporan','non_akademis')->get();
        $queryLainLain = $query;
        $data['laporan_lain_lain'] = $queryLainLain->where('jenis_laporan','lain_lain')->get();
        $data['anak'] = Anak::find($id);
        
        $data['id']=$id;
        return view($this->view.'show',$data);
    }

    public function export($id,Request $request)
    {
        $data['month'] = Carbon::now()->month;
        $data['monthName'] = $this->getMonth()[$data['month']];
        $data['year'] = Carbon::now()->year;

        $query = LaporanAnak::where('id_anak',$id)->orderBy('created_at','desc');
        if(isset($request->month)){
            if($request->month !== 'default'){
                $query = $query->whereMonth('tanggal_laporan','=',$request->month);
                $data['month'] = $request->month;
                $data['monthName'] = $this->getMonth()[$data['month']];
            }
            
        };
        if(isset($request->year)){
            if($request->year !== 'default'){
                $query = $query->whereYear('tanggal_laporan','=',$request->year);
                $data['year'] = $request->year;
            }
        }
        $queryAkademis = $query;
        $data['laporan_akademis'] = $queryAkademis->where('jenis_laporan','akademis')->get();
        $queryNonAkademis = $query;
        $data['laporan_non_akademis'] = $queryNonAkademis->where('jenis_laporan','non_akademis')->get();
        $queryLainLain = $query;
        $data['laporan_lain_lain'] = $queryLainLain->where('jenis_laporan','lain_lain')->get();
        $data['id']=$id;
        $data['anak'] = Anak::find($id);
        $pdf = PDF::loadView('pdf.laporan',$data);
        return $pdf->download('Laporan '.$data['anak']->nama.'.pdf');
    }

    protected function getMonth()
    {
        $monthArray[1] = 'Januari';
        $monthArray[2] = 'Februari';
        $monthArray[3] = 'Maret';
        $monthArray[4] = 'April';
        $monthArray[5] = 'Mei';
        $monthArray[6] = 'Juni';
        $monthArray[7] = 'Juli';
        $monthArray[8] = 'Agustus';
        $monthArray[9] = 'September';
        $monthArray[10] = 'Oktober';
        $monthArray[11] = 'November';
        $monthArray[12] = 'Desember';
        return $monthArray;
    }
}
