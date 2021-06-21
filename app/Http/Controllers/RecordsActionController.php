<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Vehicle;
use App\Models\Vehreg;
use App\Models\Applicant;
use DB;

class RecordsActionController extends Controller
{
    public function showRecordDetails($username)
    {
        
          $applicant = Applicant::join('users', 'users.username', '=', 'applicants.username')
                            ->where('applicants.username', '=', ($username))
                                   ->get(['applicants.username','applicants.name', 'applicants.phoneno', 'applicants.email', 'applicants.type', 'applicants.status']);
            
          $vehreg = Vehreg::join('users', 'users.username', '=', 'vehregs.username')
                            ->join('vehicles', 'vehicles.username', '=', 'users.username')
                            ->join('applicants', 'applicants.username', '=', 'users.username')
                            ->where('vehregs.username', '=', ($username))
                                   ->get(['vehicles.type','vehicles.plateno', 'vehicles.brand', 'vehicles.model']);
                                   


        return view('recordsaction', ['applicants'=>$applicant], ['vehregs'=>$vehreg]);
    }

    public function revokeStatus(Request $request, $username)
   {
   
        $applicants = DB::table('applicants')
        ->where('username', $username)
        ->update(['status' => ('Revoked')]);

        $vehregs = DB::table('vehregs')
        ->where('username', $username)
        ->update(['status' => ('Revoked')]);

        $vehregs = DB::table('vehregs')
        ->where('username', $username)
        ->update(['revokedReason' => $request->get('revokedReason')]);

        $user = Auth::user()->username;

        $vehregs = DB::table('vehregs')
        ->where('username', $username)
        ->update(['admin' => ($user)]);
       

    
       
        return redirect(RouteServiceProvider::HOME);
   }
}
