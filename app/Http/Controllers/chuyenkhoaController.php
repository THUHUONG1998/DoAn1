<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chuyenkhoa;
use App\benhvien;
use DB;

class chuyenkhoaController extends Controller
{
    public function index(Request $request)
    {
        // code phan trang
        $chuyenkhoa = chuyenkhoa::orderBy('id','ASC')->paginate(5);
        return view('chuyenkhoa.index',compact('chuyenkhoa'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $benhvien = DB::table('benhvien')->get();
        return view('chuyenkhoa.create', ['benhvien' => $benhvien]);
    }
    public function store(Request $request)
    {
        // code tao database
        // code lay du lieu vao database
        $this->validate($request, [
            'tenchuyenkhoa' => 'required',
            'id_benhvien' => 'required',
        ],

        [
            'required' => ':attribute không được bỏ trống'
        ],

        [
            'tenchuyenkhoa' => 'Tên chuyên khoa',
        ]);

        

        $input = $request->all();

        $chuyenkhoa = chuyenkhoa::create($input);

        return redirect()->route('chuyenkhoa.index')
                        ->with('success','Chuyên khoa created successfully');
    }


    public function show($id)
    {
        $chuyenkhoa = chuyenkhoa::find($id);
        return view('chuyenkhoa.show',compact('chuyenkhoa'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chuyenkhoa = chuyenkhoa::find($id);
        $benhvien = DB::table('benhvien')->get();
        return view('chuyenkhoa.edit',compact('chuyenkhoa','benhvien'));
    }
    public function update(Request $request, $id)
    {
        $chuyenkhoa = chuyenkhoa::find($id);
        $this->validate($request, [
            'tenchuyenkhoa' => 'required',
            'id_benhvien' => 'required',
        ]);


        $input = $request->all();

        $chuyenkhoa->update($input);
        return redirect()->route('chuyenkhoa.index')
                        ->with('success','Chuyen Khoa updated successfully');
    }
    


   
    public function destroy($id)
    {
        chuyenkhoa::find($id)->delete();
        return redirect()->route('chuyenkhoa.index')
                        ->with('success','ChuyenKhoa deleted successfully');
    }

}
