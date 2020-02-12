<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function index()
    {
        $Trade=Type::select('name','subtype','sellprice','buyprice','traderCat')
            ->where('buyprice','!=','-1')
            ->orderBy('subtype','asc')
            ->get();
        return view('front.trader',compact("Trade"));
    }
}
