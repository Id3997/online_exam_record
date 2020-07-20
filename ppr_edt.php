<?php
include 'config.php';
$sid=$_REQUEST['sid'];

$getta=mysqli_query($conn,"select * from ppr_setup where sl='$sid'") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
			$crs_nm=$ro['crs_id'];
			$yr_sem=$ro['yr_sem'];
			$ppr_nm=$ro['ppr_nm'];
			$full_mrks=$ro['full_mrks'];
			$ps_mrks=$ro['ps_mrks'];
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PAPER EDIT</title>
  <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
  <style>
body {
  font-family: 'Spartan';
}
</style>
</head>
<body>
<header><h2 align="center"><font color="#00a8ff">PAPER EDIT</font></h2></header>
<table border="2px" width="10%" align="right">
<td align="center"><a href="index.php" title="Home"> <img src="img/home.png" height="30px"> </a></td>
<td align="center"><a href="ppr.php" title="Back"> <img src="img/back.png" height="25px"> </a></td>
<td align="center"><a href="search.php" title="Search"> <img src="img/search.png" height="25px"> </a></td>
</table>
<form name="main" method="post" action="ppr_value.php">
<input type="hidden" name="sid" id="sid" value="<?PHP echo $sid;?>">
<table border="2px" width="50%" align="center">
<tr>
<td align="center" width="25%">Course Name</td>
<td align="center" width="25%">
<select name="crs_nm" id="crs_nm">
<option value=""> --------Select--------</option>
<?PHP
$getta=mysqli_query($conn,"select * from crs_setup order by cnm") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
		$sl=$ro['sl'];
		$cnm=$ro['cnm'];
?>
<option value="<?php echo $sl;?>" <?=($sl==$crs_nm)?'Selected':'';?>><?php echo $cnm?></option>
<?PHP
	}
?>
</select>
<td align="center" width="25%">Semester</td>
<td align="center" width="25%">
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
</tr>
<tr>
<td align="center" width="25%">Paper Name<font color='red'>*</font></td>
<td align="center" width="25%"><input type="text" value="<?PHP echo $ppr_nm;?>" name="ppr_nm" id="ppr_nm" placeholder="Enter Paper name here"></td>
<td align="center" width="25%">Full Marks<font color='red'>*</font></td>
<td align="center" width="25%"><input type="number" value="<?PHP echo $full_mrks;?>" name="full_mrks" id="full_mrks"></td>
</tr>
<tr>
<td align="center" width="25%">Pass Marks<font color='red'>*</font></td>
<td align="center" width="25%"><input type="number" value="<?PHP echo $ps_mrks;?>" name="ps_mrks" id="ps_mrks"></td>
<td align="center" width="20%" title="Update" colspan="4"><b><input type="submit" value=" UPDATE "></b></td>
</tr>
</table>
</form>
</body>
</html>