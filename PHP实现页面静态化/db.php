<?php
/**
* 数据库链接封装
* 这部分内容不做讲解，直接拿过来使用，大致的给学员说下即可。
* 因为这个不是本课题的重点。
*/
class Db {
	// 存储类的实例的静态成员变量
	static private $_instance;
	// 数据库链接静态变量
	static private $_connectSource;
	// 链接数据库配置
	private $_dbConfig = array(
		'host' => '127.0.0.1',
		'user' => 'root',
		'password' => '',
		'database' => 'cms',
	);

	private function __construct() {
	}
	
	/**
	 * 实例化
	*/
	static public function getInstance() {
		// 判断是否被实例化
		if(!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	* 数据库链接
	*/
	public function connect() {
		if(!self::$_connectSource) {
			// 数据库链接
			self::$_connectSource = @mysql_connect($this->_dbConfig['host'], $this->_dbConfig['user'], $this->_dbConfig['password']);	

			if(!self::$_connectSource) {
				// 抛出异常处理
				throw new Exception('mysql connect error ');
			}
			// 选择一款数据库
			mysql_select_db($this->_dbConfig['database'], self::$_connectSource);
			// 设置字符编码
			mysql_query("set names UTF8", self::$_connectSource);
		}
		// 返回资源链接
		return self::$_connectSource;
	}
	
}