<?php

namespace App\Http\Controllers;

use App\Models\Transaksi2;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
class Transaksi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi2::orderBy('time','DESC')->get();
        $response = [
            'message' => 'List Data Transaksi order by time',
            'data' => $transaksi
        ];
        return response()->json($response, Response::HTTP_OK);
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
        $data = Validator::make($request->all(), [
            'title' => ['required'],
            'nominal' => ['required','numeric'],
            'type' => ['required','in:pengeluaran,pemasukan'],
        ]);
        if($data->fails()) {
            return \response()->json($data->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $transaksi = Transaksi2::create($request->all());
            $response = [
                'message'=>'Tambahkan data update',
                'data' => $transaksi,
            ];
            return \response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return \response()->json([
                'message'=>'file'.$e->errorInfo
            ], Response::HTTP_CREATED);
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
        //
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
        $transaksi = Transaksi2::findOrFail($id);
        $data = Validator::make($request->all(), [
            'title' => ['required'],
            'nominal' => ['required','numeric'],
            'type' => ['required','in:pengeluaran,pemasukan'],
        ]);
        if($data->fails()) {
            return \response()->json($data->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $transaksi = Transaksi2::where('id',$id)->update($request->all());
            $response = [
                'message'=>'Tambahkan data update',
                'data' => $transaksi,
            ];
            return \response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return \response()->json([
                'message' => $e->getMessage()
            ],Response::HTTP_OK);
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
        //
    }
}
