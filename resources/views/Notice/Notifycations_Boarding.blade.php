@extends('master')
@section('content')
<div class="container" id="notice">
	<div class="row">
		@foreach($notice as $value)
		<div class="alert alert-success">
			<a href="{{route('removenotice', $value['id'])}}" type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</a>
			<?php 
			$boardinghouses = DB::table('boarding_house')->where('id', $value['id_boardinghouse'])->first();
			?>
			<span class="glyphicon glyphicon-ok"></span> Nhà trọ: <strong>{{$boardinghouses->name}}</strong>
			<hr>
			<p>{{$value['messages']}}</p>
			<p>{{date_format(date_create($value['created_at']), "H:i:s - d/m/Y")}}</p>
		</div>
		@endforeach
	</div>
</div>
@endsection