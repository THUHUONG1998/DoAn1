<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bacsi;
use DB;

class bacsiController extends Controller
{
    public function index(Request $request)
    {
        // code phan trang
        $bacsi = bacsi::orderBy('id','ASC')->paginate(5);
        return view('bacsi.index',compact('bacsi'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $benhvien = DB::table('benhvien')->get();
        $chuyenkhoa = DB::table('chuyenkhoa')->get();
        return view('bacsi.create',compact('bacsi','benhvien','chuyenkhoa'));
    }
    public function store(Request $request)
    {
        // code tao database
        // code lay du lieu vao database
        $this->validate($request, [
            'tenbacsi' => 'required',
            'id_benhvien' => 'required',
            'id_chuyenkhoa' => 'required',
        ],

        [
            'required' => ':attribute không được bỏ trống'
        ],

        [
            'tenbacsi' => 'Tên Bác Sĩ',
        ]);

        

        $input = $request->all();

        $bacsi = bacsi::create($input);

        return redirect()->route('bacsi.index')
                        ->with('success','Doctor created successfully');
    }
    public function edit($id)
    {
        $benhvien = DB::table('benhvien')->get();
        $chuyenkhoa = DB::table('chuyenkhoa')->get();
        $bacsi = bacsi::find($id);
        return view('bacsi.edit',compact('bacsi','chuyenkhoa', 'benhvien'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tenbacsi' => 'required',
            'hocvi'=>'required',
            'id_benhvien' => 'required',
            'id_chuyenkhoa' => 'required',
        ]);
            
        $bacsi = bacsi::find($id);
        $bacsi->update($request->all());
        $bacsi->save();

        return redirect()->route('bacsi.index')
                        ->with('success','Hospital updated successfully');
    }
    public function destroy($id)
    {
        bacsi::find($id)->delete();
        return redirect()->route('bacsi.index')
                        ->with('success','Doctor deleted successfully');
    }

    public function show($id)
    {
        $bacsi = bacsi::find($id);
        return view('bacsi.show',compact('bacsi'));
    }

}
