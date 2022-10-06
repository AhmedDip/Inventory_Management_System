<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StrategicPartnerController extends Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->menu['main_menu'] = 'landingPage';
        $this->menu['sub_menu'] = 'partner';
   
        $this->menu['user'] = User::find(1);
        $this->menu['count']=  $this->menu['user']->unreadNotifications->count();
    }


 
    public function index()
    {
     
        $partners = Partner::all();


        return view('StrategicPartners.partners',['partner'=> $partners],$this->menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('StrategicPartners.create',$this->menu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {

        $Partner = new Partner();
        $Partner->name = $request->name;
        
        if ($request->file('image')) {
            $file = $request->file('image')->store('Image', 'public');
            $Partner->image = $file;
        }

        $save = $Partner->save();

        if($save)
        {
            toast('Strategic Partner Created Successfully!', 'success');
        }        
          return redirect()-> to(route('partners.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $partners = Partner::findorFail($id);
        return view('StrategicPartners.edit',["partner"=>$partners],$this->menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, $id)
    {

        $id = $request->id;

        $partner = Partner::find($id);
        $partner->name = $request->name;

        if ($request->hasFile('image')) {
            $des = 'public/' . $partner->image;
            if (Storage::exists($des)) {
                // unlink($des);
                Storage::delete($des);
                // File::delete($des);
            }
            $partners = $request->file('image')->store('Image', 'public');
            $partner->image = $partners;
        }
        $save = $partner->save();
        if($save)
        {
            toast('Strategic Partner Updated Successfully!', 'success');
        }    
        return redirect()->route('partners.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy ($id)
    {

        $destroy = Partner::find($id);

        if ($destroy) {
            // File::delete($des);
            Storage::delete('public/' . $destroy->image);
            $destroy->delete();
            toast('Strategic Partner Deleted Successfully!', 'error');
        }
       
        return redirect()->to(route('partners.index'));
    }
}


