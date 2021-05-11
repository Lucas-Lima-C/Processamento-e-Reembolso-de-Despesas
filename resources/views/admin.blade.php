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
<div style="padding:60px">
    <div class="card border">
            <div class="card-body">
                <span class="login100-form-title" style="padding:25px; padding-top:0">
                    Reembolsos Pendentes
                </span>
            <table class="table table-hover">
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
                    @if($refunds != null )    
                        @foreach($refunds as $refund)
                            @if ($refund->status_type->name == "Pending")
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
                                <a style="float:left;" href="admin/details/{{$refund->id}}" class="btn btn-sm btn-primary">Detalhes</a>
                                
                                <form style="float:left; margin-right:5px; margin-left:5px" action="/admin/approve/{{$refund->id}}" method="POST">
                                @csrf
                                <button onclick="return confirm('Você tem certeza que quer APROVAR este reembolso?')" href="admin/approve/{{$refund->id}}" class="btn btn-sm btn-success">Aprovar</button>
                                </form>
                                
                                <form style="float:left;" action="/admin/approve/{{$refund->id}}" method="POST">
                                @csrf
                                <button onclick="return confirm('Voce tem certeza que quer REPROVAR este reembolso?')" href="admin/deny/{{$refund->id}}" class="btn btn-sm btn-danger" >Reprovar</button>
                                </form>
                            </td>
                        </tr>
                            @endif
                        @endforeach
                    @else
                    <span class="login100-form-title" style="padding:25px; padding-top:0">
                        Nenhum reembolso está pendente!
                    </span>
                    @endif
                    </tbody>
                </table>
                <div class="card-footer">
                    {{ $refunds->links() }} 
                  </div>
            </div>
        </div>
</div>
@endsection