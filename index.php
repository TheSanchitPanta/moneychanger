<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>New Lakeside Money Changer</title>
   <link rel="icon" type="image/x-icon" href="favicon.ico">
   <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
   <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
   <link rel='stylesheet'
      href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="indexstyle.css">
   <link rel="stylesheet" href="https://www.nrb.org.np/contents/themes/nrb-wp-theme/assets/css/style.css"
      type="text/css" media="screen" />
</head>

<body>
   <div class="rateandmap">
   <div class="table-responsive">
      <h2>New Lakeside Money Changer</h2>
      <p>Street 16, Lakeside, Pokhara <br>Exchange Rate for <span id='date-time'></span>.</p>

      <table class="table table-hover table-sm">
         <caption class="text-blue font-weight-semi-bold font-size-s mb-0">Note: Under the present
            system the open market exchange rates quoted by different banks may differ.</caption>
         <thead>
            <tr>
               <th scope="col">Currency</th>
               <th scope="col">Unit</th>
               <th scope="col">Buy</th>
            </tr>
         </thead>

         <tbody>
            <?php
            $query = "SELECT * FROM moneyexchange";
            $query_run = mysqli_query($conn, $query);
            $num = 1;

            if (mysqli_num_rows($query_run) > 0) {
               foreach ($query_run as $card) {
                  ?>
                  <tr>
                     <td>
                        <div class="d-flex align-items-center">
                           <div class="flag <?= $card['flag']; ?>"></div>
                           <div class="ml-2 text-uppercase"> <span class="text-capitalize">
                                 <?= $card['currency']; ?>
                              </span>
                           </div>
                        </div>
                     </td>


                     <td>
                        <?= $card['unit']; ?>
                     </td>
                     <td>
                        <?= $card['buy']; ?>
                     </td>


                  </tr>
                  <?php
                  $num++;
               }
            } else {
               echo "<h5> No Record Found </h5>";
            }
            ?>

         </tbody>
      </table>
   </div>
   <div class="map">
   <iframe
                  title="map"
                  width= 730
                  height= 600
                  id="gmap_canvas"
                  src="https://maps.google.com/maps?q=New+Lakeside+Money+Changer&t=&z=13&ie=UTF8&iwloc=&output=embed
"
                  frameBorder="0"
                  scrolling="no"
                  marginHeight="0"
                  marginWidth="0"
                ></iframe>
                <h4>New Lakeside Money Changer - Where Every Exchange Counts!</h4>
                <p>At New Lakeside Money Changer, we take pride in being your reliable and efficient destination for all your currency exchange needs. With a commitment to excellence and years of experience in the industry, we have established ourselves as a go-to money exchanger shop for locals and travelers alike.</p>
   </div>
         </div>
   <script src='https://unpkg.com/@popperjs/core@2'></script>
   <script src="./script.js"></script>

</body>

</html>