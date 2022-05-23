<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\CarBrand;
use App\Models\Car;
use App\Models\Rental;
use Facade\Ignition\QueryRecorder\Query;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Office;
use App\Models\User;
use Mockery\Matcher\Not;
use Illuminate\Support\Collection;
use Mockery\Matcher\Any;
use PhpParser\Node\Expr\New_;

class AdminController extends Controller
{

    public function Dashboard(){
     
        $users = User::get();
        $cars = Car::get();
        $rentals = Rental::get();
        $brands = CarBrand::get();
        $offices  = Office::get();
         return view('Admin.Layouts.Dashboard',[
            'users' => $users ,
            'cars' => $cars,
            'rentals' => $rentals,
            'offices'  => $offices,
            'brands'=> $brands ,
        ]);
     }

     public function Users(){
        $Users = User::orderBy('id')->get();
        return view('Admin.Users.Users', [
            'users' => $Users ,
        ]);
     }

     public function Cars(){
        $Cars = Car::orderBy('id')->get();
        return view('Admin.Cars.Cars', [
            'Cars' => $Cars ,
        ]);
     }

     public function  Brands(){
        $Brands = CarBrand::orderBy('id')->get();
        return view('Admin.Brands.Brands', [
            'Brands' => $Brands ,
        ]);
     }

     public function  Offices(){
        $Offices = Office::orderBy('id')->get();
        return view('Admin.Offices.Offices', [
            'Offices' => $Offices ,
        ]);
     }

     public function  Rentals(){
        $Rentals = Rental::orderBy('id')->get();
        return view('Admin.Rentals.Rentals', [
            'Rentals' => $Rentals ,
        ]);
     }
     public function makeAdmin($id){
        $user = User::where('id',$id)->first();
        $user->role='Admin';
        $user->save();

        
        return redirect()->back()->with('status','Admin Added Successfully');

    }

    public function Edit($id){

        $user = User::find($id);
        return view('admin.Users.editUser',[
            'user'=>$user
        ]);
    }

    public function Add(){

        
        return view('admin.Users.AddUser');
    }

    
    public function AddUser(Request $request){

        

        // $this->validate($request,[
        //     'name'=>'required|regex:/^[\pL\s\-]+$/u',
        //     'password'=>'nullable|min:6|max:25',
        //     'email'=>'required|unique:users,email,',
        //     'phoneNumber'=>'required|numeric',
        //     'age'=>'required|numeric',
        //     'skillLevel'=>'required'


        // ]);

        $user = new User();

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
            
        }

        if($request->input('password')){
            $user->password=bcrypt($request->input('password'));
        }

        $user->save();
        return redirect('/AUsers')->with('status','User Added Successfully');
    }

    public function EditUser(Request $request,$id){

        // $this->validate($request,[
        //     'name'=>'required|regex:/^[\pL\s\-]+$/u',
        //     'password'=>'nullable|min:6|max:25',
        //     'email'=>'required|unique:users,email,',
        //     'phoneNumber'=>'required|numeric',
        //     'age'=>'required|numeric',
        // ]);

        $user = User::where('id',$id)->first();

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
            
        }

        if($request->input('password')){
            $user->password=bcrypt($request->input('password'));
        }

        $user->save();
        return redirect('/AUsers')->with('status','User Edited Successfully');
    }


    public function DeleteUser($id){

        $user = User::where('id',$id)->first();    
        $user->delete();
        return redirect()->back()->with('status','User Deleted Successfully');

    }
    
    
    public function UserSearch(Request $request){

        $Users = User::get();     

        $id = $request->input('id');
        $PhoneNumber = $request->input('PhoneNumber');
      
        $MinAge  = $request->input('MinAge');
        $MaxAge  = $request->input('MaxAge');

    
        $Result = $Users;

        if($id != "")
        {
            $Result = $Result->where('id' , '=' ,$id );
        }
        if($PhoneNumber != "")
        {
            $Result = $Result->where('phoneNumber' , '=' ,$PhoneNumber );
        }
        if($MinAge != "")
        {
            $Result = $Result->where('age' , '>=' ,$MinAge );
        }
        if($MaxAge != "")
        {
            $Result = $Result->where('age' , '<=' ,$MaxAge );
        }
      
        return view('Admin.Users.Users', [
            'users' => $Result ,
        ]);
    }


