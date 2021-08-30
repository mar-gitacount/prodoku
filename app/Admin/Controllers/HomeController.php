<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Tarekomi;
class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
    // youtube記事作成ページ
    public function storepageadmin()
    {
        return view("store_page_admin");
    }
    // store保存する。
    public function store(Request $request){
        // gunleはこの時点で数値型なのでユーザー側が何かわからないので一旦文字列に変換する
        $config = config("tarekomigunle");
        $config =  $config[$request->gunle];
        $config = $config["label"];
        $savedate = [
            'name' => $request->name,
            'title' => $request->title,
            'gunle' => $request->gunle,
            'gunle_display' => $config,
            'message' => $request->message
        ];
        $tarekomi = new Tarekomi();
        $tarekomi->fill($savedate)->save();
        return redirect("/admin/checktarekomis");
    }
    // タレコミ一覧
    public function checktarekomis()
    {
        $tarekomis = DB::select('SELECT id, title from tarekomis ORDER BY created_at desc');
        return view("checktarekomis", ["tarekomis" => $tarekomis]);
    }

    //タレコミ本文
    public function article_tarekomi($id)
    {
        $tarekomis_all = DB::select("SELECT * from tarekomis where id = '" . $id . "' ");
        return view("tarecomi_all", ["tarecomi_all" => $tarekomis_all]);
        //$title = $request->$title;
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image'
        ], [
            'file.required' => '画像が選択されていません',
            'file.image' => '画像ファイルではありません',
        ]);
        $file = $request->file('file');
        //dd($file);
        $list = Storage::disk('s3')->files('');
        //dd($list);
        $path = Storage::disk('s3')->put('/', $file, 'public');
        //dd($path);
        return redirect("/admin/checktarekomis");
    }
    // タレコミを編集する。
    public function edit(Request $request){
        $id = $request -> id;
        $tarekomis = Tarekomi::find($request->id);
        $tarekomis -> name = $request -> name;
        $tarekomis -> title = $request -> title;
        (int)$gunle = $request->gunle;
        $tarekomis -> gunle = $gunle;
        $tarekomis -> message = $request -> message;
        // "name" => "匿名希望"
        // "title"
        // "gunle" => 1
        // "message" => "tatat" 
        $tarekomis->save();
        return redirect("/admin/checktarekomis");
    }
    // 投稿を削除。
    public function delete($id){
        DB::select("DELETE from tarekomis where id = '" . $id . "' ");
        return redirect("/admin/checktarekomis");
    }
    
    // 全ての投稿を削除する。削除した場合次の日のjsonファイルを検索して読み込み、DBに保存する。
    public function alldelete(){
        Tarekomi::query()->delete();
        return redirect("/admin/checktarekomis");
    }
}
