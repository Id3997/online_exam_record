<?php
include 'config.php';
$crs_nm=$_POST['crs_nm'];
$yr_sem=$_POST['yr_sem'];
$ppr_nm=$_POST['ppr_nm'];
$full_mrks=$_POST['full_mrks'];
$ps_mrks=$_POST['ps_mrks'];
$sid=$_POST['sid'];

if($sid=='')
{	
	if($ppr_nm=='' or $full_mrks=='' or $ps_mrks=='')
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
	$query2 = "INSERT INTO ppr_setup (crs_id,yr_sem,ppr_nm,full_mrks,ps_mrks) VALUES ('$crs_nm','$yr_sem','$ppr_nm','$full_mrks','$ps_mrks')";
	$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	$msg="Submitted Successfully. Thank You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="ppr.php";
</script>
<?php	
	}
	}
else
{
	if($ppr_nm=='' or $full_mrks=='' or $ps_mrks=='')
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
		$getta=mysqli_query($conn,"select * from ppr_setup where sl='$sid'") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
	{	
		$crs_nm1=$ro['crs_id'];
		$yr_sem1=$ro['yr_sem'];
		$ppr_nm1=$ro['ppr_nm'];
		$full_mrks1=$ro['full_mrks'];
		$ps_mrks1=$ro['ps_mrks'];
	}

	if($crs_nm1!=$crs_nm)
	{
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm,reftbl,frffld) VALUES ('$crs_nm','$crs_nm1','$sid','ppr_setup','Course Name','crs_setup','cnm')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
		if($yr_sem1!=$yr_sem)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$yr_sem','$yr_sem1','$sid','ppr_setup','Semester')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
		if($ppr_nm1!=$ppr_nm)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$ppr_nm','$ppr_nm1','$sid','ppr_setup','Paper Name')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
		if($full_mrks1!=$full_mrks)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$full_mrks','$full_mrks1','$sid','ppr_setup','Full Marks')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
		if($ps_mrks1!=$ps_mrks)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$ps_mrks','$ps_mrks1','$sid','ppr_setup','Pass Marks')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
	

	

$query2 = "UPDATE ppr_setup set crs_id='$crs_nm',yr_sem='$yr_sem',ppr_nm='$ppr_nm',full_mrks='$full_mrks',ps_mrks='$ps_mrks' where sl='$sid'";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
$msg="Updated Successfully. Thank You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="ppr.php";
</script>
<?php
	}
}
	
?>
