<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use GuzzleHttp\Client;
use App\Alluser;


class apiController extends Controller
{

    // 获取微信用户信息
    public function getcode(Request $request)
    {

/*        $code = $request->get('code');
        $encryptedData = $request->get('encryptedData');
        $iv = $request->get('iv');*/
        $code = $request->input('code');
        $encryptedData = $request->input('encryptedData');
        $iv = $request->input('iv');
        $appid = "wx527ce41bcf42a458";
        $secret = "5c31283c18df65581f8bd4df189175be";
        
/*        $client = new Client();
        $res = $client->request('GET', 'homestead.test/showTeachers');
        $body = json_decode($res->getBody());*/

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.weixin.qq.com/sns/jscode2session', [
            'query' => ['appid' =>$appid,
                'secret' => $secret,
                'js_code' => $code,
                'grant_type' => 'authorization_code']
        ]);
        $body = json_decode($res->getBody());
        //echo json_encode($body);
        $openid = $body->openid;
        $session_key = $body->session_key;


        $userifo = new \WXBizDataCrypt($appid, $session_key);

        $errCode = $userifo->decryptData($encryptedData, $iv, $data);


        $info = json_decode($data);    
        $nickName = $info->nickName;
        $avatarUrl = $info->avatarUrl;
        $province = $info->province;
        $city = $info->city;

        $alluser = new Alluser();
 /*       if($alluser->where('openid',$openid)){
        	echo "日了狗了存在了";
        }*/
//        echo gettype($alluser->where('openid',$openid)->get());
//        echo !$alluser->find($openid);
        if (!$alluser->find($openid))
        {
            $alluser->openid = $openid;
            $alluser->session_key = $session_key;
            $alluser->nickName = $nickName;
            $alluser->avatarUrl = $avatarUrl;
            $alluser->province = $province;
            $alluser->city = $city;
            $alluser->save();
        }



        if ($errCode == 0) {
            return ($data);
        } else {
            return ($errCode);
        }



    }
}
