<?php
$con = mysqli_connect("localhost","root","1234","resort");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$P_Ssn = $_POST['Ssn'];
if($P_Ssn != null)    $CTL_Ssn = "Ssn = '{$_POST['Ssn']}'";
else $CTL_Ssn = "";


$sql_cus = "SELECT  Lname, Fname, Pnum, Ssn, S_date, E_date, R_no
            FROM    customer
            WHERE   $CTL_Ssn";

$sql_fac = "SELECT  f.Name, Date, Session, fd.Pnum, Price
            FROM    facility_use_data fd ,customer c, facility f
            WHERE   fd.C_Ssn = c.Ssn 
                    AND c.Ssn = \"$P_Ssn\"
                    AND f.No = fd.FA_no";

$sql_res = "SELECT  r.Name, Date, Session, re.Pnum, Cost
            FROM    restaurant_use_data re ,customer c, restaurant r
            WHERE   re.C_Ssn = c.Ssn 
                    AND r.No = re.RE_no
                    AND c.Ssn = \"$P_Ssn\"";

$result_cus = mysqli_query($con,$sql_cus);

if (!$result_cus) {
    printf("Error: %s\n", mysqli_error($con));
    echo "error";
}

?>


<head>
    <title>LE MAY - Guest Information</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
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
            <b>GEUST&nbsp;&nbsp;INFORMATION</b>
        </h2>
    </header>

    <!--php result-->
    <?php if ($result_cus!=NULL){ //select success?>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-8">
            <div class="w3-responsive">
            <div style="height: 50px; overflow: hidden;"></div>
                <table class="w3-table w3-bordered">
                    <thead>
                        <tr style="background-color: #7E8095; color:white;">
                            <td>Room <br> No.</td>
                            <td>Fname</td>
                            <td>Lname</td>
                            <td>People</td>
                            <td>Ssn</td>
                            <td>Check-in <br> Date</td>
                            <td>Check-out <br> Date</td>
                        </tr>
                    </thead>
                    <?php
                  $row = mysqli_fetch_array($result_cus, MYSQLI_ASSOC);
                  
                  if($row['Ssn']!=NULL){
                    do { ?>
                    <tr class="hover-color">
                        <td><?php echo $row['R_no']; ?></td>
                        <td><?php echo $row['Fname']; ?></td>
                        <td><?php echo $row['Lname']; ?></td>
                        <td><?php echo $row['Pnum']; ?></td>
                        <td><?php echo $row['Ssn']; ?></td>
                        <td><?php echo $row['S_date']; ?></td>
                        <td><?php echo $row['E_date']; ?></td>
                        <?php } while ($row = mysqli_fetch_assoc($result_cus));
                  }?>
                    <tr>
                </table>
                <?php mysqli_free_result($result_cus);
    }
    $result_fac = mysqli_query($con,$sql_fac);
    if ( $result_fac ) {//insert success?>
                            <div style="height: 50px; overflow: hidden;"></div>
                            <table class="w3-table w3-bordered">
                              
                                <thead>
                                    <tr style="background-color: #7E8095; color:white;">
                                        <td>Facility</td>
                                        <td>Date</td>
                                        <td>Session</td>
                                        <td>People</td>
                                        <td>Cost</td>
                                    </tr>
                                </thead>
                                <?php
                  
                  $row = mysqli_fetch_array($result_fac, MYSQLI_ASSOC);
                  if($row['Name']!=NULL){
                    do { 
                    //$FCOST = $row['Price'] * $row['Pnum']; ?>
                                <tr class="hover-color">
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Date']; ?></td>
                                    <td><?php echo $row['Session']; ?></td>
                                    <td><?php echo $row['Pnum']; ?></td>
                                    <td><?php echo ($row['Price'] * $row['Pnum']); ?></td>
                                    <?php } while ($row = mysqli_fetch_assoc($result_fac));
                  }?>
                                <tr>
                            </table>

                            <?php
                if (!$result_fac) {
                  printf("Error: %s\n", mysqli_error($con));
                  echo "error";
                }?>
                            <?php mysqli_free_result($result_fac);?>
                            <?php } 
    $result_res = mysqli_query($con,$sql_res);
    if ($result_res) {?>
                                        <div style="height: 50px; overflow: hidden;"></div>
                                        <table class="w3-table w3-bordered">
                                            <thead>
                                                <tr style="background-color: #7E8095; color:white;">
                                                    <td>Restaurant</td>
                                                    <td>Date</td>
                                                    <td>Session</td>
                                                    <td>People</td>
                                                    <td>Total</td>
                                                </tr>
                                            </thead>
                                            <?php
                  
                  $row = mysqli_fetch_array($result_res, MYSQLI_ASSOC);
                  if($row['Name']!=NULL){
                    do { ?>
                                            <tr class="hover-color">
                                                <td><?php echo $row['Name']; ?></td>
                                                <td><?php echo $row['Date']; ?></td>
                                                <td><?php echo $row['Session']; ?></td>
                                                <td><?php echo $row['Pnum']; ?></td>
                                                <td><?php echo $row['Cost']; ?></td>
                                                <?php } while ($row = mysqli_fetch_assoc($result_res));
                  }?>
                                            <tr>
                                        </table>
                                        <?php
                if (!$result_res) {
                  printf("Error: %s\n", mysqli_error($con));
                  echo "error";
                }
                ?>
                                        <?php mysqli_free_result($result_res);?>
                                        <?php }?>
                                    </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-1"></div>
                                </div>
                                <!-- Footer -->
                                <div style="height: 50px; overflow: hidden;"></div>
                                <footer class="w3-center w3-padding-16" style="background-color: #DDDEDF;">
                                    <div style="height: 16px; overflow: hidden;"></div>
                                    <p>​LE MAY RESORT @ DATABASE PROJECT BY GROUP C3 </p>
                                </footer>
</body>

<?php mysqli_close($con);?>