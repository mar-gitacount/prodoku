<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tarekomipost;
use App\Models\Tarekomi;
use Illuminate\Support\Facades\DB;

class TarekomiController extends Controller
{
    //
    public function index()
    {
        return view('tarekomi');
    }

    public function post(Tarekomipost $request)
    {
        if (null == $request->name) {
            $name = "匿名希望";
        } else {
            $name = $request->name;
        }
        $savedate = [
            'name' => $name,
            'title' => $request->title,
            'gunle' => $request->gunle,
            'message' => $request->message
        ];
        $request->session()->put("save_input", $savedate);
        return redirect()->route("confirm");
    }

    public function confirm(Request $request)
    {
        //セッションを取り出す
        $input = $request->session()->get("save_input");
        if (!$input) {
            return redirect()->route("tarekomi");
        }
        return view("tarekomiconfirm", ["input" => $input]);
    }

    public function store(Request $request)
    {
        //セッションを取り出す
        $input = $request->session()->get("save_input");
        if (!$input) {
            return redirect()->route("tarekomi");
        }
        $tarekomi = new Tarekomi();
        $tarekomi->fill($input);
        $tarekomi->save();
        //セッションを空にする。
        $request->session()->forget("save_input");
        // tahnksをrouteで呼び出してredirectする。
        return redirect()->route("thanks");
    }

    public function thanks()
    {
        return view("thanks");
    }

    public function test()
    {
        $tarekomis = DB::select('SELECT id , title from tarekomis');
        dd($tarekomis);
        return view("test", ["tarekomis" => $tarekomis]);
    }
}
