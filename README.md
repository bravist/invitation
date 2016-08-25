
Laravel 私有化扩展包：邀请函

> 微博：会勇同学

## 安装

* 通过composer，这是推荐的方式，可以使用composer.json 声明依赖，或者运行下面的命令。SDK 包已经放到这里 [`bravist/invitation`]

```bash
$ composer require bravist/invitation -vvv
```


## 配置

### Laravel 应用

1. 注册 `ServiceProvider`:

  ```php
  Bravist\Invitation\InvitationProvider::class,
  ```

2. 创建配置文件：

  ```shell
  php artisan vendor:publish
  ```

3. 请修改应用根目录下的 `config/invitation.php` 中对应的项即可；

4. （可选）添加外观到 `config/app.php` 中的 `aliases` 部分:

  ```php
  'invitation' => Bravist\Invitation\Facade::class,
  ```



## License

MIT