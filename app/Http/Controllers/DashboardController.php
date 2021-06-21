<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\Applicant;
use App\Models\Admin;
use App\Models\Vehreg;
use App\Models\Vehicle;
use App\Models\User;



class DashboardController extends Controller
{


   public function index()
   {
       if(Auth::user()->hasRole('user')){

          $user = Auth::user()->username;

          $data = Applicant::join('users', 'users.username', '=', 'applicants.username')
                            ->where('applicants.username', '=', ($user))
                                   ->get(['applicants.username','applicants.name', 'applicants.phoneno', 'applicants.email', 'applicants.type', 'applicants.status']);
            
          $vehreg = Vehreg::join('users', 'users.username', '=', 'vehregs.username')
                            ->join('vehicles', 'vehicles.username', '=', 'users.username')
                            ->join('applicants', 'applicants.username', '=', 'users.username')
                            ->where('vehregs.username', '=', ($user))
                                   ->get(['vehicles.type','vehicles.plateno', 'vehicles.brand', 'vehicles.model', 'vehregs.updated_at', 'vehregs.expDate', 'vehregs.stickerNo', 'applicants.status','vehregs.revokedReason', 'vehregs.rejectedReason']);


            return view('userdash', compact('vehreg'), compact('data'));
       }elseif(Auth::user()->hasRole('admin')){  

        $data = Vehreg::join('vehicles', 'vehicles.plateno', '=', 'vehregs.plateno')
                    ->join('applicants', 'applicants.username', '=', 'vehicles.username')
                    ->where('vehregs.status', '=', ('Pending'))
                    ->orderBy('created_at', 'ASC')
                    ->get(['applicants.username','vehicles.plateno', 'applicants.name', 'applicants.type', 'vehregs.status', 'vehregs.created_at',]);

        return view('dashboard', compact('data'));
   }
   }

   public function myprofile()
   {
    return view('myprofile');
   }

  

   
}