/// Car



    public function AddCar(){

        
        $Brands = CarBrand::get();
        $Offices = Office::get();
        return view('Admin.Cars.AddCar',[
            'Brands'=> $Brands,
            'Offices'=>$Offices,

        ]);
    }

    public function AAddCar(Request $request){

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
    
        return redirect('/ACars')->with('status','Car Added Successfully');
    }


    public function CarSearch(Request $request){

        $NewCars = Car::get();
        $Result =  $NewCars;


        $Brand = $request->input('Brand');
        $OwnerID = $request->input('Owner');
        $AirConditioner =$request->input('AirConditioner');
        $Transmisson=$request->input('Transmisson');
        $MinPrice = $request->input('MinPrice');
        $MaxPrice  = $request->input('MaxPrice');
        $Type = $request->input('Type');
        $Status = $request->input('Status');
             if($Brand != 'Any')
                {
                    $Result = $Result->where('Brand', $Brand);
                }
                if($OwnerID != "")
                {
                    $Result = $Result->where('Owner_id'  , '=' , $OwnerID );
                }
                if($MinPrice != "")
                {
                    $Result = $Result->where('Price' , '>=' ,$MinPrice );
                }
                if($MaxPrice != "")
                {
                    $Result = $Result->where('Price' , '<=' ,$MaxPrice );
                }
                if($AirConditioner != 'Any')
                {
                    $Result = $Result->where('AC' ,  $AirConditioner );
                }
                if($Transmisson != 'Any')
                {
                    $Result = $Result->where('Trans' ,  $Transmisson );
                }
                if($Type != 'Any')
                {
                    $Result = $Result->where('Type' ,  $Type );
                }
                if($Status != 'Any')
                {
                    $Result = $Result->where('Status' ,  $Status );
                }

                return view('Admin.Cars.Cars', [
                    'Cars' => $Result ,
                ]);
     }


    public function DeleteCar($id){

        $Car = Car::where('id',$id)->first();    
        $Car->delete();
        return redirect()->back()->with('status','Car Deleted Successfully');

    }
    

    /// Brand


    public function AddBrand(){

        
        return view('Admin.Brands.AddBrand');
    }

    
    public function AAddBrand(Request $request){

        $user = auth()->user();
        $Brands = new CarBrand ;
        $Brands->Brand = $request->input('Brand');
        $Brands->user_id = $user->id;
        if($request->hasFile('Logo')){
            $file = $request->file('Logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/Brands/',$fileName);
            $Brands->BrandLogo = $fileName;
        }else{
            $Brands->BrandLogo = 'carlogo.svg';
        }
        
        $Brands->save();

        return redirect('/ABrands')->with('status','Brand Added Successfully');
       
    }

    public function DeleteBrand($id){

        $Brand = CarBrand::where('id',$id)->first();    
        $Brand->delete();
        return redirect()->back()->with('status','Brand Deleted Successfully');

    }
    ///// Offices

    public function AddOffice(){

        
        return view('Admin.Offices.AddOffice');
    }

    
    public function AAddOffice(Request $request){

        
        $Offices = new Office ;
        $Offices->Country = $request->input('Country');
        $Offices->City = $request->input('City');
        
      
        $Offices->save();

        return redirect('/AOffices')->with('status','Office Added Successfully');
       
    }

    public function DeleteOffice($id){

        $Office = Office::where('id',$id)->first();    
        $Office->delete();
        return redirect()->back()->with('status','Office Deleted Successfully');

    }



    //// Rentals


    public function RentalSearch(Request $request){

        $Rentals = Rental::get();
        $Result =  $Rentals;


        $RenterID = $request->input('RenterID');
        $OwnerID = $request->input('OwnerID');
        $MinDate = $request->input('MinDate');
        $MaxDate  = $request->input('MaxDate');




             if($RenterID != "")
                {
                    $Result = $Result->where('Renter_id', $RenterID);
                }
                if($OwnerID != "")
                {
                    $Result = $Result->where('Owner_id'  , '=' , $OwnerID );
                }
                if($MinDate != "")
                {
    
                    $Result = $Result->where('Start_date' , '>=' ,$MinDate );
                }
                if($MaxDate != "")
                {
           
                    $Result = $Result->where('End_Date' , '<=' ,$MaxDate );
                }
           
                return view('Admin.Rentals.Rentals', [
                    'Rentals' => $Result ,
                ]);
            
                // return $MinDate;

     }

     public function DeleteRental($id){

        $Rental = Rental::where('id',$id)->first();    
        $Rental->delete();
        return redirect()->back()->with('status','Rental Deleted Successfully');

    }
}