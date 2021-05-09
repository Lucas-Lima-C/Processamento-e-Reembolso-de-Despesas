@extends('layouts.app')

@section('content')
	<div class="container-login100">
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100" style="position: absolute; width:60%; height:75%; padding:7%;"; >

					<span class="login100-form-title" style="position: absolute; top:7%; right:0%">
						Formulário de Solicitação de Reembolso:
					</span>

					<div>
						<form action="/home/Success" method="POST" oninput="totalvalue.value=parseFloat(value0.value)+parseFloat(value1.value)+parseFloat(value2.value)+parseFloat(value3.value);">
							@csrf
							<label for="expensetypes">Primeira despesa: </label>
								<select id="expensetypes0" name="expensetype0" style="right:50%; margin:10px">
									<option value="0">Viagem</option>
									<option value="1">Hospedagem</option>
									<option value="2">Alimentação</option>
									<option value="3">Uber</option>
									<option value="4">Outros</option>
								</select>
							<label for="value">Valor: </label> 

							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value0" value="0" name="expensevalue0">

							<label for="expensetypes">Segunda despesa: </label>
								<select id="expensetypes1" name="expensetype1" style="margin:10px; margin-left:4px">
									<option value="0">Viagem</option>
									<option value="1">Hospedagem</option>
									<option value="2">Alimentação</option>
									<option value="3">Uber</option>
									<option value="4">Outros</option>
								</select>
							<label for="value">Valor: </label> 
							
							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value1" value="0" name="expensevalue1">

							<label for="expensetypes">Terceira despesa: </label>
								<select id="expensetypes2" name="expensetype2" style="margin:10px; margin-left:10px">
									<option value="0">Viagem</option>
									<option value="1">Hospedagem</option>
									<option value="2">Alimentação</option>
									<option value="3">Uber</option>
									<option value="4">Outros</option>
								</select>
							<label for="value">Valor: </label> 
							
							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value2" value="0" name="expensevalue2">

							<label for="expensetypes">Quarta despesa: </label>
								<select id="expensetypes3" name="expensetype3" style="margin:10px; margin-left:17px">
									<option value="0">Viagem</option>
									<option value="1">Hospedagem</option>
									<option value="2">Alimentação</option>
									<option value="3">Uber</option>
									<option value="4">Outros</option>
								</select>
							<label for="value">Valor: </label> 
							
							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value3" value="0" name="expensevalue3">

					<div>
						<br>
						<label for="totalvalue" style="">Valor total do reembolso: </label>
						<output id="totalvalue" name="totalvalue" for="value0 value1 value2 value3">0</output>
					</div>
					<br>
					@if (\Session::has('error'))
    								<div class="alert alert-danger">
        								<ul>
            								<li>{!! \Session::get('error') !!}</li>
        								</ul>
    								</div>
								@endif
					<div class="container-login100-form-btn" style="position:relative; right:103px;">
						<div class="col-md-8 offset-md-4">
								<button type="submit" class="login100-form-btn">
									{{ __('Finalizar solicitação de reembolso') }}
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection
