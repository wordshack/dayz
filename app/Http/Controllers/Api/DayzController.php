<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class DayzController extends Controller
{
    public function getTrader()
    {
        $trade=Type::select('name','subtype','sellprice','buyprice','traderCat',"mods")
            ->where('buyprice','!=','-1')
            ->orderBy('subtype','asc')
            ->get();

        return $trade;
    }

    public function getItemsAll()
    {
        $trade=Type::select('name',"mods","buyprice")
            ->where('buyprice','=','-1')
            ->orderBy('mods','asc')
            ->get();

        return $trade;
    }

    public function getFindItem($item)
    {
        $trade=Type::select('name','subtype','sellprice','buyprice','traderCat',"mods")
            ->where('name','=',$item)
            ->limit(1)
            ->get();
        return $trade;
    }


    public function getCategoriaTrader(){
        $trade=Type::select('subtype')
            ->distinct()
            ->where('subtype','!=','')
            ->get();
        return $trade;
    }

    public function setUpdateTrader(Request $request){
        $trade=Type::findOrFail($request->name);
        $trade->subtype=$request->subtype;
        $trade->buyprice=$request->buyprice;
        $trade->sellprice=$request->sellprice;
        $trade->traderCat=$request->traderCat;
        $trade->save();
    }

    public function setDeleteTrader(Request $request){
        $trade=Type::findOrFail($request->name);
        $trade->buyprice='-1';
        $trade->sellprice='-1';
        $trade->traderCat='*';
        $trade->save();
    }
}
