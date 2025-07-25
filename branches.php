<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>greenTech branches</title>
  <style>
    body {
      background-image: url('R.jpg'); /* Replace with your image path or URL */
      background-size: cover; /* Cover the entire page */
      background-repeat: no-repeat; /* Prevent repeating */
      background-position: center; /* Center the image */
      height: 100vh; /* Full viewport height */
      margin: 0;
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
      color: #cccccc;
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
      color: #ffffff;
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
      background-color: #111;
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
</head>
<body>
  <h1 style="color: red; text-align: center; padding-top: 20%;"><i>OUR SUB BRANCHES IN THE COUNTRY</i></h1>
  <div id="footer-div">

  <footer class="footer">
    <div class="footer-column">
      <h3>our branches</h3>
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
  </div>
  <p><i>Design by <h3>Kinne John Leboi</h3></i></p>
</body>
</html>
