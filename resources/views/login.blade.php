@extends('layouts.app')

@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="position: absolute; width:60%; height:65%">
				<span class="login100-form-title" style="position: absolute; top:7%; right:0%">
					Escolha seu tipo de Login:
				</span>
				<div class="login100-pic js-tilt" style="width:35%; position: absolute; top:20%; right:52% " data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<div class="login100-pic js-tilt" style="position: absolute; top:20%; left:47%; width: 48%" data-tilt>
					<img src="images/transparent.png" alt="IMG">
				</div>

				<a href="/login" class="btn btn-info" style="background-color:rgb(83, 211, 9); position: absolute; top:85%; right:62%" role="button">Funcionário</a>

				<a href="/admin/login" class="btn btn-info" style="background-color:blue; position: absolute; top:85%; right:21%; width:16%"  role="button">Gestor</a>

			</div>
		</div>
	</div>
@endsection