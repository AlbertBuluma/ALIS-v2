@section("footer")
	<!-- Begin footer section -->
	<!-- Delete Modal-->
	<div class="modal fade confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;</button>
					<h4 class="modal-title" id="myModalLabel">
						<span class="glyphicon glyphicon-trash"></span> 
						{{ trans('messages.confirm-delete-title') }}
					</h4>
				</div>
				<div class="modal-body">
					<p>{{ trans('messages.confirm-delete-message') }}</p>
					<p>{{ trans('messages.confirm-delete-irreversible') }}</p>
					<input type="hidden" id="delete-url" value="" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-delete">
						{{ trans('messages.delete') }}</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">
						{{ trans('messages.cancel') }}</button>
				</div>
			</div>
		</div>
	</div>
<hr>
    <footer class="footer">
        <div class="col-md-12 row">
        	<div class="col-md-2 col-md-offset-4">
        		<a href="http://health.go.ug/" target="_blank">
        			<img src="{{ Config::get('kblis.uganda-logo') }}" alt="Government of Uganda">
        		</a>	
        	</div>

            <div class="col-md-2">
                <a href="http://www.cdc.gov/" target="_blank">
        			<img src="{{ Config::get('kblis.cdc-logo') }}" alt="Centres for Disease Control and Prevention">
        		</a>
        	</div>
        </div>

        <div>
                <a href="http://www.cphl.go.ug" target="_blank">UNHLS &copy; {{date("Y")}}</a>
        </div>
    </footer>

    <!-- End footer section-->
@show