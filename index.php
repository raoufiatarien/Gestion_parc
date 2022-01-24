<?php 
require "header.php"; 
if($_SESSION['role'] ==="admin"){
  $reservations = select("reservation"," INNER JOIN employe ON employe.id_user = reservation.id_user INNER JOIN vehicule ON vehicule.matricule = reservation.id_vehicule ORDER BY reservation.date_debut");
}else{
  $reservations = select("reservation"," INNER JOIN employe ON employe.id_user = reservation.id_user INNER JOIN vehicule ON vehicule.matricule = reservation.id_vehicule WHERE reservation.id_user =".$_SESSION['id_user']." ORDER BY reservation.date_debut");
}

$n = count($reservations);

?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <?php if($_SESSION['role'] === "admin"){ ?>
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

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-user"></i>
              <div class="count"><?php  echo count(select("employe"));?></div>
              <div class="title">Employés</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-car"></i>
              <div class="count"><?php echo count(select("vehicule")); ?></div>
              <div class="title">Véhicules</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="icon icon_ribbon_alt" ></i>
              <div class="count"><?php echo $n ?></div>
              <div class="title">Reservations</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-ambulance"></i>
              <div class="count"><?php echo (count(select("accident")) + count(select("maintenace"))); ?></div>
              <div class="title">Accidents et Maintenances</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->
        <?php }else { echo "<br><hr><h3>&emsp;Mes Reservations : (".count($reservations).") </h3><br>"; } ?>
        


        <div class="row">
          <div class="col-lg-9 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Reservations</strong></h2>

              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Employé</th>
                      <th>Véhicule</th>
                      <th>Reservé de </th>
                      <th>Jusdqu'à</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($reservations as $reservation) {   ?>

                      <tr>
                        <td></td>
                        <td><?php echo $reservation['nom']." ".$reservation['prenom']; ?></td>
                        <td><?php echo $reservation['marque']." ".$reservation['name'];  ?></td>
                        <td><?php echo $reservation['date_debut']." à ".$reservation['heure_debut'].":00";  ?></td>
                        <td><?php echo $reservation['date_fin']." à ".$reservation['heure_fin'].":00";  ?></td>
                      </tr>
                    <?php } ?>
                    
                    
                  </tbody>
                </table>

              </div>
              
            </div>

          </div>



        </div>

        <?php  if($_SESSION['role'] === 'employe'){ ?>
        <?php $maintenances  = select("maintenance"," INNER JOIN vehicule ON maintenance.id_vehicule = vehicule.matricule INNER JOIN employe ON employe.id_user = maintenance.id_user WHERE maintenance.id_user = ".$_SESSION['id_user']); ?>
        <br><hr><h3>&emsp;Maintenance effectué par  : <?php echo $_SESSION['username']." (".count($maintenances).") ";  ?> </h3><br>
        <div class="row">
          <div class="col-lg-9 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Maintenances</strong></h2>

              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Vehicule</th>
                      <th>Employé</th>
                      <th>Nature</th>
                      <th>Date</th>
                      <th>Cout</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i=0 ; $i< count($maintenances); $i++) { 
                      $maintenance = $maintenances[$i];
                    ?>
                      <tr>
                        <td></td>
                        <td><?php echo $maintenance['marque']." ".$maintenance['name']; ?></td>
                        <td><?php echo $maintenance['nom']." ".$maintenance['prenom']; ?></td>
                        <td><?php echo $maintenance['nature']; ?></td>
                        <td><?php echo $maintenance['date'];?></td>

                        <td><?php echo $maintenance['cout']; ?></td>
                       
                      </tr>
                    <?php } ?>

                    
                    
                  </tbody>
                </table>

              </div>
              
            </div>

          </div>



        </div>
        <?php $vehicules = select("vehicule"," INNER JOIN accident ON vehicule.matricule = accident.id_vehicule  INNER JOIN employe ON accident.id_user = employe.id_user WHERE accident.id_user = ".$_SESSION['id_user']); ?>
        <br><hr><h3>&emsp;Accidents déclarés par  : <?php echo $_SESSION['username']." (".count($vehicules).") ";  ?> </h3><br>
        <div class="row">
          <div class="col-lg-9 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Accidents</strong></h2>

              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Vehicule</th>
                      <th>Employé</th>
                      <th>Type</th>
                      <th>Date</th>
                      <th>Description</th>
                      <th>Lieu</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i=0 ; $i< count($vehicules); $i++) { 
                      $vehicule = $vehicules[$i];
                    ?>
                      <tr>
                        <td></td>
                        <td><?php echo $vehicule['marque']." ".$vehicule['name']; ?></td>
                        <td><?php echo $vehicule['nom']." ".$vehicule['prenom']; ?></td>
                        <td><?php echo $vehicule['type']; ?></td>
                        <td><?php echo $vehicule['date'];?></td>
                        <td><?php echo $vehicule['description']; ?></td>
                        <td><?php echo $vehicule['lieu']; ?></td>
                       
                      </tr>
                    <?php } ?>
                    
                    
                  </tbody>
                </table>

              </div>
              
            </div>

          </div>



        </div>
        <!-- Today status end -->
        <?php } ?>


     

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
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
