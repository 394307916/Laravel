<?php
use App\Patriarch;
return [
    // 页面标题
    'title'   => '家长',
    // 模型单数，用作页面『新建 $single』
    'single'  => '家长',
    // 数据模型，用作数据的 CRUD
    'model'   => Patriarch::class,
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
        'patriarch_id'=>[
            'title' => 'patriarch_id',
        ],
        'is_order' => [
            // 数据表格里列的名称，默认会使用『列标识』
            'title'  => '投递开关',
            // 默认情况下会直接输出数据，你也可以使用 output 选项来定制输出内容
            // 是否允许排序
            'sortable' => false,
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
        'is_order' => [

            'title'  => '投递开关',

        ],
    ],
    // 『数据过滤』设置
    'filters' => [
        'is_order' => [
            // 过滤表单条目显示名称
            'title' => '投递开关',
        ],
    ],
];