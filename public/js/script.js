/**
 * Custom javascript function
 * @author  (c) @iLabAfrica
 */
$(function(){
    /** HEADER
     *   Username display
     */
    $('.user-link').click(function(){
        $('.user-settings').toggle();
    });

    $('.user-profile .user-settings a').click(function(){
        $('.user-settings').toggle();
    });

    /*  LEFT SIDEBAR FUNCTIONS  */
    
    /*  Click main menu */
    $('.main-menu').click(function(){

        $('.main-menu').removeClass('active');
        $(this).addClass('active');

        $('.main-menu').siblings().hide();
        $(this).siblings().show();
    });


    /**
     *  Dashboard tooltip script
     */

    $(".dashboard").hover(
        function() {
            $(this).find(".dashboard_item:first").removeClass('hidden');
            // $('.dashboard_item').removeClass('hidden')
        },
        function() {
            $(this).find(".dashboard_item:first").addClass('hidden');
    }
    );

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });

    /**  USER
     *-  Load password reset input field
     */

    $('a.reset-password').click(function() {
        if ( $('input.reset-password').hasClass('hidden')) {
                $('input.reset-password').removeClass('hidden');
        }else {
            $('input.reset-password').addClass('hidden');
        }
    });

    /*Submitting Profile edit, with password change validation*/
    $('.update-reset-password').click(function() {
            editUserProfile();
    });

    /**
     *  LAB CONFIGURATION
     */

     /* Add another surveillance */
    $('.add-another-surveillance').click(function(){
        newSurveillanceNo = $(this).data('new-surveillance');
        var inputHtml = $('.addSurveillanceLoader').html();
        //Count new measures on the new measure button
        $('.surveillance-input').append(inputHtml);
        $('.surveillance-input .new').addClass('new-surveillance-'+newSurveillanceNo).removeClass('new');
        $(this).data('new-surveillance',  newSurveillanceNo+1).attr('data-new-surveillance',  newSurveillanceNo+1);
        addNewSurveillanceAttributes(newSurveillanceNo);
        delete newSurveillanceNo;
    });
    
     /* Add another disease */
    $('.add-another-disease').click(function(){
        newDiseaseNo = $(this).data('new-disease');
        var inputHtml = $('.addDiseaseLoader').html();
        //Count new measures on the new measure button
        $('.disease-input').append(inputHtml);
        $('.disease-input .new').addClass('new-disease-'+newDiseaseNo).removeClass('new');
        $(this).data('new-disease',  newDiseaseNo+1).attr('data-new-disease',  newDiseaseNo+1);
        addNewDiseaseAttributes(newDiseaseNo);
        delete newDiseaseNo;
    });

    /**
     *  MEASURES
     */

     /* Add another measure */
    $('.add-another-measure').click(function(){
        newMeasureNo = $(this).data('new-measure');
        var inputHtml = $('.measureGenericLoader').html();
        //Count new measures on the new measure button
        $('.measure-container').append(inputHtml);
        $('.measure-container .new-measure-section').find(
            '.measuretype-input-trigger').addClass('new-measure-'+newMeasureNo);
        $('.measure-container .new-measure-section').find(
            '.measuretype-input-trigger').attr('data-new-measure-id',  newMeasureNo);
        $('.measure-container .new-measure-section').find(
            '.add-another-range').attr('data-new-measure-id',  newMeasureNo);
        $('.measure-container .new-measure-section').find(
            '.add-another-range').addClass('new-measure-'+newMeasureNo);
        $('.measure-container .new-measure-section').find(
            '.measurevalue').addClass('new-measure-'+newMeasureNo);
        $('.measure-container .new-measure-section').addClass(
            'measure-section new-'+newMeasureNo).removeClass('new-measure-section');
        $(this).data('new-measure',  newMeasureNo+1).attr('data-new-measure',  newMeasureNo+1);
        addNewMeasureAttributes(newMeasureNo);
        delete newMeasureNo;
    });

     /* Add another measure range value */
    $('.measure-container').on('click', '.add-another-range', function(){
        var inputClass = [
            '.numericInputLoader',
            '.alphanumericInputLoader',
            '.alphanumericInputLoader',
            '.freetextInputLoader'
        ];

        if ($(this).data('measure-id') === 0) {
            var newMeasureId = $(this).data('new-measure-id');
            var measureID = 'new-measure-'+newMeasureId;
        } else {
            var measureID = $(this).data('measure-id');
        }
        var measureTypeId = $('.measuretype-input-trigger.'+measureID).val() - 1;
        var inputHtml = $(inputClass[measureTypeId]).html();
        $(".measurevalue."+measureID).append(inputHtml);
        if ($(this).data('measure-id') != 0) {
            editMeasureRangeAttributes(measureTypeId,measureID);
        }else{
            addMeasureRangeAttributes(measureTypeId, newMeasureId);
        }
    });

    /*  load measure range input UI for the selected measure type */
    $( '.measure-container' ).on('change', '.measuretype-input-trigger', loadRangeFields);

    /*  re-load measure range input UI for the selected measure type on error */
    if ($('.measurevalue').is(':empty')){
        var measure_type = $( '.measuretype-input-trigger' ).val();
        if ( measure_type > 0 ) {
            loadRangeFields();
        }
    }

    /** GLOBAL DELETE   
     *  Alert on irreversible delete
     */
    $('.confirm-delete-modal').on('show.bs.modal', function(e) {
        $('#delete-url').val($(e.relatedTarget).data('id'));
    });

    $('.btn-delete').click(function(){
        $('.confirm-delete-modal').modal('toggle');
        window.location.href = $('#delete-url').val();
    });

    /**
     *  MICROBIOLOGY
     */
    var cultureTestID;
    var isolatedOrganismID;
    var isolatedOrganismUrl;
    var organismAntibioticsUrl;
    var isolatedOrganismUrlVerb;
    var cultureObservationUrl;
    var cultureObservationUrlVerb;
    var drugSusceptibilityUrl;
    var drugSusceptibilityUrlVerb;

    /*culture observation*/
    $('.add-culture-observation-modal').on('show.bs.modal', function(e) {
        // receive data from the clicked button
        cultureTestID = $(e.relatedTarget).data('test-id');
        cultureObservationUrl = $(e.relatedTarget).data('url');
        cultureObservationUrlVerb = $(e.relatedTarget).data('verb');
    });

    $('.culture-observation-tbody').on('click', '.edit-culture-observation', function(){
        $('.duration').val($(this).data('duration-id'));
        $('.observation').val($(this).data('observation'));
    });

    // save culture observation addition or editon
    $('.save-culture-observation').click(function(){
        var observation = $('.observation').val();

        $.ajax({
            type: cultureObservationUrlVerb,
            url:  cultureObservationUrl,
            data: {
                test_id: cultureTestID,
                observation: observation
            },
            success: function(cultureObservation){
                if (cultureObservationUrlVerb == 'POST') {
                    location.reload();
                } else {
                    $('.observation-entry').empty();
                }
                // update rows with edition already made in the database
                $('.observation-entry')
                    .append(cultureObservation.observation);
                // clear fields for any new addition
                $('.observation').val(cultureObservation.observation);
            }
        });
    });

    $('.cancel-culture-observation-edition').click(function(){
        $('.observation').val('');
    });

    /*isolated organism*/
    $('.add-isolated-organism-modal').on('show.bs.modal', function(e) {
        // receive data from the clicked button
        // update global varible so that it's available in the save isolated organism function
        isolatedOrganismUrl = $(e.relatedTarget).data('url');
        cultureTestID = $(e.relatedTarget).data('test-id');
        drugSusceptibilityUrl = $(e.relatedTarget).data('drug-susceptibility-store-url');
        isolatedOrganismUrlVerb = 'POST';
        $('.organism').val('');
        $('.save-isolated-organism').attr('data-url', isolatedOrganismUrl);
    });

    // save isolated organism addition
    $('.save-isolated-organism').click(function(){
        var organismID = $('.isolated-organism-input').val();
        organismAntibioticsUrl = $(this).data('antibiotics-url')+'/organismantibiotic/'+organismID+'/show';
        $.ajax({
            type: isolatedOrganismUrlVerb,
            url:  isolatedOrganismUrl,
            data: {
                organism_id: organismID,
                test_id: cultureTestID
            },
            success: function(isolatedOrganism){
                // update rows with edition already made in the database
                var isolatedOrganismEntry = $('.isolatedOrganismEntryLoader').html();
                $('.isolated-organism-tbody').append(isolatedOrganismEntry);
                $('.isolated-organism-tbody')
                    .find('.new-isolated-organism-tr')
                    .addClass('isolated-organism-tr-'+isolatedOrganism.id)
                    .removeClass('new-isolated-organism-tr')
                    .find('.add-drug-susceptibility')
                            .attr('data-url',drugSusceptibilityUrl)
                            .attr('data-antibiotics-url',organismAntibioticsUrl)
                            .attr('data-isolated-organism-id',isolatedOrganism.id)
                            .attr('data-organism-id',isolatedOrganism.organism.id)
                            .attr('data-isolated-organism-name',isolatedOrganism.organism.name);
                    $('.isolated-organism-tr-'+isolatedOrganism.id)
                        .find('.delete-isolated-organism')
                            .attr('data-url',isolatedOrganismUrl+'/'+isolatedOrganism.id)
                            .attr('data-id',isolatedOrganism.id);
                $('.isolated-organism-tr-'+isolatedOrganism.id+' .isolated-organism-entry')
                        .append(isolatedOrganism.organism.name);
                $('.organism').val('');
            }
        });
    });

    // delete drug susceptbility entry from database and dynamicallly remove from UI
    $('.isolated-organism-tbody').on('click', '.delete-isolated-organism', function(){
        var url = $(this).data('url');
        $.ajax({
            type: 'DELETE',
            url:  url,
            success: function(id){
            // remove newly deleted(dynamically) entry of drug susceptibility
            $('.isolated-organism-tr-'+id).remove();
            }
        });
    });
    // cancel a drug susceptibility addition or edition
    $('.cancel-isolated-organism-addition').click(function(){
        $('.organism').val('');
    });

    /*drug susceptibility*/
    $('.add-drug-susceptibility-test-modal').on('show.bs.modal', function(e) {

        // fetch relevant list of antibiotics for organism
        organismAntibioticsUrl = $(e.relatedTarget).data('antibiotics-url');
        see = $(e.relatedTarget).data('zone-diameter');
        var antibiotics;
        $.ajax({
            type: 'GET',
            url:  organismAntibioticsUrl,
            success: function(data){
                // populate drop down dynamically
                antibiotics = data.zone_diameters;
                $('.form-control.drug').empty();
                // if drug susceptibility is being added for the first time
                if ($(e.relatedTarget).data('verb') == 'POST') {
                    $('.form-control.drug').append('<option value=""></option>');
                }
                for (i in antibiotics ) {
                    $('.form-control.drug').append(
                        '<option value="' + antibiotics[i].drug_id + '">' + antibiotics[i].drug.name + '</option>');
                }
                if ($(e.relatedTarget).data('verb') == 'PUT') {
                    $('.form-control.drug').val($(e.relatedTarget).attr('data-drug-id'));
                    $('.form-control.zone-diameter').val($(e.relatedTarget).attr('data-zone-diameter'));
                }
            }
        });

        $('.isolated-organism-input-header').empty();
        // receive data from the clicked button
        // update global varible so that it's available in the save susceptibility function
        isolatedOrganismID = $(e.relatedTarget).data('isolated-organism-id');
        drugSusceptibilityUrlVerb = $(e.relatedTarget).data('verb');
        drugSusceptibilityUrl = $(e.relatedTarget).data('url');

        if (drugSusceptibilityUrlVerb == 'POST') {
            $('.drug').val('');
            $('.susceptibility').val('');
            $('.zone-diameter').val('');
            $('.organism').val($(e.relatedTarget).data('organism-id'));
        }
        // update url value in the save button
        $('.save-drug-susceptibility').attr('data-url', drugSusceptibilityUrl);
        // insert name of isolated organism to be subjected to a drug above the input for drug and result
        $('.isolated-organism-input-header').append($(e.relatedTarget).attr('data-isolated-organism-name'));
    });
    $('.drug-susceptibility-tbody').on('click', '.edit-drug-susceptibility', function(){
        // populate with initial values fields tobe edited
        $('.drug').val($(this).data('drug-id'));
        $('.susceptibility').val($(this).data('drug-susceptibility-measure-id'));
        $('.zone-diameter').val($(this).data('zone-diameter'));
        $('.organism').val($(this).data('organism-id'));
    });

    // save drug susceptibility addition or editon
    $('.save-drug-susceptibility').click(function(){
        var drug = $('.drug').val();
        var susceptibility = $('.susceptibility').val();
        var zone_diameter = $('.zone-diameter').val();
        var organism = $('.organism').val();
        $.ajax({
            type: drugSusceptibilityUrlVerb,
            url:  drugSusceptibilityUrl,
            data: {
                isolated_organism_id: isolatedOrganismID,
                drug_id: drug,
                organism_id: organism,
                zone_diameter: zone_diameter,
                drug_susceptibility_measure_id: susceptibility
            },
            success: function(drugSusceptibility){

                if (drugSusceptibilityUrlVerb == 'POST') {
                    // update rows with addition already made in the database
                    var drugSusceptibilityEntry = $('.drugSusceptibilityEntryLoader').html();
                    $('.drug-susceptibility-tbody').append(drugSusceptibilityEntry);
                    $('.drug-susceptibility-tbody')
                        .find('.new-drug-susceptibility-tr')
                        .addClass('drug-susceptibility-tr-'+drugSusceptibility.id)
                        .removeClass('new-drug-susceptibility-tr')
                        .find('.edit-drug-susceptibility')
                            .attr('data-url',drugSusceptibilityUrl+'/'+drugSusceptibility.id)
                            .attr('data-id',drugSusceptibility.id)
                            .attr('data-drug-id',drugSusceptibility.drug_id)
                            .attr('data-isolated-organism-id',drugSusceptibility.isolated_organism_id)
                            .attr('data-drug-susceptibility-measure-id',drugSusceptibility.drug_susceptibility_measure_id)
                            .attr('data-zone-diameter',drugSusceptibility.zone_diameter)
                            .attr('data-antibiotics-url',organismAntibioticsUrl)
                    $('.drug-susceptibility-tr-'+drugSusceptibility.id)
                        .find('.delete-drug-susceptibility')
                            .attr('data-url',drugSusceptibilityUrl+'/'+drugSusceptibility.id)
                            .attr('data-id',drugSusceptibility.id);
                } else {
                    // clear rows before updating with new values from the backend
                    $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .isolated-organism-entry').empty();
                    $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .drug-entry').empty();
                    $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .zone-diameter-entry').empty();
                    $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .result-entry').empty();
                        $('.drug-susceptibility-tr-'+drugSusceptibility.id)
                            .find('.edit-drug-susceptibility')
                                .attr('data-drug-id',drugSusceptibility.drug_id)
                                .attr('data-isolated-organism-id',drugSusceptibility.isolated_organism_id)
                                .attr('data-drug-susceptibility-measure-id',drugSusceptibility.drug_susceptibility_measure_id)
                                .attr('data-zone-diameter',drugSusceptibility.zone_diameter)
                }
                // update rows with edition already made in the database
                $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .isolated-organism-entry')
                    .append(drugSusceptibility.isolated_organism.organism.name);
                $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .drug-entry')
                    .append(drugSusceptibility.drug.name);
                $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .zone-diameter-entry')
                    .append(drugSusceptibility.zone_diameter);
                $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .result-entry')
                    .append(drugSusceptibility.drug_susceptibility_measure.interpretation);
                $('.drug').val('');
                $('.susceptibility').val('');
            }
        });
    });
    // delete drug susceptbility entry from database and dynamicallly remove from UI
    $('.drug-susceptibility-tbody').on('click', '.delete-drug-susceptibility', function(){
        var url = $(this).data('url');
        $.ajax({
            type: 'DELETE',
            url:  url,
            success: function(id){
            // remove newly deleted(dynamically) entry of drug susceptibility
            $('.drug-susceptibility-tr-'+id).remove();
            }
        });
    });
    // cancel a drug susceptibility addition or edition
    $('.cancel-drug-susceptibility-edition').click(function(){
        $('.drug').val('');
        $('.susceptibility').val('');
    });
    /*completing the culture and sensitivity analysis*/
    // prepare to complete culture sensitivity
    $('.prepare-culture-sensitivity-completion').click(function(){
        $(this).addClass('hidden');
        $('.complete-culture-sensitivity').removeClass('hidden');
    });

    // cancel culture sensitivity completion
    $('.cancel-completion-of-culture-sensitivity-analysis').click(function(){
        $('.prepare-culture-sensitivity-completion').removeClass('hidden');
        $('.complete-culture-sensitivity').addClass('hidden');
    });

    // complete culture sensitivity
    $('.submit-completed-culture-sensitivity-analysis').click(function(){
        $.ajax({
            type: 'POST',
            url:  $(this).data('url'),
            data: {
                interpretation: $('.interpretation').val()
            },
            success: function(){
                location.href = $('.submit-completed-culture-sensitivity-analysis')
                    .data('redirect-url');
            }
        });
    });

    var testID;
    var gramStainRangeUrl;

    /*gram stain range*/
    $('.add-gram-stain-range-modal').on('show.bs.modal', function(e) {
        // receive data from the clicked button
        // update global varible so that it's available in the save  gram stain range function
        gramStainRangeUrl = $(e.relatedTarget).data('url');
        testID = $(e.relatedTarget).data('test-id');
        $('.gram-stain-range-input').val('');
        $('.save-gram-stain-range').attr('data-url', gramStainRangeUrl);
    });

    // save selected gram stain range
    $('.save-gram-stain-range').click(function(){
        var gramStainRangeID = $('.gram-stain-range-input').val();
        $.ajax({
            type: 'POST',
            url:  gramStainRangeUrl,
            data: {
                gram_stain_range_id: gramStainRangeID,
                test_id: testID
            },
            success: function(gramStainResult){
                // update rows with edition already made in the database
                var gramStainRangeEntry = $('.gramStainRangeEntryLoader').html();
                $('.gram-stain-range-tbody').append(gramStainRangeEntry);
                $('.gram-stain-range-tbody')
                    .find('.new-gram-stain-range-tr')
                    .addClass('gram-stain-range-tr-'+gramStainResult.id)
                    .removeClass('new-gram-stain-range-tr');
                $('.gram-stain-range-tr-'+gramStainResult.id)
                    .find('.delete-gram-stain-range')
                        .attr('data-url',gramStainRangeUrl+'/'+gramStainResult.id)
                        .attr('data-id',gramStainResult.id);
                $('.gram-stain-range-tr-'+gramStainResult.id+' .gram-stain-range-entry')
                        .append(gramStainResult.gram_stain_range.name);
                $('.organism').val('');
            }
        });
    });

    $('.save-gram-stain-results').click(function(){
        $.ajax({
            type: 'POST',
            url:  $(this).data('url'),
            data: {
                interpretation: ''
            },
            success: function(){
                location.href = $('.save-gram-stain-results')
                    .data('redirect-url');
            }
        });
    });

    // delete drug susceptbility entry from database and dynamicallly remove from UI
    $('.gram-stain-range-tbody').on('click', '.delete-gram-stain-range', function(){
        var url = $(this).data('url');
        $.ajax({
            type: 'DELETE',
            url:  url,
            success: function(id){
            // remove newly deleted(dynamically) entry of drug susceptibility
            $('.gram-stain-range-tr-'+id).remove();
            }
        });
    });
    // cancel a drug susceptibility addition or edition
    $('.cancel-gram-stain-range-addition').click(function(){
        $('.gram-stain-range-input').val('');
    });

    UIComponents();

    /* Clicking the label of an radio/checkbox, checks the control*/
    $('span.input-tag').click(function(){
        $(this).siblings('input').trigger('click');
    });

    // Delete measure range

    $('body').on('click', '.measure-input .close', function(){
        $(this).parent().parent().remove();
    });

    // Delete measure

    $('.measure-container').on('click', '.close', function(){
        $(this).parent().parent().remove();
    });
    
    // Delete Surveillance entry

    $('.surveillance-input').on('click', '.close', function(){
        $(this).parent().parent().parent().remove();
    });

    // Delete Disease entry

    $('.disease-input').on('click', '.close', function(){
        $(this).parent().parent().parent().remove();
    });

    /**
     *Fetch tests for selected Lab category when requesting
     */
    $('.test-type-category').on('change', function() {
        // todo: this code is almost the same as below, make a reusable one
        var testTypeCategoryId = $('.test-type-category').val();
        var specimenTypeId = $('.specimen-type').val();
        if (testTypeCategoryId != 0 && specimenTypeId != 0) {
            $.ajax({
                type: 'POST',
                url: "/load_test_list",
                data: {
                    test_category_id: testTypeCategoryId,
                    specimen_type_id: specimenTypeId
                },
                success: function(testTypes){
                    $('.test-type-list').empty();
                    $('.test-type-list').append(testTypes);
                }
            });
        }
    });

    /**
     *Fetch tests for selected Specimen Type when requesting
     */
    $('.specimen-type').on('change', function() {
        var testTypeCategoryId = $('.test-type-category').val();
        var specimenTypeId = $('.specimen-type').val();
        if (testTypeCategoryId != 0 && specimenTypeId != 0) {
            $.ajax({
                type: 'POST',
                url: "/load_test_list",
                data: {
                    test_category_id: testTypeCategoryId,
                    specimen_type_id: specimenTypeId
                },
                success: function(testTypes){
                    $('.test-type-list').empty();
                    $('.test-type-list').append(testTypes);
                }
            });
        }
    });

    /**
    *
    *
    */
    $('#section_id').on('change', function() {
        var testTypeCategoryId = $('#section_id').val();
        if (testTypeCategoryId != 0 ) {
            $.ajax({
                type: 'GET',
                url: "/tat/test_types",
                data: {
                    option: testTypeCategoryId
                },
                success: function(data){
                    $('#test_type').empty();
                    //$('#test_type').append("<option value=''>Select Test Type</option>");
                    
                    for(i=0;i<data.length;i++){
                        $('#test_type').append("<option value='"+ data[i].id +"'>" + data[i].name + "</option>");

                    }
                    
                }
            });
        }
    });

    /**
     *Create List of tests in the test request page
     */
    var lastNewSpecimenId = 0;
    $('.add-test-to-list').click(function(){
        var testTypeCategoryId = $('.test-type-category').val();
        var specimenName = $('.specimen-type option:selected').text();
        var testTypeCategoryName = $('.test-type-category option:selected').text();

        var count = 0;
        $.map($('.test-type:checkbox:checked'), function (el) {

            var testListHtml = $('.test-list-loader').html();
            //Count new measures on the new measure button
            $('.test-list-panel').append(testListHtml);
            // Append test type details for display
            if (count == 0) {
                $('.test-list-panel .new-test-list-row').find(
                    '.specimen-name').append(specimenName);
                $('.test-list-panel .new-test-list-row').find(
                    '.test-type-category-name').append(testTypeCategoryName);
            }
            $('.test-list-panel .new-test-list-row').find(
                '.test-type-name').append($('.test-type.id-'+el.value).data('test-type-name'));
            if($('.test-type.id-'+el.value).data('test-type-name') =='HIV'){
                $('.hiv-purpose').removeClass('hidden');
            }
            // store test type details for submission
            $('.test-list-panel .new-test-list-row').find(
                '.specimen-type-id').attr(
                'name', 'test_list['+lastNewSpecimenId+'][specimen_type_id]');
            $('.test-list-panel .new-test-list-row').find(
                '.test-type-id').attr(
                'name', 'test_list['+lastNewSpecimenId+'][test_type_id]['+el.value+']');
            $('.test-list-panel .new-test-list-row').find(
                '.specimen-type-id').val($('.specimen-type').val());
            $('.test-list-panel .new-test-list-row').find(
                '.test-type-id').val(el.value);
            $('.test-list-panel .new-test-list-row').addClass(
                'test-list-row-'+el.value).removeClass('new-test-list-row');
            count++;
        });
        lastNewSpecimenId++;
    });

    // todo: fix, not entirely functional at the moment
    $('.test-list-panel').on( "click", '.delete-test-from-list', function(e) {
        $(this).siblings('.test-type-name').remove();
        $(this).remove();
        $('hiv-purpose').addClass('hidden');
    });

    /**
     * HIV testing Algorithm - Basic for now, Proceeding from Screening to Statpak to Unigold
     */
     $('#m_1').on('change', function(){
        //TODO Reset all fields each time Screening result is changed!
        if(this.value == 'Non-Reactive'){
            $("#m_2").prop("disabled", true);
            $("#m_3").prop("disabled", true);
        }
        else if(this.value == 'Reactive'){
            $("#m_2").prop("disabled", false);
            $("#m_3").prop("disabled", true);
        }
     });

     $('#m_2').on('change', function(){
        if(this.value == 'Reactive'){
            $("#m_3").prop("disabled", true);
        }
        else if(this.value == 'Non-Reactive'){
            $("#m_3").prop("disabled", false);
        }
     });
    /**
     * formatting date and time text/input fields as dropdown selection
     */
    $(function(){
        $('#dob').combodate({
            format: 'YYYY-MM-DD',
            template: 'D / MMM / YYYY',
            //min year
            minYear: '1916',
            maxYear: new Date().getFullYear()
        });
    });

    $(function(){
        $('#datetime12').combodate();
    });

    /**
     *Convert Age to date and visa viz
     */
    $("#dob").change(function(){
        set_age();          
    });

    $("#age").change(function(){
        set_dob();      
    });

    $("#id_age_units").change(function(){
        set_dob();          
    });

    function round1(val){
        return Math.round(val*10)/10;
    }

    function set_dob(){
        var date_now = new Date();
        var now_s = date_now.getTime();
        var age = $("#age").val();
        var units = $("#id_age_units").val();
        var age_s=0;
        if(units=='M'){
             age = age/12;
             age_s = age*365*24*3600*1000;
        }else if (units=='D') {
            
            age_s = age*24*3600*1000;
        }else{
            age_s = age*365*24*3600*1000;
        }
         
        var dob_s = now_s-age_s;

        var dob = new Date(dob_s);
        //dob.setMonth(0, 1);
        $("#dob").combodate('setValue', dob);
    }

    function set_age(){
        var date_now = new Date();
        var now_s = date_now.getTime();

        var dob = new Date($("#dob").val());
        var dob_s = dob.getTime();
        var yrs = (now_s-dob_s)/(365*24*3600*1000) || 0;
        var fraction_of_a_month_in_a_year=(30/365)||2;

        if(yrs<1 && yrs >= fraction_of_a_month_in_a_year){//Age in Months
            var mths = yrs*12;
            $("#age").val(round1(mths));
            $("#id_age_units").val("M");
        }else if(yrs<fraction_of_a_month_in_a_year){//Age in Days
            
            $("#id_age_units").val("D");
        }else{//Age in Years
            $("#age").val(round1(yrs));
            $("#id_age_units").val("Y");
        }
    }

    $(function(){
        $('#collection-date').combodate({
            maxYear: new Date().getFullYear()
        });
        $('#reception-date').combodate({
            maxYear:new Date().getFullYear()
        });
    });
    
    /**
     * Disable Bed No: input field  based on Visit type selected
     */
     $("#visit_type").on('change', function() {
        if(this.value === "0" || this.value === "null") {
            $("#bed_no").prop("disabled", true);
            $("#ward_id").prop("disabled", true);
        } else{
            $("#bed_no").prop("disabled", false);
            $("#ward_id").prop("disabled", false);
        }
    });

    /**
     * Display other (specify) text field when other is selected during specimen refferal storage condition selection
     */

    $(function () {
        $("#storage_condition").on('change',function () {
            if ($(this).val() == "3") {
                $("#other_storage").show();
            } else {
                $("#other_storage").hide();
            }
        });
    });

    /**
     * Display other (specify) text field when other is selected during specimen refferal type of transport selection
     */

    $(function () {
        $("#transport_type").on('change',function () {
            if ($(this).val() == "4") {
                $("#other_transport").show();
            } else {
                $("#other_transport").hide();
            }
        });
    });

    /**
     * Fetch Test results
     */

    $('.fetch-test-data').click(function(){
        var testTypeID = $(this).data('test-type-id');
        var url = $(this).data('url');
        $.post(url, { test_type_id: testTypeID}).done(function(data){
            $.each($.parseJSON(data), function (index, obj) {
                console.log(index + " " + obj);
                $('#'+index).val(obj);
            });
        });
    });

    /**
     * Search for patient from new test modal
     * UI Rendering Logic here
     */

    $('#new-test-modal .search-patient').click(function(){
        var searchText = $('#new-test-modal .search-text').val();
        var url = location.protocol+ "//"+location.host+ "/patient/search";
        var output = "";
        var cnt = 0;
        $.post(url, { text: searchText}).done(function(data){
            $.each($.parseJSON(data), function (index, obj) {
                output += "<tr>";
                output += "<td><input type='radio' value='" + obj.id + "' name='pat_id'></td>";
                output += "<td>" + obj.patient_number + "</td>";
                output += "<td>" + obj.name + "</td>";
                output += "</tr>";
                cnt++;
            });
            $('#new-test-modal .table tbody').html( output );
            if (cnt === 0) {
                $('#new-test-modal .table').hide();
            } else {
                $('#new-test-modal .table').removeClass('hide');
                $('#new-test-modal .table').show();
            }
        });
    });
    /**
     * Repeat of above AJAX request for UNHLS test pages
     */

     $('#new-test-modal-unhls .search-patient').click(function(){
        var searchText = $('#new-test-modal-unhls .search-text').val();
        var url = location.protocol+ "//"+location.host+ "/unhls_patient/search";
        var output = "";
        var cnt = 0;
        $.post(url, { text: searchText}).done(function(data){
            $.each($.parseJSON(data), function (index, obj) {
                output += "<tr>";
                output += "<td><input type='radio' value='" + obj.id + "' name='pat_id'></td>";
                output += "<td>" + obj.patient_number + "</td>";
                output += "<td>" + obj.name + "</td>";
                output += "</tr>";
                cnt++;
            });
            $('#new-test-modal-unhls .table tbody').html( output );
            if (cnt === 0) {
                $('#new-test-modal-unhls .table').hide();
            } else {
                $('#new-test-modal-unhls .table').removeClass('hide');
                $('#new-test-modal-unhls .table').show();
            }
        });
    });


    /*
    * Prevent patient search modal form submit (default action) when the ENTER key is pressed
    */

    $('#new-test-modal, #new-test-modal-unhls .search-text').keypress(function( event ) {
        if ( event.which == 13 ) {
            event.preventDefault();
            $('#new-test-modal .search-patient').click();
        }
    });


    /** - Get a specimen->id from the button clicked,
     *  - Fetch corresponding specimen data
     *  - Display all in the modal.
     */
    $('#accept-specimen-modal').on('show.bs.modal', function(e) {
        //get data-id attribute of the clicked element
        var id = $(e.relatedTarget).data('specimen-id');
        var url = $(e.relatedTarget).data('url');
        $.post(url, { id: id}).done(function(data){
            //Show it in the modal
            $(e.currentTarget).find('.modal-body').html(data);
        });
    });


    /** Receive Test Request button.
     *  - Updates the Test status via an AJAX call
     *  - Changes the UI to show the right status and buttons
     */
    $('.tests-log').on( "click", ".receive-test", function(e) {

        var testID = $(this).data('test-id');
        var specID = $(this).data('specimen-id');

        var url = location.protocol+ "//"+location.host+ "/unhls_test/" + testID+ "/receive";
        $.post(url, { id: testID}).done(function(){});

        var parent = $(e.currentTarget).parent();
        // First replace the status
        var newStatus = $('.pending-test-not-collected-specimen').html();
        parent.siblings('.test-status').html(newStatus);

        // Add the new buttons
        var newButtons = $('.accept-button').html();
        parent.append(newButtons);

        // Set properties for the new buttons
        parent.children('.accept-specimen').attr('data-test-id', testID);
        parent.children('.accept-specimen').attr('data-specimen-id', specID);

        // Now remove the unnecessary buttons
        $(this).siblings('.receive-test').remove();
        $(this).remove();
    });

    /** Accept Specimen button.
     *  - Updates the Specimen status via an AJAX call
     *  - Changes the UI to show the right status and buttons
     */
    $('.tests-log').on( "click", ".accept-specimen", function(e) {

        var testID = $(this).data('test-id');
        var specID = $(this).data('specimen-id');
        var url = $(this).data('url');
        $.post(url, { id: specID}).done(function(){});

        var parent = $(e.currentTarget).parent();
        // First replace the status
        var newStatus = $('.pending-test-accepted-specimen').html();
        parent.siblings('.test-status').html(newStatus);

        // Add the new buttons
        var newButtons = $('.reject-start-buttons').html();
        parent.append(newButtons);
        var referButton = $('.start-refer-button').html();
        parent.append(referButton);

        // Set properties for the new buttons
        var rejectURL = location.protocol+ "//"+location.host+ "/test/" + specID+ "/reject";
        parent.children('.reject-specimen').attr('id',"reject-" + testID + "-link");
        parent.children('.reject-specimen').attr('href', rejectURL);

        var referURL = location.protocol+ "//"+location.host+ "/test/" + specID+ "/refer";
        parent.children('.refer-button').attr('href', referURL);

        parent.children('.start-test').attr('data-test-id', testID);

        // Now remove the unnecessary buttons
        $(this).siblings('.change-specimen').remove();
        $(this).remove();
    });

    /**Rejecting a Specimen
     * - Allow for selection of multiple rejection reasons
     */
    $(document).ready(function () {
      var rejectReason = $('#reject-reason');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);
      });  
      
      $('#reject-reason').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });

    /**
     * Automatic Results Interpretation
     * Updates the test  result via ajax call
     */
     /*UNSTABLE!---TO BE RE-THOUGHT
    $(".result-interpretation-trigger").focusout(function() {
        var interpretation = "";
        var url = $(this).data('url');
        var measureid = $(this).data('measureid');
        var age = $(this).data('age');
        var gender = $(this).data('gender');
        var measurevalue = $(this).val();
        $.post(url, {
                measureid: measureid,
                age: age,
                measurevalue: measurevalue,
                gender: gender
            }).done( function( interpretation ){
            $( ".result-interpretation" ).val( interpretation );
        });
    });
    */

    /** Start Test button.
     *  - Updates the Test status via an AJAX call
     *  - Changes the UI to show the right status and buttons
     */
    $('.tests-log').on( "click", ".start-test", function(e) {
        var testID = $(this).data('test-id');
        var url = $(this).data('url');
        $.post(url, { id: testID}).done(function(){});

        var parent = $(e.currentTarget).parent();
        // First replace the status
        var newStatus = $('.started-test-accepted-specimen').html();
        parent.siblings('.test-status').html(newStatus);

        // Add the new buttons
        var newButtons = $('.enter-result-buttons').html();
        parent.append(newButtons);

        // Set properties for the new buttons
        var resultURL = location.protocol+ "//"+location.host+ "/unhls_test/" + testID+ "/enterresults";
        parent.children('.enter-result').attr('id',"enter-results-" + testID + "-link");
        parent.children('.enter-result').attr('href',resultURL);

        // Now remove the unnecessary buttons
        $(this).siblings('.refer-button').remove();
        $(this).remove();
    });

    /**
     *-----------------------------------
     * REPORTS
     *-----------------------------------
     */

        /*Dynamic loading of select list options*/
        /*$('#section_id').change(function(){
            $.get("/reports/dropdown2",
                { option: $(this).val() },
                function(data) {
                    var test_type = $('#test_type');
                    test_type.empty();
                    test_type.append("<option value=''>Select Test Type</option>");
                    $.each(data, function(index, element) {
                        test_type.append("<option value='"+ element.id +"'>" + element.name + "</option>");
                    });
                });
        });*/
        /*End dynamic select list options*/
                /*Dynamic loading of select list options*/
        $('#commodity-id').change(function(){
            $.get("/topup/"+$(this).val()+"/availableStock",
                function(data) {
                    $('#current_bal').val(data.availableStock);
                });
        });
        /*End dynamic select list options*/
        
        /*Toggle summary div for reports*/
        $('#reveal').click(function(){
            if ( $('#summary').hasClass('hidden')) {
                    $('#summary').removeClass('hidden');
            }else {
                $('#summary').addClass('hidden');
            }
        });



});
    /**
     *-----------------------------------
     * Section for AJAX loaded components
     *-----------------------------------
     */
    $( document ).ajaxComplete(function() {
        /* - Identify the selected patient by setting the hidden input field
           - Enable the 'Next' button on the modal
        */
        $('#new-test-modal .table input[type=radio]').click(function(){
            $('#new-test-modal #patient_id').val($(this).val());
            $('#new-test-modal .modal-footer .next').prop('disabled', false);

        });
        /* - Check the radio button when the row is clicked
           - Identify the selected patient by setting the hidden input field
           - Enable the 'Next' button on the modal
        */
        $('#new-test-modal .patient-search-result tr td').click(function(){
            var theRadio = $(this).parent().find('td input[type=radio]');
            theRadio.prop("checked", true);
            $('#new-test-modal #patient_id').val(theRadio.val());
            $('#new-test-modal .modal-footer .next').prop('disabled', false);
        });
    });

    /**
     *-----------------------------------
     * Section for AJAX loaded components ----A repeat of above code for UNHLS test
     *-----------------------------------
     */
    $( document ).ajaxComplete(function() {
        /* - Identify the selected patient by setting the hidden input field
           - Enable the 'Next' button on the modal
        */
        $('#new-test-modal-unhls .table input[type=radio]').click(function(){
            $('#new-test-modal-unhls #patient_id').val($(this).val());
            $('#new-test-modal-unhls .modal-footer .next').prop('disabled', false);

        });
        /* - Check the radio button when the row is clicked
           - Identify the selected patient by setting the hidden input field
           - Enable the 'Next' button on the modal
        */
        $('#new-test-modal-unhls .patient-search-result tr td').click(function(){
            var theRadio = $(this).parent().find('td input[type=radio]');
            theRadio.prop("checked", true);
            $('#new-test-modal-unhls #patient_id').val(theRadio.val());
            $('#new-test-modal-unhls .modal-footer .next').prop('disabled', false);
        });
    });

    /**
     *  Lab Configurations Functions
     */
    function addNewSurveillanceAttributes (newSurveillanceNo) {
        $('.new-surveillance-'+newSurveillanceNo).find('select.test-type').attr(
            'name', 'new-surveillance['+newSurveillanceNo+'][test-type]');
        $('.new-surveillance-'+newSurveillanceNo).find('select.disease').attr(
            'name', 'new-surveillance['+newSurveillanceNo+'][disease]');
    }

    function addNewDiseaseAttributes (newDiseaseNo) {
        $('.new-disease-'+newDiseaseNo).find('input.disease').attr(
            'name', 'new-diseases['+newDiseaseNo+'][disease]');
    }

    /**
     *  Measure Functions
     */
    function loadRangeFields () {
        var headerClass = [
            '.numericHeaderLoader',
            '.alphanumericHeaderLoader',
            '.alphanumericHeaderLoader',
            '.freetextHeaderLoader'
        ];
        var inputClass = [
            '.numericInputLoader',
            '.alphanumericInputLoader',
            '.alphanumericInputLoader',
            '.freetextInputLoader'
        ];

        if ($(this).data('measure-id') === 0) {
            var newMeasureId = $(this).data('new-measure-id');
            var measureID = 'new-measure-'+newMeasureId;
        } else {
            var measureID = $(this).data('measure-id');
        }

            measureTypeId = $('.measuretype-input-trigger.'+measureID).val() - 1;
            var headerHtml = $(headerClass[measureTypeId]).html();
            var inputHtml = $(inputClass[measureTypeId]).html();
        if (measureTypeId == 0) {
            $('.measurevalue.'+measureID).removeClass('col-md-6');
            $('.measurevalue.'+measureID).addClass('col-md-12');
        } else{
            $('.measurevalue.'+measureID).removeClass('col-md-12');
            $('.measurevalue.'+measureID).addClass('col-md-6');
        }
        if (measureTypeId == 3) {
            $('.measurevalue.'+measureID).siblings('.actions-row').addClass('hidden')
        }else{
            $('.measurevalue.'+measureID).siblings('.actions-row').removeClass('hidden')
        }
        $('.measurevalue.'+measureID).empty();
        $('.measurevalue.'+measureID).append(headerHtml);
        $('.measurevalue.'+measureID).append(inputHtml);
        if ($(this).data('measure-id') != 0) {
            editMeasureRangeAttributes(measureTypeId,measureID);
        }else{
            addMeasureRangeAttributes(measureTypeId, newMeasureId);
        }
    }

    function addNewMeasureAttributes (measureID) {
        $('.measure-section.new-'+measureID+' input.name').attr(
            'name', 'new-measures['+measureID+'][name]');
        $('.measure-section.new-'+measureID+' select.measure_type_id').attr(
            'name', 'new-measures['+measureID+'][measure_type_id]');
        $('.measure-section.new-'+measureID+' input.unit').attr(
            'name', 'new-measures['+measureID+'][unit]');
        $('.measure-section.new-'+measureID+' input.expected').attr(
            'name', 'new-measures['+measureID+'][expected]');
        $('.measure-section.new-'+measureID+' textarea.description').attr(
            'name', 'new-measures['+measureID+'][description]');
    }

    function addMeasureRangeAttributes (measureTypeId,measureID) {
        if (measureTypeId == 0) {
            $('.measurevalue.new-measure-'+measureID+' input.agemin').attr(
                'name', 'new-measures['+measureID+'][agemin][]');
            $('.measurevalue.new-measure-'+measureID+' input.agemax').attr(
                'name', 'new-measures['+measureID+'][agemax][]');
            $('.measurevalue.new-measure-'+measureID+' select.gender').attr(
                'name', 'new-measures['+measureID+'][gender][]');

            $('.measurevalue.new-measure-'+measureID+' input.rangemin').attr(
                'name', 'new-measures['+measureID+'][rangemin][]');
            $('.measurevalue.new-measure-'+measureID+' input.rangemax').attr(
                'name', 'new-measures['+measureID+'][rangemax][]');

            $('.measurevalue.new-measure-'+measureID+' input.flagmin').attr(
                'name', 'new-measures['+measureID+'][flagmin][]');
            $('.measurevalue.new-measure-'+measureID+' input.flagmax').attr(
                'name', 'new-measures['+measureID+'][flagmax][]');

            $('.measurevalue.new-measure-'+measureID+' input.interpretation').attr(
                'name', 'new-measures['+measureID+'][interpretation][]');
            $('.measurevalue.new-measure-'+measureID+' input.measurerangeid').attr(
                'name', 'new-measures['+measureID+'][measurerangeid][]');
        } else{
            $('.measurevalue.new-measure-'+measureID+' input.val').attr(
                'name', 'new-measures['+measureID+'][val][]');
            $('.measurevalue.new-measure-'+measureID+' input.interpretation').attr(
                'name', 'new-measures['+measureID+'][interpretation][]');
            $('.measurevalue.new-measure-'+measureID+' input.measurerangeid').attr(
                'name', 'new-measures['+measureID+'][measurerangeid][]');
        }
    }

    function editMeasureRangeAttributes (measureTypeId,measureID) {
        if (measureTypeId == 0) {
            $('.measurevalue.'+measureID+' input.agemin').attr(
                'name', 'measures['+measureID+'][agemin][]');
            $('.measurevalue.'+measureID+' input.agemax').attr(
                'name', 'measures['+measureID+'][agemax][]');
            $('.measurevalue.'+measureID+' select.gender').attr(
                'name', 'measures['+measureID+'][gender][]');
            $('.measurevalue.'+measureID+' input.rangemin').attr(
                'name', 'measures['+measureID+'][rangemin][]');
            $('.measurevalue.'+measureID+' input.rangemax').attr(
                'name', 'measures['+measureID+'][rangemax][]');

            $('.measurevalue.'+measureID+' input.flagmin').attr(
                'name', 'measures['+measureID+'][flagmin][]');
            $('.measurevalue.'+measureID+' input.flagemax').attr(
                'name', 'measures['+measureID+'][flagmax][]');

            $('.measurevalue.'+measureID+' input.interpretation').attr(
                'name', 'measures['+measureID+'][interpretation][]');
            $('.measurevalue.'+measureID+' input.measurerangeid').attr(
                'name', 'measures['+measureID+'][measurerangeid][]');
        } else{
            $('.measurevalue.'+measureID+' input.val').attr(
                'name', 'measures['+measureID+'][val][]');
            $('.measurevalue.'+measureID+' input.interpretation').attr(
                'name', 'measures['+measureID+'][interpretation][]');
            $('.measurevalue.'+measureID+' input.measurerangeid').attr(
                'name', 'measures['+measureID+'][measurerangeid][]');
        }
    }

    function UIComponents(){
        /* Datepicker */
        $( '.standard-datepicker').datepicker({ dateFormat: "yy-mm-dd" });
    }

    function editUserProfile()
    {
        /*If Password-Change Validation*/
        var currpwd = $('#current_password').val();
        var newpwd1 = $('#new_password').val();
        var newpwd2= $('#new_password_confirmation').val();
        var newpwd1_len = newpwd1.length;
        var newpwd2_len = newpwd2.length;
        var error_flag = false;
        if(currpwd == '')
        {
            $('.curr-pwd-empty').removeClass('hidden');
            error_flag = true;
        }
        else
        {
            $('.curr-pwd-empty').addClass('hidden');
        }

        if(newpwd1 == '')
        {
            $('.new-pwd-empty').removeClass('hidden');
            error_flag = true;
        }
        else
        {
            $('.new-pwd-empty').addClass('hidden');
        }
        if(newpwd2 == '')
        {
            $('.new-pwdrepeat-empty').removeClass('hidden');
            error_flag = true;
        }
        else
        {
            $('.new-pwdrepeat-empty').addClass('hidden');
        }
    
        if(!error_flag)
        {
            if(newpwd1_len != newpwd2_len || newpwd1 != newpwd2)
            {
                $('.new-pwdmatch-error').removeClass('hidden');
                error_flag = true;
            }
            else
            {
                $('.new-pwdmatch-error').addClass('hidden');
            }
        }
        if(!error_flag)
        {
            $('#form-edit-password').submit();
        }
    }

    //DataTables search functionality
    $(document).ready( function () {
        $('.search-table').DataTable({
            'bStateSave': true,
            'fnStateSave': function (oSettings, oData) {
                localStorage.setItem('.search-table', JSON.stringify(oData));
            },
            'fnStateLoad': function (oSettings) {
                return JSON.parse(localStorage.getItem('.search-table'));
            }
        });
    });

    //Make sure all input fields are entered before submission
    function authenticate (form) {
        var empty = false;
        $('form :input:not(button)').each(function() {

            if ($(this).val() == '') {
                empty = true;
                $('.error-div').removeClass('hidden');
            }
            if (empty) return false;
        });
        if (empty) return;
        $(form).submit();
    }

    function saveObservation(tid, user, username){
        txtarea = "observation_"+tid;
        observation = $("#"+txtarea).val();

        $.ajax({
            type: 'POST',
            url:  '/culture/storeObservation',
            data: {obs: observation, testId: tid, userId: user, action: "add"},
            success: function(){
                drawCultureWorksheet(tid , user, username);
            }
        });
    }
    /**
     * Request a json string from the server containing contents of the culture_worksheet table for this test
     * and then draws a table based on this data.
     * @param  {int} tid      Test Id of the test
     * @param  {string} username Current user
     * @return {void}          No return
     */
    function drawCultureWorksheet(tid, user, username){
        console.log(username);
        $.getJSON('/culture/storeObservation', { testId: tid, userId: user, action: "draw"},
            function(data){
                var tableBody ="";
                $.each(data, function(index, elem){
                    tableBody += "<tr>"
                    +" <td>"+elem.timeStamp+" </td>"
                    +" <td>"+elem.user+"</td>"
                    +" <td>"+elem.observation+"</td>"
                    +" <td> </td>"
                    +"</tr>";
                });
                tableBody += "<tr>"
                    +"<td>0 seconds ago</td>"
                    +"<td>"+username+"</td>"
                    +"<td><textarea id='observation_"+tid+"' class='form-control result-interpretation' rows='2'></textarea></td>"
                    +"<td><a class='btn btn-xs btn-success' href='javascript:void(0)' onclick='saveObservation("+tid+", &quot;"+user+"&quot;, &quot;"+username+"&quot;)'>Save</a></td>"
                    +"</tr>";
                $("#tbbody_"+tid).html(tableBody);
            }
        );
    }

    /*Begin save drug susceptibility*/  
    function saveDrugSusceptibility(tid, oid){
        console.log(oid);
        var dataString = $("#drugSusceptibilityForm_"+oid).serialize();
        $.ajax({
            type: 'POST',
            url:  '/susceptibility/saveSusceptibility',
            data: dataString,
            success: function(){
                drawSusceptibility(tid, oid);
            }
        });
    }
    /*End save drug susceptibility*/
    /*Function to render drug susceptibility table after successfully saving the results*/
    function drawSusceptibility(tid, oid){
        $.getJSON('/susceptibility/saveSusceptibility', { testId: tid, organismId: oid, action: "results"},
            function(data){
                var tableRow ="";
                var tableBody ="";
                var suscept = "";
                $.each(data, function(index, elem){
                    tableRow += "<tr>"
                    +" <td>"+elem.drugName+" </td>"
                    +" <td>"+elem.zone+"</td>"
                    +" <td>"+elem.interpretation+"</td>"
                    +"</tr>";
                    suscept+=elem.drugName+" - "+elem.sensitivity+", ";
                });

                //$(".sense"+tid).val($(".sense"+tid).val()+elem.drugName+" - "+elem.sensitivity+", ");
                $(".sense"+tid).val(suscept);
                //tableBody +="<tbody>"+tableRow+"</tbody>";
                $( "#enteredResults_"+oid).html(tableRow);
                $("#submit_drug_susceptibility_"+oid).hide();
            }
        );
    }
    /*End drug susceptibility table rendering script*/
    /*Function to toggle possible isolates*/
    function toggle(className, obj){
        var $input = $(obj);
        if($input.prop('checked'))
            $(className).show();
        else
            $(className).hide();
    }
    /*End toggle function*/
    /*Toggle susceptibility tables*/
    function showSusceptibility(id){
        $('#drugSusceptibilityForm_'+id).toggle(this.checked);
    }
    /*End toggle susceptibility*/
    /* Fetch equipment details without page reload */
    function fetch_equipment_details()
    {
        $('#eq_con_details').html("");
        id = $("#client").val();
        if(id !='0')
        {
            $.getJSON('blisclient/details', { equip: id },
                function(data)
                {
                    var html = "<h4 class='text-center'>EQUIPMENT</h4>"+
                    "<div class='form-group'>"+
                    "<label for='equipment_name'>Equipment Name</label>"+
                    "<input type='text' class='form-control' id='equipment_name' value = '"+data.equipment_name+"'><input type='hidden' id = 'equipment_id' value = '"+data.id+"'>"+
                    "</div>"+
                    "<div class='form-group'>"+
                    "<label for='equipment_version'>Equipment Version</label>"+
                    "<input type='text' class='form-control' id='equipment_version' value = '"+data.equipment_version+"'>"+
                    "</div>"+
                    "<div class='form-group'>"+
                    "<label for='lab_section'>Lab Section</label>"+
                    "<input type='text' class='form-control' id='lab_section' value = '"+data.lab+"'>"+
                    "</div>"+
                    "<div class='form-group'>"+
                    "<label for='comm_type'>Communication Type</label>"+
                    "<input type='text' class='form-control' id='comm_type' value = '"+data.comm+"'>"+
                    "</div>"+
                    "<div class='form-group'>"+
                    "<label for='feed_source'>Feed Source</label>"+
                    "<input type='text' class='form-control' id='feed_source' value = '"+data.feed+"'>"+
                    "</div>"+
                    "<div class='form-group'>"+
                    "<label for='config_file'>Config File</label>"+
                    "<input type='text' class='form-control' id='config_file' value = '"+data.config_file+"'>"+
                    "</div>"+
                    "<h4 class='text-center'>"+data.feed+" CONFIGURATIONS</h4>";
                    $.getJSON('blisclient/properties', { client: id },
                        function(data)
                        {
                            $.each(data, function(index, elem)
                            {
                                html +=  "<div class='form-group'>"+
                                    "<label for='"+elem.config_prop+"'>"+elem.config_prop+"</label>"+
                                    "<input type='text' class='form-control' name = '"+elem.prop_id+"' value = '"+elem.prop_value+"'>"+
                                    "</div>";
                            });
                            html += "<div class='form-group actions-row'>"+
                                    "<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-cog' aria-hidden='true'></span> Generate Config File</button>"+
                                    "<button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Update Fields</button>"+
                                    "</div>";
                            $('#eq_con_details').html(html);
                        }
                    );
                }
            );
        }
    }

    /** HighCharts 
    function loadTurnAroundTime(){

        Highcharts.chart('trennnndsDiv', {

            title: {
                text: 'Daily TAT for HIV Tests'
            },

            subtitle: {
                text: 'Source: ALIS'
            },
            xAxis:{
                categories:data_resultset['x_axis']
            },

            yAxis: {
                title: {
                    text: 'Average Turn Around Time'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                   // pointStart: 1
                }
            },

            series: [{
                name: 'Targeted SANAS TAT',
                data: data_resultset['target_tat']
            }, {
                name: 'Analysis',
                data: data_resultset['testing_tat']
            }, {
                name: 'Patient Waiting Time',
                data: data_resultset['waiting_tat']
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

    });

    

}*/

