<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PAPER SETUP</title>
  <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
  <style>
body {
  font-family: 'Spartan';
}
</style>
</head>
<body>
<header><h2 align="center"><font color="#00a8ff">PAPER SETUP</font></h2></header>
<table border="2px" width="10%" align="right">
<td align="center"><a href="index.php" title="Home"> <img src="img/home.png" height="30px"> </a></td>
<td align="center"><a href="index.php" title="Back"> <img src="img/back.png" height="25px"> </a></td>
<td align="center"><a href="search.php" title="Search"> <img src="img/search.png" height="25px"> </a></td>
</table>
<form name="main" method="post" action="ppr_value.php">
<table border="2px" width="46%" align="center">
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
<option value="<?php echo $sl;?>"><?php echo $cnm?></option>
<?PHP
	}
?>
</select>
<td align="center" width="25%">Semester</td>
<td align="center" width="25%">
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
</tr>
<tr>
<td align="center" width="25%">Paper Name<font color='red'>*</font></td>
<td align="center" width="25%"><input type="text" name="ppr_nm" id="ppr_nm" placeholder="Enter Paper name here"></td>
<td align="center" width="25%">Full Marks<font color='red'>*</font></td>
<td align="center" width="25%"><input type="number" name="full_mrks" id="full_mrks"></td>
</tr>
<tr>
<td align="center" width="25%">Pass Marks<font color='red'>*</font></td>
<td align="center" width="25%"><input type="number" name="ps_mrks" id="ps_mrks"></td>
<td align="center" width="20%" title="Submit" colspan="4"><b><input type="submit" value=" SUBMIT "></b></td>
</tr>
</table>
</form>
<br>
<br>
<br>
<table border='2px' width='70%' align='center'>
<tr>
<th>Serial no.</th>
<th>Course Name</th>
<th>Semester</th>
<th>Paper Name</th>
<th>Full marks</th>
<th>Pass marks</th>
<th>Edit</th>
<th>Delete</th>
<th>Edit log</th>
</tr>

<?PHP
$f=0;
$getta=mysqli_query($conn,"select * from ppr_setup order by crs_id,yr_sem,ppr_nm,full_mrks") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	$f++;
		$sl=$ro['sl'];
		$crs_id=$ro['crs_id'];
		$yr_sem=$ro['yr_sem'];
		$ppr_nm=$ro['ppr_nm'];
		$full_mrks=$ro['full_mrks'];
		$ps_mrks=$ro['ps_mrks'];
		
	$get=mysqli_query($conn,"select * from crs_setup where sl='$crs_id'") or die(mysqli_error());
	while($ro1=mysqli_fetch_array($get))
	{	
		$cnm=$ro1['cnm'];
	}
		
	$edt=0;
		
	$get=mysqli_query($conn,"select * from edit_log where tblnm='ppr_setup' and tblsl='$sl'") or die(mysqli_error());
	while($ro1=mysqli_fetch_array($get))
	{	
		$edt++;
	}
		
?>
<tr>
<td  align="center"><?php echo $f;?></td>
<td  align="center"><?php echo $cnm;?></td>
<td  align="center"><?php echo $yr_sem;?></td>
<td  align="center"><?php echo $ppr_nm;?></td>
<td  align="center"><?php echo $full_mrks;?></td>
<td  align="center"><?php echo $ps_mrks;?></td>
<td align="center"><a href="ppr_edt.php?sid=<?php echo $sl?>" title="Click to Edit"> <img src="img/edit.png" height="25px"> </a></td>
<td align="center"><a href="delete.php?sid=<?php echo $sl?>&tblnm=ppr_setup" title="Click to Delete"> <img src="img/delete.png" height="25px"> </a></td>
<td align="center">
<?PHP
if($edt>0)
{
?>
<a href="editlog.php?sid=<?php echo $sl?>&tblnm=ppr_setup" title="Click to Show"> <img src="img/show.png" height="20px"> </a>
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