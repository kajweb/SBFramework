<?php
Class Controller extends Caller{}

Class Service extends Caller{}

Class Model extends Caller{}


Class Caller{
	public $_class;

	function __construct($param){
		$_classArray = explode("\\", get_class($this));
		$_className = end($_classArray);
		$_objectName = explode("/", $param);
		$_module = $_objectName[0];
		unset($_objectName[0]);
		$_class =  rtrim( $_module . "\\" . implode("\\", $_objectName) , "\\") . $_className;
		$this->_class = new $_class();
		return $this;
	}

	function __call($method_name, $args){
		return call_user_func_array(array($this->_class, $method_name), $args);
	}
}