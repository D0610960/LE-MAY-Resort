<?php
//connect to mysql
$con = mysqli_connect("localhost","root","1234","resort");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

//set query instruction
$I_SSN = "C_ssn = ".$_GET['Ssn'];
$I_DATE ="Date = \"".$_GET['Date'];
$I_SESSION ="Session = \"".$_GET['Session'];
$I_COST ="Cost = ".$_GET['Cost'];
$I_PNUM ="Pnum = ".$_GET['Pnum'];

//sql query : find customer ssn from R_no
$I_NAME = "Name = \"".$_GET['Name'];
$reno_sql = "SELECT  No
    FROM    restaurant
    WHERE   $I_NAME\"
    ";
$result_reno = mysqli_query($con,$reno_sql);
$row = mysqli_fetch_array($result_reno, MYSQLI_ASSOC);
$FIND_RENO = $row['No'];

//sql query : delete
$delete_sql = "DELETE FROM restaurant_use_data
    WHERE    RE_no = $FIND_RENO
        AND  $I_SSN
        AND  $I_DATE\"
        AND  $I_SESSION\"
        AND  $I_COST
        AND  $I_PNUM
        ";
$result_de = mysqli_query($con,$delete_sql);?>


<head>
    <title>LE MAY - Reataurant Usage</title>
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
        width: 140px;
        padding: 5px 10px;
        box-sizing: border-box;
        border: 2px solid silver;
        outline: none;
        font-family: 'Montserrat', sans-serif, "微軟正黑體";
    }

    input[type=radio] {
        width: 30px;
        padding: 5px 5px;
        border: 3px solid silver;
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

    input[type=date] {
        width: 160px;
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
                <a href="https://localhost/NET/Book.html" class="w3-bar-item w3-button"  >BOOK</a>
                <a href="https://localhost/NET/Customer_information.html" class="w3-bar-item w3-button"  >GUEST</a>
                <a href="https://localhost/NET/Employee_login.html" class="w3-bar-item w3-button">EMPLOYEE</a>
            </div>
        </div>
	</div>
	
    <!-- Header -->
    <header class="w3-container w3-center w3-padding-64" style="background-color: #DDDEDF;">
        <div style="height: 64px; overflow: hidden;"></div>
        <h2 class="w3-center font-montserrat" style="letter-spacing:3px;text-transform: uppercase;">
            <b>Restaurant&nbsp;&nbsp;usage</b>
        </h2>
    </header>

    <!-- Main -->
    <div style="height: 50px; overflow: hidden;"></div>

    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-8">
            <form action="https://localhost/NET/F_restaurant_query.php" method="post">
                <!-- Line 1-->
                <font class="font-montserrat">Restaurant :&nbsp;&nbsp;</font>
                <select name="RE_no">
                    <option value=0>--Please select--</option>
                    <option value=1>Afteroon tea</option>
                    <option value=2>Bar</option>
                    <option value=3>Chinese meal</option>
                    <option value=4>Japanese meal</option>
                    <option value=5>Western meal</option>
                </select>
                <font class="font-montserrat">&nbsp;&nbsp;Room No :&nbsp;&nbsp;</font>
                <input type="text" name="R_no">
                <div style="height: 15px; overflow: hidden;"></div>
                <font class="font-montserrat">Number of Guests :&nbsp;&nbsp;</font>
                <input type="int" name="Pnum">
                <!-- Line 2-->
                <font class="font-montserrat">&nbsp;&nbsp;Date :&nbsp;&nbsp;</font>
                <input type="date" name="Date">
                <font class="font-montserrat">&nbsp;&nbsp;Session :&nbsp;&nbsp;</font>
                <select name="Session">
                    <option value=0>--Please select--</option>
                    <option value=1>07:00 - 08:30</option>
                    <option value=2>08:30 - 10:00</option>
                    <option value=3>11:00 - 12:30</option>
                    <option value=4>12:30 - 14:00</option>
                    <option value=5>14:00 - 15:30</option>
                    <option value=6>15:30 - 17:00</option>
                    <option value=7>17:00 - 18:30</option>
                    <option value=8>18:30 - 20:00</option>
                    <option value=9>20:00 - 21:30</option>
                    <option value=10>21:30 - 23:00</option>
                    <option value=11>23:00 - 00:30</option>
                    <option value=12>00:30 - 02:00</option>
                </select>
                <br>
                <!-- Line 3-->
                <div style="height: 15px; overflow: hidden;"></div>
                <font class="font-montserrat">Total :&nbsp;&nbsp;</font>
                <input type="int" name="Cost">
                <input type="radio" name="act_total" value="leq">
                <font class="font-montserrat">Less Then</font>
                <input type="radio" name="act_total" value="equ" checked>
                <font class="font-montserrat">Equal</font>
                <input type="radio" name="act_total" value="geq">
                <font class="font-montserrat">Greater Then</font>
                <br>
                <!-- Line 4-->
                <div style="height: 25px; overflow: hidden;"></div>
                <input type="submit" name="action" value="search" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="action" value="insert" />
                <div style="height: 25px; overflow: hidden;"></div>
            </form>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
    </div>


    <?php if ($result_de) {//delete success?>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <font class="font-montserrat " style="font-size=25px"><?php echo "Delete SUCCEEDED !";?>
            </font>
        </div>
    </div>
    <?php } else {?>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <font class="font-montserrat " style="font-size=25px"><?php echo "Delete FAILED !";?>
            </font>
        </div>
    </div>
    <?php }?>

    <!-- Footer -->
    <div style="height: 50px; overflow: hidden;"></div>
    <footer class="w3-center w3-padding-16" style="background-color: #DDDEDF;">
        <div style="height: 16px; overflow: hidden;"></div>
        <p>​LE MAY RESORT @ DATABASE PROJECT BY GROUP C3 </p>
    </footer>
</body>