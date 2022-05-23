<?php

namespace App\Http\Controllers;

use App\Models\Car;
use  App\Models\CarBrand;
use Illuminate\Http\Request;


class PostsController extends Controller
{ 
    public function create(){

        return view('posts.create');
    }

    public function AddBrand(Request $request){

        $user = auth()->user();
        $Brands = new CarBrand ;
        $Brands->Brand = $request->input('CarBrand');
        $Brands->user_id = $user->id;
        if($request->hasFile('BrandLogo')){
            $file = $request->file('BrandLogo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/Brands/',$fileName);
            $Brands->BrandLogo = $fileName;
        }else{
            $Brands->BrandLogo = 'carlogo.svg';
        }
        
        $Brands->save();

        return redirect()->back()->with('status','Brand Added Successfully');
       
}

public function AddCar(Request $request){

    $user = auth()->user();
    $Car = new Car;
    $Car->Brand = $request->input('Brand');
    $Car->Owner_id = $user->id;
    $Car->Information = $request->input('Details');
    $Car->Price = $request->input('Cost');
    $Car->Model = $request->input('Model');
    $Car->Status = "Available";
    $Car->City =  $request->input('City');
    $Car->Trans = $request->input('Trans');
    $Car->AC= $request->input('AC');
    $Car->Type = $request->input('Type');

    if($request->hasFile('CarImage')){
        $file = $request->file('CarImage');
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $file->move('uploads/Car/',$fileName);
        $Car->Image = $fileName;
    }else{
        $Car->Image = 'carlogo.svg';
    }
    
    $Car->save();

    return redirect()->back()->with('status','Car Added Successfully');
}
}