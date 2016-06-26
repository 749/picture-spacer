<?php

define('TYPE_JPEG', 0);
define('TYPE_PNG', 1);
define('TYPE_GIF', 2);

$filetype = TYPE_PNG;
$width = 100;
$height = 100;
$font = 'Nunito-Bold';

putenv('GDFONTPATH=' . realpath('.'));

if(preg_match_all("/^\/([0-9]+)[\/x]([0-9]+)(.(png|jpg|jpeg|gif))?/", $_SERVER['REQUEST_URI'], $parts)) {
  $width = intval($parts[1][0]);
  $height = intval($parts[2][0]);
  switch($parts[4][0]){
    case 'gif':
      $filetype = TYPE_GIF;
      break;
    case 'jpg':
    case 'jpeg':
      $filetype = TYPE_JPEG;
      break;
    case 'png':
    default:
      $filetype = TYPE_PNG;
      break;
  }
  if($width * $height > 4000*4000) {
    $width = 4000;
    $height = 4000;
  }
}

$image = @imagecreatetruecolor($width, $height)or die('Cannot Initialize new GD image stream');
$grey = imagecolorallocate($image, 220,220,220);
$darkgrey = imagecolorallocate($image, 130,130,130);

$text = $width . "x" . $height;

//calculate the needed space for the text
$textheight = ($width < 200)?10:30;
$bbox = imagettfbbox($textheight, 0, $font, $text);

// This is our cordinates for X and Y
$x = $bbox[0] + ($width - $bbox[4]) / 2;
$y = $bbox[1] + ($height - $bbox[5]) / 2;

imagefill($image, 0, 0, $grey);
imagettftext($image, $textheight, 0, $x, $y, $darkgrey, $font, $text);

header('Cache-Control: no-cache, no-store, must-revalidate
Pragma: no-cache
Expires: 0');

if($filetype == TYPE_JPEG) {
  header("Content-Type: image/jpeg");
  imagejpeg($image);
} else if($filetype == TYPE_PNG) {
  header("Content-Type: image/png");
  imagepng($image);
} else if($filetype == TYPE_GIF) {
  header("Content-Type: image/gif");
  imagegif($image);
}

imagedestroy($image);