<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class AddressController extends Controller
{
    public function getRegencies($id) {        
        $listRegency = Regency::where("province_id",$id)->pluck("name","id");
        return json_encode($listRegency);

    }

    public function getDistricts($id) {        
        $listDistrict = District::where("regency_id",$id)->pluck("name","id");
        return json_encode($listDistrict);

    }

    public function getVillages($id) {        
        $listVillage = Village::where("district_id",$id)->pluck("name","id");
        return json_encode($listVillage);
    }
}
