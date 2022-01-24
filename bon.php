<?php 

  require "header.php"; 




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
               Demander un bon de carburon
              </header>
              <div class="panel-body">
                <p style="text-align: center;">Les champs avec <i style="color: red">*</i> sont obligatoires </p><br>
                <form class="form-horizontal" method="POST" id="product_form"   enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Bon : <i style="color: red">*</i></label>
                    <div class="col-sm-9">
                      <select class="form-control" required="" name="bon" id="bon" onchange="changed()">
                        <option selected="" disabled=""></option>
                        <option value="10L.png" >10 L (500 da )</option>
                        <option value="15L.png" >15 L (750 da )</option>
                        <option value="20L.png">20 L (1000 da )</option>
                        
                      </select>
                      
                    </div>
                  </div>

                  <div align="center">
                    <a class="btn btn-lg btn-primary" type="a" id="print_btn"  onclick="printing()" >Imprimer</a>
                  </div>
                  
                </form>
              </div>
            </section>

          </div>
          <div id="DivToPrint">
          	<img src="" style="display: none;" id="pdf" >
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
      function changed(){
        document.getElementById('print_btn').disabled = false;
      }
      function printing(){

      	var value = "img/"+document.getElementById('bon').value;
        document.getElementById('pdf').src = value;
        //document.getElementById('pdf').style.display = "block";
        PrintImage(document.getElementById('pdf').src);
		/*popup = window.open();
		popup.document.write("pdf");
		popup.focus(); //required for IE
		popup.print();*/
		/*var divToPrint=document.getElementById('DivToPrint');

		var newWin=window.open('','Print-Window');

		newWin.document.open();

		newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

		newWin.document.close();

		setTimeout(function(){newWin.close();},10);
        
        isLoaded();*/
      }
      function isLoaded(){
          //var pdfFrame = window.frames["pdf"];
          //pdfFrame.focus();
          //pdfFrame.print();
      }
      function ImagetoPrint(source) {
   		 return "<html><head><script>function step1(){\n" +
            "setTimeout('step2()', 10);}\n" +
            "function step2(){window.print();window.close()}\n" +
            "</scri" + "pt></head><body onload='step1()'>\n" +
            "<div align='center'><img src='" + source + "' /></div></body></html>";
		}
		function PrintImage(source) {
		    Pagelink = "about:blank";
		    var pwa = mywindow = window.open('', 'PRINT', 'height=400,width=600');
		    pwa.document.open();
		    pwa.document.write(ImagetoPrint(source));
		    pwa.document.close();
		}
      function PrintElem(source)
		{
		    mywindow = window.open('', 'PRINT', 'height=400,width=600');

		    mywindow.document.write(ImagetoPrint(source));

		    mywindow.document.close(); // necessary for IE >= 10
		    mywindow.focus(); // necessary for IE >= 10*/

		    mywindow.print();
		    mywindow.close();

		    return true;
		}
    </script>


</body>

</html>
