<?php 

if(isset($_POST['nom'])){
  require "functions.php";

  $requette = " id_employe = '".$_POST['id_employe']."', nom = '".$_POST['nom']."', prenom = '".$_POST['prenom']."', telephone = '".$_POST['phone']."', date = '".$_POST['date']."' WHERE id_user = ".$_POST['id'];
   update('employe',$requette);
  
 header("location:employe.php");
}else{
  require "header.php"; 
  $employe = select1('employe',' WHERE id_user = '.$_GET['id']);
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
               Modifier les données de l'employé
              </header>
              <div class="panel-body">
                <p style="text-align: center;">Les champs avec <i style="color: red">*</i> sont obligatoires </p><br>
                <form class="form-horizontal" method="POST" id="product_form"   enctype="multipart/form-data" action="update_employe.php">

                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Nom : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <input type="text" name="nom" value="<?php  echo $employe['nom'] ?>" class="form-control" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Prenom : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <input type="text" name="prenom" value="<?php  echo $employe['prenom'] ?>" class="form-control" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Date de naissance : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <input type="date" name="date" value="<?php  echo $employe['date'] ?>" class="form-control" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Identifiant : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <input type="text" name="id_employe" value="<?php  echo $employe['id_employe'] ?>" class="form-control" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Telephone : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <input type="text" name="phone" value="<?php  echo $employe['telephone'] ?>" class="form-control" required="">
                    </div>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                  <div align="center">
                    <button class="btn btn-lg btn-primary" type="submit">Sauvegarder</button>
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
      function getSubCategories(value){
        var cat = escape(value);
        $.ajax({  
              type: "GET",
              url: "../assets/subcategories.php",
              data: {
                cat : cat,
              },           
              success: function(response){     
                        
                  document.getElementById('subcategory').innerHTML = response;
                  get_products(document.getElementById('subcategory').value);
                  //console.log(response);

            }
        }); 
      }
      function get_products(value){
        var cat = escape(value);

        var super_cat = escape(document.getElementById('category').value);
        $.ajax({  
              type: "GET",
              url: "../assets/products.php",
              data: {
                cat : cat,
                super_cat : super_cat,
              },           
              success: function(response){   
                  // console.log(response);   

                  document.getElementById('produit').innerHTML = response;
                  get_image(document.getElementById('produit').value);   
                  //console.log(response);

            }
        }); 
      }
      function get_image(id){
        $.ajax({  
              type: "GET",
              url: "../assets/product.php",
              data: {
                id : id,
              },           
              success: function(response){   
                  console.log(response);   
                  if(response === "" || response === "../"){

                    document.getElementById('img_place').style.display = "none";
                  }else{
                    document.getElementById('img_place').style.display = "block";
                    document.getElementById('pic').src = response;
                  }                  
                  
                  //console.log(response);

            }
        }); 
      }
    </script>


</body>

</html>
