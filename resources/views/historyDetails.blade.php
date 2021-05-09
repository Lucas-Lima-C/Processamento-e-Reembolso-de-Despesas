@extends('layouts.app')

@section('content')
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
</style>
<div class="card border">
  <div class="card-body">
          <div class="form-group">
            <span class="login100-form-title" style="padding:0px; padding-top:0">
              Detalhes
          </span>
             <br>
              <label> Código: {{$refund->id}}</label>
              <br>
              <label> Funcionário: {{$refund->user->name}}</label>
              <br>
              <label> Valor total do Reembolso: R${{$refund->totalValue}}</label>
              <br>
              @if($refund->status_type->name == "Pending")
              <label> Status do Reembolso: Pendente</label>
              @elseif($refund->status_type->name == "Approved")
              <label> Status do Reembolso: Aprovado</label>
              @elseif($refund->status_type->name == "Denied")
              <label> Status do Reembolso: Negado</label>
              @endif
              <br>
              <label> Data e hora de Criação: {{$refund->created_at}}</label>
          </div>
  </div>
</div>
@endsection