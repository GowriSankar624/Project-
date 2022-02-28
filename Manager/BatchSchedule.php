<?php
include("../Assets/Connection/Connection.php");

      if(isset($_POST['btnSubmit']))
      {
        $title = $_POST['txt_title'];
        $count = $_POST['txt_count'];
        $from = $_POST['date_from'];
        $to = $_POST['date_to'];
        $amount = $_POST['txt_amount'];
        $details = $_POST['txt_details'];
        $trainer = $_POST['slctTariner'];
        
          $ins = "insert into  tbl_slot(slot_count,slot_from,slot_to,slot_amount,slot_details,slot_title,trainer_id) 
          values('".$count."','".$from."','".$to."','".$amount."','".$details."','".$title."','".$trainer."')";
        
          if(mysql_query($ins))
          {
            header("location:BatchSchedule.php");
          }
        
      }
    
      
    
	 include("Head.php");
	 
	  ?>










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tariner</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
  <table width="400" border="1"> 
  <tr>
      <td>Title</td>
      <td>
      <input type="text" required="required"  name="txt_title" id="txt_title" />
    </td>
    </tr>
  <tr>
      <td>Count</td>
      <td>
      <input type="text" required="required"  name="txt_count" id="txt_count" />
    </td>
    </tr>
    <tr>
      <td>Amount</td>
      <td>
      <input type="text" required="required"  name="txt_amount" id="txt_amount" />
    </td>
    </tr>
    <tr>
      <td>From</td>
      <td>
      <input type="date" required="required"  name="date_from" id="date_from" /></td>
    </tr>
    <tr>
      <td>To</td>
      <td>
      <input type="date" required="required"  name="date_to" id="date_to" /></td>
    </tr>   
    <tr>
         <td>Trainer</td>
              <td>
                 <select name="slctTariner" required="required"  id="slctTariner" >
                  <option>---Select---</option>
                    <?php
                        $sel="select * from tbl_trainer";
                          $datas=mysql_query($sel);
                           while($rows=mysql_fetch_array($datas))
                            {
                              ?>
                                <option value="<?php echo $rows["trainer_id"];?>"> <?php echo $rows["trainer_name"];?> </option>
                               <?php
                            }
                               ?>
                   </select>
                </td>
    </tr>
    <tr>
      <td>Details</td>
      <td>
      <textarea name="txt_details"></textarea>
    </td>
    </tr>   
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</div>
</body>
<br />
<br /><br />
<br /><br />
<br />

<?php
include("Foot.php");
?>
</html>