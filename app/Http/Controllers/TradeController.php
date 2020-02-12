<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function index()
    {
        $Trade=Type::select('name','sellprice','buyprice','traderCat')
            ->where('buyprice','!=','-1')->
            get();
        return view('front.trader',compact("Trade"));
    }
}
