<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Apotek</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="/assets/css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome-5/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('form-17/css/style.css') }}">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="/assets/css/stylee.css"/>
</head>

{{-- Menampilkan data yang diterima oleh Controller dari Model --}}
<body class="form-v5">
	<div class="page-content">
		<div class="form-v5-content">

			<form class="form-detail" action="/login_proses" method="POST">
                @csrf
				<h2>Login Account Form</h2>

				<div class="form-row">
					<label for="your-email">Your Email</label>
					<input type="text" name="email" id="email" class="input-text" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					<i class="fas fa-envelope"></i>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
				</div>
				<div class="form-row">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required>
					<i class="fas fa-lock"></i>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
				</div>

				<div class="form-row-last">
					<button type="submit" name="login" class="register">Login</button>
				</div>
                <div class="form-row-login">
                    <span class="txt2">
                        Belum punya akun? <a href="/register">Register</a>
                    </span>
                </div>
			</form>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>
