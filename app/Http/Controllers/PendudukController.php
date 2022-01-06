<?php

namespace App\Http\Controllers;

use Alert;
use Redirect, Response;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduks = Penduduk::latest()->get();
        return view('penduduk.index', compact('penduduks'));
    }

    public function json(Request $request)
    {
        if ($request->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $data = Penduduk::select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'id',
                'nik',
                'nama',
                'alamat',
                'jenis_kelamin',
                'user_input',
                'user_update',
                'created_at',
                'updated_at'
            ]);
            return Datatables::of($data)
                ->editColumn('created_at', function ($data) {
                    return $data->created_at->format('d-M-Y H:i:s');
                })
                ->editColumn('updated_at', function ($data) {
                    return $data->updated_at->format('d-M-Y H:i:s');
                })
                ->addColumn('action', function ($data) {
                    $button = '<button type ="button" class="btn btn-primary align-right btn-sm" name="edit"  id="edit" data-id="' . $data->id . '"><i class="fas fa-pencil-alt"></i></button>';
                    $button .= '
                &nbsp;&nbsp;&nbsp;
                <button type ="button" class="btn btn-danger align-right btn-sm" name="edit" id="delete" data-id="' . $data->id . '"><i class="fas fa-trash-alt"></i></button>';
                    return $button;
                })

                ->rawColumns(['action'])
                ->make(true);
        } else {
            return response()->json(
                [
                    "message:" => "only Ajax request",
                ]
            );
        }
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
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:penduduks,nik',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('penduduk.index')->with('errors', $validator->messages()->all()[0])->withInput();
        }

        Penduduk::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'user_input' => auth()->user()->name
        ]);


        return redirect()->route('penduduk.index')->withSuccess('Penduduk Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        return Response::json($penduduk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:penduduks,nik,' . $penduduk->id . ",id",
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('penduduk.index')->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $penduduk->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'user_update' => auth()->user()->name
        ]);


        return redirect()->route('penduduk.index')->withInfo('Penduduk Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
    }
}
