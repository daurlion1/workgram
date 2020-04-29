<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebBaseController;
use App\Http\Requests\Web\CityStoreAndUpdateRequest;
use App\Models\City;


class CityController extends WebBaseController
{
    public function index() {
        $cities = City::all();
        return view('admin.city.index', compact('cities'));
    }

    public function create() {
        $city = new City();
        if(!empty($city)) $city = null;
        return view('admin.city.create', compact('city'));

    }

    public function store(CityStoreAndUpdateRequest $request) {


        City::create([
            'name' => $request->name,
        ]);
        $this->added();
        return redirect()->route('city.index');
    }


    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('admin.city.edit', compact('city'));

    }

    public function update($id, CityStoreAndUpdateRequest $request)
    {
        $city = City::findOrFail($id);
        $city->update([
            'name' => $request->name,
        ]);
        $this->edited();
        return redirect()->route('city.index');
    }

}
