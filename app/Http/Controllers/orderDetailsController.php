<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listOrderDetails;
use Illuminate\Support\Facades\DB;

class orderDetailsController extends Controller
{
    
    public function tabelorderDetail(){
       
         $user = new listOrderDetails();
         $listOrderBarangDetails = $user->tabelorderDetail();
         return view('orderdetails',compact(['listOrderBarangDetails']));
     }

    // public function show($id)
    // {
    //     $order = orderDetailsController::find($id);
    //     if ($order) {
    //         return view('orderdetails.show', compact('order'));
    //     } else {
    //         return redirect()->back()->with('error', 'Order not found');
    //     }
    // }
    
}
