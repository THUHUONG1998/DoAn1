<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\benhvien;

class benhvienController extends Controller
{
    public function index(Request $request)
    {
        // code phan trang
        $benhvien = benhvien::orderBy('id','ASC')->paginate(5);
        return view('benhvien.index',compact('benhvien'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('benhvien.create');
    }
    public function store(Request $request)
    {
        request()->validate([
            'tenbenhvien' => 'required',
            'diachi' => 'required',
        ]);


        benhvien::create($request->all());


        return redirect()->route('benhvien.index')
                        ->with('success','Hospital created successfully.');
    }
    public function show($id)
    {
        $benhvien = benhvien::find($id);
        return view('benhvien.show',compact('benhvien'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $benhvien = benhvien::find($id);
        return view('benhvien.edit',compact('benhvien'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tenbenhvien' => 'required',
            'diachi' => 'required',
        ]);

        $benhvien = benhvien::find($id);
        $benhvien->update($request->all());
        $benhvien->save();

        return redirect()->route('benhvien.index')
                        ->with('success','Hospital updated successfully');
    }


   
    public function destroy($id)
    {
        $benhvien = benhvien::find($id);
        $benhvien->benhnhan()->delete();
        $benhvien->bacsi()->delete();
        $benhvien->chuyenkhoa()->delete();
        $benhvien->khunggio()->delete();
        $benhvien->delete();
        return redirect()->route('benhvien.index')
                        ->with('success','Hospital deleted successfully');
    }

}
