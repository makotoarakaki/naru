<?php

namespace App\Http\Controllers\Dashboard;

use App\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.contracts.index');
    }

    // /**
    //  * file upload.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function upload(Request $request, Contract $contract)
    // {
    //     // ステータスを１へ
    //     $contract->atatus = 1;
    //     //ファイル名を取得
    //     $filename = $request->file('image')->getClientOriginalName();

    //     // image,skillを配列へ書き換える
    //     $storedata =  array_replace($request->all(), array('image' => $filename));
    //     // データ登録
    //     $contract->fill($storedata)->save();
    //     // ファイルの保存
    //     $request->file('image')->storeAs('public/'.$contract->id.'/', $filename);

    //     return redirect(route('dashboard.contracts.send', $contract->id))->with('message', 'detail新しい記事を登録しました。');
    // }

    // /**
    //  * file upload.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function send(Request $request, $id)
    // {

    //     return redirect(route('dashboard.contracts.send', $id))->with('message', 'detail新しい記事を登録しました。');
    // }

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
    public function store(Request $request, Contract $contract)
    {
        //ファイル名を取得
        $filename = $request->file('image')->getClientOriginalName();
        // ステータスを１へ
        $contract->status = 1;
        $contract->image = $filename;

        // image,skillを配列へ書き換える
        $storedata =  array_replace($request->all(), array('image' => $filename));

        // データ登録
        $contract->fill($storedata)->save();
        // ファイルの保存
        $request->file('image')->storeAs('public/'.$contract->id.'/', $filename);

        return redirect(route('dashboard.contracts.edit', $contract->id))->with('message', 'detail新しい記事を登録しました。');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        return view('dashboard.contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
