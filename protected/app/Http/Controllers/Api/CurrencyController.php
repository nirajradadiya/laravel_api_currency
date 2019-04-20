<?php
namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use App\Models\Currency;
use Input,Response;
class CurrencyController extends ApiBaseController
{

  /*
    @Description: Function for Give List Of  Sum Of Amount Base on Currency
    @Author: Niraj
    @Input: - username
    @Output: - return users videos total size
    @Date: 17-04-2019
  */   
 
  public function getTotalBaseOnCurrency() 
  {
    try
    {
      $flag = false;
      $code = UNSUCCESS;
      $msg = MSG_UNSUCCESS;
      $http_code = HTTP_SUCCESS;
      $parameter = Input::all();
      $response = array();
      
      $currencyTotalList = Currency::getCurrencyWithTotalAmount();
      if(count($currencyTotalList))
      {
        foreach($currencyTotalList as $key=>$value)
        {
            if(is_null($value['currency_total']) || $value['currency_total'] == '0')
                unset($currencyTotalList[$key]);
        }

        $response['current_with_total_amount'] = $currencyTotalList;
        $flag = true;
        $code = SUCCESS;
        $msg = MSG_SUCCESS;
        
      }
    }
    catch (\Exception $e) {
        $response = array();
        $code = ERROR_IN_API_LARAVEL_TRY_CATCH;
        $msg = $e->getMessage(); 
    }
    if($code != SUCCESS)
    {
      $response = (object)$response;
    }
    return response(array('code' => $code,'msg' => $msg,"flag"=>$flag,'data' => $response),$http_code);
  }


}
  