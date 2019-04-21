<?php
namespace App\Repositories;

use App\User;
use function EasyWeChat\Kernel\Support\generate_sign;

class PayRepository
{
    /**
     * 发起微信支付
     *
     * @return Array
     */
    public function pay()
    {
        $this->wxpay = app('easywechat.payment');

        $unify = $this->wxpay->order->unify([
            'body' => '给钱',
            'out_trade_no' => rand(100000000,999999999),
            'total_fee' => 1,
            'trade_type' => 'JSAPI',
            'openid' => 'oBHQo4wvcxEDltWdrP0Z7qW8fcF0', // 用户的openid
        ]);

        if ($unify['return_code'] === 'SUCCESS' && !isset($unify['err_code'])) {
            $pay = [
                'appId' => config('wechat.payment.default.app_id'),
                'timeStamp' => (string) time(),
                'nonceStr' => $unify['nonce_str'],
                'package' => 'prepay_id=' . $unify['prepay_id'],
                'signType' => 'MD5',
            ];

            $pay['paySign'] = generate_sign($pay, config('wechat.payment.default.key'));

            return $pay;
        } else {
            $unify['return_code'] = 'FAIL';
            return $unify;
        }
    }
}