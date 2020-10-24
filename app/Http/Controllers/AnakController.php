<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anak;
use Carbon\Carbon;

class AnakController extends Controller
{
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
        $model = Anak::create($request->all());
        return redirect()->route($this->route.'index');
    }

    public function edit($id,Request $request)
    {
        $data['model'] = Anak::find($id);
        return view($this->view.'create',$data);
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
}
