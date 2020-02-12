<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function index()
    {
        return view('front.trader');
    }
}
