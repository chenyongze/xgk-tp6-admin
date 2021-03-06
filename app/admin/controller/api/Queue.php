<?php

// +----------------------------------------------------------------------
// | XGK
// +----------------------------------------------------------------------

namespace app\admin\controller\api;

use think\admin\Controller;
use think\admin\service\QueueService;

/**
 * 后台任务通用接口
 * Class Queue
 * @package app\admin\controller\api
 */
class Queue extends Controller
{
    /**
     * 任务进度查询
     * @login true
     * @throws \think\admin\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function progress()
    {
        $input = $this->_vali(['code.require' => '任务编号不能为空！']);
        $queue = QueueService::instance()->initialize($input['code']);
        $this->success('获取任务进度成功！', $queue->progress());
    }

}