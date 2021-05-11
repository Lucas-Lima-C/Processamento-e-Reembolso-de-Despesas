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
      text-align:center
    }
</style>
<div class="card border">
  <div class="card-body">
          <div class="form-group">
            <span class="login100-form-title" style="padding:0px; padding-bottom:15px">
              Detalhes do Reembolso
          </span>

          <table>
            <thead>
                <tr style="background-color:rgb(196, 187, 187);">
                    <th>Código</th>
                    <th>Funcionário</th>
                    <th>Valor Total</th>
                    <th>Status</th>
                    <th>Data em que foi aprovado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$refund->id}}</td>
                    <td>{{$refund->user->name}}</td>
                    <td>R$ {{number_format($refund->totalValue, 2, '.', ',')}}</td>
                    @if($refund->status_type->name == "Pending")
                    <td>Pendente</td>
                    @elseif($refund->status_type->name == "Approved")
                    <td>Aprovado</td>
                    @elseif($refund->status_type->name == "Denied")
                    <td>Negado</td>
                    @endif
                    <td>{{$refund->updated_at->format("d-m-Y")}}</td>
                </tr>
            </tbody>
        </table>

        <span class="login100-form-title" style="padding:15px; font-size:120%">
          Despesas:
        </span>

        <table style="width:50%; margin-left: auto; margin-right: auto;">
          <thead>
              <tr style="background-color:rgb(196, 187, 187)">
                  <th>Código</th>
                  <th>Valor</th>
                  <th>Tipo</th>
              </tr>
          </thead>
          <tbody>
            @foreach($expenses as $expense)
              <tr>
                  <td>{{$expense->id}}</td>
                  <td>R$ {{$expense->value}}</td>
                  <td>{{$expense->expense_type->name}}</td>
              </tr>
              @endforeach
          </tbody>
      </table>


          </div>
          <div style="position:relative; left:227px;">
            <form action="history" method="GET">
              <button style="float:left; height:40px; width:100px" href="history" class="btn btn-primary btn-sm">Retornar</button>
              </form>
              </div>
  </div>
</div>
@endsection