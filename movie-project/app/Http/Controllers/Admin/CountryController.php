<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CreateRequest;
use App\Http\Requests\Country\EditRequest;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('admin.country.list', ['countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $country = new Country();
        $country->name = $request->name;
        $country->abbrev = $request->abbrev;
        $country->save();

        return redirect()->route('admin_country_list')->with('success', 'Quốc gia  '. $country->name.' được thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);
        return view('admin.country.edit', ['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $request->validate([
            'abbrev'=>['unique:country,abbrev,'. $id],
        ]);

        $country = Country::find($id);

        if(($country->name == $request->name) && ($country->abbrev == $request->abbrev))
            return redirect()->back()->with('error', 'Bạn không sửa đổi thông tin gì !!!');

        $country->name = $request->name;
        $country->abbrev = $request->abbrev;
        $country->save();

        return redirect()->route('admin_country_list')->with('success', 'Quốc gia  '. $country->name.' đã được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();

        return redirect()->route('admin_country_list')->with('success', 'Quốc gia  '. $country->name.' đã được xóa thành công');
    }
}
