<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;

class HomPageController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function importData(Request $request){
        
        $filename =$request->campaignFile;


        if (($h = fopen("{$filename}", "r")) !== FALSE) 
        {
            $coutnter = 0;
        while (($data = fgetcsv($h, 1000, ";")) !== FALSE) 
        {
            if ($coutnter > 0){
                $phone = str_replace(array('(',')','-'),'',$data[4]);
                UserData::create([
                    'name'=> $data[0],
                    'surname'=> $data[1],
                    'email'=> $data[2],
                    'employee_id'=> $data[3],
                    'phone'=> $phone,
                    'point'=> $data[5]
                ]);	
                
            } 
            $coutnter++;
            	
        }

        fclose($h);
        }

        

        return back();
    }
}
