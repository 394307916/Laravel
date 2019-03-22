<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewInfo;
use App\Alluser;

class newController extends Controller
{
	public function showNews(Request $request)
	{

		$data = NewInfo::all();
    	//$teach_feature = explode(',',$data->teach_feature);
		echo json_encode($data);

	}


	public function storeNew(Request $request)
	{
		$new_data = $request->getContent();
		$new_da = json_decode($new_data);

		$openid = "oWo705Yx2B4zPMJxAddz7QbNHSHA";
		$address = $new_da->address;
		$details = $new_da->details;
		$type_name = $new_da->type_name;
		$user_name = $new_da->user_name;
		$user_tel = $new_da->user_tel;


		$newinfo = new NewInfo();

		$newinfo->openid = $openid;
		$newinfo->address = $address;
		$newinfo->details = $details;
		$newinfo->type_name = $type_name;
		$newinfo->user_name = $user_name;
		$newinfo->user_tel = $user_tel;

		$user = Alluser::find($openid);
    	$newinfo->user_img = $user->avatarUrl;

		$newinfo->save();

		$return_data = [];
		$return_data['status_code'] = 200;
		return json_encode($return_data);

	}
}
