# SBFramework
>一个简单的PHP框架

![](https://camo.githubusercontent.com/56d9298798ae0c049c2cfcb9fd5f8306c0ad18a0/68747470733a2f2f6170692e7472617669732d63692e6f72672f73776f6f6c652f73776f6f6c652d7372632e737667)  ![](https://img.shields.io/badge/lost-job-red.svg)  ![](https://img.shields.io/badge/lost-yourJob-blue.svg)


## 项目背景
大家都说PHP运行慢，个人认为这是由于框架太臃肿导致的。
个人时原生主义者，最近被迫用框架。所以这个项目就诞生了。

## 使用方法
项目有两个demo，在`/Application/Index/Controller`这个文件可以看到，一共有index()和test()两个方法。
本框架支持简单的phpInfo风格。也就是说，你只需配置好php后执行

```
git clone https://github.com/kajweb/SBFramework
cd SBFramework
php -S 0.0.0.0:5130
curl 127.0.0.1:5130
curl 127.0.0.1:5130/index/index/test
```
即可看到运行demo的结果
