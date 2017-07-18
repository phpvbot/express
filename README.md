# vbot-express
vbot快递查询扩展

## 安装
1. composer 
```
$ composer require 96qbhy/vbot-express:dev-master
```

2. 在 `vbot` 中加载扩展
```php
    $robot = new Vbot([//vbot配置...]);

    $robot->messageExtension->load([
        // some extensions
        VbotExpress::class,
    ]);
    
    //...
```


## 使用示例
![使用示例](example.png)

