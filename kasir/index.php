

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Login</title>
 <style>
     body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background:rgb(235, 232, 232); 
            font-family: 'Roboto', sans-serif;
        }
        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 20px; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); 
            background-color: rgba(255, 255, 255, 0.8); 
            animation: fadeIn 0.5s ease-in-out;
        }
        .form-floating {
            position: relative;
            margin-bottom: 20px;
        }
        .form-floating input {
            border: none; 
            border-bottom: 2px solid #2575fc; 
            background-color: transparent; 
            padding: 10px 0 10px 0; 
            width: 100%;
            font-size: 16px;
        }
        .form-floating input:focus {
            outline: none;
            border-bottom: 2px solid #6a11cb; 
        }
        .form-floating label {
            position: absolute;
            top: 0;
            left: 0;
            color: #666;
            font-size: 16px;
            transition: 0.2s;
        }
        .btn-primary {
            background-color: #2575fc;
            border: none;
            border-radius: 20px;
            padding: 12px 0;
        }
        .text-center h1 {
            color: #333;
            font-weight: bold;
        }
        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

 </style>
</head>
<body>

<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert alert-danger text-center'>Username dan Password tidak sesuai !</div>";
		}
	}
?>

<main class="form-signin">
    <form action="login.php" method="post">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>
        </div>

        <div class="form-floating">
            <input type="username" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required>
            <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
            <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>

        <div class="forgot-password">
            <span><a href="#">Forgot password?</a></span>
        </div>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
</body>
</html>
