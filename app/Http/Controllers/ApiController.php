<?php

namespace App\Http\Controllers;

use App\Leads;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getAllLeads(){
        // get all Leads data 
        $leads = Leads::get()->toJson(JSON_PRETTY_PRINT);
        return response($leads,200);

    }
    public function createLeads(Request $request){
        // create Leads data
        $leads = new Leads;
        $leads->leadid = $request->leadid; 
        $leads->date = $request->date;
        $leads->name = $request->name;
        $leads->email = $request->email;
        $leads->phone = $request->phone;
        $leads->prodi = $request->prodi;
        $leads->source = $request->source;
        $leads->media = $request->media;
        $leads->save();

        return response()->json([
            "message" => "Leads record created"
        ],201);

    }
    public function getLeads($id){
        // get Leads data by Id
        if (Leads::where('id', $id)->exists()){
            $leads = Leads::where('id',$id)->get()->toJson(JSON_PRETTY_PRINT);
            return response ($leads,200);
        }
        else {
            return response()->json([
                "message" => "Leads ID not found"
            ],404);
        }
    }
    public function updateLeads(Request $request,$id){
        
        if (Leads::where('id', $id)->exists()){
            $leads = Lead::find($id);
            $leads->leadid = is_null($request->leadid) ? $leads->leadid : $request->leadid;
            $leads->date = is_null($request->date) ? $leads->date : $request->date;
            $leads->name = is_null($request->name) ? $leads->name : $request->name;
            $leads->email = is_null($request->email) ? $leads->email : $request->email;
            $leads->phone = is_null($request->phone) ? $leads->phone : $request->phone;
            $leads->prodi = is_null($request->prodi) ? $leads->prodi : $request->prodi;
            $leads->source = is_null($request->source) ? $leads->source : $request->source;
            $leads->media = is_null($request->media) ? $leads->media : $request->media;
            $leads->save();
            return response()->json([
                "message" => "records updated sucessfully"
            ],200);
        }
        else {
            return response()->json([
                "message" => "Leads not found"
            ],404);
        }
    }
    public function deleteLeads ($id) {
        if(Leads::where('id', $id)->exists()) {
          $leads = Leads::find($id);
          $leads->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Leads not found"
          ], 404);
        }
      }
}
