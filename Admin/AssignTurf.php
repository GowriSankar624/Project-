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
    $turf = $_POST['sel_turf'];
    $manager = $_POST['sel_manager'];
    
      $ins = "insert into tbl_assign_turf  (turf_id,manager_id,assign_date) values('".$turf."','".$manager."',curdate())";
    
      if(mysql_query($ins))
      {
        header("location:AssignTurf.php");
      }
    
  }

  
  if($_GET['id'])
  {
    $del = "delete from tbl_assign_turf  where assign_id = '".$_GET['id']."'";
    if(mysql_query($del))
    {
      header("location:AssignTurf.php");
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
                                                    <h3 class="mb-0" >Table Assign Turf</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="sel_turf">Turf</label>
                                                    <select class="form-control" name="sel_turf" id="sel_turf" >
                                                    <option value="">-----Select-----</option>
                                                     <?php
                                                          $sel ="select * from tbl_turf t inner join tbl_place  p on p.place_id=t.place_id";
                                                  $row = mysql_query($sel);
                                                  while($data = mysql_fetch_array($row))
                                                  {
                                                 ?>
                                                     <option value="<?php echo $data['turf_id'];?> " 
                                                    
                                                      ><?php echo $data['turf_name']; ?>-<?php echo $data['place_name']; ?></option >
                                                     
                                                     <?php
                                                     }
                                                     ?>
                                                    
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sel_manager">Manager</label>
                                                    <select class="form-control" name="sel_manager" id="sel_manager" >
                                                    <option value="">-----Select-----</option>
                                                     <?php
                                                          $sel ="select * from tbl_manager t inner join tbl_place  p on p.place_id=t.place_id";
                                                  $row = mysql_query($sel);
                                                  while($data = mysql_fetch_array($row))
                                                  {
                                                 ?>
                                                     <option value="<?php echo $data['manager_id'];?> " 
                                                    
                                                      ><?php echo $data['manager_name']; ?>-<?php echo $data['place_name']; ?></option >
                                                     
                                                     <?php
                                                     }
                                                     ?>
                                                    
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
                                                
                                                <td align="center" scope="col">Date </td>
                                                <td align="center" scope="col">Manager </td>
                                                <td align="center" scope="col">Turf </td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
 <?php
  $i=0;
    $sel = "select * from tbl_assign_turf at inner join tbl_manager m on m.manager_id=at.manager_id inner join tbl_turf t on t.turf_id=at.turf_id";
    $row = mysql_query($sel);
    while($data = mysql_fetch_array($row))
    {
      $i++;
      ?>  
                                            <tr>
                                               <td align="center"><?php echo $i;  ?></td>
                                               <td align="center"><?php echo $data['assign_date']; ?></td>
                                               <td align="center"><?php echo $data['manager_name']; ?></td>
                                               <td align="center"><?php echo $data['turf_name']; ?></td>
                                               <td align="center">
                                               <a class="status_btn"  href="AssignTurf.php?id=<?php echo $data['assign_id']; ?>">Delete </a>
    
        
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