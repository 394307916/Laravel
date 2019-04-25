<?php
use App\Teacher;
return [
    // 页面标题
    'title'   => '教师认证',
    // 模型单数，用作页面『新建 $single』
    'single'  => '教师认证',
    // 数据模型，用作数据的 CRUD
    'model'   => Teacher::class,
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
        'teacher_id'=>[
            'title' => '教师id',
        ],
        'diploma_auth' => [
            // 数据表格里列的名称，默认会使用『列标识』
            'title'  => '学历认证',
            // 默认情况下会直接输出数据，你也可以使用 output 选项来定制输出内容
            // 是否允许排序
            'sortable' => false,
        ],
        'identity_auth' => [
            'title' => '身份认证',
            'sortable' => false,
        ],
        'is_master' => [
            'title' => '教师认证',
            'sortable' => false,
        ],
        'img1' => [
            'title' => '认证图片1',
            'output' => function ($img1){
                return '<a href="'.$img1.'" target="_blank">'.$img1.'</a>';
            }
        ],
        'img2' => [
            'title' => '认证图片2',
            'output' => function ($img2){
                return '<a href="'.$img2.'" target="_blank">'.$img2.'</a>';
            }
        ],
        'img3' => [
            'title' => '认证图片3',
            'output' => function ($img3){
                return '<a href="'.$img3.'" target="_blank">'.$img3.'</a>';
            }
        ],

        
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],
    // 『模型表单』设置项
    'edit_fields' => [
 
        'diploma_auth' => [
            'title'  => '学历认证',
        ],
        'identity_auth' => [
            'title' => '身份认证',
        ],
        'is_master' => [
            'title' => '教师认证',
        ],
    ],
    // 『数据过滤』设置
    'filters' => [
        'teacher_id' => [
            // 过滤表单条目显示名称
            'title' => 'teacher_id',
        ],
    ],
];