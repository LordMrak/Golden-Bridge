<?
class Check_dif_reg
{
	var $error;
	function complite($error, $text)
	{
		$this->error[][0]=$text;
		$this->error[count($this->error)-1][1]=$error;
		return($error);
		}
	function check_date($obj)
	{
		$error=preg_match('/^[0-9]{4}[\-][0-9]{2}[\-][0-9]{2}$/',$obj);
		$this->complite($error,'Дата');
		}
	function check_time($obj)
	{
		$error=preg_match('/^[0-9]{1,2}[\:][0]{2}$/',$obj);
		$this->complite($error,'Время');
		}
	function check_procent($obj)
	{
		$error=preg_match('/^([0-9]{0,2}|100)$/',$obj);
		$this->complite($error,'Процент');
		}
	function check_log($obj, $text)
	{
		if($obj==1 || $obj==0) $error=1; else $error=0;
		$this->complite($error,$text);
		}
	
	function check_email($obj)
	{
		$error=preg_match('/^[0-9a-zA-Z\_\-\.]+@[0-9a-zA-Z\-]+[\.]{1}[a-zA-Z]{2,3}$/',$obj);
		$this->complite($error,"EMIL");
		}
	function check_numbers($obj, $text, $lenght = 0)
	{
		$error=preg_match('/^[0-9]*$/',$obj);
		if($error == true) 
		{ 
			if( strlen($obj)<$lenght)
			{
				$error=false; 
				$text="Поле ".$text." должно содержать не менее ".$lenght." цифр!";
			}
		}
		$this->complite($error,$text);
		}
	public function check_house_name($obj, $text, $lenght = 0)
	{
		$error=preg_match(iconv("utf-8","windows-1251", '/^[0-9a-zA-Zа-яА-Я\.\s\/@]+$/'),iconv("utf-8","windows-1251", $obj));
		if($error == true) 
		{ 
			if( strlen($obj)<$lenght)
			{
				$error=false; 
				$text="Поле ".$text." должно содержать не менее ".$lenght." цифр!";
			}
		}
		$this->complite($error,$text);
		}
	
	function check_names($obj, $text, $lenght = 0)
	{
		$error=preg_match(iconv("utf-8","windows-1251", '/^[0-9a-zA-Zа-яА-Я\.\s\@\+\-]*$/'),iconv("utf-8","windows-1251", $obj));
		if($error == true) { 
			if( strlen($obj)<$lenght)
			{
				$error=false; 
				$text="Поле ".$text." должно содержать не менее ".$lenght." символов!";
			}
				
		}
		//preg_match('/^[0-9a-zA-Zа-яА-Я\.\s]+$/',);
		$this->complite($error,$text);
		}
	function check_tel($obj)
	{
		$error=preg_match('/^\+{0,1}[0-9]{7,12}$/',$obj);
		$this->complite($error,"Телефон");
		}
	
};
function get_var_get($obj)
{
		if (isset($_GET[''.$obj.''])) {
	  $temp = htmlspecialchars((get_magic_quotes_gpc()) ? $_GET[''.$obj.''] : addslashes($_GET[''.$obj.'']));
	  return($temp);
		}else return(NULL);
};
function get_var_post($obj)
{
		if (isset($_POST[''.$obj.''])) {
	  $temp = htmlspecialchars((get_magic_quotes_gpc()) ? $_POST[''.$obj.''] : addslashes($_POST[''.$obj.'']));
	  return($temp);
		}else return(NULL);
};

function money_format_1($obj)
{
	return(number_format(round($obj,2), 2, ',', ' '));
	}
function money_format_2($obj)
{
	return(number_format(round($obj,0), 0, ',', ' '));
	}
