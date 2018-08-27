<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Core\Settings;
use App\Models\Core\Images;

class ApiController extends Controller
{
    public function ChangeLang (Request $request) {
        if (Settings::where('user_id', $request->input('user_id'))->first()) {
            $settings = Settings::where('user_id', $request->input('user_id'))->first();
            $settings->cr_lang = $request->input('cr_lang');
            if ($request->input('df_lang') != '') {
                $settings->df_lang = $request->input('df_lang');               
            }            
            $settings->save();                                          
            return $settings;
        } else {
            return Settings::create($request->all());
        }        
    }

    public function MailImage (Request $request) {
        if ($request->file('file')->isValid()){ 
            $url = url("/assets/uploads/mails") ."/" . $request->file->store('', 'mails');
            $arr = explode("/", $url);
            $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];           
            Images::create(['user_id' => $request->input('id'), 'url' => $path]);          
            return $url;
          } else {
              return ["error" => "No image attached"];
        }
    }
}
