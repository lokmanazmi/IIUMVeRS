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

class ApprovalController extends Controller
{
    public function showApplicants($username)
    {
        
          $applicant = Applicant::join('users', 'users.username', '=', 'applicants.username')
                            ->where('applicants.username', '=', ($username))
                                   ->get(['applicants.username','applicants.name', 'applicants.phoneno', 'applicants.email', 'applicants.type', 'applicants.status']);
            
          $vehreg = Vehreg::join('users', 'users.username', '=', 'vehregs.username')
                            ->join('vehicles', 'vehicles.username', '=', 'users.username')
                            ->join('applicants', 'applicants.username', '=', 'users.username')
                            ->where('vehregs.username', '=', ($username))
                                   ->get(['vehicles.type','vehicles.plateno', 'vehicles.brand', 'vehicles.model']);


        return view('approval', ['applicants'=>$applicant], ['vehregs'=>$vehreg]);
    }

    public function showApplicantsRejected($username)
    {
        
          $applicant = Applicant::join('users', 'users.username', '=', 'applicants.username')
               ->where('applicants.username', '=', ($username))
                    ->get(['applicants.username','applicants.name', 'applicants.phoneno', 'applicants.email', 'applicants.type', 'applicants.status']);
            
          $vehreg = Vehreg::join('users', 'users.username', '=', 'vehregs.username')
                    ->join('vehicles', 'vehicles.username', '=', 'users.username')
                    ->join('applicants', 'applicants.username', '=', 'users.username')
                    ->where('vehregs.username', '=', ($username))
                    ->get(['vehicles.type','vehicles.plateno', 'vehicles.brand', 'vehicles.model']);

        return view('rejectApplicants', ['applicants'=>$applicant], ['vehregs'=>$vehreg]);
    }


   public function approveStatus(Request $request, $username)
   {
   
        $applicants = DB::table('applicants')
        ->where('username', $username)
        ->update(['status' => ('Approved')]);

        $vehregs = DB::table('vehregs')
        ->where('username', $username)
        ->update(['status' => ('Approved')]);

        $vehregs = DB::table('vehregs')
        ->where('username', $username)
        ->update(['stickerNo' => $request->get('stickerNo')]);

        $vehregs = DB::table('vehregs')
        ->where('username', $username)
        ->update(['expDate' => $request->get('expDate')]);

        $user = Auth::user()->username;

        $vehregs = DB::table('vehregs')
        ->where('username', $username)
        ->update(['admin' => ($user)]);

        return redirect(RouteServiceProvider::HOME);
   }

   public function rejectStatus(Request $request, $username)
   {
   
        $applicants = DB::table('applicants')
        ->where('username', $username)
        ->update(['status' => ('Rejected')]);

        $vehregs = DB::table('vehregs')
        ->where('username', $username)
        ->update(['status' => ('Rejected')]);

        $vehregs = DB::table('vehregs')
        ->where('username', $username)
        ->update(['rejectedReason' => $request->get('rejectedReason')]);

        return redirect(RouteServiceProvider::HOME);
   }
}
