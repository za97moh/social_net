<!DOCTYPE html>
<html>
    <head>
        <meta charset="tf-8"> 
        <meta name="description"content="welcome to social network">
        <title>iq.Engineering Society login </title>
       <link rel="stylesheet"href="style/style.css"type="text/css"/>
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
     <link rel='stylesheet' href='style/animate.css'/>

        <script src="js/wow.js"></script>
        <script> new WOW().init(); </script>

    </head>
    <body>
        <!--start header-->
            <div class="header">
                <div class="slider">
                    <div class="container">
                        <div class="intro wow fadeInDown">
                            <h1>welcom to <span>iq.Engineering Society</span></h1>
                        </div>
                    </div>
                </div>
                <div class="navbar">
                    <div class="container">
                        <h2 class="wow fadeInLeft">"Science is about knowing;</br> engineering is about doing."</h2>
                        <a class="wow fadeInRight"href="#log">log in</a>
                    </div>
                 </div>
                 
          </div>

        <!--end header-->
         <!--start info-->
        <div class="info">
            <div class="container">
                <div class="baiscinfo">
                    <h2 class="wow zoomIn">Overview</h2>
                    <p>The College of Engineering looks forward to the development of high quality engineering education to meet the needs of the community to be the leading engineering faculty, distinguished by its teaching, research and various programs to increase the efficiency of its graduates.</p>
                    <h2 class="wow zoomIn">departments:-</h2>
                </div>

            </div>
        </div>
        <!--end info-->
         <!--start department-->
         <div class="department">
            <div class="container">
                <div class="dep">
                    <h2 class="wow bounceInLeft"data-wow-duration="1s" data-wow-offset="150">computer</h2>
                    <p>Computer engineers are primarily electronics engineers, and have additional information, training and experience in software design and hardware </p>
                    <img src="images/comp.png">
                </div>
                <div class="dep">
                    <h2 class="wow bounceInUp"data-wow-duration="1s" data-wow-offset="150">network</h2>
                    <p>Focuses on the methodologies, techniques and tools that are the basis for developing Web applications that support design, development</p>
                    <img src="images/net.png">
                </div>
                <div class="dep">
                    <h2 class="wow bounceInRight"data-wow-duration="1s" data-wow-offset="150">Electricity</h2>
                    <p>Electrical Engineering Specializing in studying the sciences of electricity, electronics and electromagnetic fields, electrical engineering </p>
                  <img src="images/elec.png"> 
                </div>
           </div> 
        </div>
        <!--end department-->
        <!--anime-->
        <div class="b-box">
            <div class="box">
              <span></span>
              <span ></span>
               <span ></span>
               <span ></span>
                <span ></span>
            
            </div>
        </div>
        <!--end anime-->
        <!--start form -->
        <form class="form" id="log"  method="post" action="login.php">
            <div class="container">
                <div class="loginbox">
                    <h2>login</h2>
                    <input autocomplete="on" type="email" placeholder="Enter email..."  name="email" required="required">

                    <br><br>

                    <input type="Password" placeholder="Enter Password..." name="pass" required="required">

                    <br><br>
                    
                    <input type="submit" name="login" value="login">
        

                    <br><br>
            
                    <span id="error"style="color:red; display:none;" > the email or password is incorrect </span>
                    <a href="forgot_password.php">forget your password</a>
                </div>
                <br>




                <div class="signup">
                    <div class="text wow flipInX">
                       Don't have account..?<br>
                       Learn more about IQ-Engineering Socity to get know friends and connect with professors for more sign up now..
                    </div>
                    
                   <a href="signup.php">REGISTER  NOW</a>
                    
                </div>

            </div>

        </form>
        <!--end form-->
        <!--start footer-->
           <div class="footer">
                <div class="container">
                    <span>copy right &copy; senior project </span><br>
                    <span>by students zainab & naba & wasan</span>
                    <ul>
                        <li><i class="fab fa-facebook-square"></i></li>
                        <li><i class="fab fa-instagram"></i></li>
                        <li><i class="fab fa-twitter-square"></i></li>
                        <li><i class="far fa-smile"></i></li>
                        
                    </ul>
               
                </div>
           </div>
           <!--end footer-->


    </body>