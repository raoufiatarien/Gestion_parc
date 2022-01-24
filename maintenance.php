<?php 
  if (isset($_POST['vehicule'])) {
    require 'functions.php';
    session_start();
    $nature = str_replace("'", "\'", $_POST['nature']);
    $requette = "NULL,".$_SESSION['id_user']." ,'".$_POST['vehicule']."','".$nature."','".$_POST['date']."',".$_POST['cout'];
    insert('maintenance',$requette);
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
               Maintenance
              </header>
              <div class="panel-body">
                <p style="text-align: center;">Les champs avec <i style="color: red">*</i> sont obligatoires </p><br>
                <form class="form-horizontal" method="POST" id="product_form"   enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Vehicule : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <select class="form-control" required="" name="vehicule" id="vehicule" >
                        <option selected="" disabled=""></option>
                        <?php 
                        $vehicules = select("vehicule");
                        foreach ($vehicules as $vehicule ) { ?>
                          <option value="<?php echo $vehicule['matricule']; ?>"><?php echo $vehicule['marque']." ".$vehicule['name']; ?></option>
                        <?php } ?>
                        
                      </select>
                      
                    </div>

                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Nature : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" required="" name="nature" >
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Date : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <input class="form-control" type="date" required="" name="date" >
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Cout : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <input type="number" name="cout" class="form-control" step="0.01">
                      
                    </div>
                  </div>

                  <div align="center">
                    <button class="btn btn-lg btn-primary" type="submit" >Suavegarder</button>
                  </div>
                  
                </form>
              </div>
            </section>

          </div>
          <iframe src="" style="display: none;" id="pdf" ></iframe>



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
      function changed(){
        document.getElementById('print_btn').disabled = false;
      }
      function print(){
        var value = "img/"+document.getElementById('bon').value;
        document.getElementById('pdf').src = value;
        isLoaded();
      }
      function isLoaded(){
          //var pdfFrame = window.frames["pdf"];
          //pdfFrame.focus();
          //pdfFrame.print();
      }
    </script>


</body>

</html>
