<?php

namespace App\Http\Controllers;
use App\Models\CarBrand;
use App\Models\Car;
use App\Models\Rental;
use Facade\Ignition\QueryRecorder\Query;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Office;
use DateTime;
use Mockery\Matcher\Not;
use Illuminate\Support\Collection;
use Mockery\Matcher\Any;
use PhpParser\Node\Expr\New_;

class BookController extends Controller
{
    public function DatePick(){
        $Brands = CarBrand::orderBy('id')->get();
        $Offices = Office::orderBy('id')->get();
        return view('DatePick', [
            'Brands' => $Brands ,
            'Offices' => $Offices  

        ]);
     }


     public function Cars(Request $request){

        $Brands = CarBrand::orderBy('id')->get();
        
        $PickupDate = $request->input('PickupDate');
        $ReturnDate = $request->input('ReturnDate');
        $City = $request->input('City');
        return view('BrandChoose', [
            'Brands'       =>  $Brands,
            'ReturnDate'   =>  $ReturnDate,
            'PickupDate'   =>  $PickupDate,
            'City'         =>  $City

        ]);
    }
    public function ShowCars($Brand,$PickupDate,$ReturnDate,$City){


        $NewCars = DB::table('cars')
            ->whereNotIn('id', function ($query) use ($PickupDate, $ReturnDate) {
                $query->select('car_id')->from('rentals')
                    ->wherein('car_id', function ($query) use ($PickupDate, $ReturnDate) {
                        $query->select('car_id')->from('rentals')
                            ->where('Start_date', '>', $PickupDate)
                            ->where('Start_date', '<', $ReturnDate);
                    })
                    ->orwherein('car_id', function ($query) use ($PickupDate, $ReturnDate) {
                        $query->select('car_id')->from('rentals')
                            ->where('End_date', '>', $PickupDate)
                            ->where('End_date', '<', $ReturnDate);
                    })
                    ->orwherein('car_id', function ($query) use ($PickupDate, $ReturnDate) {
                        $query->select('car_id')->from('rentals')
                            ->where('Start_date', '<', $PickupDate)
                            ->where('End_date', '>', $ReturnDate);
                    })

                    ->orwherein('car_id', function ($query) use ($PickupDate, $ReturnDate) {
                        $query->select('car_id')->from('rentals')
                            ->where('Start_date', '=', $PickupDate)
                            ->where('End_date', '=', $ReturnDate);
                    });
            })
            ->get();

            $Result = $NewCars
            ->where('Brand', $Brand);
            $Result = $Result->where('Status', "Available");
            $Result = $Result->where('City',$City);

            return redirect()->back()->with(['Cars' => $Result]);
        }

        
        public function Rent($Car_id,$PickupDate,$ReturnDate,$City){
           
            $Owner = Car::where('id','=',$Car_id)->first();

            $user = auth()->user();
            $Rental = new Rental;
            $Rental->Car_id = $Car_id;
            $Rental->Owner_id = $Owner->Owner_id;
            $Rental->Renter_id = $user->id;
            $Rental->Start_date = $PickupDate;
            $Rental->End_Date = $ReturnDate;
            $Rental->City = $City;  
            $Rental->Paid = "No";  
            $Rental->TMoney  = 0; 

        
            
            $Rental->save();
        
      
            return redirect('/home')->with('status','Car Rented Successfully');

           
        }
        public function Rents(){
            return view('home');
         }
        
        public function Search(Request $request,$PickupDate,$ReturnDate,$City){


            $NewCars = DB::table('cars')
                ->whereNotIn('id', function ($query) use ($PickupDate, $ReturnDate) {
                    $query->select('car_id')->from('rentals')
                        ->wherein('car_id', function ($query) use ($PickupDate, $ReturnDate) {
                            $query->select('car_id')->from('rentals')
                                ->where('Start_date', '>', $PickupDate)
                                ->where('Start_date', '<', $ReturnDate);
                        })
                        ->orwherein('car_id', function ($query) use ($PickupDate, $ReturnDate) {
                            $query->select('car_id')->from('rentals')
                                ->where('End_date', '>', $PickupDate)
                                ->where('End_date', '<', $ReturnDate);
                        })
                        ->orwherein('car_id', function ($query) use ($PickupDate, $ReturnDate) {
                            $query->select('car_id')->from('rentals')
                                ->where('Start_date', '<', $PickupDate)
                                ->where('End_date', '>', $ReturnDate);
                        })
    
                        ->orwherein('car_id', function ($query) use ($PickupDate, $ReturnDate) {
                            $query->select('car_id')->from('rentals')
                                ->where('Start_date', '=', $PickupDate)
                                ->where('End_date', '=', $ReturnDate);
                        });
                })
                ->get();
    


                $Result  =  $NewCars->where('City',$City); ;   

                $Brand = $request->input('Brand');
                $Model = $request->input('Model');
                $AirConditioner =$request->input('AirConditioner');
                $Transmisson=$request->input('Transmisson');
                $MinPrice = $request->input('MinPrice');
                $MaxPrice  = $request->input('MaxPrice');
                $Type = $request->input('Type');
                
                if($Brand != 'Any')
                {
                    $Result = $Result->where('Brand', $Brand);
                }
                if($Model != "")
                {
                    $Result = $Result->where('Model'  , 'LIKE' , '%'.$Model.'%' );
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

                
                $Result = $Result->where('Status', "Available");
                
    
                return redirect()->back()->with(['Cars' => $Result]);
            }

            public function MyCars(){
                $user = auth()->user();
                $MyCars = Car::where('Owner_id',$user->id)->orderBy('id')->get();
                return view('Customer.MyCars', [
                    'MyCars' => $MyCars , 
        
                ]);
            }

            public function Service($Car_id){
                $MyCar = Car::where('id','=',$Car_id)->first();
                $MyCar->Status = "Disabled";
        

                $MyCar->save();
            
                return redirect('/MyCars')->with('status','Car Status Disabled Successfully');
    
               
            }

            public function ServiceEnable($Car_id){
                $MyCar = Car::where('id','=',$Car_id)->first();
                $MyCar->Status = "Available";
        

                $MyCar->save();
            
                return redirect('/MyCars')->with('status','Car Status Available Successfully');
    
               
            }


        
    
            

        
       
}