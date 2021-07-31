<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class QitaapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //qiitaバッチ処理したものをここに出力する。
        // Guzzleをセット。
        $client = new Client;
        // トークンをセットする。
        $token = '2c40e1503301da44cb2e5edeee9a72b1f4ff2956';
        //search?sort=&q=php書籍
        //items?page=1&per_page=10
        // 自分の記事　https://qiita.com/api/v2/authenticated_user/items
        //tags/ruby
        $result = $client->request('GET', 'https://qiita.com/api/v2/items', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);
        $response_body = (string) $result->getBody();
        $decode_res = json_decode($response_body);
        foreach ($decode_res as $res_data) {
            //$res_data->url;でurlを取得できる。$res_dataで全ての内容が取得できる。
            $url = $res_data->url;
            // $res_data->url; url取得
            // $res_data->title;　タイトル取得
            // $res_data->body; 本文取得
            $object = $res_data->title;
        }
        
        return response()->json(['qiitas' => $url]);
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
}
