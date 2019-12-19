<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerSite;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function CustomerIndex(){
        $cust=Customer::all();

        return view('customer.listcustomer',[
            'cust'=>$cust]);
    }
    public function CustomerStore(Request $req){
        $id=$req->id;
        $cust=$req->cust_name;

        $sql=Customer::where('id',$id);
        $C=$sql->count();

        if ($C==0) {
            Customer::insert(['cust_name'=>$cust]);
        }else{
            $sql->update(['cust_name'=>$cust]);
        }
        return redirect()->back();
    }
    public function CustomerEdit($id){
        $sql=Customer::where('id',$id)->first();

        return response()->json($sql);
    }
    public function CustomerDestroy($id){
        $isi=Customer::with('customerSites')->where('id',$id)->delete();

        return response()->json($isi);
    }

//CUSTOMER SITE
    public function CustomerSiteIndex(){
        $cust=Customer::with('customerSites')->get();

        return view('customer.listcustsite',[
            'cust'=>$cust]);
    }
    public function CustomerSiteStore(Request $req){
        $id=$req->id;
        $idCust=$req->cust;
        $name=$req->name;
        $pic=$req->pic;
        $phone=$req->phone;
        $add=$req->address;

        $sql=CustomerSite::where('id',$id);
        $C=$sql->count();

        if ($C==0) {
            CustomerSite::insert(['customer_id'=>$idCust,'customer_site'=>$name,'pic'=>$pic,'phone'=>$phone,'address'=>$add]);
        }else{
            $sql->update(['customer_id'=>$idCust,'customer_site'=>$name,'pic'=>$pic,'phone'=>$phone,'address'=>$add]);
        }
        return redirect()->back();
    }
    public function CustomerSiteEdit($id){
        $sql=CustomerSite::where('id',$id)->first();

        return response()->json($sql);
    }
    public function CustomerSiteDestroy($id){
        $isi=CustomerSite::where('id',$id)->delete();

        return response()->json($isi);
    }
}
