<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tarekomipost;
use App\Models\Tarekomi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        // gunleはこの時点で数値型なのでユーザー側が何かわからないので一旦文字列に変換する
        $config = config("tarekomigunle");
        $config =  $config[$request->gunle];
        $config = $config["label"];
        //dd($config);
        $savedate = [
            'name' => $name,
            'title' => $request->title,
            'gunle' => $request->gunle,
            'gunle_display' => $config,
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
        // thanksをrouteで呼び出してredirectする。
        return redirect()->route("thanks");
    }

    public function thanks()
    {
        return view("thanks");
    }

    public function test()
    {
        $tarekomis = DB::select('SELECT id , title from tarekomis');
        return view("test", ["tarekomis" => $tarekomis]);
    }

    public function testarticle($id)
    {
        $tarekomis_all = DB::select("SELECT * from tarekomis where id = '" . $id . "' ");
        return view("tarecomi_all", ["tarecomi_all" => $tarekomis_all]);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image'
        ], [
            'file.required' => '画像が選択されていません',
            'file.image' => '画像ファイルではありません',
        ]);
        // ファイル取得
        $file = $request->file('file');
        // 元々のファイルの名前を取得→ファイル名を取得できないので一意のディレクトリ名を取得する。
        $file_name = $file->getClientOriginalName();
        //dd($file_name);
        //dd($file);
        //$contents = Storage::get('public/' . $file);
        //dd($contents);
        $list = Storage::disk('s3')->files('');
        //dd($list);
        // $pathでファイル名を取得できるので、これを元にファイル名をDBに保存する。putの第一引数で保存したディレクトリ名を取得できるのでそれを利用する。とりあえずtestディレクトリ
        $path = Storage::disk('s3')->put("test", $file, 'public');
        return redirect("/");
    }

    public function tarekomigetapi()
    {
        $tarekomiapigetall = DB::select('SELECT id , title from tarekomis');
        return response()->json($tarekomiapigetall);
    }
}
