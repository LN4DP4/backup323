<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="webstyle.css">
    <link rel="stylesheet" href="Tdashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Document</title>
    <?php

        include_once 'db.php';
        include_once 'user.php';
    
        session_start();
        $logged_in = false;
        if (isset($_SESSION['user'])) {
            $logged_in = true;
            $user = unserialize($_SESSION['user']);
        }
    
        //else{
            //header("Location: /Gibjohn/Student_login.php");
        //}
    
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gibjohn";
        $Login_student_id = "1";
        $progress = "";

    
        //echo($user->email);
        //echo($user->password);
        
    
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
           
        $sql = "SELECT tutor_id, first_name, last_name, email, password, status FROM tutor";
        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()) {
            $line = "<br>". $row["tutor_id"]. " ". $row["first_name"]. " " . $row["last_name"] ." ". $row["email"] ." ". $row["password"] ." ". $row["status"] . "<br>";
            //echo" ";
            $verify = password_verify($user->password, $row['password']);
            //echo($row["password"]);
            if ($row["email"] == $user->email && $verify == true){
                $_SESSION['tutor_id'] = $row["tutor_id"];
                $_SESSION['first_name'] = $row["first_name"];
                $_SESSION['last_name'] = $row["last_name"];
                $_SESSION['email'] = $row["email"];
                $_SESSION['status'] = $row["status"];
                //echo($_SESSION['student_id']." ".$_SESSION['first_name']." ".$_SESSION['last_name']." ".$_SESSION['email']." ".$_SESSION['status']);
            }
        }

        function course($subject) {
            $_SESSION['subject'] = $subject;
            echo $_SESSION['subject'];
            header("Location: /Gibjohn/course.php");
          }
        
          if (isset($_GET['maths'])) {
            $sub = "maths";
            course($sub);
          }
    
          elseif (isset($_GET['science'])) {
            $sub = "science";
            course($sub);
          }
    
          elseif (isset($_GET['english'])) {
            $sub = "english";
            course($sub);
          }
    
          elseif (isset($_GET['history'])) {
            $sub = "history";
            course($sub);
          }
    
          elseif (isset($_GET['geography'])) {
            $sub = "geography";
            course($sub);
          }
    
          elseif (isset($_GET['mfl'])) {
            $sub = "mfl";
            course($sub);
          }
    
          elseif (isset($_GET['dt'])) {
            $sub = "dt";
            course($sub);
          }
    
          elseif (isset($_GET['ad'])) {
            $sub = "ad";
            course($sub);
          }
    
          elseif (isset($_GET['music'])) {
            $sub = "music";
            course($sub);
          }
    
          elseif (isset($_GET['pe'])) {
            $sub = "pe";
            course($sub);
          }
    
          elseif (isset($_GET['citizenship'])) {
            $sub = "citizenship";
            course($sub);
          }
    
          elseif (isset($_GET['computing'])) {
            $sub = "computing";
            course($sub);
          }

        function Opisite_page(){
            $op_page = $_SESSION["page2S"];

            //if($op_page == "visable"){
               // $se
            //}
            
        }

        //<new>
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
         if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
       
        $sql = "SELECT student_id, first_name, last_name, email, password, status FROM student";
        $result = $conn->query($sql);
        $count = 0;

        while($row = $result->fetch_assoc()) {
            $count = $count+1;
            $line = "<br>". $row["student_id"]. " ". $row["first_name"]. " " . $row["last_name"] ." ". $row["email"] ." ". $row["password"] ." ". $row["status"] . "<br>";
            //echo $line;
        }

        $_SESSION['count'] = $count;

        function Student_visibility($Student_page, $student){
           

            if (array_key_exists('page1S',$_POST)){
                $Spage = "1";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                    
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page2S',$_POST)){
                $Spage = "2";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page3S',$_POST)){
                $Spage = "3";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page4S',$_POST)){
                $Spage = "4";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page5S',$_POST)){
                $Spage = "5";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page5S',$_POST)){
                $Spage = "5";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page6S',$_POST)){
                $Spage = "6";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page7S',$_POST)){
                $Spage = "7";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page8S',$_POST)){
                $Spage = "8";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page9S',$_POST)){
                $Spage = "9";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page10S',$_POST)){
                $Spage = "10";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page11S',$_POST)){
                $Spage = "11";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page12S',$_POST)){
                $Spage = "12";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page13S',$_POST)){
                $Spage = "13";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page14S',$_POST)){
                $Spage = "14";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page15S',$_POST)){
                $Spage = "15";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page4S',$_POST)){
                $Spage = "16";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            else{
                $Spage = "1";
                if($Student_page == $Spage and strval($student) <= $_SESSION['count']){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }
        }
        //</new>

        function Course_visibility($course_page){
            if (array_key_exists('page1',$_POST)){
                $page = "1";
                if($course_page == $page){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page2',$_POST)){
                $page = "2";
                Opisite_page();
                if($course_page == $page){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page3',$_POST)){
                $page = "3";
                if($course_page == $page){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            else{
                $page = "1";
                if($course_page == $page){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }
        }

        //<new>
        function Button($button){
            if ($button == 1 and 1 <= $_SESSION['count']){
                echo 'visible';
    
            }

            else if ($button == 2 and 7 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 3 and 13 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 4 and 19 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 5 and 25 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 6 and 31 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 7 and 37 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 8 and 43 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 9 and 49 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 10 and 55 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 11 and 61 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 12 and 67 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 13 and 73 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 14 and 79 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 15 and 85 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else if ($button == 16 and 91 <= $_SESSION['count'] ){
                echo 'visible';
            }

            else{
                echo 'hidden';
                //echo $_SESSION['count'];
            }
        }
        //</new>
    ?>
</head>
<body>
    
<nav class="navbar navbar-expand-sm grey">
    <div class="container-fluid">
        <a class="navbar-brand" href="Homepage.php">
            <img src="logo.png" alt="Company logo" style="width:99px; height:60px">
        </a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Contact.php">Contact Us</a>
                </li>
            </ul>
            <form class="d-flex" method="post">
                <?php 
                    if ($logged_in):
                ?>
                
                <p style="color: white;">
                    Hello, <?php echo $_SESSION['first_name'] ?> <input type="submit" class="btn btn-primary" name="Logout" id="Logout" value="Logout">
                </p>
                
                <?php
                    else: 
                ?>
                <p>
                    <input type="submit" class="btn btn-primary" name="Login" id="Login" value="Login">
                </p>
                
                <?php endif ?>
            </form>
        </div>
    </div>
</nav> 

<!-- page 1 courses -->
<div class="container Contentbox ">
    <div class="c1 rounded tabs text-white <?php $tpage="1"; Course_visibility($tpage)?>">
        <h4 class="title">Science</h4> 
        <img src="science.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?science=true">
                View More
            </a>
        </div>
    </div>
    <div class="c2 rounded tabs text-white vis <?php $tpage="1"; Course_visibility($tpage)?>">
        <h4 class="title" >Maths</h4> 
        <img src="maths.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?maths=true">
                View More
            </a>
        </div>
    </div>
    <div class="c3 rounded tabs text-white <?php $tpage="1"; Course_visibility($tpage)?>">
        <h4 class="title" >English</h4> 
        <img src="english.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?english=true">
                View More
            </a>
        </div>
    </div>
    <div class="c4 rounded tabs text-white <?php $tpage="1"; Course_visibility($tpage) ?>">
        <h4 class="title" >History</h4> 
        <img src="history.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?history=true">
                View More
            </a>
        </div>
    </div>

    
    <form class="pc1 rounded" style="border: 0px solid rgb(0, 0, 0);" method="post">
        <input type="submit" class="btn btn-primary" name="page1" id="page1" value="1"/>
        <input type="submit" class="btn btn-primary" name="page2" id="page2" value="2"/>
        <input type="submit" class="btn btn-primary" name="page3" id="page3" value="3"/>
    </form>
    
    <!-- <new> -->
    <form class="pc2 rounded" style="border: 0px solid rgb(0, 0, 0);" method="post">
        <input type="submit" class="btn btn-primary <?php Button("1") ?>" name="page1S" id="page1S" value="1"/>
        <input type="submit" class="btn btn-primary <?php Button("2") ?>" name="page2S" id="page2S" value="2"/>
        <input type="submit" class="btn btn-primary <?php Button("3") ?>" name="page3S" id="page3S" value="3"/>
        <input type="submit" class="btn btn-primary <?php Button("4") ?>" name="page4S" id="page4S" value="4"/>
        <input type="submit" class="btn btn-primary <?php Button("5") ?>" name="page5S" id="page5S" value="5"/>
        <input type="submit" class="btn btn-primary <?php Button("6") ?>" name="page6S" id="page6S" value="6"/>
        <input type="submit" class="btn btn-primary <?php Button("7") ?>" name="page7S" id="page7S" value="7"/>
        <input type="submit" class="btn btn-primary <?php Button("8") ?>" name="page8S" id="page8S" value="8"/>
        <input type="submit" class="btn btn-primary <?php Button("9") ?>" name="page9S" id="page9S" value="9"/>
        <input type="submit" class="btn btn-primary <?php Button("10") ?>" name="page10S" id="page10S" value="10"/>
        <input type="submit" class="btn btn-primary <?php Button("11") ?>" name="page11S" id="page11S" value="11"/>
        <input type="submit" class="btn btn-primary <?php Button("12") ?>" name="page12S" id="page12S" value="12"/>
        <input type="submit" class="btn btn-primary <?php Button("13") ?>" name="page13S" id="page13S" value="13"/>
        <input type="submit" class="btn btn-primary <?php Button("14") ?>" name="page14S" id="page14S" value="14"/>
        <input type="submit" class="btn btn-primary <?php Button("15") ?>" name="page15S" id="page15S" value="15"/>
        <input type="submit" class="btn btn-primary <?php Button("16") ?>" name="page16S" id="page16S" value="16"/>
    </form>
    

    <!-- page 1 students -->
    <div class="s1 rounded tabs text-white <?php $Spage="1"; $s="1"; Student_visibility($Spage, $s)?>">
        <h4 class="title" >hello</h4> 
        <img src="geography.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?geography=true">
                View More
            </a>
        </div>
    </div>
    <div class="s2 rounded tabs text-white <?php $Spage="1"; $s="2"; Student_visibility($Spage, $s) ?>">2</div>
    <div class="s3 rounded tabs text-white <?php $Spage="1"; $s="3"; Student_visibility($Spage, $s) ?>">3</div>
    <div class="s4 rounded tabs text-white <?php $Spage="1"; $s="4"; Student_visibility($Spage, $s) ?>">4</div>
    <div class="s5 rounded tabs text-white <?php $Spage="1"; $s="5"; Student_visibility($Spage, $s) ?>">5</div>
    <div class="s6 rounded tabs text-white <?php $Spage="1"; $s="6"; Student_visibility($Spage, $s) ?>">6</div>
    <!-- </new> -->

    <!-- page 2 courses -->
    <div class="c5 rounded tabs text-white <?php $tpage="2"; Course_visibility($tpage) ?>">
        <h4 class="title" >Geography</h4> 
        <img src="geography.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?geography=true">
                View More
            </a>
        </div>
    </div>
    <div class="c6 rounded tabs text-white <?php $tpage="2"; Course_visibility($tpage)?>">
        <h4 class="title" >Modern Foreign Languages</h4> 
        <img src="mfl.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?mfl=true">
                View More
            </a>
        </div>
    </div>
    <div class="c7 rounded tabs text-white <?php $tpage="2"; Course_visibility($tpage)?>">
        <h4 class="title" >Design and Technology</h4> 
        <img src="dt.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?dt=true">
                View More
            </a>
        </div>
    </div>
    <div class="c8 rounded tabs text-white <?php $tpage="2"; Course_visibility($tpage)?>">
        <h4 class="title" >Art and Design</h4> 
        <img src="ad.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?ad=true">
                View More
            </a>
        </div>
    </div>

    <!-- page 3 courses -->
    <div class="c9 rounded tabs text-white <?php $tpage="3"; Course_visibility($tpage) ?>">
        <h4 class="title" >Music</h4> 
        <img src="music.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?music=true">
                View More
            </a>
        </div>
    </div>
    <div class="c10 rounded tabs text-white <?php $tpage="3"; Course_visibility($tpage)?>">
        <h4 class="title" >Physical Education</h4> 
        <img src="pe.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?pe=true">
                View More
            </a>
        </div>
    </div>
    <div class="c11 rounded tabs text-white <?php $tpage="3"; Course_visibility($tpage)?>">
        <h4 class="title" >Citizenship</h4> 
        <img src="citizenship.png" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?citizenship=true">
                View More
            </a>
        </div>
    </div>
    <div class="c12 rounded tabs text-white <?php $tpage="3"; Course_visibility($tpage) ?>">
        <h4 class="title" >Computing</h4> 
        <img src="computing.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?computing=true">
                View More
            </a>
        </div>
    </div>

    <!-- <new> -->
    <!-- page2 students -->
    <div class="s7 rounded tabs text-white <?php $Spage="2"; $s="7"; Student_visibility($Spage, $s)?>">7</div>
    <div class="s8 rounded tabs text-white <?php $Spage="2"; $s="8"; Student_visibility($Spage, $s) ?>">8</div>
    <div class="s9 rounded tabs text-white <?php $Spage="2"; $s="9"; Student_visibility($Spage, $s) ?>">9</div>
    <div class="s10 rounded tabs text-white <?php $Spage="2"; $s="10"; Student_visibility($Spage, $s) ?>">10</div>
    <div class="s11 rounded tabs text-white <?php $Spage="2"; $s="11"; Student_visibility($Spage, $s) ?>">11</div>
    <div class="s12 rounded tabs text-white <?php $Spage="2"; $s="12"; Student_visibility($Spage, $s) ?>">12</div>

    <!-- page3 students -->
    <div class="s13 rounded tabs text-white <?php $Spage="3"; $s="13"; Student_visibility($Spage, $s) ?>">13</div>
    <div class="s14 rounded tabs text-white <?php $Spage="3"; $s="14"; Student_visibility($Spage, $s) ?>">14</div>
    <div class="s15 rounded tabs text-white <?php $Spage="3"; $s="15"; Student_visibility($Spage, $s) ?>">15</div>
    <div class="s16 rounded tabs text-white <?php $Spage="3"; $s="16"; Student_visibility($Spage, $s) ?>">16</div>
    <div class="s17 rounded tabs text-white <?php $Spage="3"; $s="17"; Student_visibility($Spage, $s) ?>">17</div>
    <div class="s18 rounded tabs text-white <?php $Spage="3"; $s="18"; Student_visibility($Spage, $s) ?>">18</div>

    <!-- page4 students -->
    <div class="s19 rounded tabs text-white <?php $Spage="4"; $s="19"; Student_visibility($Spage, $s) ?>">19</div>
    <div class="s20 rounded tabs text-white <?php $Spage="4"; $s="20"; Student_visibility($Spage, $s) ?>">20</div>
    <div class="s21 rounded tabs text-white <?php $Spage="4"; $s="21"; Student_visibility($Spage, $s) ?>">21</div>
    <div class="s22 rounded tabs text-white <?php $Spage="4"; $s="22"; Student_visibility($Spage, $s) ?>">22</div>
    <div class="s23 rounded tabs text-white <?php $Spage="4"; $s="23"; Student_visibility($Spage, $s) ?>">23</div>
    <div class="s24 rounded tabs text-white <?php $Spage="4"; $s="24"; Student_visibility($Spage, $s) ?>">24</div>

    <!-- page5 students -->
    <div class="s25 rounded tabs text-white <?php $Spage="5"; $s="25"; Student_visibility($Spage, $s) ?>">25</div>
    <div class="s26 rounded tabs text-white <?php $Spage="5"; $s="26"; Student_visibility($Spage, $s) ?>">26</div>
    <div class="s27 rounded tabs text-white <?php $Spage="5"; $s="27"; Student_visibility($Spage, $s) ?>">27</div>
    <div class="s28 rounded tabs text-white <?php $Spage="5"; $s="28"; Student_visibility($Spage, $s) ?>">28</div>
    <div class="s29 rounded tabs text-white <?php $Spage="5"; $s="29"; Student_visibility($Spage, $s) ?>">29</div>
    <div class="s30 rounded tabs text-white <?php $Spage="5"; $s="30"; Student_visibility($Spage, $s) ?>">30</div>

    <!-- page6 students -->
    <div class="s31 rounded tabs text-white <?php $Spage="6"; $s="31"; Student_visibility($Spage, $s) ?>">31</div>
    <div class="s32 rounded tabs text-white <?php $Spage="6"; $s="32"; Student_visibility($Spage, $s) ?>">32</div>
    <div class="s33 rounded tabs text-white <?php $Spage="6"; $s="33"; Student_visibility($Spage, $s) ?>">33</div>
    <div class="s34 rounded tabs text-white <?php $Spage="6"; $s="34"; Student_visibility($Spage, $s) ?>">34</div>
    <div class="s35 rounded tabs text-white <?php $Spage="6"; $s="35"; Student_visibility($Spage, $s) ?>">35</div>
    <div class="s36 rounded tabs text-white <?php $Spage="6"; $s="36"; Student_visibility($Spage, $s) ?>">36</div>

    <!-- page7 students -->
    <div class="s37 rounded tabs text-white <?php $Spage="7"; $s="37"; Student_visibility($Spage, $s) ?>">37</div>
    <div class="s38 rounded tabs text-white <?php $Spage="7"; $s="38"; Student_visibility($Spage, $s) ?>">38</div>
    <div class="s39 rounded tabs text-white <?php $Spage="7"; $s="39"; Student_visibility($Spage, $s) ?>">39</div>
    <div class="s40 rounded tabs text-white <?php $Spage="7"; $s="40"; Student_visibility($Spage, $s) ?>">40</div>
    <div class="s41 rounded tabs text-white <?php $Spage="7"; $s="41"; Student_visibility($Spage, $s) ?>">41</div>
    <div class="s42 rounded tabs text-white <?php $Spage="7"; $s="42"; Student_visibility($Spage, $s) ?>">42</div>

    <!-- page8 students -->
    <div class="s43 rounded tabs text-white <?php $Spage="8"; $s="43"; Student_visibility($Spage, $s) ?>">43</div>
    <div class="s44 rounded tabs text-white <?php $Spage="8"; $s="44"; Student_visibility($Spage, $s) ?>">44</div>
    <div class="s45 rounded tabs text-white <?php $Spage="8"; $s="45"; Student_visibility($Spage, $s) ?>">45</div>
    <div class="s46 rounded tabs text-white <?php $Spage="8"; $s="46"; Student_visibility($Spage, $s) ?>">46</div>
    <div class="s47 rounded tabs text-white <?php $Spage="8"; $s="47"; Student_visibility($Spage, $s) ?>">47</div>
    <div class="s48 rounded tabs text-white <?php $Spage="8"; $s="48"; Student_visibility($Spage, $s) ?>">48</div>

    <!-- page9 students -->
    <div class="s49 rounded tabs text-white <?php $Spage="9"; $s="49"; Student_visibility($Spage, $s) ?>">49</div>
    <div class="s50 rounded tabs text-white <?php $Spage="9"; $s="50"; Student_visibility($Spage, $s) ?>">50</div>
    <div class="s51 rounded tabs text-white <?php $Spage="9"; $s="51"; Student_visibility($Spage, $s) ?>">51</div>
    <div class="s52 rounded tabs text-white <?php $Spage="9"; $s="52"; Student_visibility($Spage, $s) ?>">52</div>
    <div class="s53 rounded tabs text-white <?php $Spage="9"; $s="53"; Student_visibility($Spage, $s) ?>">53</div>
    <div class="s54 rounded tabs text-white <?php $Spage="9"; $s="54"; Student_visibility($Spage, $s) ?>">54</div>

     <!-- page10 students -->
    <div class="s55 rounded tabs text-white <?php $Spage="10"; $s="55"; Student_visibility($Spage, $s) ?>">55</div>
    <div class="s56 rounded tabs text-white <?php $Spage="10"; $s="56"; Student_visibility($Spage, $s) ?>">56</div>
    <div class="s57 rounded tabs text-white <?php $Spage="10"; $s="57"; Student_visibility($Spage, $s) ?>">57</div>
    <div class="s58 rounded tabs text-white <?php $Spage="10"; $s="58"; Student_visibility($Spage, $s) ?>">58</div>
    <div class="s59 rounded tabs text-white <?php $Spage="10"; $s="59"; Student_visibility($Spage, $s) ?>">59</div>
    <div class="s60 rounded tabs text-white <?php $Spage="10"; $s="60"; Student_visibility($Spage, $s) ?>">60</div>

    <!-- page11 students -->
    <div class="s61 rounded tabs text-white <?php $Spage="11"; $s="61"; Student_visibility($Spage, $s) ?>">61</div>
    <div class="s62 rounded tabs text-white <?php $Spage="11"; $s="62"; Student_visibility($Spage, $s) ?>">62</div>
    <div class="s63 rounded tabs text-white <?php $Spage="11"; $s="63"; Student_visibility($Spage, $s) ?>">63</div>
    <div class="s64 rounded tabs text-white <?php $Spage="11"; $s="64"; Student_visibility($Spage, $s) ?>">64</div>
    <div class="s65 rounded tabs text-white <?php $Spage="11"; $s="65"; Student_visibility($Spage, $s) ?>">65</div>
    <div class="s66 rounded tabs text-white <?php $Spage="11"; $s="66"; Student_visibility($Spage, $s) ?>">66</div>

    <!-- page12 students -->
    <div class="s67 rounded tabs text-white <?php $Spage="12"; $s="67"; Student_visibility($Spage, $s) ?>">67</div>
    <div class="s68 rounded tabs text-white <?php $Spage="12"; $s="68"; Student_visibility($Spage, $s) ?>">68</div>
    <div class="s69 rounded tabs text-white <?php $Spage="12"; $s="69"; Student_visibility($Spage, $s) ?>">69</div>
    <div class="s70 rounded tabs text-white <?php $Spage="12"; $s="70"; Student_visibility($Spage, $s) ?>">70</div>
    <div class="s71 rounded tabs text-white <?php $Spage="12"; $s="71"; Student_visibility($Spage, $s) ?>">71</div>
    <div class="s72 rounded tabs text-white <?php $Spage="12"; $s="72"; Student_visibility($Spage, $s) ?>">72</div>

    <!-- page13 students -->
    <div class="s73 rounded tabs text-white <?php $Spage="13"; $s="73"; Student_visibility($Spage, $s) ?>">73</div>
    <div class="s74 rounded tabs text-white <?php $Spage="13"; $s="74"; Student_visibility($Spage, $s) ?>">74</div>
    <div class="s75 rounded tabs text-white <?php $Spage="13"; $s="75"; Student_visibility($Spage, $s) ?>">75</div>
    <div class="s76 rounded tabs text-white <?php $Spage="13"; $s="76"; Student_visibility($Spage, $s) ?>">76</div>
    <div class="s77 rounded tabs text-white <?php $Spage="13"; $s="77"; Student_visibility($Spage, $s) ?>">77</div>
    <div class="s78 rounded tabs text-white <?php $Spage="13"; $s="78"; Student_visibility($Spage, $s) ?>">78</div>

    <!-- page14 students -->
    <div class="s79 rounded tabs text-white <?php $Spage="14"; $s="79"; Student_visibility($Spage, $s) ?>">79</div>
    <div class="s80 rounded tabs text-white <?php $Spage="14"; $s="80"; Student_visibility($Spage, $s) ?>">80</div>
    <div class="s81 rounded tabs text-white <?php $Spage="14"; $s="81"; Student_visibility($Spage, $s) ?>">81</div>
    <div class="s82 rounded tabs text-white <?php $Spage="14"; $s="82"; Student_visibility($Spage, $s) ?>">82</div>
    <div class="s83 rounded tabs text-white <?php $Spage="14"; $s="83"; Student_visibility($Spage, $s) ?>">83</div>
    <div class="s84 rounded tabs text-white <?php $Spage="14"; $s="84"; Student_visibility($Spage, $s) ?>">84</div>

    <!-- page15 students -->
    <div class="s85 rounded tabs text-white <?php $Spage="15"; $s="85"; Student_visibility($Spage, $s) ?>">85</div>
    <div class="s86 rounded tabs text-white <?php $Spage="15"; $s="86"; Student_visibility($Spage, $s) ?>">86</div>
    <div class="s87 rounded tabs text-white <?php $Spage="15"; $s="87"; Student_visibility($Spage, $s) ?>">87</div>
    <div class="s88 rounded tabs text-white <?php $Spage="15"; $s="88"; Student_visibility($Spage, $s) ?>">88</div>
    <div class="s89 rounded tabs text-white <?php $Spage="15"; $s="89"; Student_visibility($Spage, $s) ?>">89</div>
    <div class="s90 rounded tabs text-white <?php $Spage="15"; $s="90"; Student_visibility($Spage, $s) ?>">90</div>

    <!-- page16 students -->
    <div class="s91 rounded tabs text-white <?php $Spage="16"; $s="91"; Student_visibility($Spage, $s) ?>">91</div>
    <div class="s92 rounded tabs text-white <?php $Spage="16"; $s="92"; Student_visibility($Spage, $s) ?>">92</div>
    <div class="s93 rounded tabs text-white <?php $Spage="16"; $s="93"; Student_visibility($Spage, $s) ?>">93</div>
    <div class="s94 rounded tabs text-white <?php $Spage="16"; $s="94"; Student_visibility($Spage, $s) ?>">94</div>
    <div class="s95 rounded tabs text-white <?php $Spage="16"; $s="95"; Student_visibility($Spage, $s) ?>">95</div>
    <div class="s96 rounded tabs text-white <?php $Spage="16"; $s="96"; Student_visibility($Spage, $s) ?>">96</div>

    <!-- page17 students -->
    <div class="s97 rounded tabs text-white <?php $Spage="17"; $s="97"; Student_visibility($Spage, $s) ?>">97</div>
    <div class="s98 rounded tabs text-white <?php $Spage="17"; $s="98"; Student_visibility($Spage, $s) ?>">98</div>
    <div class="s99 rounded tabs text-white <?php $Spage="17"; $s="99"; Student_visibility($Spage, $s) ?>">99</div>
    <div class="s100 rounded tabs text-white <?php $Spage="17"; $s="100"; Student_visibility($Spage, $s) ?>">100</div>
    <!-- </new> -->
    
</div>

</body>
</html>