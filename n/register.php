<?php
ob_start();
session_start();

include_once 'dbconnect.php';

if (isset($_POST['signup'])) {

    $uname = trim($_POST['uname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $college = trim($_POST['college']);
    $gender = trim($_POST['gender']);
    $dept = trim($_POST['dept']);
    $cevent="";$devent="";
    foreach($_POST['de'] as $selected){
            $devent=$devent."\n".$selected;
        }
    foreach($_POST['ce'] as $selected){
            $cevent=$cevent."\n".$selected;
     }

    $stmt = $conn->prepare("SELECT email FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 0) {


        $stmts = $conn->prepare("INSERT INTO event(name,mail,phone,college,gender,dept,de,ce) VALUES(?, ?, ?,?,?,?,?,?)");
        $stmts->bind_param("ssssssss", $uname, $email, $phone,$college,$gender,$dept,$devent,$cevent);
        $res = $stmts->execute();
        $stmts->close();
        ?><script>
            alert('Registered successfully...');    
        </script><?php

    } else {
        $errTyp = "warning";
        $errMSG = "Email is already used";
    }

}
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    <style>
        #aero{display:none;}
        #agri{display:none;}
        #cse{display:none;}
        #eee{display:none;}
        #ece{display:none;}
        #civil{display:none;}
        #chemical{display:none;}
        #mech{display:none;}
        #mct{display:none;}
    </style>
    <script>
        function eventchoose(){
            var a=document.getElementById("dept");
            var str = a.options[a.selectedIndex].value;
            var aero = document.getElementById("aero");
            var agri = document.getElementById("agri");
            var cse = document.getElementById("cse");
            var eee = document.getElementById("eee");
            var ece = document.getElementById("ece");
            var civil = document.getElementById("civil");
            var chemical = document.getElementById("chemical");
            var mech = document.getElementById("mech");
            var mct = document.getElementById("mct");
            if(str=="aero"){
                aero.style.display = "block";
                agri.style.display = "none";
                cse.style.display = "none";
                eee.style.display = "none";
                ece.style.display = "none";
                civil.style.display = "none";
                chemical.style.display = "none";
                mech.style.display = "none";
                mct.style.display = "none";
                    }
                    if(str=="agri"){
                aero.style.display = "none";
                agri.style.display = "block";
                cse.style.display = "none";
                eee.style.display = "none";
                ece.style.display = "none";
                civil.style.display = "none";
                chemical.style.display = "none";
                mech.style.display = "none";
                mct.style.display = "none";
                    }
                    if(str=="cse"){
                aero.style.display = "none";
                agri.style.display = "none";
                cse.style.display = "block";
                eee.style.display = "none";
                ece.style.display = "none";
                civil.style.display = "none";
                chemical.style.display = "none";
                mech.style.display = "none";
                mct.style.display = "none";
                    }
                    if(str=="eee"){
                aero.style.display = "none";
                agri.style.display = "none";
                cse.style.display = "none";
                eee.style.display = "block";
                ece.style.display = "none";
                civil.style.display = "none";
                chemical.style.display = "none";
                mech.style.display = "none";
                mct.style.display = "none";
                    }
                    if(str=="ece"){
                aero.style.display = "none";
                agri.style.display = "none";
                cse.style.display = "none";
                eee.style.display = "none";
                ece.style.display = "block";
                civil.style.display = "none";
                chemical.style.display = "none";
                mech.style.display = "none";
                mct.style.display = "none";
                    }
                    if(str=="civil"){
                aero.style.display = "none";
                agri.style.display = "none";
                cse.style.display = "none";
                eee.style.display = "none";
                ece.style.display = "none";
                civil.style.display = "block";
                chemical.style.display = "none";
                mech.style.display = "none";
                mct.style.display = "none";
                    }
                    if(str=="chemical"){
                aero.style.display = "none";
                agri.style.display = "none";
                cse.style.display = "none";
                eee.style.display = "none";
                ece.style.display = "none";
                civil.style.display = "none";
                chemical.style.display = "block";
                mech.style.display = "none";
                mct.style.display = "none";
                    }
                    if(str=="mech"){
                aero.style.display = "none";
                agri.style.display = "none";
                cse.style.display = "none";
                eee.style.display = "none";
                ece.style.display = "none";
                civil.style.display = "none";
                chemical.style.display = "none";
                mech.style.display = "block";
                mct.style.display = "none";
                    }
                    if(str=="mct"){
                aero.style.display = "none";
                agri.style.display = "none";
                cse.style.display = "none";
                eee.style.display = "none";
                ece.style.display = "none";
                civil.style.display = "none";
                chemical.style.display = "none";
                mech.style.display = "none";
                mct.style.display = "block";
                    }
        }
    </script>
</head>
<body style="background:#1B4F72;margin-top-5px;">
<nav class="navbar navbar-default navbar-fixed-top" style="background:#000000;color:white;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.html" style="color:white;">Techfinix'18</a>
        </div>
        
        </div>
    </div>
</nav>

<div class="container" >

    <div id="login-form" >
        <form method="post" autocomplete="off" >

            <div class="col-md-12" style=" box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    border-radius: 5px;margin-top:65px;background:#fff;">
            <center><h2 style="color:#428bca;">Event Registration</h2></center>
                <div class="form-group">
                    <hr/>
                </div>

                <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="uname" class="form-control" placeholder="Enter Your Name" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input type="" name="phone" class="form-control" placeholder="Enter Phone Number"
                               required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                        <input type="" name="college" class="form-control" placeholder="College Name"
                               required/>
                    </div>
                </div>
                <div class="form-group">
                <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <select class="form-control" name="gender" required>
                        <option selected="selected"  disabled="disabled">Select Your Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-education"></span></span>
                        <select class="form-control" id="dept"  name="dept" onchange="eventchoose();" required>
                            <option selected="selected"  disabled="disabled">Select Your Department</option>
                            <option value="aero">Aeronautics</option>
                            <option value="agri">Agriculture</option>
                            <option value="chemical">Chemical</option>
                            <option value="civil">Civil</option>
                            <option value="cse">CSE & IT</option>
                            <option value="ece">ECE</option>
                            <option value="eee">EEE</option>
                            <option value="mech">Mech</option>
                            <option value="mct">Mechtronics</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                
                 <div id="aero" class="input-group">
                    <h3 style="color:#428bca;">Events:</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="de[]" value="Great Astronomer">Great Astronomer</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Aviation Art">Aviation Art</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Sort-It-Out" >Sort-It-Out</label></div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Fly-in">Fly-in</label>
                    </div>
                 </div>
                 <div id="agri" class="input-group">
                    <h3 style="color:#428bca;">Events:</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="de[]" value="Poster Presentation">Poster Presentation</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Workshop">Workshop</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="AGRO Quiz" >AGRO Quiz</label></div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="ProjectShow">ProjectShow</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Hitching">Hitching</label>
                    </div>
                 </div>
                 <div id="chemical" class="input-group">
                    <h3 style="color:#428bca;">Events:</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="de[]" value="Poster Presentation">Poster Presentation</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Chem-O-Philia">Chem-O-Philia</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Merry-Blast" >Merry-Blast</label></div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Chem-freeze">Chem-freeze</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Chem-War">Chem-War</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Connexio">Connexio</label>
                    </div>
                 </div>
                 <div id="civil" class="input-group">
                    <h3 style="color:#428bca;">Events:</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="de[]"  value="Optimum Architectus">Optimum Architectus</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Poster Presentation">Poster Presentation</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Code/CADD Quest" >Code/CADD Quest</label></div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Brick Modeling">Brick Modeling</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Site All Rounder">Site All Rounder</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Build EXPO">Build EXPO</label>
                    </div>
                 </div>
                 <div id="cse" class="input-group">
                    <h3 style="color:#428bca;">Events:</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="de[]" value="Code Treasure">Code Treasure</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Crypsode">Crypsode</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Google Surf" >Google Surf</label></div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="LAN Gaming">LAN Gaming</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Tie-in">Tie-in</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Websie">Websie</label>
                    </div>
                 </div>
                 <div id="ece" class="input-group">
                    <h3 style="color:#428bca;">Events:</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="de[]" value="Multimedia Presentation">Multimedia Presentation</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Adzap/Spinwheel">Adzap/Spinwheel</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Line Follower" >Line Follower</label></div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Circuitrix">Circuitrix</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Talkshow">Talkshow</label>
                    </div>
                 </div>
                 <div id="eee" class="input-group">
                    <h3 style="color:#428bca;">Events:</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="de[]" value="Circuit Debugging">Circuit Debugging</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Line Follower">Line Follower</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Tech-MAT" >Tech-MAT</label></div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Connections">Connections</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Workshop">Workshop</label>
                    </div>
                 </div>
                 <div id="mech" class="input-group">
                    <h3 style="color:#428bca;">Events:</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="de[]" value="Project Presentation">Project Presentation</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Assemble & Dismantle">Assemble & Dismantle</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Water Rocketry" >Water Rocketry</label></div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="3D Modeling">3D Modeling</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Machining">Machining</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="IC Race">IC Race</label>
                    </div>
                 </div>
                 <div id="mct" class="input-group">
                    <h3 style="color:#428bca;">Events:</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="de[]" value="CAD Modeling">CAD Modeling</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Treasure Hunt">Treasure Hunt</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Line Follower" >Line Follower</label></div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Robo Soccer">Robo Soccer</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="de[]" value="Robo War">Robo War</label>
                    </div>
                 </div>
                </div>
                <div class="form-group">
                
                 <div id="" class="input-group">
                    <h3 style="color:#428bca;">Common Events:</h3>
                    <div class="checkbox">
                        <label><input type="checkbox" name="ce[]" value="Paper Presentation">Paper Presentation</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="ce[]" value="Photography">Photography</label>
                    </div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="ce[]" value="Technical Quiz" >Technical Quiz</label></div>
                    <div class="checkbox">
                         <label><input type="checkbox" name="ce[]" value="Project Expo">Project Expo</label>
                    </div>
                 </div>
                <div class="form-group">
                    <button type="submit" class="btn    btn-block btn-primary" name="signup" id="reg">Register</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>
            </div>

        </form>
    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/tos.js"></script>

</body>
</html>
