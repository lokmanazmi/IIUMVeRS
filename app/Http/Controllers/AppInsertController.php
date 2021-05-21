<?php
namespace App\Http\Controllers;

use App\AppInsert;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AppInsertController extends Controller
{
	public function index()
   {
	   return view('application');
   }

    
    public function insert(){
        // $urlData = getURLList();
        // return view('application');
		// $vehicle = new AppInsert;
        
        $vehicle->plateNo = request('plateNo');
        $vehicle->colour = request('colour');
        $vehicle->type = request('type');
        $vehicle->brand = request('brand');
		$vehicle->model = request('model');
        $vehicle->save();
    }
	
    public function create(Request $request){
        $rules = [
			'plateNo' => 'required|string|min:3|max:255',
			'colour' => 'required|string|min:3|max:255',
			'type' => 'required|string|max:255',
			'brand' => 'required|string|max:255',
			'model' => 'required|string|max:255'
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('insert')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$vehicle = new vehicle;
                $vehicle->plateNo = $data['plateNo'];
                $vehicle->colour = $data['colour'];
				$vehicle->type = $data['type'];
				$vehicle->brand = $data['brand'];
				$vehicle->model = $data['model'];
				$vehicle->save();
				return redirect('insert')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('insert')->with('failed',"operation failed");
			}
		}
    }
}