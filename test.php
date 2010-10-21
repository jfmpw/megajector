<?php
error_reporting(E_ALL);

require_once 'megajector.php';

class myClass extends megajector {
	/**
	 * @inject (class="myDependency")
	 */
	protected $dependency;

	function  __construct($dependency = null) {
		$this->dependency = $dependency;
		parent::__construct();
	}
}

class myDependency extends megajector {
	/**
	 * @inject (class="mySubDependency")
	 */
	protected $subdependency;
}

class mySubDependency {

}

class myMockDependency {

}

$dep = new myMockDependency();
$class = new myClass(/*$dep*/);
var_dump($class);
