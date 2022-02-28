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
                                

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Name </td>
                                                <td align="center" scope="col">District</td>
												<td align="center" scope="col">Place</td>
												<td align="center" scope="col">Contact</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
	$i=0;
	  $sel = "select * from tbl_turf m inner join tbl_place p on p.place_id=m.place_id inner join tbl_district d on d.district_id=p.district_id";
	  $row = mysql_query($sel);
	  while($data = mysql_fetch_array($row))
	  {
		  $i++;
		  ?>  
                                            <tr>
                                               <td align="center"><?php echo $i; 	?></td>
                   
											   <td align="center"><?php echo $data['turf_name']; ?></td>
											   <td align="center"><?php echo $data['district_name']; ?>
											</td><td align="center"><?php echo $data['place_name']; ?></td>
											<td align="center"><?php echo $data['turf_contact']; ?></td>
                                            <td><a class="status_btn"  href="TurfGallery.php?id=<?php echo $data['turf_id']; ?>">Gallery </a></td>
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