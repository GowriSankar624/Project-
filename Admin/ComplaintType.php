<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Type</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');


if(isset($_POST['btn_save']))
	{
		$complainttype = $_POST['txt_complainttype'];
		
		
		if($_POST['txt_id'])
		{
		
		$up = "update tbl_complainttype set complainttype_name = '".$complainttype."' where complainttype_id='".$_POST['txt_id']."'";
		
		if(mysql_query($up))
		{
			header("location:complainttype.php");
		}
	
		}
		else
		{
			$ins = "insert into tbl_complainttype (complainttype_name) values('".$complainttype."')";
		
			if(mysql_query($ins))
			{
				header("location:complainttype.php");
			}
		}
		
		
	}

	
	if($_GET['id'])
	{
		$del = "delete from tbl_complainttype where complainttype_id = '".$_GET['id']."'";
		if(mysql_query($del))
		{
			header("location:complainttype.php");
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
                                                    <h3 class="mb-0" >Table Complaint Type</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_state">Complaint Type</label>
                                                    <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $cid ;?>"/>
        <input type="text" name="txt_complainttype" id="txt_complainttype" class="form-control" value="<?php echo $cname;?>"/>
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
                                                <td align="center" scope="col">Complaint Type </td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
	$i=0;
	  $sel = "select * from tbl_complainttype";
	  $row = mysql_query($sel);
	  while($data = mysql_fetch_array($row))
	  {
		  $i++;
		  ?>  
                                            <tr>
                                               <td align="center"><?php echo $i; 	?></td>
                   
            <td align="center"><?php echo $data['complainttype_name']; ?></td>
            <td align="center">
            <a class="status_btn"  href="complainttype.php?id=<?php echo $data['complainttype_id']; ?>">Delete </a>
		
         <a class="status_btn"  href="complainttype.php?eid=<?php echo $data['complainttype_id']; ?>&ename=<?php echo $data['complainttype_name']; ?> ">Edit </a></td>
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