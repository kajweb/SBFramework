<?php
namespace SBFramework\File;
class Upload
{
	public $root;
	public $upload;
	public $table;

	const RETURN_MODE = [
		"all" => -1,
		"both" => 0,
		"id" => 1,
		"saveName" => 2,
		"absolutePath" => 3,
		"fullUrl" => 3
	];

	function __construct($root,$path,$table = 'file'){
		$this->root = $root;
		$this->upload = $path;
		$this->table = $table;
	}


	//returnMode 0 为id
	//returnMode 1 为path
	function all( $file, $ext=false, $source=NULL, $returnMode=1, $allowEXT=false ){
		// if ((($_FILES["file"]["type"] == "image/gif")
		// || ($_FILES["file"]["type"] == "image/jpeg")
		// || ($_FILES["file"]["type"] == "image/pjpeg"))
		// && ($_FILES["file"]["size"] < 20000))
		// print_r($_FILES);
		if ( !isset($_FILES[$file]) || $_FILES[$file]["error"] > 0)
		{
			return false;
			echo "Error: " . $_FILES[$file]["error"] . "<br />";
		} else {
			// echo "Upload: " . $_FILES[$file]["name"] . "<br />";
			// echo "Type: " . $_FILES[$file]["type"] . "<br />";
			// echo "Size: " . ($_FILES[$file]["size"] / 1024) . " Kb<br />";
			// echo "Stored in: " . $_FILES[$file]["tmp_name"];
			if( $allowEXT ){
				$extName = getFileExtName($_FILES[$file]["name"]);
				if( in_array( $extName, $allowEXT ) === false ){
					return false;
				}
			}
			$saveName = $this->makePath(  $_FILES[$file], $ext );
			// echo $saveName;	
			$MUF = move_uploaded_file( $_FILES[$file]["tmp_name"] , $this->root . $saveName);
			if($MUF){
				return $this->addFile( $_FILES[$file], $ext, $saveName, $source, $returnMode );
			} else {
				return false;
			}
		}
	}

	function makeName( $file, $ext ){
		$fileName = date("YmdHis") . rand(1,999);
		if( $ext ){
			if( $ext === true ){
				$ext =  getFileExtName( $file['name'] );
			}
			$fileName .= "." . $ext;
		}
		return $fileName;
	}

	function makePath( $file, $ext ){
		$uploadPath = $this->upload . date("Ym");
		$uploadFullPath = $this->root . $uploadPath;
		is_dir($uploadFullPath) or mkdir($uploadFullPath, 0777, true);
		return $uploadPath . DIRECTORY_SEPARATOR . $this->makeName( $file, $ext );
	}

	function addFile( $file, $ext=false, $saveName, $source, $returnMode ){
		$db = \think\Db::name( $this->table );
		$map['fileName'] = $file['name'];
		$map['fileType'] = $file['type'];
		$map['fileSize'] = $file['size'];
		$map['saveName'] = path2Url( $saveName );
		$map['source'] = $source;
		$extName = getFileExtName( $file['name'] );
		if( $ext === true ){
			$extName && $map['ext'] = $extName;
		} elseif( $ext ){
			$map['ext'] = $ext;
		}
		$id = $db->insertGetId($map);
		switch ( $returnMode ) {
			case self::RETURN_MODE['both'] :
				$return = [ 'id'=>$id, "saveName"=>$map['saveName'] ];
				break;
			case self::RETURN_MODE['id'] :
				$return = $id;
				break;
			case self::RETURN_MODE['saveName'] :
				$return = $map['saveName'];
				break;
			case self::RETURN_MODE['absolutePath'] :
				$return = "/" . __PATH__ . $map['saveName'];
				break;
			case self::RETURN_MODE['fullUrl'] :
				$return = __DOMAIN__ . $map['saveName'];
				break;
			case self::RETURN_MODE['all'] :
			default:
				$return = $map;
				break;
		}
		return $return;
	}
}