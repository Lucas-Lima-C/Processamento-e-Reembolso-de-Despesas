@extends('layouts.app')

@section('content')
	<div class="container-login100">
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100" style="position: absolute; width:60%; height:75%; padding:7%; right:36%"; >

					<span class="login100-form-title" style="position: absolute; top:7%; right:0%">
						Formulário de Solicitação de Reembolso
					</span>

					<div>
						<form action="/home/storeRefund" method="POST" oninput="totalvalue.value=parseFloat(value0.value)+parseFloat(value1.value)+parseFloat(value2.value)+parseFloat(value3.value);">
							@csrf
							<label for="expensetypes">Primeira despesa - Tipo: </label>
								<select id="expensetypes0" name="expensetype0" style="right:50%; margin:10px">
									@foreach($expense_types as $type)
									<option value="{{$type->id}}">{{$type->name}}</option>
									@endforeach
								</select>
							<label for="value">Valor: </label> 

							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value0" value="0" name="expensevalue0">

							<label for="expensetypes">Segunda despesa - Tipo: </label>
								<select id="expensetypes1" name="expensetype1" style="margin:10px; margin-left:4px">
									@foreach($expense_types as $type)
									<option value="{{$type->id}}">{{$type->name}}</option>
									@endforeach
								</select>
							<label for="value">Valor: </label> 
							
							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value1" value="0" name="expensevalue1">

							<label for="expensetypes">Terceira despesa - Tipo: </label>
								<select id="expensetypes2" name="expensetype2" style="margin:10px; margin-left:10px">
									@foreach($expense_types as $type)
									<option value="{{$type->id}}">{{$type->name}}</option>
									@endforeach
								</select>
							<label for="value">Valor: </label> 
							
							<input type="number" style="border: 1px solid black; border-radius: 3px; outline:none;" id="value2" value="0" name="expensevalue2">

							<label for="expensetypes">Quarta despesa - Tipo: </label>
								<select id="expensetypes3" name="expensetype3" style="margin:10px; margin-left:17px">
									@foreach($expense_types as $type)
									<option value="{{$type->id}}">{{$type->name}}</option>
									@endforeach
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
				<div class="wrap-login100" style="position: absolute; width:30%; height:45%; padding:5%; left:66%"; >

					<span class="login100-form-title" style="position: absolute; top:7%; right:0%">
						Cadastro de Tipo de Despesa
					</span>
					<div>
						<form action="/home/TypeInput" method="POST">
							@csrf
							<label class="login100-form-title" style="position:absolute; left:0%; font-size:125%">Nome: </label>

							<input type="string" name="expense_type_name" style="position:absolute; width: 70%; top:32%; left:15%;
							margin: 8px 0;
							display: inline-block;
							border: 1px solid #ccc;
							border-radius: 4px;
							box-sizing: border-box;">
		
		
					@if (\Session::has('errortype'))
    								<div class="alert alert-dark" style="position:absolute; bottom:65px; left:40px; width:80%">
        								<ul>
            								<li>{!! \Session::get('errortype') !!}</li>
        								</ul>
    								</div>
								@endif
					<div class="container-login100-form-btn" style="position:absolute; right:10%">
						<div class="col-md-8 offset-md-4">
								<button type="submit" class="login100-form-btn" style="width:80%; position:absolute; right:20%; top:160px">
									{{ __('Cadastrar Tipo') }}
								</button>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection
