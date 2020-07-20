<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>COURSE SETUP</title>
  <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
  <style>
body {
  font-family: 'Spartan';
}
</style>
</head>
<body>
<header><h2 align="center"><font color="#00a8ff">COURSE SETUP</font></h2></header>
<table border="2px" width="10%" align="right">
<td align="center"><a href="index.php" title="Home"> <img src="img/home.png" height="30px"> </a></td>
<td align="center"><a href="index.php" title="Back"> <img src="img/back.png" height="25px"> </a></td>
<td align="center"><a href="search.php" title="Search"> <img src="img/search.png" height="25px"> </a></td>
</table>
<form name="main" method="post" action="crs_value.php">
<table border="2px" width="40%" align="center">
<td align="right" width="10%">Name<font color='red'>*</font></td>
<td align="left" width="30%"><input type="text" name="crs_nm" id="crs_nm" placeholder="Enter course name"></td>
<td align="right" width="10%">Semester<font color='red'>*</font></td>
<td align="left" width="30%">
<select name="yr_sem" id="yr_sem">
<option value=""> --------Select--------</option>
<?PHP
	
		for($i=1;$i<=10;$i++)
		{
		?>
			<option value="<?php echo $i;?>"><?php echo $i?></option>
		<?PHP
		}
		?>
</select>
<td align="center" width="20%" title="Click to Submit" colspan="4"><b><input type="submit" value=" SUBMIT "></b></td>
</table>
</form>
<br>
<br>
<br>
<table border='2px' width='40%' align='center'>
<tr>
<th>Serial no.</th>
<th>Course Name</th>
<th>Semester</th>
<th>Edit</th>
<th>Delete</th>
<th>Edit log</th>
</tr>

<?PHP
$f=0;
$getta=mysqli_query($conn,"select * from crs_setup order by cnm") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	$f++;
		$sl=$ro['sl'];
		$crs_nm=$ro['cnm'];
		$yr_sem=$ro['yr_sem'];
		
	$edt=0;
		
			$get=mysqli_query($conn,"select * from edit_log where tblnm='crs_setup' and tblsl='$sl'") or die(mysqli_error());
	while($ro1=mysqli_fetch_array($get))
	{	
		$edt++;
	}
		
?>
<tr>
<td  align="center"><?php echo $f;?></td>
<td  align="center"><?php echo $crs_nm;?></td>
<td  align="center"><?php echo $yr_sem;?></td>
<td align="center"><a href="crs_edt.php?sid=<?php echo $sl?>" title="Click to Edit"> <img src="img/edit.png" height="25px"> </a></td>
<td align="center"><a href="delete.php?sid=<?php echo $sl?>&tblnm=crs_setup" title="Click to Delete"> <img src="img/delete.png" height="25px"> </a></td>
<td align="center">
<?PHP
if($edt>0)
{
?>
<a href="editlog.php?sid=<?php echo $sl?>&tblnm=crs_setup" title="Click to Show"> <img src="img/show.png" height="20px"> </a>
<?PHP
}
?>
<?php
	}
?>
</td>
</tr>
</table>
</body>

</html>