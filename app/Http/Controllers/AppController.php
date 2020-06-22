<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Setapp;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setapp::find('1')->first();
        // dd($data);
        return view('Admin.App.set', ['data'=>$data]);
    }

    public function set_mqtt()
    {
        return view('Admin.App.set_mqtt');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $v = Validator::make($req->all(), [             
            'nama_apps'  => 'max:25',            
            'icon'  => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else {
            $data = Setapp::find($id);
            
            $data->update([
                'nama_apps'  => $req->nama_apps,
                'overview'   => $req->overview,
            ]);

            if($req->hasfile('icon'))
            {
                $icon = 'IMG-'.time().'-'.$req->icon->getClientOriginalName();
                $req->icon->move(public_path('foto/app'),$icon);

                $data->update([
                    'icon' => $icon,
                ]);
            }            
            // dd($data);
            return back()->with('success', 'Profil berhasil di update');
        }
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
