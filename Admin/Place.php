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
    $place = $_POST['txt_place'];
      $district = $_POST['sel_district'];
    
      $ins = "insert into tbl_place (district_id,place_name) values('".$district."','".$place."')";
    
      if(mysql_query($ins))
      {
        header("location:Place.php");
      }
    
  }

  
  if($_GET['id'])
  {
    $del = "delete from tbl_place where place_id = '".$_GET['id']."'";
    if(mysql_query($del))
    {
      header("location:Place.php");
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
                                                    <h3 class="mb-0" >Table Place</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_district">District</label>
                                                    <select class="form-control" name="sel_district" id="sel_district" >
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
                                                    <label for="txt_state">Place</label>
                                                   
        <input type="text" name="txt_place" id="txt_place" class="form-control"/>
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
                                                <td align="center" scope="col">district </td>
                                                <td align="center" scope="col">place </td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
  $i=0;
    $sel = "select * from tbl_place pl inner join tbl_district p on p.district_id=pl.district_id";
    $row = mysql_query($sel);
    while($data = mysql_fetch_array($row))
    {
      $i++;
      ?>  
                                            <tr>
                                               <td align="center"><?php echo $i;  ?></td>
                   
            <td align="center"><?php echo $data['district_name']; ?></td>
            <td align="center"><?php echo $data['place_name']; ?></td>
            <td align="center">
            <a class="status_btn"  href="Place.php?id=<?php echo $data['place_id']; ?>">Delete </a>
    
        
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