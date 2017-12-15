<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;
use App\User;
use Intervention\Image;
use App\Member;
use App\Jobs\SendVerificationEmail;
use App\Jobs\ExpireEmailLink;
use Mail;
use App\Mail\verifyEmail;
use Illuminate\Support\Facades\DB;
use Plivo;
use Milon\Barcode\DNS1D;

class MemberController extends Controller
{

	public function __construct() {
	$this->user = new User();
	$this->plivo = new Plivo\RestAPI($auth_id = "MANDIWNGMYY2M2MJMXYT", $auth_token = "Nzk4M2E2ZmI4NjdjY2NkMTY0ZDUwY2E0NTlmMzkz");

	}

	public function showMember(){

//		$relation = User::find(5)->Members;
//		dd($relation);
//		$member = $this->user->where('id', Auth()->id())->with('Members');
		$allMember = $this->user->where('created_by', Auth()->id())
		                     ->where('type','!=','superUser')
		                     ->where('type','!=','subuser')
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
			$filename  = trim($request->first_name.$request->last_name).time().'.'.$file->getClientOriginalExtension();
			$path = public_path('profilepics/' . $filename);
			\Image::make($file->getRealPath())->resize(90, 90)->save($path);
		}
		$userSaved = User::create([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'username' => $request->first_name.$request->last_name,
			'date_of_birth' => $request->dob,
			'type' => 'Members',
			'phone' => $request->phone,
			'gender' => $request->gender,
			'created_by' => Auth()->id(),
			'verify' => 0,
			'address' => $request->address,
			'email' => $request->email,
			'password' => bcrypt($request->password),
			'first_password' => $request->password,
			'remember_token' => $request->_token,
			'profile_image' => $filename,
			'postalcode' => $request->postalcode,
			'total_members' => '',
			'total_price' => '',
			'membership_number' => '',
			'verifytoken' => str_random(40),
			'status' => 0,
			'expiration_date' => $request->expiration_date
		]);

		$id = $userSaved->id;

		$this->user
			->where('id', $id)
		  ->update(array('membership_number' => '00'.$id));
		$count = 0;
		if(isset($request->M_first_name)){
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
			$this->user
				->where('id', $id)
				->update(array('total_members' => $count));
		}

		$request->remember_token = md5(time() . $request->email);
		$UserData   = User::find($id);
		$this->sendEmail($UserData);


		$request->session()->flash('success', 'Member successfuly Added.!');
		return redirect()->route('showmember');
	}


	public function TestEmailSending(){
		$UserData   = User::find(4);
		$response = $this->sendEmail($UserData);
		dd($response);
	}
	public function sendEmail($thisUser){

		return Mail::to($thisUser->email)->send(new verifyEmail($thisUser));
	}

	public function sendVerification($MemberId , Request $request){
		$user = $this->user->find($MemberId);
		$sms = "Please Reply Back to this Number With your Membership Code:".$user->membership_number;
		$params = array(
			'src' => '+15876046444', // Sender's phone number with country code
			'dst' => $user->phone, // receiver's phone number with country code
			'text' => $sms // Your SMS text message
		);
		$response = $this->plivo->send_message($params);
		$request->session()->flash('success', 'Verification SMS Sent tho user '.$user->first_name.' '.$user->last_name);
		return redirect()->route('showmember');
	}

	public function membershipCard($memberId){
//		echo DNS1D::getBarcodeSVG("4445645656", "PHARMA2T");
//		echo DNS1D::getBarcodeHTML("4445645656", "PHARMA2T");
//		echo '<img src="data:image/png,' . DNS1D::getBarcodePNG("4", "C39+") . '" alt="barcode"   />';
//			echo DNS1D::getBarcodePNGPath("4445645656", "PHARMA2T");
//		echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+") . '" alt="barcode"   />';
//				dd($memberId);
		$barCode = DNS1D::getBarcodePNG("4", "C39+");
		$member  = $this->user->find($memberId);
		return view('backend.Members.membershipcard', compact('barCode','member'));

	}
	/*Delete Employee
	*/
	public function deletMember($MemberId){
		User::find($MemberId)->delete();
		return redirect()->route('showmember');
	}



}
