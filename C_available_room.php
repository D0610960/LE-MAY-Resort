<?php
//connect to mysql
$con = mysqli_connect("localhost","root","1234","resort");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


  //sql query : find which room is available
$TYPE = $_GET['R_type'];
$room_sql = "SELECT No, Pnum
              FROM room
              WHERE Available = 1 AND Need_clean = 0 AND Pnum = \"$TYPE\"";
$result_room = mysqli_query($con,$room_sql);
$SSN = $_GET['Ssn'];

?>

<!--html code-->

<head>
    <title>LE MAY - Choose Room</title>
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
            <b>Choose&nbsp;&nbsp;Room</b>
        </h2>
    </header>

    <!-- Main -->
    <div style="height: 50px; overflow: hidden;"></div>
    <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-3">

            <!--php result-->
            <?php
            $row = mysqli_fetch_array($result_room, MYSQLI_ASSOC);
            if($row['Pnum']!=NULL){ 
              ?>
            <table class="w3-table w3-bordered center">
                <thead>
                    <tr style="background-color: #7E8095; color:white;">
                        <td>Room Type</td>
                        <td>Room No.</td>
                        <td></td>
                    </tr>
                </thead>
                <?php
                        if($row['Pnum'] == 1){
                              do { ?>
                    <tr class="hover-color">
                    <td><?php if($row['Pnum'] == 1) {echo "Single Room";?>
                    </td>
                    <td><?php echo $row['No']; ?></td>
                    <td><a class="hover-color" href="https://localhost/NET/C_check_in.php?No=<?php echo $row['No'];?>&Ssn=<?php echo $_GET['Ssn'];?>
                                          ">ASSIGN</a></td>
                    <?php 
                              }}while ($row = mysqli_fetch_assoc($result_room));
                          }
                          else if($row['Pnum'] == 2){
                            do { ?>
                    <tr class="hover-color">
                    <td><?php if($row['Pnum'] == 2) {echo "Double Room";?>
                    </td>
                    <td><?php echo $row['No']; ?></td>
                    <td><a class="hover-color" href="https://localhost/NET/C_check_in.php?No=<?php echo $row['No'];?>&Ssn=<?php echo $_GET['Ssn'];?>
                                        ">ASSIGN</a></td>
                    <?php 
                            }}while ($row = mysqli_fetch_assoc($result_room));
                        }
                        else if($row['Pnum'] == 4){
                            do { ?>
                    <tr class="hover-color">
                    <td><?php if($row['Pnum'] == 4) {echo "Quadruple Room";?>
                    </td>
                    <td><?php echo $row['No']; ?></td>
                    <td><a class="hover-color" href="https://localhost/NET/C_check_in.php?No=<?php echo $row['No'];?>&Ssn=<?php echo $_GET['Ssn'];?>
                                        ">ASSIGN</a></td>
                    <?php 
                            }}while ($row = mysqli_fetch_assoc($result_room));
                        }
                        else if($row['Pnum'] == 6){
                            do { ?>
                    <tr class="hover-color">
                    <td><?php if($row['Pnum'] == 6) {echo "Connecting Room";?>
                    </td>
                    <td><?php echo $row['No']; ?></td>
                    <td><a class="hover-color" href="https://localhost/NET/C_check_in.php?No=<?php echo $row['No'];?>&Ssn=<?php echo $_GET['Ssn'];?>
                                        ">ASSIGN</a></td>
                    <?php 
                            }}while ($row = mysqli_fetch_assoc($result_room));
                        }
                        else if($row['Pnum'] == 8){
                            do { ?>
                    <tr class="hover-color">
                    <td><?php if($row['Pnum'] == 8) {echo "Group Room";?>
                    </td>
                    <td><?php echo $row['No']; ?></td>
                    <td><a class="hover-color" href="https://localhost/NET/C_check_in.php?No=<?php echo $row['No'];?>&Ssn=<?php echo $_GET['Ssn'];?>
                                        ">ASSIGN</a></td>
                    <?php 
                            }}while ($row = mysqli_fetch_assoc($result_room));
                        }?>
                <tr>
            </table>
            <?php mysqli_free_result($result_room);
                  }?>
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


<?php mysqli_close($con);?>