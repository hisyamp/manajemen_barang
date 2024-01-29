<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Logbarang;
use Illuminate\Support\Facades\Auth;
use DataTables;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function dashboard_admin()
    {
        $role = Auth::user()->role;
        return view('admin.dashboard_admin',compact('role'));
    }
    public function list_user()
    {
        $role = Auth::user()->role;
        return view('admin.list_user',compact('role'));
    }
    public function list_product()
    {
        $role = Auth::user()->role;
        return view('admin.list_product',compact('role'));
    }
    public function api_user()
    {
        $data = User::all();
        return DataTables::of($data)->make(true);
    }
    public function api_logproduct()
    {
        $data = Product::all();
        return DataTables::of($data)->make(true);
    }
    public function reset_password($id)
    {
        try {
            $data = User::find($id);
            $data->update([
                'password' => Hash::make('1112')
            ]);
            return response()->json(["status"=>true,"message"=>"data berhasil diupdate!","data"=>$data],200);
        } catch (\Throwable $th) {
            return response()->json(["status"=>false,"message"=>$th->getMessage()],500);
        }
        return DataTables::of($data)->make(true);
    }

    
    public function list_logbarang()
    {
        $role = Auth::user()->role;
        return view('admin.list_barang',compact('role'));
    }
    
    public function api_dashboard()
    {
        $dataA = Logbarang::where('status','=','A')->count();
        $dataB = Logbarang::where('status','=','B')->count();
        $dataC = Logbarang::where('status','=','C')->count();
        $dataUser = User::count();
        // dd($data);
        $data = [
            "dataA"=>$dataA,
            "dataB"=>$dataB,
            "dataC"=>$dataC,
            "dataUser"=>$dataUser,
        ];
        return response()->json(["status"=>true,"message"=>"Data berhasil difetch!","data"=>$data]);
    }
}
