<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $primaryKey="name";
    public $timestamps=false;
    protected $table="items";
    protected $fillable=['name','category','type','lifetime','quantmin','nominal','cost','quantmax','min','restock','Military','Prison','School','Coast','Village','Industrial','Medic','Police',
        'Hunting','Town','Farm','Firefighter','Office','Tier1','Tier2','Tier3','Tier4','shelves','floor','count_in_cargo','count_in_hoarder','count_in_map','count_in_player','crafted',
        'deloot','ingameName','rarity','mods','subtype','buyprice','sellprice','traderCat','traderExclude'];
}
