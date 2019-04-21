<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewInfo;
use App\Alluser;

class newController extends Controller
{
	public function showNews(Request $request)
	{
		//如果拿到openid 说明是显示用户自己发布的最新消息
		if($request->get('openid')){
			$openid = $request->get('openid');
			$data = NewInfo::where('openid',$openid)->get();

			$data_array = json_decode($data,true);

			$data_last = [];
			$i = 0;

			//往对象里加数组有个坑 必须把对象转数组 然后用新数组才能加
			foreach ($data_array as $da_array) {
				$img1 = $da_array['img1'];
				$img2 = $da_array['img2'];
				$img3 = $da_array['img3'];

				$imgArray1 = [$img1,$img2,$img3];

				$da_array['imgArray1'] = $imgArray1;

				$data_last[$i] = $da_array;
				$i++;

			}

			$message = [];
			$message['data'] = $data_last;
			return json_encode($message);
		}else{//要不就是显示所有人的最新消息
			$data = NewInfo::orderBy('created_at','desc')->get();

			$data_array = json_decode($data,true);

			$data_last = [];
			$i = 0;

			//往对象里加数组有个坑 必须把对象转数组 然后用新数组才能加
			foreach ($data_array as $da_array) {
				$img1 = $da_array['img1'];
				$img2 = $da_array['img2'];
				$img3 = $da_array['img3'];

				$imgArray1 = [$img1,$img2,$img3];

				$da_array['imgArray1'] = $imgArray1;

				$data_last[$i] = $da_array;
				$i++;

			}

			//$data_last = (object)$data_array;
			echo json_encode($data_last);



/*			foreach ($data as $da) {

				$img1 = $da->img1;
				$img2 = $da->img2;
				$img3 = $da->img3;

				$imgArray1 = [
					$img1,$img2,$img3
				];

				$daa = json_decode($da,true);

				$daa['imgArray1'] = $imgArray1;

				$da = (object)$daa;

				//echo json_encode($da);
			}*/

//			echo json_encode($data);

		}

	}


	public function storeNew(Request $request)
	{
		$new_data = $request->getContent();
		$new_da = json_decode($new_data);

		$openid = $request->input('openid');
		$address = $new_da->address;
		$details = $new_da->details;
		$type_name = $new_da->type_name;
		$user_name = $new_da->user_name;
		$user_tel = $new_da->user_tel;

		$newinfo = new NewInfo();

		if(count($new_da->imgArray1) == 1){
			$img1 = $new_da->imgArray1[0];
			$newinfo->img1 = $img1;
		}else if(count($new_da->imgArray1) == 2){
			$img1 = $new_da->imgArray1[0];
			$img2 = $new_da->imgArray1[1];
			$newinfo->img1 = $img1;
			$newinfo->img2 = $img2;
		}else if(count($new_da->imgArray1) == 3){
			$img1 = $new_da->imgArray1[0];
			$img2 = $new_da->imgArray1[1];
			$img3 = $new_da->imgArray1[2];
			$newinfo->img1 = $img1;
			$newinfo->img2 = $img2;
			$newinfo->img3 = $img3;
		}


		$newinfo->openid = $openid;
		$newinfo->address = $address;
		$newinfo->details = $details;
		$newinfo->type_name = $type_name;
		$newinfo->user_name = $user_name;
		$newinfo->user_tel = $user_tel;
		$newinfo->dianzan = 0;
		$newinfo->liulan = 0;
		

		$user = Alluser::find($openid);
    	$newinfo->user_img = $user->avatarUrl;

		$newinfo->save();

		$return_data = [];
		$return_data['status_code'] = 200;
		return json_encode($return_data);

	}

	public function showNewDetail(Request $request){
		$new_id = $request->input('new_id');

		$data = NewInfo::find($new_id);

		$img1 = $data->img1;
		$img2 = $data->img2;
		$img3 = $data->img3;

		$imgArray1 = [];

		if($img1){
			array_push($imgArray1, $img1);
		}

		if($img2){
			array_push($imgArray1, $img2);
		}

		if($img3){
			array_push($imgArray1, $img3);
		}


		$da = json_decode($data,true);
		$da['imgArray1'] = $imgArray1;

		$data->liulan = $data->liulan + 1;
		$data->save();

		$message = [];
		$message['data'] = $da;

		$message['status_code'] = 200;
		$message['message'] = "";

		return json_encode($message);
	}

	public function pictureNew(Request $request){
		$file = request()->file('file');

		if($file->isValid()){
      		$ext = $file->getClientOriginalExtension();//文件扩展名
     		 $file_name = date("YmdHis",time()).'-'.uniqid().".".$ext;//保存的文件名
      	if(!in_array($ext,['jpg','jpeg','gif','png']) ) 
      		return response()->json(err('文件类型不是图片'));
            //把临时文件移动到指定的位置，并重命名
      		$path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'wchat_img'.DIRECTORY_SEPARATOR.date('Y').date('m').date('d').DIRECTORY_SEPARATOR;
      		$bool =  $file->move($path,$file_name);

      	if($bool){
      		$img_path = '/uploads/wchat_img/'.date('Y').date('m').date('d').'/'.$file_name;
      		$data = [
          //'domain_img_path'=>get_domain().$img_path,
          //'img_path'=>$img_path,
      		];
      		$data['img_path'] = $img_path;
      		return json_encode($data);
     	 }else{
      		return response()->json("图片上传失败！");
      		}
  		}else{
  			return response()->json("图片上传失败！");
  		}	

	}

	public function dianzan(Request $request){
		$new_id = $request->input('new_id');

		$data = NewInfo::find($new_id);

		$data->dianzan = $data->dianzan + 1;
		$dianzan_data = $data->dianzan;

		$data->save();

		$message = [];

		$message['status_code'] = 200;
		$message['dianzan'] = $dianzan_data;

		return json_encode($message);
	}


}
