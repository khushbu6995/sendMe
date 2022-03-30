<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Repository\CountryRepository;
use App\Services\CountryManagement;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\countryRequest;
class CountryCountroller extends Controller
{
    public $country_repo;
    public function __construct(CountryRepository $country_repo)
    {
    $this->country_repo = $country_repo;
    }

    /**
    * get data from country
    * @author Khushbu Waghela
    */
    public function index()
    {
        return Country::all();
    }

    /**
    * add new country form
    * @author Khushbu Waghela
    */
    public function addCountry()
    {
        return view('add_country');
    }

    /**
    * @param $request
    * add new country 
    * @author Khushbu Waghela
    */
    public function insertCountry(Request $request)
    {
        $insertFields=[
            'name'=>$request->name,
            'code'=>$request->code,
        ];
        $class = App::make(CountryManagement::class);
        $result=$class->insertRecord($insertFields);
        return $result;
    }

    /**
    * edit country form
    * @author Khushbu Waghela
    */
    public function editCountry($id)
    {
        $country=$this->country_repo->id_find($id);
        return view('edit_country',compact('country'));
    }

    /**
    * @param $request
    * edit existing country
    * @author Khushbu Waghela
    */
    public function updateCountry(Request $request)
    {
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'code'=>$request->code,
        ];
        $class = App::make(CountryManagement::class);
        $result=$class->updateRecord($update);
        return $result;
    }

    /**
    * @param $id
    * delete existing country
    * @author Khushbu Waghela
    */
    public function deleteCountry($id)
    {
        $class = App::make(CountryManagement::class);
        $result=$class->deleteRecord($id);
        return $result;
    }

}
