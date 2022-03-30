<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use Illuminate\Support\Facades\App;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Services\AreaManagement;
use App\Repository\AreaRepository;
use App\Repository\CityRepository;
use App\Repository\StateRepository;
use App\Repository\CountryRepository;
use App\Http\Requests\areaRequest;
class areaController extends Controller
{
    public $area_repo;
    public $city_repo;
    public $state_repo;
    public $country_repo;
    public function __construct(AreaRepository $area_repo,CityRepository $city_repo,StateRepository $state_repo,CountryRepository $country_repo)
    {
      $this->area_repo = $area_repo;
      $this->city_repo = $city_repo;
      $this->state_repo = $state_repo;
      $this->country_repo = $country_repo;
    }

    /**
    * get data from area
    * @author Khushbu Waghela
    */
    public function index()
    {
        return Area::all();
    }

    /**
    * add new area form
    * @author Khushbu Waghela
    */
    public function addArea()
    {
        $cities=City::all();
        $countries=Country::all();
        $states=State::all();
        return view('add_area',compact('cities','states','countries'));
    }

    /**
    * @param $request
    * add new area 
    * @author Khushbu Waghela
    */
    public function insertArea(Request $request)
    {
        $insertFields=[
            'name'=>$request->name,
            'city_id'=>$request->city,
            'state_id'=>$request->state,
            'country_id'=>$request->country,
        ];
        $class = App::make(AreaManagement::class);
        $result=$class->insertRecord($insertFields);
        return $result;
    }

    /**
    * edit area form
    * @author Khushbu Waghela
    */
    public function editArea($id)
    {
    $area=$this->area_repo->id_find($id);
    $cities=$this->city_repo->all_record();
    $states=$this->state_repo->all_record();
    $countries=$this->country_repo->all_record();
    // dd($cities);
    return view('edit_area',compact('area','cities','states','countries'));

    }

    /**
    * @param $request
    * edit existing area
    * @author Khushbu Waghela
    */
    public function updateArea(Request $request)
    {
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'city_id'=>$request->city,
            'state_id'=>$request->state,
            'country_id'=>$request->country,
        ];
        $class = App::make(AreaManagement::class);
        $result=$class->updateRecord($update);
        return $result;
    }

    /**
    * @param $id
    * delete existing area
    * @author Khushbu Waghela
    */
    public function deleteArea($id)
    {
        $class = App::make(AreaManagement::class);
        $result=$class->deleteRecord($id);
        return $result;
    }
}
