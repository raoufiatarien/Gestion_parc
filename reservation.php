<?php 

if(isset($_POST['vehicule'])){
  session_start();
  require "functions.php";
  $requette = "NULL,".$_SESSION['id_user'].",'".$_POST['vehicule']."','".$_POST['date_start']."','".$_POST['date_end']."','".$_POST['heure_start']."','".$_POST['heure_end']."'";
  insert('reservation',$requette);
  header("location:index.php");
}else{
  require "header.php"; 
}




?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Tableau de Bord</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Acceuil</a></li>
              <li><i class="fa fa-laptop"></i>Tableau de Bord</li>
            </ol>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-lg-9 col-md-12">

            <section class="panel panel-default">
              <header class="panel-heading" style="text-align: center;">
                Reserver un véhicule
              </header>
              <div class="panel-body">
                <p style="text-align: center;">Les champs avec <i style="color: red">*</i> sont obligatoires </p><br>
                <form class="form-horizontal" method="POST" id="product_form"   enctype="multipart/form-data" action="reservation.php">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Date : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control"  name="date_start" id="date_start"  required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Heure : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <select class="form-control" required="" name="heure_start" id="heure_start">
                        <option selected="" disabled=""></option>
                        <?php for ($i= 7 ; $i <= 20 ; $i++) { ?>
                          <option value="<?php echo $i ?>"><?php echo $i.":00"; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;" >Jusqu'à : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="date_end" id="date_end" required >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">à : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <select class="form-control" required="" name="heure_end" id="heure_end">
                        <option selected="" disabled=""></option>
                        <?php for ($i= 7 ; $i <= 20 ; $i++) { ?>
                          <option value="<?php echo $i ?>"><?php echo $i.":00"; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div align="center" style="display: none;" id="error_msg">
                    <p style="color: red;">Veuillez remplir les informations (les dates et les heures) </p><br>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Type de Véhicule : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <select class="form-control" name="type_v" id="type_v" onchange="get_vehicule(this.value)"  required="">
                        <option disabled="" selected=""></option>
                        <option value="leger" >Leger</option>
                        <option value="lourd" >Lourd</option>
                        <option value="transport">Transport</option>
                      </select>
                    </div>
                  </div>
                  
                  
                  <div class="form-group" style="display: none;" id="v_place">
                    <label class="col-sm-3 control-label" style="text-align: left;">Véhicule : </label>
                    <div class="col-sm-9">
                        <select class="form-control" name="vehicule" id="vehicule"   required="">
                          <option disabled="" selected=""></option>
                          
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                      <div align="center">
                        <input class="btn btn-primary" type="submit" id="save_btn" disabled="" value="Enregistrer">
                      </div>
                  </div>
                  
                </form>
              </div>
            </section>

          </div>



        </div>


        <!-- Today status end -->



     

        <!-- statics end -->


        <!-- project team & activity end -->

      </section>
      <div class="text-right">
        <div class="credits">

        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript">
      
      function get_vehicule(value){
        var date_start = document.getElementById("date_start").value;
        var date_end = document.getElementById("date_end").value;
        var heure_start = document.getElementById("heure_start").value;
        var heure_end = document.getElementById("heure_end").value;
        if(date_start ==="" || date_end ==="" || heure_start ==="" || heure_end ===""){
          document.getElementById('error_msg').style.display = "block";
          document.getElementById('type_v').value = "";
        }else{
         // console.log(date_start+" "+date_end+" "+heure_start+" "+heure_end);
          $.ajax({  
                type: "GET",
                url: "available_cars.php",
                data: {
                  date_start : date_start,
                  date_end : date_end,
                  heure_start : heure_start,
                  heure_end : heure_end,
                  type :value,
                  
                },           
                success: function(response){   
                    //console.log(response);   
                    if(response === "" ){

                      //document.getElementById('img_place').style.display = "none";
                    }else{
                      document.getElementById('v_place').style.display = "block";
                      document.getElementById('vehicule').innerHTML = response;
                      document.getElementById('save_btn').disabled = false;
                    }                  
                    
                    //console.log(response);

              }
          }); 
        }
        
      }
    </script>


</body>

</html>
