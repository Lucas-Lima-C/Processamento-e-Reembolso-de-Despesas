@extends('layouts.app')

@section('content')
	<div class="container-login100">
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100" style="position: absolute; width:60%; height:83%; padding:7%; right:36%;">

					<span class="login100-form-title" style="position: absolute; top:7%; right:0%">
						Formulário de Solicitação de Reembolso
					</span>

					<div>
						<div style="border-style: outset; border-color:rgb(98, 248, 248); padding:6px; background-color:rgb(138, 206, 197);">
						<form action="/home/storeRefund" method="POST" oninput="totalvalue.value=parseFloat(value0.value)+parseFloat(value1.value)+parseFloat(value2.value)+parseFloat(value3.value);">
							@csrf
							<label for="expensetypes"><b>Primeira despesa: </b></label>
								<select id="expensetypes0" name="expensetype0" style="right:50%; margin:10px">
									<option>Tipo</option>
									@foreach($expense_types as $type)
									<option value="{{$type->id}}">{{$type->name}}</option>
									@endforeach
								</select>
							<label for="value"><b>Valor:</b> </label> 

							<span style="border: 1px inset #ccc; padding:1px; background-color:white">R$
							<input step="0.01" type="number" id="value0" value="0" name="expensevalue0">
							</span>
	
							<label for="expensetypes"><b>Segunda despesa: </b> </label>
								<select id="expensetypes1" name="expensetype1" style="margin:10px; margin-left:4px">
									<option>Tipo</option>
									@foreach($expense_types as $type)
									<option value="{{$type->id}}">{{$type->name}}</option>
									@endforeach
								</select>
							<label for="value"><b>Valor:</b> </label> 
							
							<span style="border: 1px inset #ccc; padding:1px; background-color:white">R$
							<input step="0.01" type="number" id="value1" value="0" name="expensevalue1">
							</span>
	
							<label for="expensetypes"><b>Terceira despesa: </b> </label>
								<select id="expensetypes2" name="expensetype2" style="margin:10px; margin-left:10px">
									<option>Tipo</option>
									@foreach($expense_types as $type)
									<option value="{{$type->id}}">{{$type->name}}</option>
									@endforeach
								</select>
							<label for="value"><b>Valor:</b> </label> 
							
							<span style="border: 1px inset #ccc; padding:1px; background-color:white">R$
							<input step="0.01" type="number" id="value2" value="0" name="expensevalue2">
							</span>

							<label for="expensetypes"><b>Quarta despesa: </b> </label>
								<select id="expensetypes3" name="expensetype3" style="margin:10px; margin-left:17px">
									<option>Tipo</option>
									@foreach($expense_types as $type)
									<option value="{{$type->id}}">{{$type->name}}</option>
									@endforeach
								</select>
							<label for="value"><b>Valor:</b> </label> 
							
							<span style="border: 1px inset #ccc; padding:1px; background-color:white">R$
							<input maxlength = "15" step="0.01" type="number" id="value3" value="0" name="expensevalue3">
							</span>
							</div>						
					<div>
						<div style="border-style: outset; border-color:rgb(98, 248, 248); padding:6px; text-align:center; background-color:rgb(183, 255, 187);">
						<label for="totalvalue" style="font-size:20px"><b>Valor total do reembolso:</b></label>
						<br>
						<label for="totalvalue" style="font-size:20px">R$ </label>
						<output style="font-size:20px" id="totalvalue" name="totalvalue" for="value0 value1 value2 value3">0</output>
						</div>
					</div>
					<br>
					@if (\Session::has('error'))
    								<div class="alert alert-dark">
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


			<div class="container-login100">
				<div class="wrap-login100" style="position: absolute; width:30%; padding:5%; left:66%;">
					<span class="login100-form-title" style="position: absolute; top:7%; right:0%">
						Cadastro de Tipo de Despesa
					</span>
					<div>
						<div style="position:relative; border-style: outset; border-color:rgb(98, 248, 248); width: 320px; height:100px; right:25px; background-color:rgb(138, 206, 197)">
							<form action="/home/TypeInput" method="POST">
								@csrf
								<label class="login100-form-title" style="position:relative; right:5px; font-size:125%; margin:5px;">Nome: </label>

								<input type="text" maxlength = "15" name="expense_type_name" style="position:relative; width: 50%; left:25%; bottom:55px;
								margin: 8px 0;
								display: inline-block;
								border: 1px solid #ccc;
								border-radius: 4px;
								box-sizing: border-box;">
						</div>
							<div style="position:relative; margin-top:10px; right:25px;">
								@if (\Session::has('errortype'))
    								<div class="alert alert-dark">
        								<ul>
            								<li>{!! \Session::get('errortype') !!}</li>
        								</ul>
    								</div>
								@endif
								<div class="container-login100-form-btn" style="position:relative; right:50px;">
									<div class="col-md-8 offset-md-4">
										<button type="submit" class="login100-form-btn" style="">
										{{ __('Cadastrar Tipo') }}
										</button>
									</div>
								</div>
							</div>	
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection
