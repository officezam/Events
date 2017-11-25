<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\User;
use Intervention\Image;
use App\Member;

class MemberController extends Controller
{

	public function __construct() {
	$this->user = new User();
	}

	public function showMember(){

//		$relation = User::find(5)->Members;
//		dd($relation);
//		$member = $this->user->where('id', Auth()->id())->with('Members');
		$allMember = $this->user->where('created_by', Auth()->id())
		                     ->where('type','!=','superUser')
		                     ->where('type','!=','admin')->get();
//		$totalMembers = Member::where('user_id', Auth()->id())->count();
		//dd($member);
		return view('backend.Members.showmember',compact('allMember'));
	}
	public function saveMember(Request $request){

		$validatedData = $request->validate([
			'first_name' => 'required|string|max:255',
			'last_name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'phone' => 'required',
			'dob' => 'required',
			'expiration_date' => 'required',
			'postalcode' => 'required',
			'profile_image' => 'required|image',
			'password'  =>  'required|min:6',
			'cpassword'  =>  'required|same:password',

		]);
		if ($request->hasFile('profile_image')) {
			$file = $request->profile_image;
			$filename  = trim($request->first_name.$request->last_name).time() . '.' . $file->getClientOriginalExtension();
			$path = public_path('profilepics/' . $filename);
			\Image::make($file->getRealPath())->resize(90, 90)->save($path);
		}
		$userSaved = User::create([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'username' => $request->first_name.$request->last_name,
			'date_of_birth' => $request->dob,
			'type' => 'subuser',
			'phone' => $request->phone,
			'created_by' => Auth()->id(),
			'verify' => '1',
			'address' => $request->address,
			'email' => $request->email,
			'password' => bcrypt($request->password),
			'remember_token' => $request->_token,
			'profile_image' => $filename,
			'postalcode' => $request->postalcode,
			'total_members' => '',
			'total_price' => '',
			'membership_number' => '',
			'expiration_date' => $request->expiration_date
		]);
		$id = $userSaved->id;
		$count = 0;
		foreach($request->M_first_name as $key => $value)
		{
			Member::create([
			'user_id' => $id,
			'first_name' => $request->M_first_name[$count],
			'middle_name' => $request->M_middle_name[$count],
			'last_name' => $request->M_last_name[$count]
			]);
			$count++;
		}
		return redirect()->route('showmember');
	}

	/*Delete Employee
	*/
	public function deletMember($MemberId){
		User::find($MemberId)->delete();
		return redirect()->route('showmember');
	}



}
