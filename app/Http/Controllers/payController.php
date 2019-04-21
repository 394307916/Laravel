<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PayRepository;
use Illuminate\Support\Facades\Response;
use function EasyWeChat\Kernel\Support\generate_sign;

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
    public function pay()
    {

        $pay = $this->pay_repository->pay();

        return json_encode($pay);

    }
}