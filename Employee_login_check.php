<?php
//connect to mysql
$con = mysqli_connect("localhost","root","1234","resort");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$result_se = "";
$name = $_POST['uno'];
$passowrd = $_POST['psw'];

$select_sql = "SELECT  No
        FROM    employee
        WHERE   No = $name
        ";
$result_se = mysqli_query($con,$select_sql);

if ($name && $passowrd){//如果使用者名稱和密碼都不為空
    if($result_se){//0 false 1 true
        if($passowrd == '1234'){
            header("refresh:0;url=https://localhost/NET/Department.html");//如果成功跳轉至dept.html頁面
        }else{
            echo "Wrong employee number or password";
            echo "
            <script>
            setTimeout(function(){window.location.href='https://localhost/NET/Employee_login.html';},1500);
            </script>
            ";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
        }
    }else{
        echo "Wrong employee number or password";
        echo "
            <script>
            setTimeout(function(){window.location.href='https://localhost/NET/Employee_login.html';},1500);
            </script>
            ";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
    }
}else{//如果使用者名稱或密碼有空
    echo "Cannot be empty";
    echo "
        <script>
        setTimeout(function(){window.location.href='https://localhost/NET/Employee_login.html';},1000);
        </script>";
        //如果錯誤使用js 1秒後跳轉到登入頁面重試;
}
?>