<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');


if(isset($_POST['btn_save']))
  {
    $name = $_POST['txt_name'];
    $contact = $_POST['txt_contact'];
    $email = $_POST['txt_email'];
    $address = $_POST['txt_address'];
    $password = $_POST['txt_password'];



        $proof = $_FILES["file_proof"]["name"];
        $file1 = $_FILES["file_proof"]["tmp_name"];
        move_uploaded_file($file1,"../Assets/Photos/ManagerProof/".$proof);


        $photo = $_FILES["file_photo"]["name"];
        $file2 = $_FILES["file_photo"]["tmp_name"];
        move_uploaded_file($file2,"../Assets/Photos/ManagerPhoto/".$photo);


      $place = $_POST['sel_place'];
    
      $ins = "insert into tbl_manager(manager_name,manager_contact,manager_email,manager_address,manager_password,manager_proof,manager_photo,place_id) 
      values('".$name."','".$contact."','".$email."','".$address."','".$password."','".$proof."','".$photo."','".$place."')";
    
      if(mysql_query($ins))
      {
        header("location:ManagerList.php");
      }
    
  }

  


?>

<body>
        <section class="main_content dashboard_part">

            <!--/ menu  -->
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="QA_section">
                                <!--Form-->
                                <div class="white_box_tittle list_header">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="box_header ">
                                                <div class="main-title">
                                                    <h3 class="mb-0" >Table Manager</h3>
                                                </div>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                    Name
        <input type="text" name="txt_name"  class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    Contact
                                                   
        <input type="text" name="txt_contact"  class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    Email
                                                   
        <input type="email" name="txt_email"  class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    Address
                                                   
        <textarea name="txt_address"  class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_district">District</label>
                                                    <select onchange="getPlace(this.value)" class="form-control" name="sel_district" id="sel_district" >
                                                    <option value="">-----Select-----</option>
                                                     <?php
                                                          $sel ="select * from tbl_district ";
                                                  $row = mysql_query($sel);
                                                  while($data = mysql_fetch_array($row))
                                                  {
                                                 ?>
                                                     <option value="<?php echo $data['district_id'];?> " 
                                                    
                                                      ><?php echo $data['district_name']; ?></option >
                                                     
                                                     <?php
                                                     }
                                                     ?>
                                                    
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    Place
                                                    <select class="form-control" name="sel_place" id="sel_place" >
                                                    <option value="">-----Select-----</option>
                                                     
                                                    
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    Photo
                                                   
        <input type="file" name="file_photo"  class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    Proof
                                                   
        <input type="file" name="file_proof"  class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    Password
                                                   
        <input type="password" name="txt_password"  class="form-control"/>
                                                </div>
                                                <div class="form-group" align="center">
                                                    <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
       
        <?php
    // include('Foot.php');
     ob_end_flush();
    ?>
    <script src="../Assets/Jq/jquery.js"></script>
<script>
function getPlace(did)
{
   
	$.ajax({
	url: "../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#sel_place").html(html);
	  }
	});
}
</script>
</body>
</html>