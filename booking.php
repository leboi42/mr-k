<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>booking page</title>
  <style>
  #logo-nav-div{
position:fixed;
top:0;
left:2;
width:100%;
height:100px;
margin-bottom:50px;
}
#logo-div{
width:10%;
background-color:lightgray;
float:left;
height:100px;
}
#nav-div{
width:90%;
background-color:lightgray;
float:right;
height:100px;
}
.clearfix::after{
content:"";
display:block;
clear:both;
}
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #f9f9f9;
      padding: 20px;
    }

    .header {
      text-align: center;
      padding: 20px;
	  min-height:150px;
	  margin-top:100px;
      background-color: white;
      color: red;
      font-size: 24px;
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
    .products {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }

    .product-card {
      background: white;
      padding: 15px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
      text-align: center;
      transition: transform 0.2s;
    }

    .product-card:hover {
      transform: translateY(-5px);
    }

    .product-image {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 15px;
    }

    .product-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .product-price {
      color: #28a745;
      font-size: 16px;
      margin-bottom: 15px;
    }

    .buttons {
      display: flex;
      gap: 10px;
      justify-content: center;
    }

    .btn {
      padding: 10px 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      transition: 0.3s ease;
    }

    .btn-book {
      background-color: #007bff;
      color: white;
    }

    .btn-book:hover {
      background-color: #0056b3;
    }

    .btn-buy {
      background-color: #ffc107;
      color: #222;
    }

    .btn-buy:hover {
      background-color: #e0a800;
    }

    @media (max-width: 600px) {
      .buttons {
        flex-direction: column;
      }
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
</head>
<body>
<div id="logo-nav-div">
<div id="logo-div">
<a href="index.php">
<img src="new103.jpg" width="80px" height="50px"></img>
</a>
</div>
<div id="nav-div">
<div align="right">
<table class="table3">
<tr>
 <th width="200"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#1f1f1f"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg></a></th>
<th width="200"><a href="about.php">ABOUT US</a></th>
<th width="200"><a href="booking.php">BOOKING</a></th>
<th width="200"><a href="admin.php">CONTACT US</a></th>
</table>
</div align>
</table>
</div>
</div>
</div>
 <div class="header" style="color:brown"><h1>BOOKING & PURCHASING THROUGH ONLINE</h1></div>

  <div class="products">
    <div class="product-card">
      <img src="networking-concept-still-life-composition.jpg" class="product-image" alt="Product 1" />
      <div class="product-title">Ethernet Cables (cat6 - 5m)</div>
      <div class="product-price">$59.99</div>
      <div class="buttons">
        <button class="btn btn-book">Book Now</button>
        <button class="btn btn-buy">Buy Now</button>
      </div>
    </div>
<script>
    const colors = ["aqua", "pink", "lightblue", "violet", "lightgreen"];
    let index = 0;

    setInterval(() => {
      document.body.style.backgroundColor = colors[index];
      index = (index + 1) % colors.length;
    }, 2000); // Change every 2 seconds
  </script>
    <div class="product-card">
      <img src="stock-vector-network-cable-tester-vector-illustration-isolated-in-white-back-ground-1901502643.jpg" class="product-image" alt="Product 2" />
      <div class="product-title">cable tester</div>
      <div class="product-price">$129.99</div>
      <div class="buttons">
        <button class="btn btn-book">Book Now</button>
        <button class="btn btn-buy">Buy Now</button>
      </div>
    </div>

    <div class="product-card">
      <img src="computer-network-tools-H3M4B8.jpg" class="product-image" alt="Product 3" />
      <div class="product-title">crimbing tool</div>
      <div class="product-price">$45.00</div>
      <div class="buttons">
        <button class="btn btn-book">Book Now</button>
        <button class="btn btn-buy">Buy Now</button>
      </div>
    </div>
  </div>
  <div class="products">
  
   <div class="product-card">
      <img src="stripper.jpg" class="product-image" alt="Product 3" />
      <div class="product-title">LAN cable stripper</div>
      <div class="product-price">$400.00</div>
      <div class="buttons">
        <button class="btn btn-book">Book Now</button>
        <button class="btn btn-buy">Buy Now</button>
      </div>
    </div>
  
   <div class="product-card">
      <img src="OTDR.jpg" class="product-image" alt="Product 3" />
      <div class="product-title">OTDR (optical Time Domain Reflector)</div>
      <div class="product-price">$4500.00</div>
      <div class="buttons">
        <button class="btn btn-book">Book Now</button>
        <button class="btn btn-buy">Buy Now</button>
      </div>
    </div>
	 <div class="product-card">
      <img src="Punchdown.jpg" class="product-image" alt="Product 3" />
      <div class="product-title">Punch down tool</div>
      <div class="product-price">$200.00</div>
      <div class="buttons">
        <button class="btn btn-book">Book Now</button>
        <button class="btn btn-buy">Buy Now</button>
      </div>
    </div>
  </div>
  <div class="products">
  <div class="product-card">
      <img src="analyzer tool.jpg" class="product-image" alt="Product 3" />
      <div class="product-title">Network analyzer tool</div>
      <div class="product-price">$9000.00</div>
      <div class="buttons">
        <button class="btn btn-book">Book Now</button>
        <button class="btn btn-buy">Buy Now</button>
      </div>
    </div>
	<div class="product-card">
      <img src="1-4012-1601272-141222104900096.jpg" class="product-image" alt="Product 3" />
      <div class="product-title">Network Switch(8-port)</div>
      <div class="product-price">$6750.00</div>
      <div class="buttons">
        <button class="btn btn-book">Book Now</button>
        <button class="btn btn-buy">Buy Now</button>
      </div>
    </div>
	<div class="product-card">
      <img src="Mettalic-RJ45-Connectors.webp" class="product-image" alt="Product 3" />
      <div class="product-title">Metallic RJ45 Connector</div>
      <div class="product-price">$15.00</div>
      <div class="buttons">
        <button class="btn btn-book">Book Now</button>
        <button class="btn btn-buy">Buy Now</button>
      </div>
    </div>
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
<th width="200"><a href="about.php">BOUT PAGE</a></th>
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
 <center> Design by <h3 style="color: brown;"><i>Kinne John Leboi</i></h3><b>0703394298</b></center>
</body>
</html>