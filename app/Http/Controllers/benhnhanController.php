<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\benhnhan;
use Auth;
use DB;

class benhnhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $benhnhan = benhnhan::orderBy('id','ASC')->paginate(5);
        return view('benhnhan.index',compact('benhnhan'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $benhvien = DB::table('benhvien')->get();
        $bacsi=DB::table('bacsi')->get();
        $chuyenkhoa = DB::table('chuyenkhoa')->get();
        $data=DB::table('users')->get();
        $khunggio=DB::table('khunggio')->get();
        return view('benhnhan.create',compact('benhvien','bacsi','chuyenkhoa','data','khunggio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'hovaten' => 'required|min:5|max:255',
            'ngaysinh'=>'required|date',
            'sodienthoai'=>'required',
            'ngaykham'=>'required|date',
            'id_benhvien' => 'required',
            'id_bacsi' => 'required',
            'id_chuyenkhoa' => 'required',
            'id_khunggio'=>'required',

        ],

        [
            'required' => ':attribute không được bỏ trống'
        ],
        [
            'hovaten' => 'Họ và tên',
        ]);

        $input = $request->all();
        $input['id_user'] = Auth::user()->id;
        $benhnhan = benhnhan::create($input);
        return redirect()->route('benhnhan.index')
                        ->with('success','patient created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $benhvien = DB::table('benhvien')->get();
        // $bacsi=DB::table('bacsi')->get();
        // $chuyenkhoa = DB::table('chuyenkhoa')->get();
        // $data=DB::table('users')->get();
        // $khunggio=DB::table('khunggio')->get();
        $benhnhan = benhnhan::find($id);
        return view('benhnhan.show',compact('benhnhan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $benhvien = DB::table('benhvien')->get();
        $bacsi=DB::table('bacsi')->get();
        $chuyenkhoa = DB::table('chuyenkhoa')->get();
        $data=DB::table('users')->get();
        $khunggio=DB::table('khunggio')->get();
        $benhnhan = benhnhan::find($id);
        return view('benhnhan.edit',compact( 'benhnhan','benhvien','bacsi','chuyenkhoa','data','khunggio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hovaten' => 'required|min:5|max:255',
            'ngaysinh'=>'required|date',
            'ngaysinh'=>'required|date',
            'id_benhvien' => 'required',
            'id_bacsi' => 'required',
            'id_chuyenkhoa' => 'required',
            'id_khunggio'=>'required',
        ]);
            
        $benhnhan = benhnhan::find($id);
        $benhnhan->update($request->all());
        $benhnhan->save();

        return redirect()->route('benhnhan.index')
                        ->with('success','Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        benhnhan::find($id)->delete();
        return redirect()->route('benhnhan.index')
                        ->with('success','Patient deleted successfully');
    }
}
