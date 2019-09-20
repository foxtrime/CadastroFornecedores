@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="tab-content" id="myTabContent">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                     <div class="x_title">
                        <br>
                        <ul class="nav navbar-right panel_toolbox">                                       
                           <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                           <thead>
                               <tr>
                                   <th>Razão Social</th>
                                   <th>CNPJ</th>
                                   <th>Porte Da Empresa</th>
                                   <th>CNAE</th>
                                   <th>Produtos e Serviços</th>
                                   <th>Endereço</th>
                                   <th>Email</th>
                                   <th>Telefone</th>
                                   <th>Data do Cadastro</th>
                               </tr>
                           </thead>
                           <tbody>
                              @foreach($dados as $dado)
                                 <tr>
                                    <td>{{$dado->razao_social}}</td>
                                    <td>{{$dado->cnpj}}</td>
                                    <td>{{$dado->porte_empresa}}</td>
                                    <td>{{$dado->cnae}}</td>
                                    <td>{{$dado->produtos}}</td>
                                    <td>{{$dado->endereco}}</td>
                                    <td>{{$dado->email}}</td>
                                    <td>{{$dado->telefone}}</td>
                                    <td>{{$dado->created_at}}</td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
 
      

@endsection

@push('scripts')
<script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{ asset('vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/date-uk.js"></script>    

<script>
$(function($){

$('#datatable').DataTable({
  "language": {
      "url": "js/portugues.json"
  },
  stateSave: true,
  stateDuration: -1,
  processing: true,
});

});
</script>

@endpush
