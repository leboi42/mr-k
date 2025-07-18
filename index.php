<?php
// DB Connection
$conn = new mysqli("localhost", "root", "", "networking");

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Form handling
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['comment'])) {
        $comment = $conn->real_escape_string($_POST['comment']);

        $sql = "INSERT INTO comments (comment) VALUES ('$comment')";

        if ($conn->query($sql) === TRUE) {
            echo "✅ Comment submitted successfully.";
        } else {
            echo "❌ Error inserting comment: " . $conn->error;
        }
    } else {
        echo "❗ Comment is empty.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-"equiv="X-UA-Compatible" content="ie=edge">
<title>welcome netweb</title>
<head>
<style>
*{
padding:0px;
font-family:arial:
box-sizing:border-box;
}
body{
display:flex;
flex-direction:column;
background-color:aqua;
text-align:center;
}
#logo-div{
position: fixed;
      top: 0;
      left: 2;
position:top;
display:flex;
flex-direction:row;
width:100%;
min-height:50px;
background-color:lightgray;
align-items:center;
padding-left:2px;

}
#nav-div{
position: fixed;
      left: 2;
      right:2;
display:flex;
flex-direction:row;
width:100%;
min-height:20px;
background-color:lightgray;
margin-top:20px;
justify-content:right;
align-items:left;
}
#header-banner-div{
position:fixed;
display:flex;
flex-direction:row;
width:100%;
min-height:210px;
background-color:transparent;
margin-top:0px;
 margin-bottom:0px;
justify-content:center;
align-items:flex-end;
}
.kichwa{
  color: brown;
  

}
.kichwa1{
  background-color: whitesmoke;
}
#main-div{
background-image: url('R.jpg'); /* Replace with your image path or URL */
      background-size: 100%; /* Cover the entire page */
      background-repeat: no-repeat; /* Prevent repeating */
      background-position: center; /* Center the image */
      height: 100vh; /* Full viewport height */
      margin: 0;
      top:0;
