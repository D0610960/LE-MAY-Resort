<?php
//connect to mysql
$con = mysqli_connect("localhost","root","1234","resort");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


$RD_COST = "SELECT SUM(rd.Cost) 
          FROM restaurant_use_data rd, room, customer
          WHERE R_no = {$_POST['R_no']}
          AND Ssn = rd.C_ssn
          AND room.No = R_no";

$result = mysqli_query($con,$RD_COST);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$RD_COST = $row['SUM(rd.Cost)'];
mysqli_free_result($result);

$FD_COST = "SELECT SUM(f.Price * fd.Pnum) 
            FROM facility_use_data fd, room, customer, facility f
            WHERE R_no = {$_POST['R_no']}
            AND Ssn = fd.C_ssn
            AND room.No = R_no
            AND f.No = fd.FA_no";
$result = mysqli_query($con,$FD_COST);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$FD_COST = $row['SUM(f.Price * fd.Pnum)'];
mysqli_free_result($result);

$TOTAL = $RD_COST + $FD_COST;

$CUSTO = " SELECT * 
            FROM customer
            WHERE R_no = {$_POST['R_no']} ";

$result = mysqli_query($con,$CUSTO);

?>

<!--html code-->

<head>
    <title>LE MAY - Check-out</title>
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
            <b>Check-out</b>
        </h2>
    </header>

    <!-- Main -->
    <div style="height: 50px; overflow: hidden;"></div>
    <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-9">
        <!--php result-->
        <?php $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($row['Ssn']!=NULL){ ?>
        <table class="w3-table w3-bordered center">
            <thead>
                <tr style="background-color: #7E8095; color:white;">
                    <td>Room no.</td>
                    <td>Fname</td>
                    <td>Lname</td>
                    <td>SSN</td>
                    <td>Pnum</td>
                    <td>Check-in Date</td>
                    <td>Check-out Date</td>
                    <td>Total</td>
                    <td>Comment</td>
                    <td></td>
                </tr>
            </thead>
            <?php
                        
                        if($row['Ssn']!=NULL){
                            do { ?>
            <tr class="hover-color">
                <td><?php echo $row['R_no']; ?></td>
                <td><?php echo $row['Fname']; ?></td>
                <td><?php echo $row['Lname']; ?></td>
                <td><?php echo $row['Ssn']; ?></td>
                <td><?php echo $row['Pnum']; ?></td>
                <td><?php echo $row['S_date']; ?></td>
                <td><?php echo $row['E_date']; ?></td>
                <td><?php echo $TOTAL; ?></td>
                <td><?php echo $row['Comment']; ?></td>
                <td><a href="https://localhost/NET/C_check_out_del.php?
  Ssn=<?php echo $row['Ssn'];?>">check out</a>
                </td>
                <?php } while ($row = mysqli_fetch_assoc($result));
                 }
              }?>
            <tr>
        </table>
    </div>
    </div>
    <?php mysqli_free_result($result);?>

    <!-- Footer -->
    <div style="height: 50px; overflow: hidden;"></div>
    <footer class="w3-center w3-padding-16" style="background-color: #DDDEDF;">
        <div style="height: 16px; overflow: hidden;"></div>
        <p>​LE MAY RESORT @ DATABASE PROJECT BY GROUP C3 </p>
    </footer>
</body>

</html>


<?php mysqli_close($con);?>