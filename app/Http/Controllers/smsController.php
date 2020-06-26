<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sms;

class smsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
       $sms = sms::orderBy('id','ASC')->paginate(5);
       return view('sms.index',compact('sms'))
           ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sms = sms::find($id);
        return view('sms.show',compact('sms'));
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sms::find($id)->delete();
        return redirect()->route('sms.index')
                        ->with('success','sms deleted successfully');
    }
}
