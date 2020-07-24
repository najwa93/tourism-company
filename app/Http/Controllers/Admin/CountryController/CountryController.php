<?php

namespace App\Http\Controllers\Admin\CountryController;

use App\Models\Admin\Country\Country;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('Role:Role_Admin,Role_Country_Manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('Admin.CountryManagement.Index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.CountryManagement.Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'countryname' => 'required|string',
        ],[
            'countryname.required' => ' The country name field is required.',
        ]);

        $country = new Country();
        if ($request->hasFile('image')){
            $this->validate($request,[
                'image' => 'image',
            ],[
                'image.required' => ' The image field is required.',
            ]);

            $flagImg = $request->file('image');
            $path = $flagImg->storeAs('flag',$flagImg->getClientOriginalName(),'images');
            $country->img_path = $path;
        }
        $country->name = $request->input('countryname');

        $country->save();
        return redirect()->route('Countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($country_id)
    {
        $country = Country::where('id',$country_id)
        ->with('city')
        ->first();
        //return $country;
        $data = [];
        $allData = [];
            $data['country'] = $country['name'];
            foreach ($country['city'] as $value) {
                $data['city_id'] = $value['id'];
                $data['city'] = $value['name'];
                array_push($allData,$data);
            }

        //return $allData;
        return view('Admin.CountryManagement.Show',compact(['allData','country']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($country_id)
    {
         $country = Country::findOrfail($country_id);
        return view('Admin.CountryManagement.Update',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $country_id)
    {
        $country = Country::findOrfail($country_id);
        if ($request->has('countryname')){
            $this->validate($request,[
                'countryname' => 'required|string',
            ],[
                'countryname.required' => ' The country name field is required.',
            ]);
            $country->name = $request->input('countryname');
        }
        if ($request->hasFile('image')){
            $this->validate($request,[
                'image' => 'image',
            ],[
                'image.required' => ' The image field is required.',
            ]);

            $flagImg = $request->file('image');
            $path = $flagImg->storeAs('flag',$flagImg->getClientOriginalName(),'images');
            $country->img_path = $path;
        }

        $country->save();

        return redirect()->route('Countries.index');
    }

    public function delete($country_id){
        $country = Country::findOrfail($country_id);

        return view('Admin.CountryManagement.Delete',compact('country'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($country_id)
    {
        $country = Country::findOrfail($country_id);
        try{
            $flagImg = unlink(public_path('/images/'.$country->img_path));
            $country->delete();
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->route('Countries.index');

    }
}
