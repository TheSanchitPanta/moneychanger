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
   <link rel="stylesheet" href="./style.css">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://www.nrb.org.np/contents/themes/nrb-wp-theme/assets/css/style.css"
      type="text/css" media="screen" />
</head>

<body>
   <!-- partial:index.partial.html -->
   <div class="layout has-sidebar fixed-sidebar fixed-header">
      <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
         <a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
         <div class="image-wrapper">
            <img src="assets/images/sidebar-bg.jpg" alt="sidebar background" />
         </div>
         <div class="sidebar-layout">
            <div class="sidebar-header">
               <div class="pro-sidebar-logo">
                  <div>$</div>
                  <h5>New Lakeside <br>Money Changer
               </div>
               </h5>

            </div>
         </div>
         
         <div class="sidebar-content">
            <nav class="menu open-current-submenu">
               <li class="menu-item sub-menu">
                  <a href="#">
                     <span class="menu-icon">
                        <i class="ri-file-list-line"></i>
                     </span>
                     <span class="menu-title">Table</span>
                  </a>

               </li>
               <li class="menu-item sub-menu">
                  <a href="#">
                     <span class="menu-icon">
                        <i class="ri-contacts-book-fill"></i>
                     </span>
                     <span class="menu-title">Contact</span>
                  </a>

         </div>
      </aside>
      <div id="overlay" class="overlay"></div>
      <div class="layout">
         <main class="content">
            <div class="card-layout">
               <div class="table-responsive">
                  <p>Showing Exchange Rate for <span id='date-time'></span>.</p>

                  <table class="table table-hover table-sm">
                     <caption class="text-blue font-weight-semi-bold font-size-s mb-0">Note: Under the present
                        system the open market exchange rates quoted by different banks may differ.</caption>
                     <thead>
                        <tr>
                           <th scope="col">Currency</th>
                           <th scope="col">Unit</th>
                           <!-- <th scope="col">Buy</th> -->
                           <th scope="col">Buy</th>
                        </tr>
                     </thead>

                     <tbody>
                     <?php 
                            $query = "SELECT * FROM moneyexchange";
                            $query_run = mysqli_query($conn, $query);
    $num = 1;

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $card)
                                {
                                    ?>
                                     <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flag <?= $card['flag']; ?>"></div>
                                                <div class="ml-2 text-uppercase"> <span class="text-capitalize"><?= $card['currency']; ?></span>
                                                </div>
                                            </div>
                                        </td>
                                  
                                        
                                        <td><?= $card['unit']; ?></td>
                                 
                                        <td><?= $card['sell']; ?></td>
                                        
                                    
                                    </tr>
                                    <?php
            $num++;
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                        ?>
                        
                     </tbody>
                  </table>
               </div>

            </div>

            <footer class="footer">
               <small style="margin-bottom: 20px; display: inline-block">
                  © 2023 New LakeSide Money Changer
                  <a target="_blank" href="sanchitpanta.com.np">Pokhara, Lakeside</a>
               </small>
               <br />
               <div class="social-links">
                  <a href="" target="_blank">
                     <i class="ri-github-fill ri-xl"></i>
                  </a>
                  <a href="" target="_blank">
                     <i class="ri-twitter-fill ri-xl"></i>
                  </a>
                  <a href="" target="_blank">
                     <i class="ri-codepen-fill ri-xl"></i>
                  </a>
                  <a href="" target="_blank">
                     <i class="ri-linkedin-box-fill ri-xl"></i>
                  </a>
               </div>
            </footer>
         </main>
         <div class="overlay"></div>
      </div>
   </div>
   <!-- partial -->
   <script src='https://unpkg.com/@popperjs/core@2'></script>
   <script src="./script.js"></script>

</body>

</html>