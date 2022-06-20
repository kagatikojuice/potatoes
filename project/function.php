<?php 
	function hello(){
		echo "hello";
	}
	hello();

	class student   //class;
	{
		public $a = 10;
		public function __construct(){
			$this->a;
			$this->a = 20;
		}

		public function addstudent(){
			echo '<br>' . $this->a;               //a ko value 20 print garxa;
		}
	}
	$obj = new student();  //object declaration;
	$obj->addstudent(); //function calling;
 ?>