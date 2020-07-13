<?php

// +----------------------------------------------------------------------
// | XGK
// +----------------------------------------------------------------------

namespace app\wechat\controller\api;

use app\wechat\service\MediaService;
use think\admin\Controller;

/**
 * Class Review
 * @package app\wechat\controller\api
 */
class Review extends Controller
{

    /**
     * 图文展示
     * @param integer $id 图文ID
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function news($id = 0)
    {
        $this->id = empty($id) ? input('id') : $id;
        $this->news = MediaService::instance()->news($this->id);
        $this->fetch();
    }

    /**
     * 文章展示
     * @param integer $id 文章ID
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function view($id = 0)
    {
        $where = ['id' => empty($id) ? input('id') : $id];
        $this->app->db->name('WechatNewsArticle')->where($where)->update([
            'read_num' => $this->app->db->raw('read_num+1')
        ]);
        $this->info = $this->app->db->name('WechatNewsArticle')->where($where)->find();
        $this->fetch();
    }

    /**
     * 文本展示
     */
    public function text()
    {
        $this->content = strip_tags(input('content', ''), '<a><img>');
        $this->fetch();
    }

    /**
     * 图片展示
     */
    public function image()
    {
        $this->content = strip_tags(input('content', ''), '<a><img>');
        $this->fetch();
    }

    /**
     * 视频展示
     */
    public function video()
    {
        $this->url = strip_tags(input('url', ''), '<a><img>');
        $this->title = strip_tags(input('title', ''), '<a><img>');
        $this->fetch();
    }

    /**
     * 语音展示
     */
    public function voice()
    {
        $this->url = strip_tags(input('url', ''), '<a><img>');
        $this->fetch();
    }

    /**
     * 音乐展示
     */
    public function music()
    {
        $this->url = strip_tags(input('url', ''), '<a><img>');
        $this->desc = strip_tags(input('desc', ''), '<a><img>');
        $this->title = strip_tags(input('title', ''), '<a><img>');
        $this->fetch();
    }

}