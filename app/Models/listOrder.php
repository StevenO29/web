<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class listOrder extends Model
{
    use HasFactory;
    protected $table = 'order2';
    protected $primaryKey = 'order_id';
    public function tabelorder(){
        $server = "SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));";
        $run = DB::select($server);
        $value = "SELECT o.order_id AS `ID`, c.cust_name AS `name`, SUM(od.o_qty * od.p_price) AS `subtotal`,
        o.order_status AS `status`, s.Carrier_Name AS `carrier`, s.Tracking_Num AS `tracking`,
        od.p_name AS `prod_name`, od.p_price AS `price`, od.o_qty AS `qty`
 FROM order2 o
 LEFT JOIN Customer c ON o.cust_id = c.cust_id
 LEFT JOIN Order_Details od ON o.order_id = od.order_id
 LEFT JOIN Shipping s ON s.order_id = o.order_id
 WHERE o.status_del = '0'
 GROUP BY o.order_id;       ";
        
        $selectorder = DB::select($value);
        return collect($selectorder);
    }
}