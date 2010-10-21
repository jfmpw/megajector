<?php
require_once 'Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Symfony', 'Doctrine');
$classLoader->register();





class inject extends \Doctrine\Common\Annotations\Annotation
{
    public $class;
	public $params;
}

class megajector {
	static function gogogo() {
		
	}
	
	function  __construct() {

		$reader = new \Doctrine\Common\Annotations\AnnotationReader();
		$className = get_class($this);

		$reflect = new ReflectionClass($className);
		$props = $reflect->getProperties();
		foreach ($props as $p) {
			$anno = $reader->getPropertyAnnotations($p);
			if (array_key_exists('inject', $anno)) {
				$classToMake = $anno['inject']->class;
				$class = new $classToMake();
				$propName = $p->name;
				if ($this->$propName ==null) {
					$this->$propName = $class;
				}
			}

		}

	}
}