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
                <span class="login100-form-title" style="padding:25px; padding-top:0">
                    Reembolsos Aprovados
                </span>
            <table>
                    <thead>
                        <tr style="background-color:rgb(196, 187, 187)">
                            <th>Código</th>
                            <th>Funcionário</th>
                            <th>Valor Total</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($refunds as $refund)
                            @if ($refund->status_type->name == "Approved")
                        <tr>
                            <td>{{$refund->id}}</td>
                            <td>{{$refund->user->name}}</td>
                            <td>R$ {{$refund->totalValue}}</td>
                            @if($refund->status_type->name == "Pending")
                            <td>Pendente</td>
                            @elseif($refund->status_type->name == "Approved")
                            <td>Aprovado</td>
                            @elseif($refund->status_type->name == "Denied")
                            <td>Negado</td>
                            @endif
                            <td>
                                <a style="float:left;" href="history/details/{{$refund->id}}" class="btn btn-sm btn-primary">Detalhes</a>
                            </td>
                        </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
                    {{ $refunds->links() }} 
                  </div>
            </div>
        </div>
@endsection