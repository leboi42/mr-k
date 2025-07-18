
<?php
// PHP code for handling user registration and login

// --- Database Configuration ---
// Replace with your actual database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Default for XAMPP/WAMP
define('DB_PASSWORD', '');     // Default for XAMPP/WAMP (empty password)
define('DB_NAME', 'networking'); // IMPORTANT: Change this to your database name

// Attempt to connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// --- Function to sanitize input data ---
function sanitize_input($data) {
    global $mysqli;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $mysqli->real_escape_string($data); // Escape special characters for SQL query
}

// --- Handle Registration Form Submission ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password']; // Password is not sanitized with htmlspecialchars here as it will be hashed

    // Validate inputs
    if (empty($username) || empty($email) || empty($password)) {
        echo "<script>alert('Please fill in all registration fields.');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
    } elseif (strlen($password) < 6) {
        echo "<script>alert('Password must be at least 6 characters long.');</script>";
    } else {
        // Check if username or email already exists
        $stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<script>alert('Username or email already exists.');</script>";
        } else {
            // Hash the password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user into database
            $stmt = $mysqli->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $password_hash);

            if ($stmt->execute()) {
                echo "<script>alert('Registration successful! You can now log in.');</script>";
                // Optionally redirect to login page or show login form
            } else {
                echo "<script>alert('Error: Could not register. Please try again later.');</script>";
            }
        }
        $stmt->close();
    }
}

// --- Handle Login Form Submission ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username_or_email = sanitize_input($_POST['username_or_email']); // This field will accept either username or email
    $password = $_POST['password'];

    // Validate inputs
    if (empty($username_or_email) || empty($password)) {
        echo "<script>alert('Please fill in all login fields.');</script>";
    } else {
        // Prepare a select statement to fetch user by username or email
        $stmt = $mysqli->prepare("SELECT id, username, password_hash FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username_or_email, $username_or_email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $db_username, $db_password_hash);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $db_password_hash)) {
                // Password is correct, start a new session
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $db_username;

                echo "<script>alert('Login successful! Welcome, " . $db_username . "!');</script>";
                // Redirect to a dashboard or home page
                // header("location: dashboard.php");
            } else {
                echo "<script>alert('Invalid username/email or password.');</script>";
            }
        } else {
            echo "<script>alert('Invalid username/email or password.');</script>";
        }
        $stmt->close();
    }
}

