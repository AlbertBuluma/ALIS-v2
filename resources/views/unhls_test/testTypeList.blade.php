{{Form::label('test-list', trans("messages.select-tests"))}}
<div class="form-pane panel panel-default">
	<div class="container-fluid">
		@foreach($testTypes as $key=>$value)
		@if($testCategoryId==$value->test_category_id)
		<div class="col-md-4">
			<label  class="checkbox">
				<input class="test-type id-{{$value->id}}"
					type="checkbox"
					data-test-type-name="{{$value->name}}"
					name="testtypes[]"
					value="{{ $value->id}}"/>{{$value->name}}
			</label>
		</div>
		@endif
		@endforeach
	</div>
</div>