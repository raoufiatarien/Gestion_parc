<?php 


if(isset($_POST['old'])) {
  require "functions.php";
  session_start();
  change_password($_POST['old'],$_POST['new'],$_SESSION['id_user']);
}else{
  require "header.php";
}

 ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Settings</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-user-md"></i>Settings </li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4><?php echo $_SESSION['username'] ?></h4>
                  <div class="follow-ava">
                    <img src="img/avatar1_small.png" alt="">
                  </div>
                  <h6>Administrator</h6>
                </div>

                <div class="col-lg-2 col-sm-6 follow-info weather-category">

                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">

                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category" style="visibility: hidden;">
                  <ul>
                    <li class="active" >

                      <i class="fa fa-tachometer fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
                    </li>

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <!-- <li >
                    <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Latest Activity
                                      </a>
                  </li> -->

                  <li class="active">
                    <a data-toggle="tab" href="#edit-password">
                                          <i class="icon-envelope"></i>
                                          Modifier le mot de passe
                                      </a>
                  </li>

                  
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <br>
                  
                  
                  <!-- edit-profile -->


                  <div id="edit-password" class="tab-pane active">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Change password </h1>
                        <form class="form-horizontal" role="form" method="POST" action="settings.php">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Ancien mot de passe : </label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" id="f-name" name="old" placeholder=" " required="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label"> Nouveau mot de passe :</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" id="l-name" name="new" placeholder=" " required="">
                            </div>
                          </div>
                          

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <?php if(isset($_GET['Error'])){ ?>
                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        <script type="text/javascript">
                          var v = <?php echo "'".$_GET['Error']."'"; ?>;
                          swal("Error !", v, "error");
                        </script>
        <?php } ?>
        <?php if(isset($_GET['success'])){ ?>
                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        <script type="text/javascript">
                          var v = <?php echo "'".$_GET['success']."'"; ?>;
                          swal( "", v, "success");
                        </script>
        <?php } ?>
        <!-- page end-->
      </section>
    </section>

  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>
  <script type="text/javascript">
    function changeCurrency(val){
      var res = val.split(',');
      var value = res[0];
      var code = res[1];
        $.ajax({  
            type: "GET",
            url: "../ajax/session.php",
            data: {
              currency_val : value,
              currency_code : code,
          },                            
            success: function(response){                    
                location.reload();
               //console.log(response);

          }
        }); 
    }
  </script>

</body>

</html>
