@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Ustad
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $a->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">no_induk</label>	
			  			<input type="text" name="no_induk" class="form-control" value="{{ $a->no_induk }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Santri</label>	
			  			<textarea rows="10" class="form-control" readonly>@foreach($a->Santri as $data)
			  				-{{ $data->nama }}
			  				@endforeach
			  			</textarea> 
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection