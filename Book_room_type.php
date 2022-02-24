<?php
//connect to mysql
$con = mysqli_connect("localhost","root","1234","resort");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$count = "SELECT COUNT(*)
          FROM room
          WHERE Available = 1
          GROUP BY room.Pnum";

$result = mysqli_query($con,$count);

$PNUM = $_POST['Pnum'];
$SDATE = $_POST['S_date'];
$EDATE = $_POST['E_date'];
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$CNTR1 = $row['COUNT(*)'];
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$CNTR2 =  $row['COUNT(*)'];
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$CNTR4 =  $row['COUNT(*)'];
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$CNTR6 = $row['COUNT(*)'];
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$CNTR8 = $row['COUNT(*)'];

    $count = "SELECT COUNT(*)
    FROM customer
    WHERE R_no is NULL
    GROUP BY customer.R_type";

$result = mysqli_query($con,$count);

$PNUM = $_POST['Pnum'];
$SDATE = $_POST['S_date'];
$EDATE = $_POST['E_date'];
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$CNTC1 = $row['COUNT(*)'];
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$CNTC2 =  $row['COUNT(*)'];
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$CNTC4 =  $row['COUNT(*)'];
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$CNTC6 = $row['COUNT(*)'];
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$CNTC8 = $row['COUNT(*)'];

?>

<!DOCTYPE html>
<html>

<head>
    
    <title>LE MAY - Booking</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
    .font-montserrat {
        font-family: 'Montserrat', sans-serif;
    }

    .word-break--keep-all {
        word-break: keep-all;
    }

    p {
        font-family: 'Montserrat', sans-serif;
        font-size: large;
    }

    .word_display {
        margin-left: 10px;
        margin-right: auto;
    }

    .left {
        text-align: right;
    }

    a {
        width: auto;
        background-color: black;
        border: none;
        color: white;
        padding: 10px 200px;
        text-decoration: none;
        text-transform: uppercase;
        text-align: center;
        cursor: pointer;
    }

    a.hover-color:hover,
    a.hover-color:active {
        background-color: grey;
        color: black;
        text-decoration: none;
    }
    </style>

