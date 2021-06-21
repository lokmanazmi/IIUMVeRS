<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant;
use App\Models\Admin;
use App\Models\Vehreg;
use App\Models\Vehicle;
use DB;


class RecordsViewController extends Controller
{
   public function records()
   {

        $data = Vehreg::join('vehicles', 'vehicles.plateno', '=', 'vehregs.plateno')
        ->join('applicants', 'applicants.username', '=', 'vehicles.username')
        ->where('vehregs.status', '=', ('Approved'))
        ->orderBy('updated_at', 'DESC')
        ->get(['vehicles.plateno','applicants.name', 'applicants.username', 'vehicles.type', 'vehicles.brand', 'vehicles.model', 'vehregs.updated_at', 'vehregs.status', 'vehregs.expDate', 'vehregs.stickerNo']);
   
        return view('records', compact('data'));
   
   }

   public function rejectedrecords()
   {
        $rejecteddata = Vehreg::join('vehicles', 'vehicles.plateno', '=', 'vehregs.plateno')
        ->join('applicants', 'applicants.username', '=', 'vehicles.username')
        ->where('vehregs.status', '=', ('Rejected'))
        ->orderBy('updated_at', 'DESC')
        ->get(['vehicles.plateno','applicants.name', 'applicants.username', 'vehicles.type', 'vehicles.brand', 'vehicles.model', 'vehregs.updated_at', 'vehregs.status', 'vehregs.rejectedReason']);
        
        return view('rejectedrecords', compact('rejecteddata'));
   
   }

   public function revokedrecords()
   {
 
        $revokeddata = Vehreg::join('vehicles', 'vehicles.plateno', '=', 'vehregs.plateno')
        ->join('applicants', 'applicants.username', '=', 'vehicles.username')
        ->where('vehregs.status', '=', ('Revoked'))
        ->orderBy('updated_at', 'DESC')
        ->get(['vehicles.plateno','applicants.name', 'applicants.username', 'vehicles.type', 'vehicles.brand', 'vehicles.model', 'vehregs.updated_at', 'vehregs.status', 'vehregs.revokedReason']);

        return view('revokedrecords', compact('revokeddata'));
   
   }

}