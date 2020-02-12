<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function index()
    {
        $Trade=Trade::select('name,sellprice,buyprice,traderCat')->get();
        return view('front.trader',compact("Trade"));
    }
}
