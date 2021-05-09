@extends('layouts.app')

@section('content')
		<div class="container-login100">
			<div class="limiter">
				<div class="container-login100">
					<div class="wrap-login100" style="position: absolute; width:60%; height:65%">
						<div>
							<span class="login100-form-title" style="position: absolute; top:7%; right:0%"> Sucesso!
							</span>
							<form action="/home">
								<div class="container-login100-form-btn" 				style="position:relative; right:29px; width:300%">
									<div class="col-md-8 offset-md-4">
										<button type="submit" class="login100-form-btn">
										{{ __('Retornar') }}
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection