<?php

// +----------------------------------------------------------------------
// | XGK
// +----------------------------------------------------------------------

use think\admin\service\SystemService;

// 演示环境禁止操作路由绑定
if (SystemService::instance()->checkRunMode('demo')) {
    app()->route->post('index/pass', function () {
        return json(['code' => 0, 'info' => '演示环境禁止修改用户密码！']);
    });
    app()->route->post('config/system', function () {
        return json(['code' => 0, 'info' => '演示环境禁止修改系统配置！']);
    });
    app()->route->post('config/storage', function () {
        return json(['code' => 0, 'info' => '演示环境禁止修改系统配置！']);
    });
    app()->route->post('menu/index', function () {
        return json(['code' => 0, 'info' => '演示环境禁止给菜单排序！']);
    });
    app()->route->post('menu/add', function () {
        return json(['code' => 0, 'info' => '演示环境禁止添加菜单！']);
    });
    app()->route->post('menu/edit', function () {
        return json(['code' => 0, 'info' => '演示环境禁止编辑菜单！']);
    });
    app()->route->post('menu/state', function () {
        return json(['code' => 0, 'info' => '演示环境禁止禁用菜单！']);
    });
    app()->route->post('menu/remove', function () {
        return json(['code' => 0, 'info' => '演示环境禁止删除菜单！']);
    });
    app()->route->post('user/pass', function () {
        return json(['code' => 0, 'info' => '演示环境禁止修改用户密码！']);
    });
}