display:flex;
flex-direction:row;
width:100%;
min-height:100px;
margin-top:0px;
justify-content:center;
align-items:center;
}
#sub-div{
width:100%;
min-height:300px;
background-color:whitesmoke;
text-align:center;
line-height:50px;
margin-top:10px;
margin-bottom:10px;
}
   input[type="submit"] {
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
 input[type="submit"]:hover {
            background-color: #2980b9;
        }
		 body {
      font-family: Arial, sans-serif;
      margin: 30px;
    }
    .table1 {
      width: 100%;
      border-collapse: collapse;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .th1{
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }
    .td1 {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }
    .th1 {
      background-color: #cccccc;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    caption {
      font-size: 1.5em;
      margin: 10px 0;
      font-weight: bold;
    }
	  .footer {
      background-color: grey;
      padding: 40px 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .footer-column {
      flex: 1 1 200px;
      margin: 20px;
    }

    .footer h3 {
      border-bottom: 2px solid #00aaff;
      padding-bottom: 10px;
      margin-bottom: 20px;
      font-size: 18px;
    }

    .footer a {
      display: block;
      color: blue;
      text-decoration: none;
      margin-bottom: 10px;
      transition: color 0.3s ease;
    }
       .table3 {
        margin: 10px 0;
       }
        .table3 a {
           color: blue;
      text-decoration: none;
      margin-bottom: 10px;
      transition: color 0.3s ease;
        }
      
        .signup {
        margin: 0px 0;
        margin-left: 80%;
       }
        .signup a {
           color: blue;
      text-decoration: none;
      margin-bottom: 10px;
      transition: color 0.3s ease;
        }
    .footer a:hover {
      color: #00aaff;
    }

    .footer .social-icons a {
      display: inline-block;
      margin-right: 10px;
      font-size: 20px;
    }

    .footer .subscribe input[type="email"] {
      padding: 10px;
      width: 70%;
      border: none;
      border-radius: 3px 0 0 3px;
    }

    .footer .subscribe button {
      padding: 10px 20px;
      border: none;
      background-color: lightgrey;
      cursor: pointer;
      border-radius: 0 3px 3px 0;
    }

    .footer-bottom {
      text-align: center;
      padding: 20px;
      background-color: red;
      color: #888;
      font-size: 14px;
    }

    @media (max-width: 768px) {
      .footer {
        flex-direction: column;
        align-items: center;
      }
      .footer-column {
        margin: 10px 0;
      }
    }
</style>
<body>
<div id="logo-div">
<img src="new103.jpg" width="150px" height="60px"></img></img>
</div>
<div id="nav-div">
<div align="left">
<p class="signup"><a href="welcome.php"><i>Sign up</i></a></p>
<table class="table3" border="0" >
<tr>
<th width="200"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#1f1f1f"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg></a></th>
<th width="200"><a href="about.php">ABOUT US</a></th>
<th width="200"><a href="booking.php">BOOKING</a></th>
<th width="200"><a href="admin.php">CONTACT US</a></th>
</table>
</div align>
</table>
</div>
<div id="header-banner-div">
<h1 class="kichwa1" style="color: rebeccapurple"><i>WELCOME MY DEAR LEARNED FRIEND</i></h1>
<script>
    const blinkText = document.getElementById('header-banner-div');
    setInterval(() => {
      blinkText.style.visibility = (blinkText.style.visibility === 'hidden') ? 'visible' : 'hidden';
    }, 1900); // Change every 1900ms (half a second)
  </script>
</div>
<div id="main-div">
<h1 class="kichwa">NETWORKING</h1>
</div>
</div>
<div id="sub-div">
<h1 style="background-color:aquamarine;"><i><b>Our goods & services delivery are readily available</b></i></h1>
  <table class="table1">
    <caption>Networking Tools and Equipment List</caption>
    <thead>
      <tr>
        <th class="th1">Category</th>
        <th class="th1">Tool/Equipment</th>
        <th class="th1">Description</th>
        <th class="th1">Use Case</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="td1">Testing Tool</td>
        <td class="td1">Cable Tester</td>
        <td class="td1">Checks the integrity of network cables (Ethernet, coax, etc.)</td>
        <td class="td1">Verifying wiring and diagnosing cable faults</td>
      </tr>
      <tr>
        <td class="td1">Installation Tool</td>
        <td class="td1">Crimping Tool</td>
        <td class="td1">Attaches connectors (e.g., RJ-45) to cables</td>
        <td class="td1">Custom cable creation</td>
      </tr>
      <tr>
        <td class="td1">Measuring Tool</td>
        <td class="td1">Network Analyzer</td>
        <td class="td1">Analyzes network traffic and performance</td>
        <td class="td1">Troubleshooting bandwidth and packet issues</td>
      </tr>
      <tr>
        <td class="td1">Hardware</td>
        <td class="td1">Router</td>
        <td class="td1">Forwards data packets between networks</td>
        <td class="td1">Internet access and routing internal traffic</td>
      </tr>
      <tr>
        <td class="td1">Hardware</td>
        <td class="td1">Switch</td>
        <td class="td1">Connects multiple devices within a LAN</td>
        <td class="td1">Efficient local communication</td>
      </tr>
      <tr>
        <td class="td1">Hardware</td>
        <td class="td1">Firewall</td>
        <td class="td1">Monitors and controls incoming/outgoing network traffic</td>
        <td class="td1">Security against unauthorized access</td>
      </tr>
      <tr>
        <td class="td1">Maintenance Tool</td>
        <td class="td1">Punch Down Tool</td>
        <td class="td1">Secures wire into patch panels and keystone jacks</td>
        <td class="td1">Structured cabling setups</td>
      </tr>
      <tr>
        <td class="td1">Monitoring Tool</td>
        <td class="td1">Network Monitoring Software</td>
        <td class="td1">Provides real-time visibility of network health</td>
        <td class="td1">Proactive maintenance and alerting</td>
      </tr>
    </tbody>
  </table>
</div>
<div id="sub-div">
<h1 style="background-color:aquamarine;"><i><b>clients can submit their questions.We are here for you</b></i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M440-400h80v-120h120v-80H520v-120h-80v120H320v80h120v120ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z"/></svg></h1>
<br>
<form action="" method="POST" autocomplete="off">
  <p>
    <textarea name="comment" cols="40" rows="10" placeholder="Ask anything here..." required></textarea>
  </p>
  <center>
    <input type="submit" value="SUBMIT" />
  </center>
</form>

</div>
<footer class="footer">
    <div class="footer-column">
      <h3>branches</h3>
      <p>Nakuru 
        Kericho
        <p>City, State, ZIP</p>
      <p>Email: info@GreenTech.com </p><p>Narok</p>Nanyuki
	  <p>Kisumu</p>
	  <p>Thika</p>
    </div>

    <div class="footer-column">
      <h3>Quick Links</h3>
      <th width="200"><a href="index.php">HOME PAGE</a></th>
<th width="200"><a href="about.php">ABOUT PAGE</a></th>
<th width="200"><a href="booking.php">BOOKING</a></th>
<th width="200"><a href="admin.php">CONTACT US</a></th>
    </div>

    <div class="footer-column">
      <h3>Follow Us</h3>
      <div class="social-icons">
        <a href="#" aria-label="Facebook">🌐</a>
        <a href="#" aria-label="Twitter">🐦</a>
        <a href="#" aria-label="LinkedIn">💼</a>
        <a href="#" aria-label="Instagram">📸</a>
      </div>
    </div>

    <div class="footer-column subscribe">
      <h3>Subscribe</h3>
      <form action="#">
        <input type="email" placeholder="Your email address" required>
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </footer>
  Design by <h3 style="color: red;"><i>Kinne John Leboi</i></h3><b>0703394298</b>
</body>
</html>
