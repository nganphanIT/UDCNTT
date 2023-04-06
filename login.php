<?php
session_start();
?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="login.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <script src="login.js"></script>
    </head>
    <body>
        <div id="pageWrapper">
            <div id="header"> 
                <img  id="header" src="./img/header.png" alt="">
                <img id="logo" src="./img/logo.png" >
                <div id="siteTitle2">
                    <p>TRUNG TÂM TIN HỌC CẦN THƠ</p>
                </div>
                <img id="logo2" src="./img/logo2.png" >
            </div>
            <div id="nav">           
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <?php if(isset($_SESSION['error'])){ ?>
                          <?= $_SESSION['error'];
                          unset($_SESSION['error']);  ?>
                        <?php } ?>
                        <div class="title"> <b>ĐĂNG NHẬP</b> </div>
                       
                        <form action="auth.php" method="POST">
                            <div class="input_box">
                              <input type="text" placeholder="Nhập email hoặc tên đăng nhập..." required id="user" name="user">
                              <div class="icon"><i class="fas fa-user"></i></div>
                            </div>
                            <div class="input_box">
                              <input type="password" placeholder="Nhập mật khẩu..." required id="pass" name="pass">
                              <div class="icon"><i class="fas fa-lock"></i></div>
                            </div>
                            <div class="option_div">
                              <div class="check_box">
                                <input type="checkbox">
                                <span>Ghi nhớ </span>
                              </div>
                              <div class="forget_div">
                                <a href="#">Quên mật khẩu?</a>
                              </div>
                            </div>
                            <div class="input_box button">
                              <input type="submit" id="btn" value="ĐĂNG NHẬP">
                            </div>
                            <!-- <div class="sign_up">
                              Chưa có tài khoản?<a href="signup.php">   Đăng kí ngay</a>
                            </div> -->
                          </form>
                    </div>
                </div>
                <div id="leftSide">
                    <div class="group-box">
                        <div class="title">DANH MỤC</div>
                        <div class="leftMenu">
                            <ul>
                                <li> <a href="main_guest.php">TRANG CHỦ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
                 <p>
                     Copyright &copy; 2021
                 </p>
            </div>
        </div> 
    </body>
    </html>