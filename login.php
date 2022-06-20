<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
	<title>Online Pet Shop </title>
	<meta name="description" content="Scarica gratis il nostro Template HTML/CSS GARAGE. Se avete bisogno di un design per il vostro sito web GARAGE può fare per voi. Web Domus Italia">
	<meta name="author" content="Web Domus Italia">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style/slider.css">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
        <style>
                        /* Bordered form */
            form {
            border: 3px solid #f1f1f1;
            }

            /* Full-width inputs */
            input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            }

            /* Set a style for all buttons */
            button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            }

            /* Add a hover effect for buttons */
            button:hover {
            opacity: 0.8;
            }

            /* Extra style for the cancel button (red) */
            .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
            }

            /* Center the avatar image inside this container */
            .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            }

            /* Avatar image */
            img.avatar {
            width: 40%;
            border-radius: 50%;
            }

            /* Add padding to containers */
            .container {
              margin: auto;
              width: 50%;
           
              padding-top: 100px;
            }

            /* The "Forgot password" text */
            span.psw {
            float: right;
            padding-top: 16px;
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
            } 
        </style>
    </head>
</html>
<body>
<form action="action_page.php" method="post">
  <div class="imgcontainer">
  <a class="navbar-brand logo" href="index.html"><img src="image/logo.png" alt="logo" width="70%"></a>
  </div>

  <div class="container a">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form> 
    
</body>

