<?php
include("../Assets/Connection/Connection.php");

      if(isset($_POST['btnSubmit']))
      {
        $name = $_POST['txt_name'];
        $contact = $_POST['txt_contact'];
        $email = $_POST['txt_email'];
        $address = $_POST['txt_address'];
        $password = $_POST['txt_password'];
    
    
    
            $proof = $_FILES["file_proof"]["name"];
            $file1 = $_FILES["file_proof"]["tmp_name"];
            move_uploaded_file($file1,"../Assets/Photos/TrainerProof/".$proof);
    
    
            $photo = $_FILES["file_photo"]["name"];
            $file2 = $_FILES["file_photo"]["tmp_name"];
            move_uploaded_file($file2,"../Assets/Photos/TrainerPhoto/".$photo);
    
    
          $place = $_POST['selplace'];
        
          $ins = "insert into tbl_trainer(trainer_name,trainer_contact,trainer_email,trainer_address,trainer_password,trainer_proof,trainer_photo,place_id) 
          values('".$name."','".$contact."','".$email."','".$address."','".$password."','".$proof."','".$photo."','".$place."')";
        
          if(mysql_query($ins))
          {
            header("location:TrainerList.php");
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
      <td>Name</td>
      <td>
      <input type="text" required="required"  name="txt_name" id="txt_name" />
    </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td>
      <input type="text" required="required"  name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
      <input type="email" required="required"  name="txt_email" id="txt_mail" /></td>
    </tr>   
    <tr>
      <td>Proof</td>
      <td>
      <input name="file_proof" type="file"/>
    </td>
    </tr>
    <tr>
      <td>Photo</td>
      <td>
      <input name="file_photo" type="file"/>
        </td>
    </tr>
    <tr>
                            <td>District</td>
                            <td>
                                    <select name="slctDistrict" required="required"  id="slctDistrict" onchange="show_dis(this.value,0)">
                                        <option>---Select---</option>
                                        <?php
                                      $sel="select * from tbl_district";
                                      echo $sel;
                                      $datas=mysql_query($sel);
                                      while($rows=mysql_fetch_array($datas))
                                      {
                                          ?>
                                        <option value="<?php echo $rows["district_id"];?>"> <?php echo $rows["district_name"];?> </option>
                                        <?php
                                      }
                                      ?>
                                      </select>
                            </td>
                                    </tr>
                        <tr >
                            <td class="name">Place</td>
                            <td class="value">
                                    <select name="selplace" required="required"  id="selplace">
                                      <option>---select---</option>
                                      </select>
                                    </td>
                                    </tr>
    <tr>
      <td>Address</td>
      <td>
      <textarea name="txt_address"></textarea>
    </td>
    </tr>
    <tr>
      <td>Password</td>
      <td>
      <input type="password" required="required"  name="txt_password" id="txt_mail" /></td>
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
<script src="../Assets/AjaxPages/Jq/jquery.js"></script>
<script>
function show_dis(did)
{

	$.ajax({
	url: "../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#selplace").html(html);
	  }
	});
}
</script>
<?php
include("Foot.php");
?>
</html>