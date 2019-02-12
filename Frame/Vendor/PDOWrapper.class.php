<?php
//声明命名空间
namespace Frame\Vendor;
use \PDO; //引入PDO类
use \PDOException;//引入PDOException类

//定义最终的PDOWrapper类
final class PDOWrapper{
	//数据库属性
	private $db_type;
	private $db_host;
	private $db_port;
	private $db_user;
	private $db_pass;
	private $db_name;
	private $charset;
	private $pdo=NULL;//保存PDO对象

	//构造方法
	public function __construct()
	{
		$this->db_type=$GLOBALS['config']['db_type'];
		$this->db_host=$GLOBALS['config']['db_host'];
		$this->db_port=$GLOBALS['config']['db_port'];
		$this->db_user=$GLOBALS['config']['db_user'];
		$this->db_pass=$GLOBALS['config']['db_pass'];
		$this->db_name=$GLOBALS['config']['db_name'];
		$this->charset=$GLOBALS['config']['charset'];
		$this->connectDb();//创建PDO对象、连接数据库、选择数据库
		$this->setErrMode();//设置PDO的错误模式
	}

	//私有的创建PDO对象
	private function connectDb()
	{
		try{
			//PDO认证
			$dsn="{$this->db_type}:host={$this->db_host};port={$this->prot};";
			$dsn.="dbname={$this->db_name};charset={$this->charset}";
			$pdo=new PDO($dsn,$this->db_user,$this->db_pass);
		}catch(PDOException $e){
			echo "<h2>创建PDO对象失败</h2>";
			echo "错误状态码：".$e->getCode();
			echo "<br>错误行号：".$e->getLine();
			echo "<br>错误文件：".$e->getFile();
			echo "<br>错误信息：".$e->getMessage();
		}
		
	}


	//私有的设置PDO错误模式的方法
	private function setErrMode()
	{
		$this->pdo->setAttribute(POD::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}

	//公共的执行SQL语句的方法：insert、delete、update、set等
	public function exec($sql)
	{
		try{
			return $this->pdo->exec($sql);
		}catch(PDOException $e){
			echo "<h2>SQL语句有问题！</h2>";
			echo "错误状态码：".$e->getCode();
			echo "<br>错误行号：".$e->getLine();
			echo "<br>错误文件：".$e->getFile();
			echo "<br>错误信息：".$e->getMessage();
		}
	}
}