<?php
use App\Ad_img;
return [
    // 页面标题
    'title'   => '广告图片',
    // 模型单数，用作页面『新建 $single』
    'single'  => '广告图片',
    // 数据模型，用作数据的 CRUD
    'model'   => Ad_img::class,
    // 设置当前页面的访问权限，通过返回布尔值来控制权限。
    // 返回 True 即通过权限验证，False 则无权访问并从 Menu 中隐藏
    'permission'=> function()
    {
        //return Auth::check();
        return true;
    },
    // 字段负责渲染『数据表格』，由无数的『列』组成，
    'columns' => [
        // 列的标示，这是一个最小化『列』信息配置的例子，读取的是模型里对应
        // 的属性的值，如 $model->id
        'ad_img_id'=>[
            'title' => 'id',
        ],
        'created_at' => [
            'title' => '创建时间',
        ],
        'updated_at' => [
            'title' => '更新时间',
        ],
        
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],
    // 『模型表单』设置项
    'edit_fields' => [
 
        'img' => [
            'title' => '图片链接',
        ],
    ],
    // 『数据过滤』设置
    'filters' => [
        'img' => [
            'title' => '图片链接',
        ],
    ],
];