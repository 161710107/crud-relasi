@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data santri 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $mhs->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">nis</label>
						<input type="text" name="nis" class="form-control" value="{{ $mhs->nis }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Ustad</label>
						<input type="text" name="ustad_id" class="form-control" value="{{ $mhs->Ustad->nama }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection