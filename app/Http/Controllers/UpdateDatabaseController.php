<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Vehicle;
use App\Models\Vehreg;
use App\Models\Applicant;


class UpdateDatabaseController extends Controller
{
    
   public function update(Request $request)
   {
      

      $request->validate([
         'plateno' => 'required|string|max:255',
         'type' => 'required|string|max:255',
         'colour' => 'required|string|max:255',
         'brand' => 'required|string|max:255',
         'model' => 'required|string|max:255',
     ]);

     $user = Auth::user()->username;

      $vehicles = new Vehicle([
         'plateno' => $request->get('plateno'),
         'username' =>($user),
         'type' => $request->get('type'),
         'colour' => $request->get('colour'),
         'brand' => $request->get('brand'),
         'model' => $request->get('model'),
      ]);

      $user = Auth::user()->username;

      $vehregs = new Vehreg([
         'plateno' => $request->get('plateno'),
         'username' =>($user),
         'status'=>('Pending'),
      ]);

         

      $vehicles->save();
      $vehregs->save();
    
       return redirect(RouteServiceProvider::HOME);
   }
}
