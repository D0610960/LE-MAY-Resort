<?php
//connect to mysql
$con = mysqli_connect("localhost","root","1234","resort");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$PNUM = $_GET['Pnum'];
$SDATE = $_GET['S_date'];
$EDATE = $_GET['E_date'];
$RTYPE = $_GET['R_type'];
?>

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

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    input[type=text],
    input[type=int] {
        width: 200px;
        padding: 5px 10px;
        box-sizing: border-box;
        border: 2px solid silver;
        outline: none;
        font-family: 'Montserrat', sans-serif, "微軟正黑體";
    }

    input[type=date] {
        width: 200px;
        padding: 4px 10px;
        box-sizing: border-box;
        border: 2px solid silver;
        outline: none;
        font-family: 'Montserrat', sans-serif, "微軟正黑體";
    }

    input[type=submit] {
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
                <a href="https://localhost/NET/Book.html" class="w3-bar-item w3-button">BOOK</a>
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
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div style="text-align:center;">
                <!--check-in-->
                <form method="post" action="https://localhost/NET/Book_insert.php?
                                                Pnum=<?php echo $PNUM;?>
                                                &S_date=<?php echo $SDATE;?>
                                                &E_date=<?php echo $EDATE;?>
                                                &R_type=<?php echo $RTYPE;?>
                                                ">
                    <label for="Fname" class="font-montserrat" style="font-size:20px;">Fname<b
                            style="color:red">*</b></label><br>
                    <input type="text" id="Fname" name="Fname"><br>
                    <div style="height: 15px; overflow: hidden;"></div>
                    <label for="Lname" class="font-montserrat" style="font-size:20px;">Lname<b
                            style="color:red">*</b></label><br>
                    <input type="text" id="Lname" name="Lname"><br>
                    <div style="height: 15px; overflow: hidden;"></div>
                    <label for="Ssn" class="font-montserrat" style="font-size:20px;">Passport or Identity Card number<b
                            style="color:red">*</b></label><br>
                    <input type="text" id="Ssn" name="Ssn"><br>
                    <div style="height: 15px; overflow: hidden;"></div>
                    <label for="Phone1" class="font-montserrat" style="font-size:20px;">Phone1<b
                            style="color:red">*</b></label><br>
                    <input type="text" id="Phone1" name="Phone1"><br>
                    <div style="height: 15px; overflow: hidden;"></div>
                    <label for="Phone2" class="font-montserrat" style="font-size:20px;">Phone2</label><br>
                    <input type="text" id="Phone2" name="Phone2"><br>
                    <div style="height: 15px; overflow: hidden;"></div>
                    <input type="submit" value="SUBMIT" />
                </form>
                <div style="height: 50px; overflow: hidden;"></div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div style="height: 120px; overflow: hidden;"></div>
    <footer class="w3-center w3-padding-16" style="background-color: #DDDEDF;">
        <div style="height: 16px; overflow: hidden;"></div>
        <p>​LE MAY RESORT @ DATABASE PROJECT BY GROUP C3 </p>
    </footer>
</body>

</html>