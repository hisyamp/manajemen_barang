<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use DataTables;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function list_product()
    {
        $role = auth::user()->role;
        // dd($role);
        return view('product.list_product',compact('role'));
    }

    public function form_product()
    {
        $role = auth::user()->role;
        // dd($role);
        return view('product.form_product',compact('role'));
    }

    public function api_logproduct($time)
    {
        $data = Product::where('created_at','=',$time)->get();
        return DataTables::of($data)->make(true);
    }

    public function pengembalian(Request $request)
    {
        try {
            $datapost = $request->all();
            // dd($data);
            $arr = [];
            foreach($datapost as $data => $d){
                // dd($data);
                if($d == null){
                    $datapost[$data] = "yes";
                }
            }
            return $datapost;
            $request->request->add([
                "status" => "A",
                "user_id" => auth::user()->id,
                "tanggal_pengembalian" => now(),
            ]);
            // dd($request->all());
            $data = Logbarang::create($request->all());
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        
        return response()->json(["status"=>true,"message"=>"Data berhasil disimpan!","data"=>$data]);
    }
}
