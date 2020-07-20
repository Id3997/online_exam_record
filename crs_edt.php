<?php
include 'config.php';
$sid=$_REQUEST['sid'];

$getta=mysqli_query($conn,"select * from crs_setup where sl='$sid'") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
			$crs_nm=$ro['cnm'];
			$yr_sem=$ro['yr_sem'];
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>COURSE EDIT</title>
  <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
  <style>
body {
  font-family: 'Spartan';
}
</style>
</head>
<body>
<header><h2 align="center"><font color="#00a8ff">COURSE EDIT</font></h2></header>
<table border="2px" width="10%" align="right">
<td align="center"><a href="index.php" title="Home"> <img src="img/home.png" height="30px"> </a></td>
<td align="center"><a href="crs.php" title="Back"> <img src="img/back.png" height="25px"> </a></td>
<td align="center"><a href="search.php" title="Search"> <img src="img/search.png" height="25px"> </a></td>
</table>
<form name="main" method="post" action="crs_value.php">
<input type="hidden" name="sid" id="sid" value="<?PHP echo $sid;?>">
<table border="2px" width="40%" align="center">
<td align="right" width="10%">Name<font color='red'>*</font></td>
<td align="left" width="30%"><input type="text" value="<?PHP echo $crs_nm;?>" name="crs_nm" id="crs_nm"></td>
<td align="right" width="10%">Semester<font color='red'>*</font> </td>
<td align="left" width="30%">
<select name="yr_sem" id="yr_sem">
<option value=""> --------Select--------</option>
<option value="1" <?=($yr_sem=='1')?'Selected':'';?>>1</option>
<option value="2" <?=($yr_sem=='2')?'Selected':'';?>>2</option>
<option value="3" <?=($yr_sem=='3')?'Selected':'';?>>3</option>
<option value="4" <?=($yr_sem=='4')?'Selected':'';?>>4</option>
<option value="5" <?=($yr_sem=='5')?'Selected':'';?>>5</option>
<option value="6" <?=($yr_sem=='6')?'Selected':'';?>>6</option>
<option value="7" <?=($yr_sem=='7')?'Selected':'';?>>7</option>
<option value="8" <?=($yr_sem=='8')?'Selected':'';?>>8</option>
<option value="9" <?=($yr_sem=='9')?'Selected':'';?>>9</option>
<option value="10" <?=($yr_sem=='10')?'Selected':'';?>>10</option>
</select>
<td align="center" width="20%" title="Click to Update" colspan="4"><b><input type="submit" value=" UPDATE "></b></td>
</table>
</form>