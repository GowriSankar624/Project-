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
		$id = $_POST['txt_id'];
        $caption = $_POST['txt_caption'];


        $photo = $_FILES['file_photo']['name'];
        $file = $_FILES['file_photo']['tmp_name'];
        move_uploaded_file($file,"../Assets/Photos/TurfGallery/".$photo);
		
		
			$ins = "insert into tbl_gallery (gallery_caption,gallery_file,turf_id) values('".$caption."','".$photo."','".$id."')";
		
			if(mysql_query($ins))
			{
				header("location:TurfGallery.php?id=".$_POST['txt_id']);
			}
		
		
		
	}

	
	if($_GET['did'])
	{
		$del = "delete from tbl_gallery where gallery_id = '".$_GET['did']."'";
		if(mysql_query($del))
		{
			header("location:TurfGallery.php?id=".$_GET["id"]);
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
                                                    <h3 class="mb-0" >Table Gallery</h3>
                                                </div>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                
         <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $_GET["id"] ;?>"/>
                                                <div class="form-group">
                                                    <label for="file_photo">File</label>
        <input type="file" name="file_photo" id="file_photo " class="form-control" />
                                                </div>
                                                <div class="form-group">
           <label for="txt_caption">Caption</label>
        <input type="text" name="txt_caption" id="txt_caption" class="form-control"/>
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
                                                <td align="center" scope="col">File </td>
                                                <td align="center" scope="col">Caption </td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
	$i=0;
	  $sel = "select * from tbl_gallery where turf_id='".$_GET["id"]."'";
	  $row = mysql_query($sel);
	  while($data = mysql_fetch_array($row))
	  {
		  $i++;
		  ?>  
                                            <tr>
                                               <td align="center"><?php echo $i; 	?></td>
                   
            <td align="center"><img src="../Assets/Photos/TurfGallery/<?php echo $data['gallery_file']; ?> " width="120" height="120"></td>
            <td align="center"><?php echo $data['gallery_caption']; ?> </td>
            <td align="center">
		
         <a class="status_btn"  href="TurfGallery.php?did=<?php echo $data['gallery_id']; ?>&id=<?php echo $data['turf_id']; ?> ">Delete </a></td>
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