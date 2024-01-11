<?php

namespace App\Http\Controllers;
use App\Models\membersModel;
use App\Models\user;
use App\Models\contributionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class memberController extends Controller
{
    //
    public function store(Request $request) {
      //  return $request;
    
        $validatedData = $request->validate([
        'user_id'=> 'required|string|max: 255',
        'first_name'=> 'required|string|max: 255',
        'last_name'=> 'required|string|max: 255',
        'gender'=>'required|string|max: 255',
        'id_number'=> 'required|string|max:255',
        'phone_number'=> 'required|string|max:255',
        'county'=> 'required|string|max: 255',
        'ward'=> 'required|string|max: 255',
        'location'=> 'required|string|max:255',

        'kin_name'=> 'required|string|max:255',
        'kin_number'=> 'required|string|max: 255',
        'kin_id'=> 'required|string|max:255',
        'kin_relationship'=> 'required|string|max:255',

        'payment_number'=> 'required|string|max: 255',
        'payment_name'=> 'required|string|max: 255',
        'amount'=> 'required|string|max:255',
        'code'=> 'required|string|max:255',
          ]); 
        // return $request;
  
        membersModel::create($validatedData);
        return redirect()->route('get-contributions')->with('success','You have become our Welfare Member');
   }  

   public function member(){                                       
    
    return view ('member');
}
 
    public function memberList(){  
      $members= membersModel::orderBy('members.id','DESC')
      ->join('users', 'users.id', '=', 'members.user_id')->get();
      // return $members;             
      $data = [
      'title' => 'All Welfare Members',
      'members' => $members,    
          ]; 
      return view ('memberlist', compact ('data'));
}

public function members(){  
  $members= membersModel::orderBy('members.id','DESC')
  ->join('users', 'users.id', '=', 'members.user_id')->get();
  // return $members;             
  $data = [
  'title' => 'All Welfare Members',
  'members' => $members,    
      ]; 
  return view ('members', compact ('data'));
}
 

public function home(){
  return view ('home');
 
}

public function contribute(Request $request){
  $validatedData = $request->validate([
     
      'user_id'=> 'required|string|max: 255',
      'year' => 'required|string|max: 255',
      'month'=>'required|string|max:255',
      'p_number'=> 'required|string|max: 255',
      'p_name'=> 'required|string|max: 255',
      'p_amount'=> 'required|string|max:255',
      'p_code'=> 'required|string|max:255',

  ]);

  $has_contributed = ContributionModel::where(['user_id' => auth()->id(), 'month' => $request->month, 'year' => $request->year])->first();

  if($has_contributed){
    return redirect()->route('my-contributions')->with('success','You have already made contribution for the month of '. $request->month);
  }

  contributionModel::create($validatedData);
  //send email to member
  /*
    Dear Stella Kimanzi, this is to confirm that your contribution of Kes. 12,500 has been successfully received
    for the month of January. 

  */

  return redirect()->route('my-contributions')->with('success','Thank you for your contribution for '. $request->month);
}
  public function getContribute(){
     
  return view ('contribute');
 
}
public function getContributions(){  
  $contributions= contributionModel::
  join('users', 'users.id', '=', 'contributions.user_id')
  ->join ('members', 'members.user_id','=','users.id')
  ->orderBy('contributions.id','DESC')
  ->select('contributions.*', 'members.reg_number', 'members.first_name', 'members.last_name','members.phone_number')
  ->get();
  // return $members;             
  $data = [
  'title' => 'All Welfare Contributions',
  'contributions' => $contributions,    
      ]; 
      $totalAmount = DB::table('contributions')->sum('p_amount');

  return view ('contributions', compact ('data','contributions','totalAmount'));
}


public function myContributions(){
    
  $contributions = contributionModel::where("contributions.user_id", Auth::user()->id) //5
                       ->join('users', 'users.id', '=', 'contributions.user_id')
                       ->join ('members', 'members.user_id','=','users.id')
                       ->orderBy('contributions.id','DESC')
                       ->get(); 
       
      $data = [
      'title' => 'These are Your contributions',
      'contributions' => $contributions  
          ]; 
          $contribution = ContributionModel::whereBetween('created_at', ['2023-01-01', '2050-12-31'])->get();
          $totalAmount = $contributions->sum('p_amount');
    
      return view ('mycontributions', compact ('data','contribution','totalAmount'));
  }

  public function aboutUs(){                                       
    
    return view ('aboutus');
}

public function profile(){
    
  $members = membersModel::where("members.user_id", Auth::user()->id) 
      ->join('users', 'users.id', '=', 'members.user_id')->get();
       
      $data = [
      // 'title' => 'Your Profile',
      'members' => $members  
          ]; 
    
      return view ('profile', compact ('data'));
  }

  public function confirmAction(Request $request)
  {
     $contribution = contributionModel::find($request->contribution_id);
     $contribution->confirmation_status = 1;
     $contribution->save();
     return back()->with('success','Contribution payment confirmed successfully');
  }

  public function edit($id){
    $data = [
        'title' => 'Edit the Profile',
        'member'=> membersModel::find($id)
    ]; 
    return view('editprofile', compact ('data'));
}
  public function update(Request $request, $id) {
    //  return $request;
  
      $validatedData = $request->validate([
      'user_id'=> 'required|string|max: 255',
      'first_name'=> 'required|string|max: 255',
      'last_name'=> 'required|string|max: 255',
      'gender'=>'required|string|max: 255',
      'id_number'=> 'required|string|max:255',
      'phone_number'=> 'required|string|max:255',
      'county'=> 'required|string|max: 255',
      'ward'=> 'required|string|max: 255',
      'location'=> 'required|string|max:255',

      'kin_name'=> 'required|string|max:255',
      'kin_number'=> 'required|string|max: 255',
      'kin_id'=> 'required|string|max:255',
      'kin_relationship'=> 'required|string|max:255',

      'payment_number'=> 'required|string|max: 255',
      'payment_name'=> 'required|string|max: 255',
      'amount'=> 'required|string|max:255',
      'code'=> 'required|string|max:255',
        ]); 
      // return $request;

      $member = membersModel::find($id);
      $member->update($validatedData);
      return redirect()->route('profile')->with('success','Profile Updated');
 }  


}