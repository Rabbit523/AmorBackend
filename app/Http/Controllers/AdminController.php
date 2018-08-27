<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Core\Customer_Management;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class AdminController extends Controller
{
  public function __construct()
  {
    global $serviceAccount;
    global $firebase;
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/andykim-evaperola-firebase-adminsdk-93ko7-8c02703ddb.json');
    $firebase = (new Firebase\Factory())->withServiceAccount($serviceAccount)->withDatabaseUri('https://andykim-evaperola.firebaseio.com/')->create();
  }

  public function dashboard() {
    if(!Auth::check()){
        return redirect()->route('home');
    }        
    return view('pages.dashboard', [
      "title" => "Home"      
    ]);
  }

  public function manageUsers () {
    if(!Auth::check()){
      return redirect()->route('home');
    }   
    global $firebase;
    $reference = $firebase->getDatabase()->getReference('Users');
    $value = $reference->getSnapshot()->getValue();

    $datas = array();
    foreach($value as $key=>$item) { 
      array_push($datas, (object)$item);
    }    
    return view('pages.users', compact('datas'), [
      "title" => "User"      
    ]);
  }

  public function notice () {
    if(!Auth::check()){
      return redirect()->route('home');
    }   
    return view('pages.notice', [
      "title" => "Notice"      
    ]);
  }

  public function setting () {
    if(!Auth::check()){
      return redirect()->route('home');
    }   
    return view('pages.setting', [
      "title" => "Setting"      
    ]);
  }

  public function UpdateFirebase(Request $request) {
    global $firebase;
    $reference = $firebase->getDatabase()->getReference('Users');
    $value = $reference->getSnapshot()->getValue();

    foreach($value as $key=>$item) { 
      if ($item['name'] == $request->name) {        
        $updates = [
          'Users/'.$key => $request->all()
        ];
        $firebase->getDatabase()->getReference()->update($updates);        
        return json_encode($item['membership']);
      }
    }    
  }

  public function search (Request $request) {
    $search = $request->user;
    global $firebase;
    $reference = $firebase->getDatabase()->getReference('Users');
    $value = $reference->getSnapshot()->getValue();

    foreach($value as $key=>$item) {        
      if (json_encode(strtolower($item['name'])) == json_encode(strtolower($search))) {
        return json_encode($item['name']);
      }
    }    
    return json_encode("nothing");
  }

  public function searchUser (Request $request) {     
    $email = $request->email;
    $password = $request->password;
    $user = User::where('email',  $email)->first();
    if ($user) {
        if ($user->password === bcrypt($password)) {
            return "success";
        } else {
            return "invalid password";
        }
    } else {
        return "invalid email";
    }        
  }
}
