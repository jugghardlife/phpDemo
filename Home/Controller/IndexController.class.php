<?php
//声明命名空间
namespace Home\Controller;
use \Home\Model\IndexModel;//引入首页模型类

//定义最终的首页控制器类
final class IndexController{
	//首页显示方法
	public function index()
	{
		//创建模型对象
		$modelObj=new IndexModel();
		//获取多行数据
		//$arrs=$modelObj->fetchAll();
		//载入视图文件
		//include VIEW_PATH."index.html";
	}
}