<?php
namespace AutoLoading;
class loading
{
    public static function  autoload($className)
    {
    	// echo "<br>".$className."<br>";
    	$_application = getConfig("Application");
    	$fileName = false;
    	$name = strstr($className, '\\', true);
    	// echo $name."<br>";
    	if( $name ){
			if(in_array($name,array("think"))){
				return ;
			}
    		// echo "init 1 <br>";
	    	if (in_array($name, getConfig("AutoLoad") )) {
	    		// echo "init 1.1 <br>";
	            $fileName = __ROOT__ . "{$className}.php";
	        } else {
	        	// echo "init 1.2 <br>";
				$app_autoLoad = getConfig( "APP_AUTOLOAD" );
				foreach ($app_autoLoad as $key => $value) {
					if( $key == substr($className,-strlen($key)) ){
						/*
						 * 这里对应的是命名空间下Service、Model的方法
						 * new Api\Service()
						 */
						$_classNameExp = explode("\\", $className);
						if( $key == end($_classNameExp) ){
							// echo "init 1.2.1 <br>";
							$fileName = __ROOT__ . "{$_application}\\{$name}\\command.php";
						} else {
						/*
						 * 这里对应的是命名空间下M C S层的方法
						 * index\indexService
						 * Service("Api\a")  =>  Api\aService
						 */
						// echo "init 1.2.2 <br>";
						$_suffix = $value["SUFFIX"];
	    				$_index = strstr($className, '\\', true);
	    				$_className = substr(substr($className,strlen($name)),1,strlen($className) - strlen($key) - strlen($name) -1);
	    				$fileName = __ROOT__ . "{$_application}\\{$name}\\{$value['key']}\\{$_className}{$_suffix}";
						}
					break;
	    			}
	    		}
			}
    	} else {
    		// echo "init 2 <br>";
    		$app_autoLoad = getConfig( "APP_AUTOLOAD" );
    		foreach ($app_autoLoad as $key => $value) {
    			if( $key == $className ){
    				// echo "init 3 <br>";
    				/*
					 * 这里对应的是没用命名空间下的方法，在APP_AUTOLOAD中定义
					 * new \Service()
					 */
    				$_suffix = $value["SUFFIX"];
    				$fileName = __CORE__ . "AutoLoad/autoLoad.php";
    				break;
    			}elseif( $key == substr($className,-strlen($key)) ){
    				//好像没用
    				echo $key."<br>";
    				echo $className."<br>";
    				echo $value["SUFFIX"]."<br>";
    				echo "a bug show in here AutoLoading near Line 60<br>";
    				$_suffix = $value["SUFFIX"];
    				$fileName = __ROOT__ ."{$_application}\\Api\\{$className}{$_suffix}";
    				echo $fileName;
    				break;
    			}

    		}

    	}
		$fileName = str_replace("\\",DIRECTORY_SEPARATOR,$fileName);
		// echo $fileName."<br>";
		if (is_file($fileName)){
			include ($fileName);
		} else {
			$data = [
				"status" => 0,
				"data" => $className."不存在"
			];
			exit(json_encode($data));
		}
    }
}