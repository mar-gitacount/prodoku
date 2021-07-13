<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tarekomipost;
use App\Models\Tarekomi;

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
        dd($input);
        return view("tarekomiconfirm", ["input" => $input]);
    }


    public function store(Tarekomipost $request)
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
        $tarekomi = new Tarekomi();
        $tarekomi->fill($savedate);
        $tarekomi->save();
        //dd($tarekomi);
        return redirect('/tarekomi');
    }
}
