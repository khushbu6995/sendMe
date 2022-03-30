<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\App;
use App\Services\CityManagement;
use App\Repository\CityRepository;
use App\Repository\StateRepository;
use App\Repository\CountryRepository;
use App\Http\Requests\cityRequest;
class cityController extends Controller
{
    public $city_repo;
    public $state_repo;
    public $country_repo;
    public function __construct(CityRepository $city_repo,StateRepository $state_repo,CountryRepository $country_repo)
    {
    $this->city_repo = $city_repo;
    $this->state_repo = $state_repo;
    $this->country_repo = $country_repo;
    }

    /**
    * get data from city
    * @author Khushbu Waghela
    */
    public function index()
    {
        return City::all();
    }

    /**
    * add new city form
    * @author Khushbu Waghela
    */
    public function addCity()
    {
        $countries=Country::all();
        $states=State::all();
        return view('add_city',compact('states','countries'));
    }

    /**
    * @param $request
    * add new city 
    * @author Khushbu Waghela
    */
    public function insertCity(Request $request)
    {
        $insertFields=[
            'name'=>$request->name,
            'state_id'=>$request->state,
            'country_id'=>$request->country,
        ];
        $class = App::make(CityManagement::class);
        $result=$class->insertRecord($insertFields);
        return $result;
    }

    /**
    * edit city form
    * @author Khushbu Waghela
    */
    public function editCity($id)
    {
    $city=$this->city_repo->id_find($id);
    $states=$this->state_repo->all_record();
    $countries=$this->country_repo->all_record();
    return view('edit_city',compact('city','states','countries'));
    }

    /**
    * @param $request
    * edit existing city
    * @author Khushbu Waghela
    */
    public function updateCity(Request $request)
    {
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'state_id'=>$request->state,
            'country_id'=>$request->country,
        ];
        $class = App::make(CityManagement::class);
        $result=$class->updateRecord($update);
        return $result;
    }

    /**
    * @param $id
    * delete existing city
    * @author Khushbu Waghela
    */
    public function deleteCity($id)
    {
        $class = App::make(CityManagement::class);
        $result=$class->deleteRecord($id);
        return $result;
    }
}
