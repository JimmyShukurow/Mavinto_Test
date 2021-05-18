<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;
use Throwable;

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
            try{
                $coutnter = 0;
                global $isim;
                while (($data = fgetcsv($h, 1000, ";")) !== FALSE) 
                {
                    if ($coutnter > 0){
                        $phone = str_replace(array('(',')','-'),'',$data[4]);
                        $isim=$data[0];
                        UserData::firstOrCreate([
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
            } catch (Throwable $e) {
                report($e);
                $hataBilgisi ="<u>".$isim."</u> isimli kullanicida tekrarlanan bilgiler var";
                return response()->json(["error"=>$hataBilgisi]);
            }
            

        fclose($h);
        }

        

        return response()->json(["success"=>"Tamam"]);
    }
}