</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="https://localhost/NET/Home.html" class="w3-bar-item w3-button"><b>LE MAY</b> RESORT</a>
            <!-- Float links to the right. Hide them on small screens -->
            <div class="w3-right w3-hide-small">
                <a href="https://localhost/NET/Home.html" class="w3-bar-item w3-button" >HOME</a>
                <a href="https://localhost/NET/Book.html" class="w3-bar-item w3-button" >BOOK</a>
                <a href="https://localhost/NET/Customer_information.html" class="w3-bar-item w3-button" >GUEST</a>
                <a href="https://localhost/NET/Employee_login.html" class="w3-bar-item w3-button">EMPLOYEE</a>
            </div>
        </div>
	</div>
	
    <!-- Header ***change color-->
    <header class="w3-container w3-center w3-padding-64" style="background-color: #DDDEDF;">
        <div style="height: 64px; overflow: hidden;"></div>
        <h2 class="w3-center font-montserrat" style="letter-spacing:3px ;color:black;"><b>BOOKING</b></h2>
    </header>

    <div style="height: 50px; overflow: hidden;"></div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-9">
            <!--single-->
            <div class="w3-container">
                <div class="w3-card" style="width:1000px; height:280px">
                    <div class="row">
                        <?php echo "<img class=room_img src=\"https://www.associa.com/chi/tyh/images/stay/single_moderate.jpg\" alt=room2 width=450
                            height=280px>";?>
                        <div class="col-sm-6 word_display">
                            <div style="height: 15px; overflow: hidden;"></div>
                            <h2>Single Room</h2>
                            <p>Single bed</p>
                            <p>15m<sup>2</sup></p>
                            <p>For one person</p>
                            <p class="left"><b style="color:red; font-size:30px;"><?php
                                 echo $CNTR1-$CNTC1;?>
                                 &nbsp;</b>room left</p>
                            <a class="hover-color" href="https://localhost/NET/Book_query.php?
                              R_type=<?php echo "1";?>
                             &Pnum=<?php echo $PNUM;?>
                             &S_date=<?php echo $SDATE;?>
                             &E_date=<?php echo $EDATE;?>
                              ">BOOK NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 50px; overflow: hidden;"></div>
            <!--double-->
            <div class="w3-container">
                <div class="w3-card" style="width:1000px; height:280px">
                    <div class="row">
                        <?php echo "<img class=room_img src=\"https://www.gaya-hotels.com/wp-content/uploads/2019/06/rooma_2.jpg\" alt=room2 width=450
                            height=280px>";?>
                        <div class="col-sm-6 word_display">
                            <div style="height: 15px; overflow: hidden;"></div>
                            <h2>Double Room</h2>
                            <p>One queen-size bed</p>
                            <p>30m<sup>2</sup></p>
                            <p>For two people</p>
                            <p class="left"><b style="color:red; font-size:30px;"><?php
                                 echo $CNTR2-$CNTC2;?>
                                 &nbsp;</b>room left</p>
                            <a class="hover-color" href="https://localhost/NET/Book_query.php?
                              R_type=<?php echo "2";?>
                              &Pnum=<?php echo $PNUM;?>
                              &S_date=<?php echo $SDATE;?>
                              &E_date=<?php echo $EDATE;?>
                              ">BOOK NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 50px; overflow: hidden;"></div>
            <!--quadruple-->
            <div class="w3-container">
                <div class="w3-card" style="width:1000px; height:280px">
                    <div class="row">
                        <?php echo "<img class=room_img src=\"https://d2ile4x3f22snf.cloudfront.net/wp-content/uploads/sites/269/2018/03/12073929/%E9%97%94%E5%AE%B6%E5%9B%9B%E4%BA%BA%E6%88%BF2.jpg\" alt=room2 width=450
                            height=280px>";?>
                        <div class="col-sm-6 word_display">
                            <div style="height: 15px; overflow: hidden;"></div>
                            <h2>Quadruple Room</h2>
                            <p>Two king-size beds</p>
                            <p>45m<sup>2</sup></p>
                            <p>For four people</p>
                            <p class="left"><b style="color:red; font-size:30px;"><?php
                                 echo $CNTR4-$CNTC4;?>
                                 &nbsp;</b>room left</p>
                            <a class="hover-color" href="https://localhost/NET/Book_query.php?
                              R_type=<?php echo "3";?>
                              &Pnum=<?php echo $PNUM;?>
                              &S_date=<?php echo $SDATE;?>
                              &E_date=<?php echo $EDATE;?>
                              ">BOOK NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 50px; overflow: hidden;"></div>
            <!--connecting-->
            <div class="w3-container">
                <div class="w3-card" style="width:1000px; height:280px">
                    <div class="row">
                        <?php echo "<img class=room_img src=\"https://tcnewyork.com.tw/wp-content/uploads/2016/12/S__27189434.jpg\" alt=room2 width=450
                            height=280px>";?>
                        <div class="col-sm-6 word_display">
                            <div style="height: 15px; overflow: hidden;"></div>
                            <h2>Connecting Room</h2>
                            <p>Three king-size beds</p>
                            <p>50m<sup>2</sup></p>
                            <p>For six people</p>
                            <p class="left"><b style="color:red; font-size:30px;"><?php
                                 echo $CNTR6-$CNTC6;?>
                                 &nbsp;</b>room left</p>
                            <a class="hover-color" href="https://localhost/NET/Book_query.php?
                              R_type=<?php echo "4";?>
                              &Pnum=<?php echo $PNUM;?>
                              &S_date=<?php echo $SDATE;?>
                              &E_date=<?php echo $EDATE;?>
                              ">BOOK NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 50px; overflow: hidden;"></div>
            <!--Group Room-->
            <div class="w3-container">
                <div class="w3-card" style="width:1000px; height:280px">
                    <div class="row">
                        <?php echo "<img class=room_img src=\"http://www.hungs-group.com/admin/UploadImages/01/ROOM/505de046-baa5-4f44-ba5c-ad9cbf898804/Background/%E6%A3%AE%E6%B4%BB%E5%85%AB%E4%BA%BA%E5%A5%97%E6%88%BF.jpg\" alt=room2 width=450
                            height=280px>";?>
                        <div class="col-sm-6 word_display">
                            <div style="height: 15px; overflow: hidden;"></div>
                            <h2>Group Room</h2>
                            <p>Japanese style floor with four beds</p>
                            <p>60m<sup>2</sup></p>
                            <p>For eight people</p>
                            <p class="left"><b style="color:red; font-size:30px;"><?php
                                 echo $CNTR8-$CNTC8;?>
                                 &nbsp;</b>room left</p>
                            <a class="hover-color" href="https://localhost/NET/Book_query.php?
                              R_type=<?php echo "5";?>
                              &Pnum=<?php echo $PNUM;?>
                              &S_date=<?php echo $SDATE;?>
                              &E_date=<?php echo $EDATE;?>
                              ">BOOK NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>

    <!-- Footer -->
    <div style="height: 50px; overflow: hidden;"></div>
    <footer class="w3-center w3-padding-16" style="background-color: #DDDEDF;">
        <div style="height: 16px; overflow: hidden;"></div>
        <p>​LE MAY RESORT @ DATABASE PROJECT BY GROUP C3 </p>
    </footer>

</body>

</html>