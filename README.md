# laravel-pdd

pdd SDK for Laravel 5 ， 基于 [observer/pdd](https://github.com/Observer5/pdd)



## 框架要求

Laravel5

## 安装

```shell
composer require "observer/laravel-pdd:~1.0"
```

## 配置

### Laravel 应用

1. 在 `config/app.php` 注册 ServiceProvider 和 Facade (Laravel 5.5 + 无需手动注册)

```php
'providers' => [
    // ...
    Observer\LaravelPdd\ServiceProvider::class,
],
'aliases' => [
    // ...
    'EasyPdd' => Observer\LaravelPdd\Facade::class,
],
```

2. 创建配置文件：

```shell
php artisan vendor:publish --provider="Observer\LaravelPdd\ServiceProvider"
```

3. 修改应用根目录下的 `config/pdd.php` 中对应的参数即可。


## 使用

### 我们有以下方式获取 SDK 的服务实例

#### 使用容器的自动注入

```php
<?php

namespace App\Http\Controllers;

use EasyPdd\Foundation\Application;

class PddController extends Controller
{

    public function demo(Application $pdd)
    {
        // $pdd 则为容器中 EasyPdd\Foundation\Application 的实例
    }
}
```

#### 使用外观

```php
EasyPdd::oauth;

```

## License

MIT
