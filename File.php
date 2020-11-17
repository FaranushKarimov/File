<?php
	class Calculator {
		public $var1;
		public $var2;
		public $operator;
		
		public function __construct($var1,$var2,$operator) {
			$this->var1 = $var1;
			$this->var2 = $var2;
			$this->operator = $operator;
		}
		
		public function command($filePath,$operator)  {
			$file = fopen($filePath,'r');
			while(!feof($file)) {
			switch($operator) {
			case '+': {
               $numbers = file($filePath);
			   foreach ($numbers as $number) {
				   $var = explode(" ",$number);
                   $result = (int)$var[0] + (int)$var[1];
				   if ($result > 0) {
					   $save_file = fopen("./result_positive.txt","w");
					   fwrite($save_file,$result);
					   fclose($save_file);
				   } else {
					   $save_file = fopen("./result_negative.txt","w");
					   fwrite($save_file,$result);
					   fclose($save_file);
				   }
			   }
			   break;
            }
			case '-': {
               $numbers = file($filePath);
			   foreach ($numbers as $number) {
				   $var = explode(" ",$number);
				   $result = $var[0] - $var[1];
				   if ($result > 0) {
					   $save_file = fopen("./result_positive.txt","w");
					   fwrite($save_file,$result);
					   fclose($save_file);
				   } else {
					   $save_file = fopen("./result_negative.txt","w");
					   fwrite($save_file,$result);
					   fclose($save_file);
				   }
			   }
			   break;
            }
                case '*': {
                    $numbers = file($filePath);
                    foreach ($numbers as $number) {
                        $var = explode(" ",$number);
                        $result = $var[0] * $var[1];
                        if ($result > 0) {
                            $save_file = fopen("./result_positive.txt","w");
                            fwrite($save_file,$result);
                            fclose($save_file);
                        } else {
                            $save_file = fopen("./result_negative.txt","w");
                            fwrite($save_file,$result);
                            fclose($save_file);
                        }
                    }
                    break;
                }
                case '/': {
                    $numbers = file($filePath);
                    foreach ($numbers as $number) {
                        $var = explode(" ",$number);
                        $result = $var[0] / $var[1];
                        if($var[0] == 1 && $var[1] == 0) {
                            echo "Infinity";
                        }
                        elseif ($result > 0) {
                            $save_file = fopen("./result_positive.txt","w");
                            fwrite($save_file,$result);
                            fclose($save_file);
                        } else {
                            $save_file = fopen("./result_negative.txt","w");
                            fwrite($save_file,$result);
                            fclose($save_file);
                        }
                    }
                    break;
                }
			
			}
		}
            fclose($file);
		}
	
		public function getVariable1() {
			return $this->var1;
		}

		public function getVariable2() {
			return $this->var2;
		}
	}
	$calculator = new Calculator(1,3,'+');
	echo $calculator ->command('./command.txt','+');
?>