function generatePassword($length = 8){
  $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
  $numChars = strlen($chars);
  $string = '';
  for ($i = 0; $i < $length; $i++) {
    $string .= substr($chars, rand(1, $numChars) - 1, 1);
  }
  return $string;
};
  function RemoveDir($path)
{
	if(file_exists($path) && is_dir($path))
	{
		$dirHandle = opendir($path);
		while (false !== ($file = readdir($dirHandle))) 
		{
			if ($file!='.' && $file!='..')// исключаем папки с назварием '.' и '..' 
			{
				$tmpPath=$path.'/'.$file;
				chmod($tmpPath, 0777);
				
				if (is_dir($tmpPath))
	  			{  // если папка
					RemoveDir($tmpPath);
			   	} 
	  			else 
	  			{ 
	  				if(file_exists($tmpPath))
					{
						// удаляем файл 
	  					unlink($tmpPath);
					}
	  			}
			}
		}
		closedir($dirHandle);
		
		// удаляем текущую папку
		if(file_exists($path))
		{
			rmdir($path);
			return true;
		}
	}
	else
	{
		return false;
		
	}
};

///************************Удаление с помощью рег выражений************************///
class Replace_string
{
	var $array_;
	
	function complite($obj, $text, $error)
	{
		$this->array_[][0]=$obj;
		$this->array_[count($this->array_)-1][1]=$text;
		$this->array_[count($this->array_)-1][2]=$error;
		return($array_);
		}
	function only_coll($obj)
	{
		$error=false;
		$obj=preg_replace('~\D+~','',$obj);
		if($obj == true) 
		{ 
			if( strlen($obj)>=4)
			{
				$error=true; 
				$text="Поле ".$text." должно содержать не менее 4 цифр!";
			}else{$text="Проверка прошла успешно";}
		}else 
		{
			$error= true;
			$text="Поле количества не прошло проверку или модификацию!";
			}
		$this->complite($obj,$text,$error);
	}
}
///************************Удаление с помощью рег выражений************************///
?>
<?php
    function format_phone($phone = '', $convert = false, $trim = true)
    {
        // If we have not entered a phone number just return empty
        if (empty($phone)) {
            return '';
        }
     
        // Strip out any extra characters that we do not need only keep letters and numbers
        $phone = preg_replace("/[^0-9A-Za-z]/", "", $phone);
     
        // Do we want to convert phone numbers with letters to their number equivalent?
        // Samples are: 1-800-TERMINIX, 1-800-FLOWERS, 1-800-Petmeds
        if ($convert == true) {
            $replace = array('2'=>array('a','b','c'),
                     '3'=>array('d','e','f'),
                         '4'=>array('g','h','i'),
                     '5'=>array('j','k','l'),
                                     '6'=>array('m','n','o'),
                     '7'=>array('p','q','r','s'),
                     '8'=>array('t','u','v'), '9'=>array('w','x','y','z'));
     
            // Replace each letter with a number
            // Notice this is case insensitive with the str_ireplace instead of str_replace 
            foreach($replace as $digit=>$letters) {
                $phone = str_ireplace($letters, $digit, $phone);
            }
        }
     
        // If we have a number longer than 11 digits cut the string down to only 11
        // This is also only ran if we want to limit only to 11 characters
        if ($trim == true && strlen($phone)>11) {
            $phone = substr($phone,  0, 11);
        }
     
        // Perform phone number formatting here
        if (strlen($phone) == 7) {
            return preg_replace("/([0-9a-zA-Z]{3})([0-9a-zA-Z]{4})/", "$1-$2", $phone);
        } elseif (strlen($phone) == 10) {
            return preg_replace("/([0-9a-zA-Z]{3})([0-9a-zA-Z]{3})([0-9a-zA-Z]{4})/", "($1) $2-$3", $phone);
        } elseif (strlen($phone) == 11) {
            return preg_replace("/([0-9a-zA-Z]{1})([0-9a-zA-Z]{3})([0-9a-zA-Z]{3})([0-9a-zA-Z]{4})/", "$1($2) $3-$4", $phone);
        }
     
        // Return original phone if not 7, 10 or 11 digits long
        return $phone;
    }
    ?>