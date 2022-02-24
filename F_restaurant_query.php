<?php
//connect to mysql
$con = mysqli_connect("localhost","root","1234","resort");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$result_se = "";
$result_in = "";

switch ( $_POST['action'] ) { 
  //button : select
  case 'search': 
    //set variable
    $N_RENO = $_POST['RE_no'];
    if($N_RENO != 0)    $CTL_RENO = "AND  rd.RE_no = {$_POST['RE_no']}";
    else $CTL_RENO = "";
    $N_RNO = $_POST['R_no'];
    if($N_RNO != NULL)    $CTL_RNO = "AND room.No = {$_POST['R_no']}";
    else $CTL_RNO = "";
    $N_DATE = $_POST['Date'];
    if($N_DATE != NULL)    $CTL_DATE = "AND rd.Date = '{$_POST['Date']}'";
    else $CTL_DATE = "";
    $N_SESSION = $_POST['Session'];
    if($N_SESSION != 0)    $CTL_SESSION = "AND rd.Session = {$_POST['Session']}";
    else $CTL_SESSION = "";
    $N_COST = $_POST['Cost'];
    if($N_COST != NULL){
      if($_POST['act_total'] == 'geq' )
        $CTL_COST = "AND rd.Cost >= {$_POST['Cost']}";
      else if($_POST['act_total'] == 'equ' )
        $CTL_COST = "AND rd.Cost = {$_POST['Cost']}";
      else if($_POST['act_total'] == 'leq' )
        $CTL_COST = "AND rd.Cost <= {$_POST['Cost']}";
    } else {
      $CTL_COST = "";
    }
    $N_PNUM = $_POST['Pnum'];
    if($N_PNUM != NULL)    $CTL_PNUM = "AND rd.Pnum = '{$_POST['Pnum']}'";
    else $CTL_PNUM = "";

    //sql query : select
    $select_sql = "SELECT  R_no, Lname, Fname, Ssn, r.Name, Date, Session, rd.Pnum, rd.Cost
        FROM    customer c, restaurant r, restaurant_use_data rd, room
        WHERE    rd.C_ssn = c.Ssn
            AND  r.No = rd.RE_no
            AND  c.R_no = room.No
            $CTL_RENO
            $CTL_RNO  
            $CTL_DATE  
            $CTL_SESSION
            $CTL_COST
            $CTL_PNUM
            ";
    global $result_se;
    $result_se = mysqli_query($con,$select_sql);
    break;

  //button : insert
  case 'insert':
    //set default
    $N_COST = $_POST['Cost'];
    if($N_COST == NULL)    $N_COST = "default";
    $N_PNUM = $_POST['Pnum'];
    if($N_PNUM== NULL)    $N_PNUM = "default";  

    //sql query : find customer ssn from R_no
    $ssn_sql = "SELECT  Ssn
        FROM    customer ,room
        WHERE   customer.R_no = {$_POST['R_no']}
        ";
    $result_ssn = mysqli_query($con,$ssn_sql);
    $row = mysqli_fetch_array($result_ssn, MYSQLI_ASSOC);
    $FIND_SSN = $row['Ssn'];
    //echo "$FIND_SSN";

    //sql query : insert
    $insert_sql = "INSERT INTO restaurant_use_data(RE_no,C_ssn,Date,Session,Cost,Pnum)
                   VALUES ({$_POST['RE_no']},'$FIND_SSN','{$_POST['Date']}',{$_POST['Session']},$N_COST,$N_PNUM);";
    global $result_in;
    $result_in = mysqli_query($con,$insert_sql);
    break;

  default:    
    break;
}?>

<!--html code copy-->

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

    <!--php result-->
    <?php if ($result_se!=NULL){ //select success ?>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-8">
            <div class="w3-responsive">
                <table class="w3-table w3-bordered">
                    <thead>
                        <tr style="background-color: #7E8095; color:white;">
                            <td>Room No.</td>
                            <td>Fname</td>
                            <td>Lname</td>
                            <td>Ssn</td>
                            <td>Restaurant</td>
                            <td>Date</td>
                            <td>Session</td>
                            <td>People</td>
                            <td>Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <?php
                  
                    $row = mysqli_fetch_array($result_se, MYSQLI_ASSOC);
                    if($row['R_no']!=NULL){
                      do { ?>
                    <tr class="hover-color">
                        <td><?php echo $row['R_no']; ?></td>
                        <td><?php echo $row['Lname']; ?></td>
                        <td><?php echo $row['Fname']; ?></td>
                        <td><?php echo $row['Ssn']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Date']; ?></td>
                        <td><?php echo $row['Session']; ?></td>
                        <td><?php echo $row['Pnum']; ?></td>
                        <td><?php echo $row['Cost']; ?></td>
                        <td><a class="hover-color" href="https://localhost/NET/F_restaurant_query_del.php?
                                  Name=<?php echo $row['Name'];?>
                                  &Ssn=<?php echo $row['Ssn'];?>
                                  &Date=<?php echo $row['Date'];?>
                                  &Session=<?php echo $row['Session'];?>
                                  &Cost=<?php echo $row['Cost'];?>
                                  &Pnum=<?php echo $row['Pnum'];?>
                                  ">delete</a></td>
                        <?php } while ($row = mysqli_fetch_assoc($result_se));
                    }?>
                    <tr>
                </table>
                <?php mysqli_free_result($result_se);
    }
    else if ($result_in) {//insert success?>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <font class="font-montserrat " style="font-size=25px"><?php echo "Insert SUCCEEDED !";?>
                        </font>
                    </div>
                </div>
                <?php } else if (!$result_in) {?>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <font class="font-montserrat " style="font-size=25px"><?php echo "Insert FAILED !";?>
                        </font>
                    </div>
                </div>
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