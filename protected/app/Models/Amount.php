<?php
namespace App\Models;
use App\Models\OcModel;
use Illuminate\Database\Eloquent\Model;
class Amount extends OcModel
{
    public $timestamps = true;
    protected $table = TBL_AMOUNT;
}
