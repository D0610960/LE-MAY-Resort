<?php

ini_set("display_errors","On");
error_reporting(E_ALL);

$con = mysqli_connect("localhost","root","1234","resort");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

   $NO_P2 = 0;

   $FNAME = $_POST['Fname'];
   $LNAME = $_POST['Lname'];
   $SSN = $_POST['Ssn'];
   
   
   if($_POST['Phone1'] == NULL){
      $PHONE1 = NULL;
   }else{
      $PHONE1 = "\"{$_POST['Phone1']}\"";
   }
   if($_POST['Phone2'] == NULL) {
      $NO_P2 = 1;
   }else{
      $PHONE2 = "\"{$_POST['Phone2']}\"";
   }
   $SDATE = $_GET['S_date'];
   $EDATE = $_GET['E_date'];
   $PNUM = $_GET['Pnum'];
   $RTYPE = $_GET['R_type'];
   
   ?>



<!--html code-->

<head>
    <title>LE MAY - Booking</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    input[type=text],
    input[type=int] {
        width: 140px;
        padding: 5px 10px;
        box-sizing: border-box;
        border: 2px solid silver;
        outline: none;
        font-family: 'Montserrat', sans-serif, "微軟正黑體";
    }

    select {
        width: 160px;
        padding: 6px 5px;
        box-sizing: border-box;
        border: 2px solid silver;
        outline: none;
        font-family: 'Montserrat', sans-serif, "微軟正黑體";
    }

    select.big {
        width: 200px;
        padding: 6px 5px;
        box-sizing: border-box;
        border: 2px solid silver;
        outline: none;
        font-family: 'Montserrat', sans-serif, "微軟正黑體";
    }

    input[type=date] {
        width: 160px;
        padding: 4px 10px;
        box-sizing: border-box;
        border: 2px solid silver;
        outline: none;
        font-family: 'Montserrat', sans-serif, "微軟正黑體";
    }

    input[type=button] {
        width: 120px;
        background-color: #7E8095;
        border: none;
        color: white;
        padding: 5px 10px;
        text-decoration: none;
        text-transform: uppercase;
        text-align: center;
        cursor: pointer;
        margin-left: auto;
        margin-right: auto;
    }

    tr.hover-color:hover,
    tr.hover-color:active {
        background: #DEDFED;
        color: black;
    }

    a {
        width: 120px;
        background-color: #7E8095;
        border: none;
        color: white;
        padding: 5px 10px;
        text-decoration: none;
        text-transform: uppercase;
        text-align: center;
        cursor: pointer;
    }

    a.hover-color:hover,
    a.hover-color:active {
        background-color: black;
        color: white;
        text-decoration: none;
    }

    td {
        font-family: "微軟正黑體";
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
                <a href="https://localhost/NET/Customer_information.html" class="w3-bar-item w3-button">GUEST</a>
                <a href="https://localhost/NET/Employee_login.html" class="w3-bar-item w3-button">EMPLOYEE</a>
            </div>
        </div>
	</div>
	
    <!-- Header -->
    <header class="w3-container w3-center w3-padding-64" style="background-color: #DDDEDF;">
        <div style="height: 64px; overflow: hidden;"></div>
        <h2 class="w3-center font-montserrat" style="letter-spacing:3px;text-transform: uppercase;">
            <b>BOOKING</b>
        </h2>
    </header>

    <!-- Main -->
    <div style="height: 50px; overflow: hidden;"></div>
    <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-3">
            <!--php result-->
            <?php
            if($FNAME != NUll && $LNAME != NULL){
            $book_sql = "INSERT INTO customer(Fname,Lname,Ssn,S_Date,E_Date,Pnum,R_type)
            VALUES (\"$FNAME\",\"$LNAME\",\"$SSN\",\"$SDATE\",\"$EDATE\",$PNUM,$RTYPE);";
            $result_book = mysqli_query($con,$book_sql);

            if($result_book){
            $p1_sql = "INSERT INTO customer_phone(C_ssn,Phone)
            VALUES (\"$SSN\",$PHONE1);";
            $result_p1 = mysqli_query($con,$p1_sql);
            if($result_p1){
            if($NO_P2 == 0){
            $p2_sql = "INSERT INTO customer_phone(C_ssn,Phone)
            VALUES (\"$SSN\",$PHONE2);";
            $result_p2 = mysqli_query($con,$p2_sql);
            if($result_p2){ ?>
            <font class="font-montserrat " style="font-size=25px"><?php echo "Book SUCCEEDED !";?>
            </font>
            <?php
               }else{ ?>
            <font class="font-montserrat " style="font-size=25px">
                <?php echo "Book FAILED !"?><br><?php echo "You have entered the same Phone2";?>
            </font>
            <?php }
            }else{ ?>
            <font class="font-montserrat " style="font-size=25px"><?php echo "Book SUCCEEDED !";?>
            </font>
            <?php }
         }else{
            $del_sql = "DELETE FROM customer
                        WHERE Ssn = \"$SSN\"";
            $result_in = mysqli_query($con,$del_sql); ?>
            <font class="font-montserrat " style="font-size=25px">
                <?php echo "Book FAILED !"?><br><?php echo "Please fill in your Phone1";?>
            </font>
            <?php }
      }else{ ?>
            <font class="font-montserrat " style="font-size=25px">
                <?php echo "Book FAILED !"?><br><?php echo "Please check the information you have entered.";?>
            </font>
            <?php }
   }else{ ?>
            <font class="font-montserrat " style="font-size=25px">
                <?php echo "Book FAILED !"?><br><?php echo "Please fill in your Name.";?>
            </font>
            <?php }
mysqli_close($con);
?>
        </div>
    </div>

    <!-- Footer -->
    <div style="height: 50px; overflow: hidden;"></div>
    <footer class="w3-center w3-padding-16" style="background-color: #DDDEDF;">
        <div style="height: 16px; overflow: hidden;"></div>
        <p>​LE MAY RESORT @ DATABASE PROJECT BY GROUP C3 </p>
    </footer>
</body>

</html>