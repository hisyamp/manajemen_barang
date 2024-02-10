<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Productlog;
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
        $role = auth::user()->role_id;
        // dd($role);
        return view('product.list_product',compact('role'));
    }

    public function form_product()
    {
        $role = auth::user()->role_id;
        // dd($role);
        $product = Product::all();
        return view('product.form_product',compact('role','product'));
    }

    public function api_logproduct($time)
    {
        $data = Product::where('created_at','=',$time)->get();
        return DataTables::of($data)->make(true);
    }

    public function product(Request $request)
    {
        try {
            $datapost = $request->all();
            $dataExisting = Productlog::where('product_id','=',$request->product)
            ->whereDate('created_at', '=', now())
            ->first();

            // dd($dataExisting);
            if(isset($dataExisting)){
                $dataExisting->update([
                    "qty" => $request->qty,
                    "submited_by" => auth::user()->id,
                    'updated_at' => now()
                ]);
                return response()->json(["status"=>true,"message"=>"Data berhasil diupdate!","data"=>$dataExisting]);
            }else{
                $request->request->add([
                    "product_id" => $request->product,
                    "qty" => $request->qty,
                    "submited_by" => auth::user()->id,
                    "cabang_id" => auth::user()->cabang_id,
                ]);
                $data = Productlog::create($request->all());
                return response()->json(["status"=>true,"message"=>"Data berhasil disimpan!","data"=>$data]);
            }
            // dd($request->all());
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        
        
    }
}
