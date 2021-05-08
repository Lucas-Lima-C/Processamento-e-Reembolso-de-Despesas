<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Website</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
<!--===============================================================================================-->

</head>

<header>
	<!-- Fixed navbar -->
	<!-- Fixed navbar -->
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<div class="container-fluid">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
				Website
				</a> <!-- Criou o link para NavBar -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Left Side Of Navbar -->
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{route('app.refund')}}">Reembolso</a>
					  </li>
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
						@guest
						@if (Route::has('login'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
						@endif

						@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
						@endif
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }}
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}"
								   onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div>    
		</div>
	</nav>
  </header>

<body>
	<div class="container-login100">
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100" style="position: absolute; width:60%; height:65%">

					<span class="login100-form-title" style="position: absolute; top:7%; right:0%">
						Despesas:
					</span>

					<div>
						<form action="/home/Success" method="POST" oninput="totalvalue.value=parseFloat(value0.value)+parseFloat(value1.value)+parseFloat(value2.value)+parseFloat(value3.value);">
							@csrf
							<label for="expensetypes">Primeira despesa: </label>
								<select id="expensetypes0" name="expensetype0">
									<option value="0">Viagem</option>
									<option value="1">Hospedagem</option>
									<option value="2">Alimentação</option>
									<option value="3">Uber</option>
									<option value="4">Outros</option>
								</select>
							<label for="value">Valor: </label> 

							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value0" value="0" name="expensevalue0">

							<label for="expensetypes">Primeira despesa: </label>
								<select id="expensetypes1" name="expensetype1">
									<option value="0">Viagem</option>
									<option value="1">Hospedagem</option>
									<option value="2">Alimentação</option>
									<option value="3">Uber</option>
									<option value="4">Outros</option>
								</select>
							<label for="value">Valor: </label> 
							
							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value1" value="0" name="expensevalue1">

							<label for="expensetypes">Primeira despesa: </label>
								<select id="expensetypes2" name="expensetype2">
									<option value="0">Viagem</option>
									<option value="1">Hospedagem</option>
									<option value="2">Alimentação</option>
									<option value="3">Uber</option>
									<option value="4">Outros</option>
								</select>
							<label for="value">Valor: </label> 
							
							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value2" value="0" name="expensevalue2">

							<label for="expensetypes">Primeira despesa: </label>
								<select id="expensetypes3" name="expensetype3">
									<option value="0">Viagem</option>
									<option value="1">Hospedagem</option>
									<option value="2">Alimentação</option>
									<option value="3">Uber</option>
									<option value="4">Outros</option>
								</select>
							<label for="value">Valor: </label> 
							
							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value3" value="0" name="expensevalue3">

					<div>
						<label for="totalvalue">Valor total do Reembolso: </label>
						<output id="totalvalue" name="totalvalue" for="value0 value1 value2 value3"></output>
					</div>
					
					<div class="container-login100-form-btn" style="position:relative; right:80px;">
						<div class="col-md-8 offset-md-4">
								<button type="submit" class="login100-form-btn">
									{{ __('Finalizar requisição de Reembolso') }}
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
	<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
