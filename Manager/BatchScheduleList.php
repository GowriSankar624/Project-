<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

?>




	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>List</title>
</head>

<body>
<div id="tab" align="center">
<div align="center">
  <table border="1">
    <tr>
        <td>Sl.no</td>
        <td>Count</td>
        <td>Remain</td>
        <td>From</td>
        <td>To</td>
        <td>Amount</td>
        <td>Trainer</td>
</tr>
<?php
$i=0;
$sel = "select * from tbl_slot s inner join tbl_trainer t on s.trainer_id=t.trainer_id";
$row = mysql_query($sel);
while($data = mysql_fetch_array($row))
{
        $i++;
?>
<tr>
        <td><?php echo  $i;?></td>
        <td><?php echo $data["slot_count"];?></td>
        <td><?php echo $data["slot_count"];?></td>
        <td><?php echo $data["slot_from"];?></td>
        <td><?php echo $data["slot_to"];?></td>
        <td><?php echo $data["slot_amount"];?></td>
        <td><?php echo $data["trainer_name"];?></td>
</tr>
<?php
}
?>
</table>
<br><br><br><br><br><br><br>
</body>
<?php
include("Foot.php");
?>
</html>