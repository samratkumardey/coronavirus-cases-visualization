<?php

namespace App\Http\Controllers;

use App\BangladeshCovid;
use Illuminate\Http\Request;

class BangladeshController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = BangladeshCovid::orderBy('updated_at', 'DESC')->get();
        return view('bd.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        try{
            $data=BangladeshCovid::create($input);
            $bug=0;
        }
        catch (\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            return redirect('/bddata')->with('success', 'Data has been added');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong!')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=BangladeshCovid::findOrFail($id);
        return view('bd.edit', compact('data'));
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
        $data=BangladeshCovid::findOrFail($id);
        $input=$request->all();

        try{
            $data->update($input);
            $bug=0;
        }
        catch (Exception $e){
            $bug=1;
        }
        if($bug==0){
            return redirect('/bddata')->with('success', 'Data has been updated');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong!')->withInput();
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
        $data=BangladeshCovid::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('info', 'Data has been Deleted!');
    }
}
