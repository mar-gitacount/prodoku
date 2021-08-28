<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarekomi;
use Illuminate\Support\Facades\DB;
class TarekomiapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tarekomis = DB::select('SELECT id , title from tarekomis');
        // jsonに置き換え
        return response()->json(['tarekomis' => $tarekomis]);
        //return $tarekomis;
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
        $tarekomis_all = DB::select("SELECT * from tarekomis where id = '" . $id . "' ");
        return response()->json(['tarekomis_all' => $tarekomis_all]);
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
    public function update(Request $request, $id)
    {
        //
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
    // 押下されたページの値を振り分ける。
    public function pageselectp($id){
        // pageselectphp.jsonを呼び出してそこから帰ってきた値をレスポンス
        return;
    }
}
