<h1 align="center"> Logistics for laravel</h1>

<p align="center">简单便捷查询运单快递信息</p>

[![Latest Stable Version](https://poser.pugx.org/jianminlee/logistics/v/stable)](https://packagist.org/packages/jianminlee/logistics)
[![License](https://poser.pugx.org/jianminlee/logistics/license)](https://packagist.org/packages/jianminlee/logistics)

### [uuk020/logistics](https://github.com/uuk020/logistics/edit/master/README.md)

### 支持查询接口平台

| 平台 | 次数 | 是否需要快递公司编码 |
| :-----: | :----: | :----: |
| [快递100](https://www.kuaidi100.com/openapi/applyapi.shtml) | 100单/天(免费) | Y |
| [快递鸟](http://www.kdniao.com/api-all) | 3000单/天(免费) | Y |
| [聚合数据](https://www.juhe.cn/docs/api/id/43) | 100次(首次申请) | Y |
| [极速数据](https://www.jisuapi.com/api/express) | 1000次(免费) | N |
| [数据智汇](http://www.shujuzhihui.cn/apiDetails?id=1867) | 100次(免费) | N |
| [爱查快递](https://www.ickd.cn/api) | 无限次(抓取接口, 无法保证数据正确性) | N |

### 安装

```shell
$ composer require jianminlee/logistics
```

`config/app.php` 
```php
[
        ...
        'Logistics'    => \Jianminlee\Logistics\Facades\Logistics::class,
]
```
发布配置文件
```shell
php artisan vendor:publish --provider="Jianminlee\Logistics\ServiceProvider"
```

### 使用

使用缓存
```php
    ...
    'cache' => [
        'use'      => true, //缓存开关
        'expire'   => 30, //过期时间 分钟
        'tag_name' => 'logistics_cache',
    ],
```

```php
    public function show($express_no, Logistics $logistics){
        ...
        $result = $logistics->get($express_no);
        ...
    }
    ...
    app('logistics')->get($express_no);
    ...
    Logistics::get($express_no, $company);
```
示例
```php
[
   'kuaidi100' => [
       'channel' => 'kuaidi100',
       'status' => 'success',
       'result' => [
           [
               'status' => 200,
               'message'  => 'OK',
               'error_code' => 0,
               'data' => [
                   ['time' => '2019-01-09 12:11', 'description' => '仓库-已签收'],
                   ['time' => '2019-01-07 12:11', 'description' => '广东XX服务点'],
                   ['time' => '2019-01-06 12:11', 'description' => '广东XX转运中心']
               ],
               'logistics_company' => '申通快递',
               'logistics_bill_no' => '12312211'
           ],
           [
               'status' => 201,
               'message' => '快递公司参数异常：单号不存在或者已经过期',
               'error_code' => 0,
               'data' => '',
               'logistics_company' => '',
               'logistics_bill_no' => ''
           ]
       ]
   ]
]
```

## 最后
欢迎提出 issue 和 pull request

## License
MIT
