<?php
namespace App\Models;
use App\Models\OcModel;
use Illuminate\Database\Eloquent\Model;
class Currency extends OcModel
{
    public $timestamps = true;
    protected $table = TBL_CURRENCY;    

    public function currency_amounts()
    {
        return $this->hasmany('App\Models\Amount','currency_id');
    }

    public static function getCurrencyWithTotalAmount() 
    {
    	return self::get(
			array(
					'currency_symbol',
					\DB::raw("(select IF(sum(final_amt),sum(final_amt),'0') from ".TBL_AMOUNT." tbla where tbla.currency_id =  ".TBL_CURRENCY.".id) currency_total")
			)
		);
    }
}
