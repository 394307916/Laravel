<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PayRepository;
use Illuminate\Support\Facades\Response;
use function EasyWeChat\Kernel\Support\generate_sign;
use App\Teacher;
use App\Teacher_ex;
use App\Alluser;
use App\Order;

class PayController extends Controller
{
    /**
     * PayRepository
     *
     * @var PayRepository
     */
    protected $pay_repository;

    public function __construct(PayRepository $pay_repository)
    {
    	$this->pay_repository = $pay_repository;
    }

    /**
     * 微信支付
     *
     * @return Response
     */
    public function pay(Request $request)
    {
    	$user_openid = $request->input('openid');

        $pay = $this->pay_repository->pay($user_openid);

        return json_encode($pay);

    }

    public function successPay(Request $request){

    	$openid = $request->input('openid');
    	$teacher_id = $request->input('teacher_id');

    	$if_pay = Order::where('openid',$openid)->where('teacher_id',$teacher_id)->get();
		$num = count($if_pay);
		if($num == 1){		
			$message['status_code'] = 400;
      		return json_encode($message);
		}

    	$order = new Order();

    	$order->openid = $openid;
    	$order->teacher_id = $teacher_id;

    	$order->save();

    	$message['status_code'] = 200;
      	return json_encode($message);

    }

    public function isPay(Request $request){

    	$openid = $request->input('openid');
    	$teacher_id = $request->input('teacher_id');

    	$if_pay = Order::where('openid',$openid)->where('teacher_id',$teacher_id)->get();
		$num = count($if_pay);

		if($num == 1){		
			$message['isPay'] = 1;
		}else{
			$message['isPay'] = 0;
		}

		return json_encode($message);
    }

    public function showOrder(Request $request){

    	$openid = $request->input('openid');

    	$if_pay = Order::where('openid',$openid)->orderBy('created_at','desc')->get();
		$num = count($if_pay);

		$message = [];
		$message['data'] = [];

		foreach ($if_pay as $da) {

			$teacher_id = $da->teacher_id;

			if($num != 0){

				$data = Teacher::where('teacher_id',$teacher_id)->get();

			//return json_encode($data);
				$data = json_decode($data,true);

				foreach($data as $da){

					$da['teach_exprience'] = Teacher_ex::where('teacher_id',$da['teacher_id'])->get();
					$a = explode('，',$da['teach_feature']);
					$b = explode('，',$da['teach_subject']);
					$c = explode('，',$da['teach_grade']);
					$d = explode('，',$da['teach_county']);
					$e = explode('，',$da['region']);
					$f = explode('，',$da['teach_schedule']);
        //echo json_encode($a,320);
					$da['teach_feature'] = $a;
					$da['teach_subject'] = $b;
					$da['teach_grade'] = $c;
					$da['teach_county'] = $d;
					$da['region'] = $e;
					$da['teach_schedule'] = $f;
					array_push($message['data'], $da);

				}

			}


		}

		

		$message['status_code'] = 200;
		echo json_encode($message);

		
    }


}