<!DOCTYPE html>
<html>
    <head>
    	<title>signup form </title>
      	<link rel="stylesheet"href="style/style1.css"type="text/css"/>
    </head>
    <body>
    	<h1>SIGN UP </h1>
    	<div class="shadow">
    		<div class="register">
    			<form action="connect.php" method="post" id="register">
    				<h2>register here</h2>
    				<label>FIRST NAME :</label><BR><br>
    				<input type="text" name="fname" id="name"
    				placeholder="ENTER U R first NAME" required autocomplete="off">
    				<span>*</span>
    				<br><br>


    				<label>LAST NAME :</label><BR><br>
    				<input type="text" name="lname" id="num"
    				placeholder="ENTER U R LAST NAME" required autocomplete="off">
    				<span>*</span>
    				<br><br>


    				<label>MOBILE NUMBER :</label><BR>
    				<select id="ph">
    					<option>+964</option>
                        <option>+82</option>
                        <option>+122</option>
    				</select>

    				<input type="number" name="mnum" id="num"
    				placeholder="ENTER U R Mobile Name..">

    				<br><br>

    				<label>EMAIL :</label>
    				<BR>
    				<input type="EMAIL" name="email" id="name"
    				placeholder="ENTER U R email" required autocomplete="off">
    				<span>*</span>
    				<br><br>

    				<label>password :</label>
    				<BR>
    				<input type="password" name="pass" id="name"
    				placeholder="ENTER U R password" required >
    				<span>*</span>
    				<br><br>

    				<input type="radio" name="gender" id="male" value="male"><span id="male">&nbsp; Male</span>&nbsp;&nbsp;

    				<input type="radio" name="gender" id="female" value="female"><span id="female">&nbsp; Fe male</span>&nbsp;&nbsp;

    				<br><br>
                    <input type="radio" name="position" id="student" value="0"><span id="student">&nbsp; student</span>&nbsp;&nbsp;

                    <input type="radio" name="position" id="instructor" value="1"><span id="instructor">&nbsp; instructor</span>&nbsp;&nbsp;

                    <br><br>
    				<label>date :</label>
    				<br>
    				<input type="date" name="u-birthday" id="name"
    				placeholder="yy/mm/dd">
    				<br><br>

    				<input type="submit" value="submit" id="sub">
    				
    			      <br><br>
    			      <a href="main.php#log" title="sign in">already have account ..?</a>

    			     
    			      
    			</form>
    		</div>

    	</div>
    </body>