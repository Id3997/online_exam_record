<?php
include 'config.php';
$crs_nm=$_POST['crs_nm'];
$yr_sem=$_POST['yr_sem'];
$sid=$_POST['sid'];

if($sid=='')
{	
	if($crs_nm=='' or $yr_sem=='')
	{
	?>
<script language="javascript">
alert('Please fill all the mandetory fields !');
window.history.go(-1);
</script>
<?php	
	}
	else
	{
	$f=0;
	$getta=mysqli_query($conn,"select * from crs_setup where cnm='$crs_nm'") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
		{	
			$f++;
		}

	if($f==0)
	{
	$query2 = "INSERT INTO crs_setup (cnm,yr_sem) VALUES ('$crs_nm','$yr_sem')";
	$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	$msg="Submitted Successfully. Thank You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="crs.php";
</script>
<?php
	}
	else
	{
?>
<script language="javascript">
alert('Course has already been added !');
window.history.go(-1);
</script>
<?php	
	}
	}
	}
else
{
	if($crs_nm=='' or $yr_sem=='')
	{
	?>
<script language="javascript">
alert('Please fill all the mandetory fields !');
window.history.go(-1);
</script>
<?php
	}
	else
		{
	$f=0;
	$getta=mysqli_query($conn,"select * from crs_setup where cnm='$crs_nm' and sl!='$sid'") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
	$f++;
    }
	
	
	if($f==0)
	{	

	{
		$getta=mysqli_query($conn,"select * from crs_setup where sl='$sid'") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
	{	
		$crs_nm1=$ro['cnm'];
		$yr_sem1=$ro['yr_sem'];
	}

	if($crs_nm1!=$crs_nm)
	{
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$crs_nm','$crs_nm1','$sid','crs_setup','Course Name')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
		if($yr_sem1!=$yr_sem)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$yr_sem','$yr_sem1','$sid','crs_setup','Semester')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
	

$query2 = "UPDATE crs_setup set cnm='$crs_nm',yr_sem='$yr_sem' where sl='$sid'";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
$msg="Updated Successfully. Thank You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="crs.php";
</script>
<?php
	}
}
else
{
?>
<script language="javascript">
alert('Course has already been added !');
window.history.go(-1);
</script>
<?php
}
}}
?>

