@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-body">
				<center><h3 class="card-title">Cadastro de Fornecedores</h3></center>
				<form method="POST" action="{{url('/cadastro')}}" id="form_cadastro">
						{{ csrf_field() }}
					<div class="form-group">
						<label class="col-sm col-form-label">RAZÃO SOCIAL</label>
						<input id="razao_social" name="razao_social" class="form-control form-control-sm" type="text" placeholder="" required>
					</div>

					<div class="form-group">
						<label class="col-sm col-form-label">CNPJ</label>
						<input id="cnpj" name="cnpj" class="form-control form-control-sm" type="text" placeholder="" required>
					</div>

					<div class="form-group">
						<label class="col-sm col-form-label">PORTE DA EMPRESA (MEI, ME, EPP E Demais)</label>
						<input id="porte_empresa" name="porte_empresa" class="form-control form-control-sm" type="text" placeholder="" required>
					</div>

					<div class="form-group">
						<label class="col-sm col-form-label">CNAE (Atividade Economicos)</label>
						<input id="cnae" name="cnae" class="form-control form-control-sm" type="text" placeholder="" required>
					</div>

					<div class="form-group">
						<label class="col-sm col-form-label">Produtos e Serviços Ofertados</label>
						<input id="produtos" name="produtos" class="form-control form-control-sm" type="text" placeholder="" required>
					</div>

					<div class="form-group">
						<label class="col-sm col-form-label">Endereço</label>
						<input id="endereco" name="endereco" class="form-control form-control-sm" type="text" placeholder="" required>
					</div>

					<div class="form-group">
						<label class="col-sm col-form-label">E-mail</label>
						<input id="email" name="email" class="form-control form-control-sm" type="text" placeholder="" required>
					</div>

					<div class="form-group">
						<label class="col-sm col-form-label">TELEFONE</label>
						<input id="telefone" name="telefone" class="form-control form-control-sm" type="text" placeholder="" required>
					</div>

					<center> 
							<div>
								<button type="submit" id="form_cadastro" class="botoes-acao btn btn-round btn-success enviar-relatorio">
										<span class="icone-botoes-acao mdi mdi-send"></span>
										<span class="texto-botoes-acao"> ENVIAR </span>
										<div class="ripple-container"></div>
								</button>
							
						</div> 
					</center>
				</form>
			</div>
		</div>
	</div>
	<div class="container" style="padding-top: 30px">
		@include('layouts.footer')
	</div>
@endsection

@push('scripts')
		<script type="text/javascript">
			$(document).ready(function(){
				VMasker ($("#cnpj")).maskPattern("99.999.999/9999-99");
				VMasker ($("#telefone")).maskPattern("(99)9999-99999");
			});
		</script>

		<script>
			$(function(){
				$('body').submit(function(event){
				if ($(this).hasClass('enviar-relatorio')) {
					event.preventDefault();
				}
				else {
					$(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
					$(this).addClass('enviar-relatorio');
				}
			});
			});
			
		</script>

@endpush
