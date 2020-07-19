<?php

// +----------------------------------------------------------------------
// | XGK
// +----------------------------------------------------------------------

namespace app\index\controller;

use think\admin\Controller;

/**
 * Class Index
 * @package app\index\controller
 */
class Index extends Controller
{
    public function index()
    {
        $ip2region = new \Ip2Region();
        // $ip = '101.105.35.57';
        $info = $ip2region->btreeSearch($this->request->ip());
        $this->success('', [
            'ip' => $info,
            'cookie' => $this->request->cookie(),
            'param' => $this->request->param(),
            'post' => $this->request->post(),
            'get' => $this->request->get(),
            'host' => $this->request->host(),
        ]);
        // $this->redirect(sysuri('admin/login/index'));
    }
}
