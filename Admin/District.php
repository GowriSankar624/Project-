<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');


if(isset($_POST['btn_save']))
	{
		$district = $_POST['txt_district'];
		
		
		if($_POST['txt_id'])
		{
		
		$up = "update tbl_district set district_name = '".$district."' where district_id='".$_POST['txt_id']."'";
		
		if(mysql_query($up))
		{
			header("location:District.php");
		}
	
		}
		else
		{
			$ins = "insert into tbl_district (district_name) values('".$district."')";
		
			if(mysql_query($ins))
			{
				header("location:District.php");
			}
		}
		
		
	}

	
	if($_GET['id'])
	{
		$del = "delete from tbl_district where district_id = '".$_GET['id']."'";
		if(mysql_query($del))
		{
			header("location:district.php");
		}
	}
	if($_GET['eid'])
	{
		$cid = $_GET['eid'];
		$cname = $_GET['ename'];
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
                                                    <h3 class="mb-0" >Table district</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_state">District</label>
                                               
  <select name="txt_district" id="cars">
    <option value="Alappuzha">Alappuzha</option>
    <option value="Ernakulam">Ernakulam</option>
    <option value="Idukki">Idukki</option>
    <option value="Kannur">Kannur</option>
     <option value="Kasaragod">Kasaragod</option>
    <option value="Kollam">Kollam</option>
    <option value="Kottayam">Kottayam</option>
    <option value="Kozhikode">Kozhikode</option>
     <option value="Malappuram">Malappuram</option>
    <option value="Palakkad">Palakkad</option>
    <option value="Pathanamthitta">Pathanamthitta</option>
    <option value="Thiruvananthapuram">Thiruvananthapuram</option>
     <option value="Thrissur">Thrissur</option>
    <option value="Wayanad">Wayanad</option>
  </select>
                                                </div>
                                                <div class="form-group" align="center">
                                                    <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">District </td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
	$i=0;
	  $sel = "select * from tbl_district";
	  $row = mysql_query($sel);
	  while($data = mysql_fetch_array($row))
	  {
		  $i++;
		  ?>  
                                            <tr>
                                               <td align="center"><?php echo $i; 	?></td>
                   
            <td align="center"><?php echo $data['district_name']; ?></td>
            <td align="center">
            <a class="status_btn"  href="District.php?id=<?php echo $data['district_id']; ?>">Delete </a>
		
         <a class="status_btn"  href="District.php?eid=<?php echo $data['district_id']; ?>&ename=<?php echo $data['district_name']; ?> ">Edit </a></td>
                                            </tr>
                                            <?php                    
                                              }


                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php
		include('Foot.php');
		 ob_end_flush();
		?>
</body>
</html>