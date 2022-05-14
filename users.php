<?php
use Phppot\Member;
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->gologin();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            FRONT
        </title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="front.css">
            <link rel="stylesheet" type="text/css" href="reg.css"> 
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
            <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
            <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
            <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
            <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
            <!-- Google Fonts -->
            <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"> -->
            <!-- Bootstrap core CSS -->
            <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> -->
            <!-- Material Design Bootstrap -->
            <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> -->
            <!-- JQuery -->
            <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
            <!-- Bootstrap tooltips -->
            <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script> -->
            <!-- Bootstrap core JavaScript -->
            <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
            <!-- MDB core JavaScript -->
            <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script> -->
    </head>
    <header>
        <div class="one">
            <!-- <input type="checkbox" id="check">
            <label for="check" class="ckeckbtn">
              <i class="fas fa-bars"></i>
            </label> -->
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
              <i class="fas fa-bars"></i>
            </label>
            <label class="logo">TECH<sup>GUYS</sup></label>
            <ul>
              <li><a href="front.html" >Home</a></li>
              <li><a href="">Home</a></li>
              <li><a href="">Home</a></li>
              <li><a href="">Home</a></li>
              <li><a href="">Home</a></li>
              <li><a class = "active" href="reg.html">SignUp</a></li>
              <li><a href="login.html">LogIn</a></li>
            </ul>
        </div>
    </header>
    <body>   
        <!-- <div class="regdiv">
                <p>Register</p>
                <form action=""></form>
        </div> -->
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <div class="card">
                        <h5 class="text-center mb-4">Register</h5>
                        <form name="sign-up" action="" method="post"
                    onsubmit="return signupValidation()">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">First name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="Firstname" placeholder="Enter your first name" onblur="validate(1)"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label> <input type="text" id="lname" name="Lastname" placeholder="Enter your last name" onblur="validate(2)"> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> <input type="email" id="email" name="email" placeholder="" onblur="validate(3)"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phone number<span class="text-danger"> *</span></label> <input type="tel" id="mob" name="Phone" placeholder="" onblur="validate(4)"> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Password<span class="text-danger"> *</span></label> <input type="password" id="job" name="signup-password" placeholder="" onblur="validate(5)"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Confirm Password<span class="text-danger"> *</span></label> <input type="password" id="job" name="confirm-password" placeholder="" onblur="validate(5)"> </div>
                            </div>
                            <!-- <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">What would you be using Flinks for?<span class="text-danger"> *</span></label> <input type="text" id="ans" name="ans" placeholder="" onblur="validate(6)"> </div>
                            </div> -->
                            <div class="row justify-content-center">
                                <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary" style="width:100%">REGISTER</button> </div>
                            </div>

                            <div class="container" style="background-color:rgba(2, 2, 2, 0);height:10px;margin-top: 15px;">
                                <p style="font-family: sans-serif;text-align: center;font-size: 10px ;">Or Sign Up Using</p>
                              </div>
                              <div class="container" style="background-color:rgba(184, 21, 21, 0);height:auto;margin-top: 13px;display: flex;justify-content: center;">
                                <i class="fa fa-facebook" style="padding-left: 0px;color:blue;font-size: 15px;"></i> 
                                 <i class="fa fa-google" style="padding-left: 20px;color:rgb(168, 35, 35);font-size: 15px;"></i>
                                  <i class="fa fa-twitter" style="padding-left: 20px;color:dodgerblue;font-size: 15px;"></i>
                                <!-- <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="padding:10px;margin:10px;color:white">Cancel</button> -->
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>