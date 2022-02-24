<?php
//connect to mysql
$con = mysqli_connect("localhost","root","1234","resort");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

//sql query : find which room need to be cleaned
$customer_sql = "SELECT Fname, Lname, Ssn, R_type
        FROM customer 
        WHERE R_no IS NULL
        ";
$result_customer = mysqli_query($con,$customer_sql);?>

<head>
    <title>LE MAY - Check-in & Check-out</title>
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
            <b>check-in & check-out</b>
        </h2>
    </header>

    <!-- Main -->
    <div style="height: 50px; overflow: hidden;"></div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-6">
            <div style="text-align:left;">
                <!--online orders-->
                <div style="height: 50px; overflow: hidden;"></div>
                <font class="font-montserrat">Online Orders</font><br>
                <div style="height: 10px; overflow: hidden;"></div>
                <!--php result-->
                <?php $row = mysqli_fetch_array($result_customer, MYSQLI_ASSOC);
            if($row['Ssn']!=NULL){ ?>
                <table class="w3-table w3-bordered center">
                    <thead>
                        <tr style="background-color: #7E8095; color:white;">
                            <td>Fname</td>
                            <td>Lname</td>
                            <td>Ssn</td>
                            <td>Room Type</td>
                            <td></td>
                        </tr>
                    </thead>
                    <?php
                        do { 
                        $SSN = $row['Ssn'];?>
                    <tr class="hover-color">
                        <td><?php echo $row['Fname']; ?></td>
                        <td><?php echo $row['Lname']; ?></td>
                        <td><?php echo $SSN; ?></td>
                        <td><?php 
                            if($row['R_type'] == 1) echo "Single Room";
                            else if($row['R_type'] == 2) echo "Double Room";
                            else if($row['R_type'] == 4) echo "Quadruple Room";
                            else if($row['R_type'] == 6) echo "Connecting Room";
                            else if($row['R_type'] == 8) echo "Group Room";?>
                        </td>
                        <td><a class="hover-color" href="https://localhost/NET/C_available_room.php?R_type=<?php echo $row['R_type'];?>&Ssn=<?php echo $SSN;?>
                                ">Check-in</a></td>
                        <?php } while ($row = mysqli_fetch_assoc($result_customer));?>
                    <tr>
                </table>
                <?php mysqli_free_result($result_customer);
                } else {?>

                <font class="font-montserrat " style="font-size=25px"><?php echo "No online order";?>
                </font>

                <?php }?>

            </div>
        </div>
        <div class="col-lg-4">
            <div style="text-align:left;">
                <!--check-in-->
                <div style="height: 50px; overflow: hidden;"></div>
                <form action="https://localhost/NET/Book_room_type.php" method="post">
                    <label for="S_date" class="font-montserrat">Check-in Date</label><br>
                    <input type="date" id="S_date" name="S_date"><br>
                    <div style="height: 10px; overflow: hidden;"></div>
                    <label for="SE_date" class="font-montserrat">Check-out Date</label><br>
                    <input type="date" id="E_date" name="E_date"><br>
                    <div style="height: 10px; overflow: hidden;"></div>
                    <label for="Pnum" class="font-montserrat">Number of Guests</label><br>
                    <input type="int" id="Pnum" name="Pnum">
                    <div style="height: 25px; overflow: hidden;"></div>
                    <input type="submit" value="BOOK" />
                </form>
                <div style="height: 50px; overflow: hidden;"></div>

                <!--check-out-->
                <div style="height: 50px; overflow: hidden;"></div>
                <form action="https://localhost/NET/C_check_out_query.php" method="post">
                    <label for="Pnum" class="font-montserrat">Room Number</label><br>
                    <input type="int" id="R_no" name="R_no">
                    <div style="height: 25px; overflow: hidden;"></div>
                    <input type="submit" value="check-out" />
                </form>

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