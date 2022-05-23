<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use App\Models\Car;
use App\Models\Office;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Car');
    }

    public function Profile(){

        $user = auth()->user();
        $id = $user->id;
        $user = User::find($id);
        return view('Profile',[
            'user'=>$user,
        ]);
    }

    public function Edit(Request $request){

        $user = auth()->user();
        $id = $user->id;

        $this->validate($request,[
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'email'=>'required|unique:users,email,'.$id,
            'phoneNumber'=>'required|numeric',
            'age'=>'required|numeric',
        ]);
    
        $user = auth()->user();

        $user = User::where('id',$user->id)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->age = $request->input('age');

        if($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/users/',$fileName);
            $user->profile_image = $fileName;
        }else{
            $user->profile_image = "Usericon.png";
        }
        $user->save();

        return redirect()->back()->with('status','User Edited Successfully');
    }
    

    public  function Brands(){
        $Brands = CarBrand::orderBy('id')->get();
    
        return view('BrandChoose', [
            'Brands' => $Brands
        ]);    
    }
    public  function Cars(){
        $Brands = CarBrand::orderBy('id')->get();
        $Offices = Office::orderBy('id')->get();
    
        return view('AddCar', [
            'Brands' => $Brands,
            'Offices' => $Offices
        ]);
    }
    public  function Models($Brand){
        $Cars2 = Car::where('Brand',$Brand)->get();
        return view('RentCars', [
            'Cars' => $Cars2
        ]);    
    }
    
    public  function MyRentals(){
        $user =  auth()->user();  

        $MyRentals = DB::table('rentals')
        ->join('cars', function($join) use($user)
        {
            $join->on('cars.id', '=', 'rentals.Car_id')
                ->where('rentals.Renter_id', '=', $user->id);
        })
        ->select(DB::raw('rentals.id as rentalsid , rentals.Start_date ,  rentals.End_Date , cars.Image , cars.Model  , rentals.City  , rentals.Paid'))
        ->get();


        return view('Customer.MyRentals', [
            'MyRentals' => $MyRentals,
        ]);    
        // return $MyRentals;
    }


    public function Pay($rentalsid){
     
        $Rental = Rental::where('id','=' , $rentalsid)->first();
        $Rental->Paid = "Yes";
        $Rental->save();

        return view('Choice');

    }
    public function Cancel($rentalsid){
        $Rental = Rental::where('id','=' , $rentalsid)->first();
        $Rental->delete();
        return view('Choice');
    }


    public function Choice(){
        $user = auth()->user();
        return view('Choice');
    }
}