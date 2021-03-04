$(document).ready(function () {

	/**
	*Code for datatables
	*/
	$('#patient_visits_datatable').DataTable();
	$('#patients_table').DataTable();

	/**
	* Event manager for loading dependent select/drop-down for Health Centre Units
	*/

    $("#visit_type_dropdown_id").change(function(){
    	   var ward_type_id = $(this).val();
            $.ajax({
                url: "/unhls_test/wards/" + $(this).val(),
                method: 'GET',
                
                success: function(data) {
                    $('#ward_dropdown_id').html(data.html);
                    $('select[name="ward_dropdown"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="ward_dropdown"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });

                }
            });
    });

    $("#clinician_dropdown_id").change(function(){
            $.ajax({
                url: "/unhls_test/clinician/" + $(this).val(),
                method: 'GET',
                
                success: function(data) {
                    $('#clinician_cadre_id').val(data.cadre);
                    $('#clinician_cadre_id').attr('readonly','true');

                    $('#clinician_phone_id').val(data.phone);
                    $('#clinician_phone_id').attr('readonly','true');

                    $('#clinician_email_id').val(data.email);
                    $('#clinician_email_id').attr('readonly','true');
                }
            });
    });
    


$("input[name=optAction]").click(function(){
 	
 	$selected = $(this).val();

 	if($selected=='I')
 	{
 		$("#inbound_options").removeClass("hidden"); 		
 		$("#outbound_options").addClass("hidden");		
 	}

 	else if($selected=='O')
 	{
 		$("#inbound_options").addClass("hidden"); 		
 		$("#outbound_options").removeClass("hidden");		
 	}
 	else
 	{
 		$("#inbound_options").addClass("hidden"); 		
 		$("#outbound_options").addClass("hidden");		
 	}

});

if($("#action").val()!=null && $("#action").val()=="I")
{
	$("#quantity_out_div").addClass("hidden");
	$("#losses_adjustments_div").addClass("hidden");
	$("#remarks_div").addClass("hidden");
	$("#quantity_in").attr("required",true);
}


if($("#action").val()!=null && $("#action").val()=="O")
{
	$("#quantity_in_div").addClass("hidden");
	$("#losses_adjustments_div").addClass("hidden");
	$("#remarks_div").addClass("hidden");	
	$("#quantity_out").attr("required",true);
	$("#expiry_date").attr("required",false);
	$("#expiry_date_div").addClass("hidden");
}


if($("#action").val()!=null && $("#action").val()=="A")
{
	$("#quantity_in_div").addClass("hidden");
	$("#quantity_out_div").addClass("hidden");
	$("#losses_adjustments").attr("required",true);	
	$("#remarks").attr("required",true);	
}

});
