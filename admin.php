<?php
require $_SERVER['DOCUMENT_ROOT'] . '/database.php';

session_start();
error_reporting(0);
$username = 'user'; //set ur username
$password = '123'; //set ur password
if (isset($_POST['username'])) {
    $fromuser = $_POST['username'];
    $frompass = $_POST['password'];
    if ($fromuser == $username && $frompass == $password) {
        $_SESSION["access"] = 1;
    } else {
        echo "Invalid Username or Password";
    }
}
if (isset($_GET['del'])) {
    unlink($dir . '/' . $_GET['del']);
}
if (isset($_GET['logout'])) {
    session_destroy();
}
if (isset($_POST['fileupload'])) {
    $dirfile = $dir . basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $dirfile)) {
        echo "File uploaded successfully!";
    } else {
        echo "Sorry, file not uploaded, please try again!";
    }
}
$useraccess = $_SESSION["access"];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin - New Lakeside Money Changer</title>
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
    <?php if ($useraccess != 1) { ?>
        <main class="login-form" style="margin-top: 150px;">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Login to Admin Panel</div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Username</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="username" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="password"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </main>
    <?php } else { ?>


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
                            <h5>Admin Panel</h5>
                        </div>
                    </div>
                    <div class="sidebar-content">
                        <nav class="menu open-current-submenu">


                            <li class="menu-item sub-menu">
                                <a href="/">
                                    <span class="menu-icon">
                                        <i class="ri-file-list-line"></i>
                                    </span>
                                    <span class="menu-title">Go to Main Website</span>
                                </a>

                            </li>

                            <li class="menu-item sub-menu">
                                <a href="?logout=1">
                                    <span class="menu-icon">
                                        <i class="ri-logout-box-line"></i>
                                    </span>
                                    <span class="menu-title">Logout</span>
                                </a>
                            </li>



                    </div>
            </aside>
            <div id="overlay" class="overlay"></div>
            <div class="layout">
                <main class="content">
                    <div class="card-layout">
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <caption class="text-blue font-weight-semi-bold font-size-s mb-0">Note: Under the present
                                    system the open market exchange rates quoted by different banks may differ.</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">Currency</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Buy</th>
                                        <th scope="col">Buy (Best Price)</th>
                                        <th scope="col">Update</th>
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
                                        <form  method="GET" action="update.php" >
                                        <input value="<?= $card['id']; ?>" hidden name="id" class="form-control">
                                        <td><input value="<?= $card['unit']; ?>" disabled type="text" name="unit" class="form-control"></td>
                                        <td><input value="<?= $card['buy']; ?>" type="text" name="buy" class="form-control"></td>
                                        <td><input value="<?= $card['sell']; ?>" type="text" name="sell" class="form-control"></td>
                                        <td><button type="submit" class="btn btn-success">UPDATE</button></td>
                                        </form>
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
                                   
                                   


                                    <tr>
                                        <td>
                                        
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td><button type="button" class="btn btn-success">UPDATE DATA</button></td>
                                    </tr>
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
<?php } ?>