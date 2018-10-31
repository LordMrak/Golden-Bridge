<?
function img_resize(
$way                // Путь без имени файла на конце и без "/" на конце
,$name              // Имя обрабатываемого файла
, $dest             // Имя результирующего файла. В данной версии скрипта - нужно передавать с форматом Пример: new.jpg
, $x                // Один из параметров изменения размера: если log = flase => $x=высота ... если передать log = true => $x=ширина
,$log=false         // log = flase => $x=высота ... если передать log = true => $x=ширина
, $rgb=0xFFFFFF, $quality=100)
{
	
$src=$way.'/'.$name;

  if (!file_exists($src)) return false;

  $size = getimagesize($src);

  if ($size === false) return false;

  // Определяем исходный формат по MIME-информации, предоставленной
  // функцией getimagesize, и выбираем соответствующую формату
  // imagecreatefrom-функцию.
  $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
  $dest=$way.'/'.$dest;
  $icfunc = "imagecreatefrom" . $format;
  if (!function_exists($icfunc)) return false;
  if(!$log)
  {
	  if($size[0]>$size[1] && $x!=160){$height=($x*$size[1])/$size[0]; $width=$x;}else
	  {$width=($size[0] * $x) / $size[1]; $height=$x;}
  }else
  {
	  $height=($x*$size[1])/$size[0]; $width=$x;
	  }

  $x_ratio = $width / $size[0];
  $y_ratio=$height / $size[1];



  $ratio       = min($x_ratio, $y_ratio);
  $use_x_ratio = ($x_ratio == $ratio);

  $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
  $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
  $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
  $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

  $isrc = $icfunc($src);
  $idest = imagecreatetruecolor($width, $height);

  imagefill($idest, 0, 0, $rgb);
  imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, 
    $new_width, $new_height, $size[0], $size[1]);

  if($size[2]==2)
  {imagejpeg($idest, $dest, $quality);}
  elseif($size[2]==1)
  {imagegif($idest, $dest);}
  elseif($size[2]==3)
  {imagepng($idest, $dest);}

  imagedestroy($isrc);
  imagedestroy($idest);

  return true;

};

function img_resize2(
$way_from           // Путь откуда берем файл, без имени файла на конце и без "/" на конце
,$name				// Имя обрабатываемого файла
, $way_to           // Путь куда сохраняем, без имени файла на конце и без "/" на конце
, $dest             // Имя результирующего файла. В данной версии скрипта - нужно передавать с форматом Пример: new.jpg
, $x                // Один из параметров изменения размера: если log = flase => $x=высота ... если передать log = true => $x=ширина
,$log=false         // log = flase => $x=высота ... если передать log = true => $x=ширина
, $rgb=0xFFFFFF, $quality=100)
{
	
 $src=$way_from.'/'.$name;
//$dest=$way_to.'/'.$dest;
  if (!file_exists($src)) return false;

  $size = getimagesize($src);

  if ($size === false) return false;

  // Определяем исходный формат по MIME-информации, предоставленной
  // функцией getimagesize, и выбираем соответствующую формату
  // imagecreatefrom-функцию.
  $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
  $dest=$way_to.'/'.$dest;
  $icfunc = "imagecreatefrom" . $format;
  if (!function_exists($icfunc)) return false;
  if(!$log)
  {
	  if($size[0]>$size[1] && $x!=160){
		  $height=($x*$size[1])/$size[0]; $width=$x;
		  }else
	  {$width=($size[0] * $x) / $size[1]; $height=$x;}
  }else
  {
	  $height=($x*$size[1])/$size[0]; $width=$x;
	  }

  $x_ratio = $width / $size[0];
  $y_ratio=$height / $size[1];



  $ratio       = min($x_ratio, $y_ratio);
  $use_x_ratio = ($x_ratio == $ratio);

  $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
  $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
  $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
  $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

  $isrc = $icfunc($src);
  $idest = imagecreatetruecolor($width, $height);

  imagefill($idest, 0, 0, $rgb);
  imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, 
    $new_width, $new_height, $size[0], $size[1]);

  if($size[2]==2)
  {imagejpeg($idest, $dest, $quality);}
  elseif($size[2]==1)
  {imagegif($idest, $dest);}
  elseif($size[2]==3)
  {imagepng($idest, $dest);}

  imagedestroy($isrc);
  imagedestroy($idest);

  return true;

};

?>