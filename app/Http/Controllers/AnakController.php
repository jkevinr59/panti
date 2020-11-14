<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anak;
use App\DonaturHasAnak;
use Carbon\Carbon;
use Auth;
use App\Traits\UploadTrait;

class AnakController extends Controller
{
    use UploadTrait;
    //
    protected $view = 'anak.';
    protected $route = 'anak.';

    public function index()
    {
        $data['model'] = Anak::all();
        foreach($data['model'] as $key => $row){
            if($row->tanggal_lahir){
                $nowTime = Carbon::now();
                $birthTime = new Carbon($row->tanggal_lahir);
                $row->usia = $nowTime->diffInYears($birthTime);
                $data['model'][$key] = $row;
            }
            else
            {
                $row->usia = '0';
                $data['model'][$key] = $row;
            }
        }
        return view($this->view.'index',$data);
    }


    public function create()
    {
        return view($this->view.'create');
    }

    public function store(Request $request)
    {
        $input = $request->except('_method','_token','foto');
        if($request->file('foto')){
            $file = $this->uploadFile($request->file('foto'),'foto_anak');
            $input['id_foto'] = $file->id;
        }
        $model = Anak::create($input);
        return redirect()->route($this->route.'index');
    }

    public function edit($id,Request $request)
    {
        $data['model'] = Anak::find($id);
        return view($this->view.'edit',$data);
    }

    public function update($id,Request $request)
    {
        $input = $request->except('_method','_token','foto');
        if($request->file('foto')){
            $file = $this->uploadFile($request->file('foto'),'foto_anak');
            $input['id_foto'] = $file->id;
        }
        $model = Anak::find($id);
        $model->update($input);
        return redirect()->route($this->route.'index');
    }

    public function delete($id,Request $request)
    {

    }

    public function show(Request $request)
    {
        $user = Auth::user();
        $query = Anak::query();
        
        $filterFlag = 0;
        if(isset($request->asal)){
            $query = $query->where('asal',$request->asal);
            $filterFlag = 1;
        }

        if(isset($request->umur)){
            $query = $query->where('tanggal_lahir',$request->asal);
            $filterFlag = 1;
        }

        if(isset($request->umur)){
            $query = $query->where('tanggal_lahir',$request->asal);
            $filterFlag = 1;
        }
        $idAnakSudahProposal = $user->anaks()->whereIn('is_verified',[0,1])->pluck('anaks.id');
        $query = $query->whereNotIn('id',$idAnakSudahProposal);
        $data['model'] = $query->get();
        foreach($data['model'] as $key => $row){
            if($row->tanggal_lahir){
                $nowTime = Carbon::now();
                $birthTime = new Carbon($row->tanggal_lahir);
                $row->usia = $nowTime->diffInYears($birthTime);
                $data['model'][$key] = $row;
            }
            else
            {
                $row->usia = '0';
                $data['model'][$key] = $row;
            }
        }
        return view($this->view.'show',$data);
    }

    public function donate($id,Request $request)
    {
        $anak = Anak::find($id);
        $newProposal = DonaturHasAnak::create([
            'id_donatur' => Auth::id(),
            'id_anak' => $id,
            'is_verified' => 0,
        ]);
        return redirect()->back();
    }

    public function myAnak()
    {
        $user = Auth::user();
        $data['model'] = $user->anaks()->where('is_verified',1)->get();
        foreach($data['model'] as $key => $row){
            if($row->tanggal_lahir){
                $nowTime = Carbon::now();
                $birthTime = new Carbon($row->tanggal_lahir);
                $row->usia = $nowTime->diffInYears($birthTime);
                $data['model'][$key] = $row;
            }
            else
            {
                $row->usia = '0';
                $data['model'][$key] = $row;
            }
        }
        return view($this->view.'my_anak',$data);
    }
}
