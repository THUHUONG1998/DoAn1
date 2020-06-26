<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khunggio;
use App\benhvien;
use DB;

class khunggioController extends Controller
{
    public function index(Request $request)
    {
        // code phan trang
        $khunggio = khunggio::orderBy('id','ASC')->paginate(5);
        
        return view('khunggio.index',compact('khunggio'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $benhvien = DB::table('benhvien')->get();
        return view('khunggio.create', [ 'benhvien' => $benhvien]);
    }
    public function store(Request $request)
    {
        // code tao database
        // code lay du lieu vao database
        $this->validate($request, [
            'khunggio' => 'required',
            'id_benhvien' => 'required',
        ],

        [
            'required' => ':attribute không được bỏ trống'
        ],

        [
            'khunggio' => 'Khung giờ',
        ]);

        

        $input = $request->all();

        $khunggio = khunggio::create($input);

        return redirect()->route('khunggio.index')
                        ->with('success','Time created successfully');
    }

  
  


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khunggio = khunggio::find($id);
        $benhvien = DB::table('benhvien')->get();
        return view('khunggio.edit',compact('khunggio','benhvien'));
    }
    public function update(Request $request, $id)
    {
        $khunggio = khunggio::find($id);
        $this->validate($request, [
            'tenkhunggio' => 'required',
            'id_benhvien' => 'required',
        ]);


        $input = $request->all();

        $khunggio->update($input);
        return redirect()->route('khunggio.index')
                        ->with('success','Chuyen Khoa updated successfully');
    }
    public function destroy($id)
    {
        khunggio::find($id)->delete();
        return redirect()->route('khunggio.index')
                        ->with('success','Time deleted successfully');
    }

}