// Close database connection
$mysqli->close();
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
        /* Global styles and reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif; /* Applying the Poppins font */
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f2f5; /* Light gray background */
            overflow: hidden; /* Hide overflow to prevent scrollbars during transitions */
        }

        /* Main container for the form and panel */
        .container {
            position: relative;
            width: 90%; /* Fluid width for responsiveness */
            max-width: 900px; /* Maximum width for desktop */
            height: 500px; /* Fixed height, could be responsive if content is variable */
            background-color: #fff; /* White background for the main card */
            border-radius: 20px; /* Rounded corners for the container */
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            display: flex;
            overflow: hidden; /* Hide content that goes beyond the rounded corners */
        }

        /* Styling for the form side (Registration form initially) */
        .form-side {
            position: absolute;
            top: 0;
            left: 0;
            width: 60%; /* Occupies 60% of the container width */
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff; /* White background for the form side */
            transition: transform 0.6s ease-in-out; /* Smooth transition for sliding effect */
            z-index: 2; /* Ensure form side is above the panel when needed */
        }

        /* Styling for the content within the form side */
        .form-content {
            width: 100%;
            padding: 40px;
            text-align: center;
        }

        .form-content h2 {
            font-size: 2.2rem;
            color: #333;
            margin-bottom: 30px;
        }

        /* Input group styling for icons and input fields */
        .input-group {
            position: relative;
            margin-bottom: 25px;
            display: flex;
            justify-content: center; /* Center inputs within the group */
        }

        .input-group input {
            width: 80%; /* Input field takes 80% of the input group width */
            padding: 12px 15px 12px 45px; /* Padding for text and icon space */
            border: 1px solid #ddd; /* Light gray border */
            border-radius: 8px; /* Rounded corners for inputs */
            font-size: 1rem;
            color: #333;
            outline: none; /* Remove default outline on focus */
            transition: border-color 0.3s ease; /* Smooth transition for border color */
        }

        .input-group input:focus {
            border-color: #4CAF50; /* Green border on focus */
        }

        .input-group i {
            position: absolute;
            left: 10%; /* Position icon relative to the input group */
            top: 50%;
            transform: translateY(-50%); /* Vertically center the icon */
            color: #999; /* Gray color for icons */
            font-size: 1.1rem;
        }

        /* Button styling */
        .btn {
            padding: 12px 30px;
            background-color: #4CAF50; /* Green background */
            color: #fff; /* White text */
            border: none;
            border-radius: 25px; /* Pill-shaped button */
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth hover effects */
            outline: none;
        }

        .btn:hover {
            background-color: #45a049; /* Darker green on hover */
            transform: translateY(-2px); /* Slight lift on hover */
        }

        /* Social platform text and icons */
        .social-text {
            margin-top: 25px;
            color: #666; /* Darker gray text */
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .social-icon {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            height: 40px;
            width: 40px;
            border: 1px solid #ddd;
            border-radius: 50%; /* Circular icons */
            margin: 0 10px;
            color: #333;
            font-size: 1.1rem;
            text-decoration: none;
            transition: color 0.3s ease, border-color 0.3s ease;
        }

        .social-icon:hover {
            color: #4CAF50;
            border-color: #4CAF50;
        }

        /* Login panel styling (the blue/green section) */
        .panel {
            position: absolute;
            top: 0;
            right: 0;
            width: 40%; /* Occupies 40% of the container width */
            height: 100%;
            background-image: linear-gradient(to right, #4CAF50, #66BB6A); /* Green gradient */
            border-radius: 0 20px 20px 0; /* Rounded on the right side */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            padding: 40px;
            transition: transform 0.6s ease-in-out; /* Smooth transition for sliding effect */
            z-index: 1; /* Ensure panel is behind form side by default */
        }

        .panel h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .panel p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* Toggle button within the panel */
        .toggle-btn {
            background-color: transparent;
            border: 2px solid white; /* white border*/
            color: white;
        }

        .toggle-btn:hover {
            background-color: white;
            color: #4CAF50; /* Green text on hover */
        }

        /* Specific styling for the login panel when active */
        .login-panel {
            right: 0;
            border-radius: 0 20px 20px 0;
        }

        /* Specific styling for the registration panel when active */
        .register-panel {
            left: 0;
            border-radius: 20px 0 0 20px;
            transform: translateX(-100%); /* Initially hidden off-screen to the left */
        }
        
        /* Links inside login form */
        .links {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin-bottom: 20px;
        }

        .links a {
            color: #666;
            font-size: 0.9rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: #4CAF50;
        }


        /* JavaScript controlled classes for switching between modes */
        /* When 'login-mode' class is added to the container */
        .container.login-mode .form-side {
            transform: translateX(66.66%); /* Moves form side to the right to reveal login form */
        }

        .container.login-mode .login-form-content {
            display: block; /* Show login form */
        }

        .container.login-mode .registration-form-content {
            display: none; /* Hide registration form */
        }

        .container.login-mode .login-panel {
            transform: translateX(-166.66%); /* Slides the login panel out of view */
            border-radius: 20px 0 0 20px; /* Adjusts radius for login mode (now on left) */
        }

        .container.login-mode .register-panel {
            transform: translateX(0); /* Slides the register panel into view */
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 768px) {
            .container {
                flex-direction: column; /* Stack elements vertically */
                height: auto; /* Auto height for content */
                max-height: unset; /* Remove max-height constraint */
                width: 95%; /* More width on smaller screens */
            }

            .form-side,
            .panel {
                position: relative; /* Reset position for stacking */
                width: 100%; /* Full width */
                height: auto; /* Auto height */
                border-radius: 10px; /* Smaller radius for stacked elements */
                transform: translateX(0) !important; /* Override transforms for mobile */
            }

            .form-side {
                order: 2; /* Place form below panel */
                padding: 20px;
            }

            .panel {
                order: 1; /* Place panel above form */
                padding: 30px;
                border-radius: 10px 10px 0 0; /* Rounded top corners for panel */
            }
            
            .register-panel {
                display: none; /* Hide the register panel on mobile initially */
            }

            .container.login-mode .form-side {
                transform: translateX(0); /* Ensure no horizontal transform on form side */
            }
            .container.login-mode .login-panel {
                transform: translateX(0); /* Ensure no horizontal transform on login panel */
                border-radius: 10px 10px 0 0; /* Maintain top-only border-radius */
                display: none; /* Hide the login panel on mobile when in login mode */
            }

            .container.login-mode .register-panel {
                display: flex; /* Show the register panel on mobile when in login mode */
            }

            .form-side h2,
            .panel h2 {
                font-size: 1.8rem;
            }

            .input-group input {
                width: 90%; /* Wider inputs on mobile */
            }

            .input-group i {
                left: 5%; /* Adjust icon position */
            }

            .container.login-mode .registration-form-content {
                display: none; /* Hide registration form on mobile when in login mode */
            }
            .container.login-mode .login-form-content {
                display: block; /* Show login form on mobile when in login mode */
            }
        }
    </style>
</head>
<body style="background-color: aquamarine;">
    <div class="container" id="mainContainer">
        <div class="form-side" id="formSide">
            <div class="form-content registration-form-content" id="registrationForm">
                <h2>Registration</h2>
                <form action="" method="POST" autocomplete="off">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <button type="submit" class="btn" name="register">Register</button>
                    <p class="social-text">or register with social platforms</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-github"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </form>
            </div>

            <div class="form-content login-form-content" id="loginForm" style="display: none;">
                <h2>Sign in</h2>
                <form action="" method="POST" autocomplete="off">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username or Email" name="username_or_email" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="links">
                        <a href="#">Forgot Password ?</a>
                        <a href="#" id="signupLink">Signup</a> </div>
                    <button type="submit" class="btn" name="login">Login</button>
                </form>
            </div>
        </div>

        <div class="panel login-panel" id="loginPanel">
            <h2 id="blink12">Welcome Back!</h2>
            <p><th width="200"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#1f1f1f"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg></a></th></p>
            <p>To keep connected with us please login with your personal info</p>
            <button type="button" class="btn toggle-btn" id="loginToggleButton">Login</button>
        </div>

        <div class="panel register-panel" id="registerPanel">
            <h2>Hello, Friend!</h2>
            <p>Enter your personal details and start your journey with us</p>
            <button type="button" class="btn toggle-btn" id="registerToggleButton">Register</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mainContainer = document.getElementById('mainContainer');
            const loginToggleButton = document.getElementById('loginToggleButton');
            const registerToggleButton = document.getElementById('registerToggleButton');
            const registrationForm = document.getElementById('registrationForm');
            const loginForm = document.getElementById('loginForm');
            const loginPanel = document.getElementById('loginPanel');
            const registerPanel = document.getElementById('registerPanel');

            // Function to show the login form and hide the registration form
            const showLoginForm = () => {
                mainContainer.classList.add('login-mode');
                registrationForm.style.display = 'none';
                loginForm.style.display = 'block';
                // Adjust panel visibility for desktop
                if (window.innerWidth > 768) {
                    loginPanel.style.transform = 'translateX(-166.66%)'; // Move login panel left
                    registerPanel.style.transform = 'translateX(0)'; // Move register panel right
                }
            };

            // Function to show the registration form and hide the login form
            const showRegistrationForm = () => {
                mainContainer.classList.remove('login-mode');
                registrationForm.style.display = 'block';
                loginForm.style.display = 'none';
                // Adjust panel visibility for desktop
                if (window.innerWidth > 768) {
                    loginPanel.style.transform = 'translateX(0)'; // Move login panel back to original
                    registerPanel.style.transform = 'translateX(-100%)'; // Move register panel left
                }
            };

            // Initial setup for desktop: Hide register panel and show login panel
            if (window.innerWidth > 768) {
                registerPanel.style.transform = 'translateX(-100%)';
            } else {
                // Initial setup for mobile: Hide login form and login panel, show register form and register panel
                loginForm.style.display = 'none';
                loginPanel.style.display = 'none';
                registerPanel.style.display = 'flex';
            }

            // Add event listeners to the toggle buttons
            if (loginToggleButton) {
                loginToggleButton.addEventListener('click', showLoginForm);
            }

            if (registerToggleButton) {
                registerToggleButton.addEventListener('click', showRegistrationForm);
            }
            
            // Also add event listener to the "Signup" link in the login form if it should toggle
            const signupLink = document.getElementById('signupLink');
            if (signupLink) {
                signupLink.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default link behavior
                    showRegistrationForm();
                });
            }


            // Handle responsive layout changes on window resize
            window.addEventListener('resize', () => {
                if (window.innerWidth > 768) {
                    // Desktop layout
                    if (mainContainer.classList.contains('login-mode')) {
                        loginPanel.style.transform = 'translateX(-166.66%)';
                        registerPanel.style.transform = 'translateX(0)';
                    } else {
                        loginPanel.style.transform = 'translateX(0)';
                        registerPanel.style.transform = 'translateX(-100%)';
                    }
                    loginPanel.style.display = 'flex';
                    registerPanel.style.display = 'flex';
                } else {
                    // Mobile layout
                    loginPanel.style.transform = 'translateX(0)';
                    registerPanel.style.transform = 'translateX(0)';
                    if (mainContainer.classList.contains('login-mode')) {
                        loginPanel.style.display = 'none';
                        registerPanel.style.display = 'flex';
                    } else {
                        loginPanel.style.display = 'flex';
                        registerPanel.style.display = 'none';
                    }
                }
            });
        });
    </script>
    <script>
    const blinkText = document.getElementById('blink12');
    setInterval(() => {
      blinkText.style.visibility = (blinkText.style.visibility === 'hidden') ? 'visible' : 'hidden';
    }, 500); // Change every 500ms (half a second)
  </script>
</body>
</html>