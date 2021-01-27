{{ Form:: open(array('action' => 'ContactController@getContactUsForm')) }} 

<ul class="errors">
@foreach($errors->all('<li>:message</li>') as $message)
{{ $message }}
@endforeach
</ul>

<div class="form-group">
{{ Form:: textarea ('message', '', array('placeholder' => 'Message', 'class' => 'form-control', 'id' => 'message', 'rows' => '4' )) }}
</div>



</div>
<div class="modal-footer">
{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
{{ Form:: close() }}