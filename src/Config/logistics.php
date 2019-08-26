<?php

return [
    'provider' => ['kuaidibird'],

    'juhe'        => [
        'app_key' => env('LOGISTICS_JUHE_APP_CODE'),
        'vip'     => env('LOGISTICS_JUHE_VIP', false),
    ],
    'jisu'        => [
        'app_key'    => env('LOGISTICS_JISU_APP_CODE'),
        'app_secret' => env('LOGISTICS_JISU_SECRET'),
        'vip'        => env('LOGISTICS_JISU_VIP', false),
    ],
    'shujuzhihui' => [
        'app_key'    => env('LOGISTICS_SHUJUZHIHUI_APP_CODE'),
        'app_secret' => env('LOGISTICS_SHUJUZHIHUI_SECRET'),
        'vip'        => env('LOGISTICS_SHUJUZHIHUI_VIP', false),
    ],
    'kuaidi100'   => [
        'app_key'    => env('LOGISTICS_KUAIDI100_APP_CODE'), /* AppKey  */
        'app_secret' => env('LOGISTICS_KUAIDI100_SECRET'), /* EBusinessID  */
        'vip'        => env('LOGISTICS_KUAIDI100_VIP', false),
    ],
    'kuaidibird'  => [
        'app_key'    => env('LOGISTICS_KUAIDINIAO_APP_CODE'), /* AppKey  */
        'app_secret' => env('LOGISTICS_KUAIDINIAO_SECRET'), /* EBusinessID  */
        'vip'        => env('LOGISTICS_KUAIDINIAO_VIP', false),
    ],

    'cache' => [
        'use'      => true, //缓存开关
        'expire'   => 30, //过期时间 分钟
        'tag_name' => 'logistics_cache',
    ],
];
