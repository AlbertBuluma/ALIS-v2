<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMicrobiologyFunctionalities extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('culture_observations', function(Blueprint $table)
		{
            $table->dropForeign('culture_observations_culture_duration_id_foreign');
			$table->dropColumn('culture_duration_id');
		});

		Schema::table('drug_susceptibility', function(Blueprint $table)
		{
			$table->dropColumn('zone');
		});

		Schema::table('drug_susceptibility', function(Blueprint $table)
		{
            $table->integer('zone_diameter')->unsigned()->nullable()->after('drug_susceptibility_measure_id');
		});

        Schema::create('gram_stain_ranges', function($table)
        {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('gram_stain_results', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->integer('gram_stain_range_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('test_id')->references('id')->on('unhls_tests');
            $table->foreign('gram_stain_range_id')->references('id')->on('gram_stain_ranges');
        });

        Schema::create('gram_break_points', function($table)
        {
            $table->increments('id');
            $table->integer('drug_id')->unsigned();
            $table->integer('gram_stain_range_id')->unsigned();
            $table->decimal('resistant_max', 4, 1)->nullable();
            $table->decimal('intermediate_min', 4, 1)->nullable();
            $table->decimal('intermediate_max', 4, 1)->nullable();
            $table->decimal('sensitive_min', 4, 1)->nullable();

            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreign('gram_stain_range_id')->references('id')->on('gram_stain_ranges');
        });

        /* gram drug susceptibility table */
        Schema::create('gram_drug_susceptibility', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('drug_id')->unsigned();
            $table->integer('gram_stain_result_id')->unsigned();
            $table->integer('drug_susceptibility_measure_id')->unsigned();
            $table->integer('zone_diameter')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreign('gram_stain_result_id')->references('id')->on('gram_stain_results');
            $table->foreign('drug_susceptibility_measure_id')->references('id')->on('drug_susceptibility_measures');
        });

        Schema::create('zone_diameters', function($table)
        {
            $table->increments('id');
            $table->integer('drug_id')->unsigned();
            $table->integer('organism_id')->unsigned();
            $table->decimal('resistant_max', 4, 1)->nullable();
            $table->decimal('intermediate_min', 4, 1)->nullable();
            $table->decimal('intermediate_max', 4, 1)->nullable();
            $table->decimal('sensitive_min', 4, 1)->nullable();

            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreign('organism_id')->references('id')->on('organisms');
        });

        // seeding on the go! STARTS HERE

        Eloquent::unguard();

        /* DISTRICT table */
        $districtsData = array(
            array("id" => \Config::get('constants.DISTRICT_ID'),
                'name' => \Config::get('constants.DISTRICT_NAME')
                ),
        );

        foreach ($districtsData as $district)
        {
            $districts[] = District::create($district);
        }
        echo "Districts seeded\n";

        District::create(['name' => 'Buikwe']);
        District::create(['name' => 'Bukomansimbi']);
        District::create(['name' => 'Butambala']);
        District::create(['name' => 'Buvuma']);
        District::create(['name' => 'Gomba']);
        District::create(['name' => 'Kalangala']);
        District::create(['name' => 'Kalungu']);
        District::create(['name' => 'Kayunga']);
        District::create(['name' => 'Kiboga']);
        District::create(['name' => 'Kyankwanzi']);
        District::create(['name' => 'Luweero']);
        District::create(['name' => 'Lwengo']);
        District::create(['name' => 'Lyantonde']);
        District::create(['name' => 'Masaka']);
        District::create(['name' => 'Mityana']);
        District::create(['name' => 'Mpigi']);
        District::create(['name' => 'Mubende']);
        District::create(['name' => 'Mukono']);
        District::create(['name' => 'Nakaseke']);
        District::create(['name' => 'Nakasongola']);
        District::create(['name' => 'Rakai']);
        District::create(['name' => 'Ssembabule']);
        District::create(['name' => 'Wakiso']);
        District::create(['name' => 'Amuria']);
        District::create(['name' => 'Budaka']);
        District::create(['name' => 'Bududa']);
        District::create(['name' => 'Bugiri']);
        District::create(['name' => 'Bukedea']);
        District::create(['name' => 'Bukwa']);
        District::create(['name' => 'Bulambuli']);
        District::create(['name' => 'Busia']);
        District::create(['name' => 'Butaleja']);
        District::create(['name' => 'Buyende']);
        District::create(['name' => 'Iganga']);
        District::create(['name' => 'Jinja']);
        District::create(['name' => 'Kaberamaido']);
        District::create(['name' => 'Kaliro']);
        District::create(['name' => 'Kamuli']);
        District::create(['name' => 'Kapchorwa']);
        District::create(['name' => 'Katakwi']);
        District::create(['name' => 'Kibuku']);
        District::create(['name' => 'Kumi']);
        District::create(['name' => 'Kween']);
        District::create(['name' => 'Luuka']);
        District::create(['name' => 'Manafwa']);
        District::create(['name' => 'Mayuge']);
        District::create(['name' => 'Mbale']);
        District::create(['name' => 'Namayingo']);
        District::create(['name' => 'Namutumba']);
        District::create(['name' => 'Ngora']);
        District::create(['name' => 'Pallisa']);
        District::create(['name' => 'Serere']);
        District::create(['name' => 'Sironko']);
        District::create(['name' => 'Soroti']);
        District::create(['name' => 'Tororo']);
        District::create(['name' => 'Abim']);
        District::create(['name' => 'Adjumani']);
        District::create(['name' => 'Agago']);
        District::create(['name' => 'Alebtong']);
        District::create(['name' => 'Amolatar']);
        District::create(['name' => 'Amudat']);
        District::create(['name' => 'Amuru']);
        District::create(['name' => 'Apac']);
        District::create(['name' => 'Arua']);
        District::create(['name' => 'Dokolo']);
        District::create(['name' => 'Gulu']);
        District::create(['name' => 'Kaabong']);
        District::create(['name' => 'Kitgum']);
        District::create(['name' => 'Koboko']);
        District::create(['name' => 'Kole']);
        District::create(['name' => 'Kotido']);
        District::create(['name' => 'Lamwo']);
        District::create(['name' => 'Lira']);
        District::create(['name' => 'Maracha']);
        District::create(['name' => 'Moroto']);
        District::create(['name' => 'Moyo']);
        District::create(['name' => 'Nakapiripirit']);
        District::create(['name' => 'Napak']);
        District::create(['name' => 'Nebbi']);
        District::create(['name' => 'Nwoya']);
        District::create(['name' => 'Otuke']);
        District::create(['name' => 'Oyam']);
        District::create(['name' => 'Pader']);
        District::create(['name' => 'Yumbe']);
        District::create(['name' => 'Zombo']);
        District::create(['name' => 'Buhweju']);
        District::create(['name' => 'Buliisa']);
        District::create(['name' => 'Bundibugyo']);
        District::create(['name' => 'Bushenyi']);
        District::create(['name' => 'Hoima']);
        District::create(['name' => 'Ibanda']);
        District::create(['name' => 'Isingiro']);
        District::create(['name' => 'Kabale']);
        District::create(['name' => 'Kabarole']);
        District::create(['name' => 'Kamwenge']);
        District::create(['name' => 'Kanungu']);
        District::create(['name' => 'Kasese']);
        District::create(['name' => 'Kibaale']);
        District::create(['name' => 'Kiruhura']);
        District::create(['name' => 'Kiryandongo']);
        District::create(['name' => 'Kisoro']);
        District::create(['name' => 'Kyegegwa']);
        District::create(['name' => 'Kyenjojo']);
        District::create(['name' => 'Masindi']);
        District::create(['name' => 'Mbarara']);
        District::create(['name' => 'Mitooma']);
        District::create(['name' => 'Ntoroko']);
        District::create(['name' => 'Ntungamo']);
        District::create(['name' => 'Rubirizi']);
        District::create(['name' => 'Rukungiri']);
        District::create(['name' => 'Sheema']);
        District::create(['name' => 'Omoro']);
        District::create(['name' => 'Kagadi']);
        District::create(['name' => 'Kakumiro']);
        District::create(['name' => 'Rubanda']);
        District::create(['name' => 'Bukwo']);
        echo "Other Districts seeded\n";


        /* Facility Ownership table */
        $facilityownershipsData = array(
            array("owner" => "Public"),
            array("owner" => "PFP"),
            array("owner" => "PNFP"),
            array("owner" => "Other"),

        );

        foreach ($facilityownershipsData as $facilityownership)
        {
            $facilityownerships[] = UNHLSFacilityOwnership::create($facilityownership);
        }
        echo "Facility Ownerships seeded\n";


        /* Facility Levels table */
        $facilitylevelsData = array(
            array("level" => "Public NRH"),
            array("level" => "Public RRH"),
            array("level" => "Public GH"),
            array("level" => "Public HCIV"),
            array("level" => "Public HCIII"),
            array("level" => "Hospital"),
        );

        foreach ($facilitylevelsData as $facilitylevel)
        {
            $facilitylevels[] = UNHLSFacilityLevel::create($facilitylevel);
        }
        echo "Facility Levels seeded\n";


        /* Facility table */
        $facilitysData = array(
            array("id" => \Config::get('constants.FACILITY_ID'),
                'name' => \Config::get('constants.FACILITY_NAME'),
                'district_id' => \Config::get('constants.DISTRICT_ID'),
                'code' => \Config::get('constants.FACILITY_CODE'),
                'level_id' => \Config::get('constants.FACILITY_LEVEL_ID'),
                'ownership_id' => \Config::get('constants.FACILITY_OWNERSHIP_ID')
                ),
        );

        foreach ($facilitysData as $facility)
        {
            $facilitys[] = UNHLSFacility::create($facility);
        }
        echo "Facility seeded\n";


        /* Users table */
        $usersData = array(
            array(
                "username" => "administrator", "password" => Hash::make("password"),
                "email" => "", "name" => "A-LIS Admin", "designation" => "Systems Administrator",
                "facility_id" => \Config::get('constants.FACILITY_ID')
            ),
        );

        foreach ($usersData as $user)
        {
            $users[] = User::create($user);
        }
        echo "users seeded\n";



        /* BB Actions table */
        $bbactionsData = array(
            array("actionname" => "Reported to administration for further action"),
            array("actionname" => "Referred to mental department"),
            array("actionname" => "Gave first aid (e.g. arrested bleeding)"),
            array("actionname" => "Referred to clinician for further management"),
            array("actionname" => "Conducted risk assessment"),
            array("actionname" => "Intervened to interrupt/arrest progress of incident (e.g. Used neutralizing agent, stopping a fight)"),
            array("actionname" => "Disposed off broken container to designated waste bin/sharps"),
            array("actionname" => "Patient sample taken & referred to testing lab Isolated suspected patient"),
            array("actionname" => "Reported to or engaged national level BRM for intervention"),
            array("actionname" => "Victim counseled"),
            array("actionname" => "Contacted Police"),
            array("actionname" => "Used spill kit"),
            array("actionname" => "Administered PEP"),
            array("actionname" => "Referred to disciplinary committee"),
            array("actionname" => "Contained the spillage"),
            array("actionname" => "Disinfected the place"),
            array("actionname" => "Switched off the Electricity Mains"),
            array("actionname" => "Washed punctured area"),
            array("actionname" => "Others"),
        );

        foreach ($bbactionsData as $bbaction)
        {
            $bbactions[] = BbincidenceAction::create($bbaction);
        }
        echo "BB Actions seeded\n";


        /* BB Causes table */
        $bbcausesData = array(
            array("causename" => "Defective Equipment"),
            array("causename" => "Hazardous Chemicals"),
            array("causename" => "Unsafe Procedure"),
            array("causename" => "Psychological causes (e.g. emotional condition, depression, mental confusion)"),
            array("causename" => "Unsafe storage of laboratory chemicals"),
            array("causename" => "Lack of Skill or Knowledge"),
            array("causename" => "Lack of Personal Protective Equipment"),
            array("causename" => "Unsafe Working Environment"),
            array("causename" => "Lack of Adequate Physical Security"),
            array("causename" => "Unsafe location of laboratory equipment"),
            array("causename" => "Other"),
        );

        foreach ($bbcausesData as $bbcause)
        {
            $bbcauses[] = BbincidenceCause::create($bbcause);
        }
        echo "BB Causes seeded\n";

        /* BB Natures table */
        $bbnaturesData = array(
            array("name"=>"Assault/Fight among staff","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Fainting","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Roof leakages","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Machine cuts/bruises","class"=>"Mechanical","priority"=>"Minor"),
            array("name"=>"Electric shock/burn","class"=>"Mechanical","priority"=>"Major"),
            array("name"=>"Death within lab","class"=>"Ergonometric and Medical","priority"=>"Major"),
            array("name"=>"Slip or fall","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Unnecessary destruction of lab material","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Theft of laboratory consumables","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Breakage of sample container","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Prick/cut by unused sharps","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Injury caused by laboratory objects","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Chemical burn","class"=>"Chemical","priority"=>"Minor"),
            array("name"=>"Theft of chemical","class"=>"Chemical","priority"=>"Minor"),
            array("name"=>"Chemical spillage","class"=>"Chemical","priority"=>"Major"),
            array("name"=>"Theft of equipment","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Attack on the Lab","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Collapsing building","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Bike rider accident","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Fire","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Needle prick or cuts by used sharps","class"=>"Biological","priority"=>"Minor"),
            array("name"=>"Sample spillage","class"=>"Biological","priority"=>"Minor"),
            array("name"=>"Theft of samples","class"=>"Biological","priority"=>"Major"),
            array("name"=>"Contact with VHF suspect","class"=>"Biological","priority"=>"Major"),
            array("name"=>"Contact with radiological materials","class"=>"Radiological","priority"=>"Major"),
            array("name"=>"Theft of radiological materials","class"=>"Radiological","priority"=>"Major"),
            array("name"=>"Poor disposal of radiological materials","class"=>"Radiological","priority"=>"Major"),
            array("name"=>"Poor vision from inadequate light","class"=>"Ergonometric and Medical","priority"=>"Minor"),
            array("name"=>"Back pain from posture effects","class"=>"Ergonometric and Medical","priority"=>"Minor"),
            array("name"=>"Other occupational hazard","class"=>"Ergonometric and Medical","priority"=>"Minor"),
            array("name"=>"Other","class"=>"Other","priority"=>"Other"),
        );

        foreach ($bbnaturesData as $bbnature)
        {
            $bbnatures[] = BbincidenceNature::create($bbnature);
        }
        echo "BB Natures seeded\n";


        /* Test Phase table */
        $test_phases = array(
          array("id" => "1", "name" => "Pre-Analytical"),
          array("id" => "2", "name" => "Analytical"),
          array("id" => "3", "name" => "Post-Analytical")
        );
        foreach ($test_phases as $test_phase)
        {
            TestPhase::create($test_phase);
        }
        echo "test_phases seeded\n";

        /* Test Status table */
        $test_statuses = array(
          array("id" => "1","name" => "not-received","test_phase_id" => "1"),//Pre-Analytical
          array("id" => "2","name" => "pending","test_phase_id" => "1"),//Pre-Analytical
          array("id" => "3","name" => "started","test_phase_id" => "2"),//Analytical
          array("id" => "4","name" => "completed","test_phase_id" => "3"),//Post-Analytical
          array("id" => "5","name" => "verified","test_phase_id" => "3"),//Post-Analytical
          array("id" => "6","name" => "specimen-rejected-at-analysis","test_phase_id" => "3")//Analytical
        );
        foreach ($test_statuses as $test_status)
        {
            TestStatus::create($test_status);
        }
        echo "test_statuses seeded\n";

        /* Specimen Status table */
        $specimen_statuses = array(
          array("id" => "1", "name" => "specimen-not-collected"),//Pre-Analytical
          array("id" => "2", "name" => "specimen-accepted"),//Pre-Analytical
          array("id" => "3", "name" => "specimen-rejected")//Pre-Analytical
        );
        foreach ($specimen_statuses as $specimen_status)
        {
            SpecimenStatus::create($specimen_status);
        }
        echo "specimen_statuses seeded\n";

        /* Rejection Reasons table */
        $rejection_reasons_array = array(
          array("reason" => "Inadequate sample volume"),
          array("reason" => "Haemolysed sample"),
          array("reason" => "Specimen without lab request form"),
          array("reason" => "No test ordered on  lab request form of sample"),
          array("reason" => "No sample label or identifier"),
          array("reason" => "Wrong sample label"),
          array("reason" => "Unclear sample label"),
          array("reason" => "Sample in wrong container"),
          array("reason" => "Damaged/broken/leaking sample container"),
          array("reason" => "Too old sample"),
          array("reason" => "Date of sample collection not specified"),
          array("reason" => "Time of sample collection not specified"),
          array("reason" => "Improper transport media"),
          array("reason" => "Sample type unacceptable for required test"),
          array("reason" => "Other"),

        );
        foreach ($rejection_reasons_array as $rejection_reason)
        {
            $rejection_reasons[] = RejectionReason::create($rejection_reason);
        }
        echo "rejection_reasons seeded\n";


        /* Permissions table */
        $permissions = array(

            array("name" => "manage_incidents", "display_name" => "Can Manage Biorisk & Biosecurity Incidents"),
            array("name" => "register_incident", "display_name" => "Can Register BB Incidences"),
            array("name" => "summary_log", "display_name" => "Can view BB summary log"),
            array("name" => "facility_report", "display_name" => "Can create faility BB report"),

            array("name" => "view_names", "display_name" => "Can view patient names"),
            array("name" => "manage_patients", "display_name" => "Can add patients"),

            array("name" => "receive_external_test", "display_name" => "Can receive test requests"),
            array("name" => "request_test", "display_name" => "Can request new test"),
            array("name" => "accept_test_specimen", "display_name" => "Can accept test specimen"),
            array("name" => "reject_test_specimen", "display_name" => "Can reject test specimen"),
            array("name" => "change_test_specimen", "display_name" => "Can change test specimen"),
            array("name" => "start_test", "display_name" => "Can start tests"),
            array("name" => "enter_test_results", "display_name" => "Can enter tests results"),
            array("name" => "edit_test_results", "display_name" => "Can edit test results"),
            array("name" => "verify_test_results", "display_name" => "Can verify test results"),
            array("name" => "send_results_to_external_system", "display_name" => "Can send test results to external systems"),
            array("name" => "refer_specimens", "display_name" => "Can refer specimens"),

            array("name" => "manage_users", "display_name" => "Can manage users"),
            array("name" => "manage_test_catalog", "display_name" => "Can manage test catalog"),
            array("name" => "manage_lab_configurations", "display_name" => "Can manage lab configurations"),
            array("name" => "view_reports", "display_name" => "Can view reports"),
            array("name" => "manage_inventory", "display_name" => "Can manage inventory"),
            array("name" => "request_topup", "display_name" => "Can request top-up"),
            array("name" => "manage_qc", "display_name" => "Can manage Quality Control")
        );

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        echo "Permissions table seeded\n";

        /* Roles table */
        $roles = array(
            array("name" => "Superadmin"),
            array("name" => "Technologist"),
            array("name" => "Receptionist")
        );
        foreach ($roles as $role) {
            Role::create($role);
        }
        echo "Roles table seeded\n";

        $user1 = User::find(1);
        $role1 = Role::find(1);
        $permissions = Permission::all();

        //Assign all permissions to role administrator
        foreach ($permissions as $permission) {
            $role1->attachPermission($permission);
        }
        //Assign role Administrator to user 1 administrator
        $user1->attachRole($role1);

        $barcode = array("encoding_format" => 'code39', "barcode_width" => '2', "barcode_height" => '30', "text_size" => '11');
        Barcode::create($barcode);
        echo "Barcode table seeded\n";

        /* Specimen Types table */
        $specimenTypeAsciticTap = SpecimenType::create(["name" => "Ascitic Tap"]);
        $specimenTypeDriedBloodSpot = SpecimenType::create(["name" => "Dried Blood Spot"]);
        $specimenTypeNasalSwab = SpecimenType::create(["name" => "Nasal Swab"]);
        $specimenTypePleuralTap = SpecimenType::create(["name" => "Pleural Tap"]);
        $specimenTypeRectalSwab = SpecimenType::create(["name" => "Rectal Swab"]);
        $specimenTypeSemen = SpecimenType::create(["name" => "Semen"]);
        $specimenTypeSkin = SpecimenType::create(["name" => "Skin"]);
        $specimenTypeVomitus = SpecimenType::create(["name" => "Vomitus"]);// should this be kept given there is sputum
        $specimenTypeSynovialFluid = SpecimenType::create(["name" => "Synovial Fluid"]);
        $specimenTypeUrethralSmear = SpecimenType::create(["name" => "Urethral Smear"]);
        $specimenTypeVaginalSmear = SpecimenType::create(["name" => "Vaginal Smear"]);
        $specimenTypeWater = SpecimenType::create(["name" => "Water"]);

        // microb-able specimen types
        $specimenTypeStool = SpecimenType::create(["name" => "Stool"]);
        $specimenTypeCSF = SpecimenType::create(["name" => "CSF"]);
        $specimenTypeWoundSwab = SpecimenType::create(["name" => "Wound swab"]);
        $specimenTypePusSwab = SpecimenType::create(["name" => "Pus swab"]);
        $specimenTypeHVS = SpecimenType::create(["name" => "HVS"]);
        $specimenTypeEyeSwab = SpecimenType::create(["name" => "Eye swab"]);
        $specimenTypeEarSwab = SpecimenType::create(["name" => "Ear swab"]);
        $specimenTypeThroatSwab = SpecimenType::create(["name" => "Throat swab"]);
        $specimenTypeAspirates = SpecimenType::create(["name" => "Pus Aspirate"]);
        $specimenTypeBlood = SpecimenType::create(["name" => "Blood"]);
        $specimenTypeBAL = SpecimenType::create(["name" => "BAL"]);
        $specimenTypeSputum = SpecimenType::create(["name" => "Sputum"]);
        $specimenTypeUretheralSwab = SpecimenType::create(["name" => "Uretheral swab"]);
        $specimenTypeUrine = SpecimenType::create(["name" => "Urine"]);


        echo "specimen_types seeded\n";

        /* Test Categories table - These map on to the lab sections */
        $test_categories = TestCategory::create(array("name" => "PARASITOLOGY","description" => ""));
        $testTypeCategoryMicrobiology = TestCategory::create(array("name" => "MICROBIOLOGY","description" => ""));
        $testTypeCategoryHematology = TestCategory::create(array("name" => "HEMATOLOGY","description" => ""));
        $testTypeCategorySerology = TestCategory::create(array("name" => "SEROLOGY","description" => ""));
        $testTypeCategoryTransfusion = TestCategory::create(array("name" => "BLOOD TRANSFUSION","description" => ""));
        echo "Lab Sections seeded\n";


        /* Measure Types */
        $measureTypes = array(
            array("id" => "1", "name" => "Numeric Range"),
            array("id" => "2", "name" => "Alphanumeric Values"),
            array("id" => "3", "name" => "Autocomplete"),
            array("id" => "4", "name" => "Free Text")
        );

        foreach ($measureTypes as $measureType)
        {
            MeasureType::create($measureType);
        }
        echo "measure_types seeded\n";

        /* Measures table */
        $measureHIV = array(
            array("measure_type_id" => "2","name" => "Screening", "unit" => ""),
            array("measure_type_id" => "2", "name" => "Confirmatory Test (Statpak)", "unit" => ""),
            array("measure_type_id" => "2", "name" => "Unigold", "unit" =>"")
            );

        foreach($measureHIV as $measureH){
            $measuresHIV[] = Measure::create($measureH);
        }

        $measureBSforMPS = Measure::create(array("measure_type_id" => "2", "name" => "BS for mps", "unit" => ""));

        foreach ($measuresHIV as $key => $measure) {
            MeasureRange::create(array("measure_id" => $measure->id, "alphanumeric" => "Reactive", "interpretation" => ""));
            MeasureRange::create(array("measure_id" => $measure->id, "alphanumeric" => "Non-Reactive", "interpretation" => ""));
        }
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "No mps seen", "interpretation" => "Negative"));
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "+", "interpretation" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "++", "interpretation" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "+++", "interpretation" => "Positive"));

        $measureGXM = Measure::create(array("measure_type_id" => "4", "name" => "GXM", "unit" => ""));
        $measureBloodGroup = Measure::create(
            array("measure_type_id" => "2",
                "name" => "Blood Grouping",
                "unit" => ""));
        MeasureRange::create(array("measure_id" => $measureBloodGroup->id, "alphanumeric" => "O-"));
        MeasureRange::create(array("measure_id" => $measureBloodGroup->id, "alphanumeric" => "O+"));
        MeasureRange::create(array("measure_id" => $measureBloodGroup->id, "alphanumeric" => "A-"));
        MeasureRange::create(array("measure_id" => $measureBloodGroup->id, "alphanumeric" => "A+"));
        MeasureRange::create(array("measure_id" => $measureBloodGroup->id, "alphanumeric" => "B-"));
        MeasureRange::create(array("measure_id" => $measureBloodGroup->id, "alphanumeric" => "B+"));
        MeasureRange::create(array("measure_id" => $measureBloodGroup->id, "alphanumeric" => "AB-"));
        MeasureRange::create(array("measure_id" => $measureBloodGroup->id, "alphanumeric" => "AB+"));
        $measureHB = Measure::create(array("measure_type_id" => Measure::NUMERIC, "name" => "HB",
            "unit" => "g/dL"));

        $measuresUrinalysisData = array(
            // Urine Microscopy
            array("measure_type_id" => "4", "name" => "Pus cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "S. haematobium", "unit" => ""),
            array("measure_type_id" => "4", "name" => "T. vaginalis", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Yeast cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Red blood cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Bacteria", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Spermatozoa", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Epithelial cells", "unit" => ""),
            // Urine Chemistry
            array("measure_type_id" => "4", "name" => "Glucose", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Ketones", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Proteins", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Blood", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Bilirubin", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Urobilinogen Phenlpyruvic acid", "unit" => ""),
            array("measure_type_id" => "4", "name" => "pH", "unit" => "")
            );

        foreach ($measuresUrinalysisData as $measureU) {
            $measuresUrinalysis[] = Measure::create($measureU);
        }

        $measuresWBCData = array(
            array("measure_type_id" => Measure::NUMERIC, "name" => "WBC",
                "unit" => "x10³/µL"),
            array("measure_type_id" => Measure::NUMERIC, "name" => "Lym", "unit" => "L"),
            array("measure_type_id" => Measure::NUMERIC, "name" => "Mon", "unit" => "*"),
            array("measure_type_id" => Measure::NUMERIC, "name" => "Neu", "unit" => "*"),
            array("measure_type_id" => Measure::NUMERIC, "name" => "Eos", "unit" => ""),
            array("measure_type_id" => Measure::NUMERIC, "name" => "Baso", "unit" => ""),
            );

        foreach ($measuresWBCData as $value) {
            $measuresWBC[] = Measure::create($value);
        }

        $measureRangesWBC = array(
            array("measure_id" => $measuresWBC[0]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 4, "range_upper" => 11),
            array("measure_id" => $measuresWBC[1]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 1.5, "range_upper" => 4),
            array("measure_id" => $measuresWBC[2]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 0.1, "range_upper" => 9),
            array("measure_id" => $measuresWBC[3]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 2.5, "range_upper" => 7),
            array("measure_id" => $measuresWBC[4]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 0, "range_upper" => 6),
            array("measure_id" => $measuresWBC[5]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 0, "range_upper" => 2),
            );

        foreach ($measureRangesWBC as $value) {
            MeasureRange::create($value);
        }

        echo "measures seeded\n";

        /* Test Types table */
        $testTypeHIV = TestType::create(array("name" => "HIV", "test_category_id" => $testTypeCategorySerology ->id, "orderable_test" => 1));
        $testTypeBS = TestType::create(array("name" => "BS for mps", "test_category_id" => $test_categories->id, "orderable_test" => 1));
        $testTypeGXM = TestType::create(array("name" => "GXM", "test_category_id" => $test_categories->id));
        $testTypeHB = TestType::create(array("name" => "HB", "test_category_id" => $test_categories->id, "orderable_test" => 1));
        $testTypeUrinalysis = TestType::create(array("name" => "Urinalysis", "test_category_id" => $test_categories->id));
        $testTypeWBC = TestType::create(array("name" => "WBC", "test_category_id" => $test_categories->id));

        echo "test_types seeded\n";

        /* TestType Measure table */
        foreach ($measuresHIV as $value) {
            TestTypeMeasure::create(array("test_type_id" => $testTypeHIV->id, "measure_id" => $value->id));
        }
        TestTypeMeasure::create(array("test_type_id" => $testTypeBS->id, "measure_id" => $measureBSforMPS->id));
        TestTypeMeasure::create(array("test_type_id" => $testTypeGXM->id, "measure_id" => $measureGXM->id));
        TestTypeMeasure::create(array("test_type_id" => $testTypeGXM->id, "measure_id" => $measureBloodGroup->id));
        TestTypeMeasure::create(array("test_type_id" => $testTypeHB->id, "measure_id" => $measureHB->id));

        foreach ($measuresUrinalysis as $value) {
            TestTypeMeasure::create(array("test_type_id" => $testTypeUrinalysis->id, "measure_id" => $value->id));
        }

        foreach ($measuresWBC as $value) {
            TestTypeMeasure::create(array("test_type_id" => $testTypeWBC->id, "measure_id" => $value->id));
        }

        echo "testtype_measures seeded\n";

        /* testtype_specimentypes table */
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeHIV->id, "specimen_type_id" => $specimenTypeBlood->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeBS->id, "specimen_type_id" => $specimenTypeBlood->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeGXM->id, "specimen_type_id" => $specimenTypeBlood->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeHB->id, "specimen_type_id" => $specimenTypeBlood->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeHB->id, "specimen_type_id" => $specimenTypeNasalSwab->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeHB->id, "specimen_type_id" => $specimenTypePleuralTap->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeHB->id, "specimen_type_id" => $specimenTypeVomitus->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeWBC->id, "specimen_type_id" => $specimenTypeBlood->id));

        echo "testtype_specimentypes seeded\n";

        /* Instruments table */
        $instrumentsData = array(
            "name" => "Celltac F Mek 8222",
            "description" => "Automatic analyzer with 22 parameters and WBC 5 part diff Hematology Analyzer",
            "driver_name" => "KBLIS\\Plugins\\CelltacFMachine",
            "ip" => "192.168.1.12",
            "hostname" => "HEMASERVER"
        );

        $instrument = Instrument::create($instrumentsData);
        $instrument->testTypes()->attach(array($testTypeWBC->id));

        echo "Instruments table seeded\n";

        /* Test Types for prevalence */
        $test_types_salmonella = TestType::create(array("name" => "Salmonella Antigen Test", "test_category_id" => $test_categories->id));
        $test_types_direct = TestType::create(array("name" => "Direct COOMBS Test", "test_category_id" => $testTypeCategoryTransfusion->id));
        $test_types_du = TestType::create(array("name" => "DU Test", "test_category_id" => $testTypeCategoryTransfusion->id));
        $test_types_sickling = TestType::create(array("name" => "Sickling Test", "test_category_id" => $testTypeCategoryHematology->id));
        $test_types_borrelia = TestType::create(array("name" => "Borrelia", "test_category_id" => $test_categories->id));
        $test_types_vdrl = TestType::create(array("name" => "VDRL", "test_category_id" => $testTypeCategorySerology->id));
        $test_types_pregnancy = TestType::create(array("name" => "Pregnancy Test", "test_category_id" => $testTypeCategorySerology->id));
        $test_types_brucella = TestType::create(array("name" => "Brucella", "test_category_id" => $testTypeCategorySerology->id));
        $test_types_pylori = TestType::create(array("name" => "H. Pylori", "test_category_id" => $testTypeCategorySerology->id));

        echo "Test Types seeded\n";

        /* Test Types and specimen types relationship for prevalence */
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)',
            array($test_types_salmonella->id, $specimenTypeBlood->id));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)',
            array($test_types_direct->id, $specimenTypeBlood->id));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)',
            array($test_types_du->id, $specimenTypeBlood->id));
         DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)',
            array($test_types_sickling->id, $specimenTypeBlood->id));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)',
            array($test_types_borrelia->id, $specimenTypeUrine->id));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)',
            array($test_types_vdrl->id, $specimenTypeBlood->id));
         DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)',
            array($test_types_pregnancy->id, $specimenTypeUrine->id));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)',
            array($test_types_brucella->id, $specimenTypeBlood->id));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)',
            array($test_types_pylori->id, $specimenTypeStool->id));
        echo "TestTypes/SpecimenTypes seeded\n";

        /*New measures for prevalence*/
        $measure_salmonella = Measure::create(array("measure_type_id" => "2", "name" => "Salmonella Antigen Test", "unit" => ""));
        $measure_direct = Measure::create(array("measure_type_id" => "2", "name" => "Direct COOMBS Test", "unit" => ""));
        $measure_du = Measure::create(array("measure_type_id" => "2", "name" => "Du Test", "unit" => ""));
        $measure_sickling = Measure::create(array("measure_type_id" => "2", "name" => "Sickling Test", "unit" => ""));
        $measure_borrelia = Measure::create(array("measure_type_id" => "2", "name" => "Borrelia", "unit" => ""));
        $measure_vdrl = Measure::create(array("measure_type_id" => "2", "name" => "VDRL", "unit" => ""));
        $measure_pregnancy = Measure::create(array("measure_type_id" => "2", "name" => "Pregnancy Test", "unit" => ""));
        $measure_brucella = Measure::create(array("measure_type_id" => "2", "name" => "Brucella", "unit" => ""));
        $measure_pylori = Measure::create(array("measure_type_id" => "2", "name" => "H. Pylori", "unit" => ""));
        MeasureRange::create(array("measure_id" => $measure_salmonella->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_salmonella->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_direct->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_direct->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_du->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_du->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_sickling->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_sickling->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_borrelia->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_borrelia->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_vdrl->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_vdrl->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_pregnancy->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_pregnancy->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_brucella->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_brucella->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_pylori->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_pylori->id, "alphanumeric" => "Negative"));
        echo "Measures seeded again\n";

        /* TestType Measure for prevalence */
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_salmonella->id, "measure_id" => $measure_salmonella->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_direct->id, "measure_id" => $measure_direct->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_du->id, "measure_id" => $measure_du->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_sickling->id, "measure_id" => $measure_sickling->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_borrelia->id, "measure_id" => $measure_borrelia->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_vdrl->id, "measure_id" => $measure_vdrl->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_pregnancy->id, "measure_id" => $measure_pregnancy->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_brucella->id, "measure_id" => $measure_brucella->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_pylori->id, "measure_id" => $measure_pylori->id));
        echo "Test Type Measures seeded again\n";

        //Seed for diseases
        $malaria = Disease::create(array('name' => "Malaria"));
        $typhoid = Disease::create(array('name' => "Typhoid"));
        $dysentry = Disease::create(array('name' => "Shigella Dysentry"));

        echo "Dieases table seeded\n";

        $cBCMeasureID = [];

        $measureWBC = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "WBC", "unit" => "x10³/µL"]);
        $measureRBC = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "RBC", "unit" => "x10⁶/µL"]);
        $measureHGB = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "HGB", "unit" => "g/dL"]);
        $measureHCT = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "HCT", "unit" => "%"]);
        $measureMCV = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MCV", "unit" => "fL"]);
        $measureMCH = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MCH", "unit" => "pg"]);
        $measureMCHC = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MCHC", "unit" => "g/dL"]);
        $measurePLT = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "PLT", "unit" => "x10³/µL"]);
        $measureRDWSD = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "RDW-SD", "unit" => "fL"]);
        $measureRDWCV = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "RDW-CV", "unit" => "%"]);
        $measurePDW = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "PDW", "unit" => "fL"]);
        $measureMPV = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MPV", "unit" => "fL"]);
        $measurePLCR = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "P-LCR", "unit" => "%"]);
        $measurePCT = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "PCT", "unit" => "%"]);
        $measureNEUThash = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "NEUT#", "unit" => "x10³/µL"]);
        $measureLYMPHhash = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "LYMPH#", "unit" => "x10³/µL"]);
        $measureMONOhash = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MONO#", "unit" => "x10³/µL"]);
        $measureEOhash = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "EO#", "unit" => "x10³/µL"]);
        $measureBASOhash = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "BASO#", "unit" => "x10³/µL"]);
        $measureNEUTpercent = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "NEUT%", "unit" => "%"]);
        $measureLYMPHpercent = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "LYMPH%", "unit" => "%"]);
        $measureMONOpercent = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MONO%", "unit" => "%"]);
        $measureEOpercent = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "EO%", "unit" => "%"]);
        $measureBASOpercent = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "BASO%", "unit" => "%"]);

        $cBCMeasureID[] = $measureWBC->id;
        $cBCMeasureID[] = $measureRBC->id;
        $cBCMeasureID[] = $measureHGB->id;
        $cBCMeasureID[] = $measureHCT->id;
        $cBCMeasureID[] = $measureMCV->id;
        $cBCMeasureID[] = $measureMCH->id;
        $cBCMeasureID[] = $measureMCHC->id;
        $cBCMeasureID[] = $measurePLT->id;
        $cBCMeasureID[] = $measureRDWSD->id;
        $cBCMeasureID[] = $measureRDWCV->id;
        $cBCMeasureID[] = $measurePDW->id;
        $cBCMeasureID[] = $measureMPV->id;
        $cBCMeasureID[] = $measurePLCR->id;
        $cBCMeasureID[] = $measurePCT->id;
        $cBCMeasureID[] = $measureNEUThash->id;
        $cBCMeasureID[] = $measureLYMPHhash->id;
        $cBCMeasureID[] = $measureMONOhash->id;
        $cBCMeasureID[] = $measureEOhash->id;
        $cBCMeasureID[] = $measureBASOhash->id;
        $cBCMeasureID[] = $measureNEUTpercent->id;
        $cBCMeasureID[] = $measureLYMPHpercent->id;
        $cBCMeasureID[] = $measureMONOpercent->id;
        $cBCMeasureID[] = $measureEOpercent->id;
        $cBCMeasureID[] = $measureBASOpercent->id;


        $testTypeCBC = TestType::create(array("name" => "CBC", "test_category_id" => $testTypeCategoryHematology->id,
            "orderable_test" => 1));

        /* testtype_specimentypes table */
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCBC->id, "specimen_type_id" => $specimenTypeBlood->id]);

        /* TestType Measure table */
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureWBC->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureRBC->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureHGB->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureHCT->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMCV->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMCH->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMCHC->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measurePLT->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureRDWSD->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureRDWCV->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measurePDW->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMPV->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measurePLCR->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measurePCT->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureNEUThash->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureLYMPHhash->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMONOhash->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureEOhash->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureBASOhash->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureNEUTpercent->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureLYMPHpercent->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMONOpercent->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureEOpercent->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureBASOpercent->id]);

        $measureRangeCBCGroup1 = [
            "age_min" => "0",
            "age_max" => "0.01923",
            "gender" => MeasureRange::BOTH,
            "range_lower" => [3,2.5,12,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,16,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup2 = [
            "age_min" => "0.01923",
            "age_max" => "0.08333",
            "gender" => MeasureRange::BOTH,
            "range_lower" => [3,2.5,8,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,17,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup3 = [
            "age_min" => "0.08333",
            "age_max" => "1",
            "gender" => MeasureRange::BOTH,
            "range_lower" => [3,2.5,8,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,17,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup4 = [
            "age_min" => "1",
            "age_max" => "12",
            "gender" => MeasureRange::BOTH,
            "range_lower" => [3,2.5,8,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,17,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup5 = [
            "age_min" => "12",
            "age_max" => "60",
            "gender" => MeasureRange::MALE,
            "range_lower" => [3,2.5,13,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,17,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup6 = [
            "age_min" => "12",
            "age_max" => "60",
            "gender" => MeasureRange::FEMALE,
            "range_lower" => [4,2.5,12,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [11,5.5,14,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup7 = [
            "age_min" => "60",
            "age_max" => "999",
            "gender" => MeasureRange::BOTH,
            "range_lower" => [3,2.5,8,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,17,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];

        for ($i = 0; $i <= 23; $i++) {
            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup1["age_min"],
                "age_max" => $measureRangeCBCGroup1["age_max"],
                "gender" => $measureRangeCBCGroup1["gender"],
                "range_lower" => $measureRangeCBCGroup1["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup1["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup2["age_min"],
                "age_max" => $measureRangeCBCGroup2["age_max"],
                "gender" => $measureRangeCBCGroup2["gender"],
                "range_lower" => $measureRangeCBCGroup2["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup2["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup3["age_min"],
                "age_max" => $measureRangeCBCGroup3["age_max"],
                "gender" => $measureRangeCBCGroup3["gender"],
                "range_lower" => $measureRangeCBCGroup3["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup3["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup4["age_min"],
                "age_max" => $measureRangeCBCGroup4["age_max"],
                "gender" => $measureRangeCBCGroup4["gender"],
                "range_lower" => $measureRangeCBCGroup4["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup4["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup5["age_min"],
                "age_max" => $measureRangeCBCGroup5["age_max"],
                "gender" => $measureRangeCBCGroup5["gender"],
                "range_lower" => $measureRangeCBCGroup5["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup5["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup6["age_min"],
                "age_max" => $measureRangeCBCGroup6["age_max"],
                "gender" => $measureRangeCBCGroup6["gender"],
                "range_lower" => $measureRangeCBCGroup6["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup6["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup7["age_min"],
                "age_max" => $measureRangeCBCGroup7["age_max"],
                "gender" => $measureRangeCBCGroup7["gender"],
                "range_lower" => $measureRangeCBCGroup7["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup7["range_upper"][$i]
            ]);
        }

        // test types
        $testTypeAppearance = TestType::create([
            'name' => 'Appearance',
            'test_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeCultureAndSensitivity = TestType::create([
            "name" => "Culture and Sensitivity",
            "test_category_id" => $testTypeCategoryMicrobiology->id
        ]);
        $testTypeGramStaining = TestType::create([
            "name" => "Gram Staining",
            "test_category_id" => $testTypeCategoryMicrobiology->id
        ]);
        $testTypeIndiaInkStaining = TestType::create([
            "name" => "India Ink Staining",
            "test_category_id" => $testTypeCategoryMicrobiology->id
        ]);
        $testTypeProtein = TestType::create([
            "name" => "Protein",
            "test_category_id" => $testTypeCategoryMicrobiology->id
        ]);
        $testTypeWetPreparation = TestType::create([
            "name" => "Wet preparation (saline preparation)",
            "test_category_id" => $testTypeCategoryMicrobiology->id
        ]);
        $testTypeWetSalineIodinePrep = TestType::create([
            'name' => 'Wet Saline Iodine Prep',
            'test_category_id' => $testTypeCategoryMicrobiology->id,
        ]);
        $testTypeWhiteBloodCellCount = TestType::create([
            "name" => "White Blood Cell Count",
            "test_category_id" => $testTypeCategoryMicrobiology->id
        ]);
        $testTypeZNStaining = TestType::create([
            "name" => "ZN Staining",
            "test_category_id" => $testTypeCategoryMicrobiology->id
        ]);
        $testTypeModifiedZn = TestType::create([
            'name' => 'Modified ZN',
            'test_category_id' => $testTypeCategoryMicrobiology->id,
        ]);

        $testTypeCrag = TestType::create(["name" => "Crag","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeDifferential = TestType::create(["name" => "Differential","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeTotalCellCount = TestType::create(["name" => "Total Cell Count","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeLymphocytes = TestType::create(["name" => "Lymphocytes","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeQuantitativeCulture = TestType::create(["name" => "Quantitative Culture","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeRBC = TestType::create(["name" => "RBC Count","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeTPHA = TestType::create(["name" => "TPHA","test_category_id" => $testTypeCategoryMicrobiology->id,]);

        $measureCrag = Measure::create(["measure_type_id" => "2", "name" => "Crag", "unit" => ""]);
        MeasureRange::create(array("measure_id" => $measureCrag->id, "alphanumeric" => "Reactive"));
        MeasureRange::create(array("measure_id" => $measureCrag->id, "alphanumeric" => "Non Reactive"));


        $measureDifferential = Measure::create(["measure_type_id" => "4", "name" => "Differential", "unit" => ""]);
        $measureTotalCellCount = Measure::create(["measure_type_id" => "4", "name" => "Total Cell Count", "unit" => ""]);
        $measureLymphocytes = Measure::create(["measure_type_id" => "4", "name" => "Lymphocytes", "unit" => ""]);
        $measureQuantitativeCulture = Measure::create(["measure_type_id" => "4", "name" => "Quantitative Culture", "unit" => ""]);
        $measureRBC = Measure::create(["measure_type_id" => "4", "name" => "RBC Count", "unit" => ""]);
        $measureTPHA = Measure::create(["measure_type_id" => "4", "name" => "TPHA", "unit" => ""]);

        /* Urine Chemistry */
        $testTypeHCG = TestType::create(["name" => "HCG","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeBilirubin = TestType::create(["name" => "Bilirubin","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeBlood = TestType::create(["name" => "Blood","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeGlucose = TestType::create(["name" => "Glucose","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeKetones = TestType::create(["name" => "Ketones","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeLeukocytes = TestType::create(["name" => "Leukocytes","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeMicroscopy = TestType::create(["name" => "Microscopy","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeNitrite = TestType::create(["name" => "Nitrite","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypePH = TestType::create(["name" => "pH","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        // $testTypeProtein = TestType::create(["name" => "Protein","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeSpecificGravity = TestType::create(["name" => "Specific Gravity","test_category_id" => $testTypeCategoryMicrobiology->id,]);
        $testTypeUrobilinogen = TestType::create(["name" => "Urobilinogen","test_category_id" => $testTypeCategoryMicrobiology->id,]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeHCG->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeBilirubin->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeBlood->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeGlucose->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeKetones->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeLeukocytes->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeMicroscopy->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeNitrite->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypePH->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeProtein->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeSpecificGravity->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeUrobilinogen->id
        ]);

        $measureHCG  = Measure::create(["measure_type_id" => "4", "name" => "HCG", "unit" => ""]);
        $measureBilirubin  = Measure::create(["measure_type_id" => "4", "name" => "Bilirubin", "unit" => ""]);
        $measureBlood  = Measure::create(["measure_type_id" => "4", "name" => "Blood", "unit" => ""]);
        $measureGlucose  = Measure::create(["measure_type_id" => "4", "name" => "Glucose", "unit" => ""]);
        $measureKetones  = Measure::create(["measure_type_id" => "4", "name" => "Ketones", "unit" => ""]);
        $measureLeukocytes  = Measure::create(["measure_type_id" => "4", "name" => "Leukocytes", "unit" => ""]);
        $measureMicroscopy  = Measure::create(["measure_type_id" => "4", "name" => "Microscopy", "unit" => ""]);
        $measureNitrite  = Measure::create(["measure_type_id" => "4", "name" => "Nitrite", "unit" => ""]);
        $measurePH  = Measure::create(["measure_type_id" => "4", "name" => "pH", "unit" => ""]);
        $measureProtein  = Measure::create(["measure_type_id" => "4", "name" => "Protein", "unit" => ""]);
        $measureSpecificGravity  = Measure::create(["measure_type_id" => "4", "name" => "Specific Gravity", "unit" => ""]);
        $measureUrobilinogen  = Measure::create(["measure_type_id" => "4", "name" => "Urobilinogen", "unit" => ""]);

        TestTypeMeasure::create([
            "test_type_id" => $testTypeHCG->id,
            "measure_id" => $measureHCG->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeBilirubin->id,
            "measure_id" => $measureBilirubin->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeBlood->id,
            "measure_id" => $measureBlood->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeGlucose->id,
            "measure_id" => $measureGlucose->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeKetones->id,
            "measure_id" => $measureKetones->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeLeukocytes->id,
            "measure_id" => $measureLeukocytes->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeMicroscopy->id,
            "measure_id" => $measureMicroscopy->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeNitrite->id,
            "measure_id" => $measureNitrite->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypePH->id,
            "measure_id" => $measurePH->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeProtein->id,
            "measure_id" => $measureProtein->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeSpecificGravity->id,
            "measure_id" => $measureSpecificGravity->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeUrobilinogen->id,
            "measure_id" => $measureUrobilinogen->id
        ]);

        echo "more TestTypeMeasure for CSF\n";

        TestTypeMeasure::create([
            "test_type_id" => $testTypeCrag->id,
            "measure_id" => $measureCrag->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeDifferential->id,
            "measure_id" => $measureDifferential->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeTotalCellCount->id,
            "measure_id" => $measureTotalCellCount->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeLymphocytes->id,
            "measure_id" => $measureLymphocytes->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeQuantitativeCulture->id,
            "measure_id" => $measureQuantitativeCulture->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeRBC->id,
            "measure_id" => $measureRBC->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeTPHA->id,
            "measure_id" => $measureTPHA->id
        ]);

        echo "more TestTypeMeasure for CSF done\n";

        /* Measures table */
        $measureAppearance = Measure::create(['measure_type_id' => '4',
            'name' => 'Appearance', 'unit' => '']);
        $measureCultureAndSensitivity = Measure::create([
            "measure_type_id" => "4",
            "name" => "Culture and Sensitivity"]);
        $measureGramStaining = Measure::create([
            "measure_type_id" => "4",
            "name" => "Gram Staining", 'unit' => '']);
        $measureIndiaInkStaining = Measure::create([
            "measure_type_id" => "2",
            "name" => "India Ink Staining"]);
        MeasureRange::create(["measure_id" => $measureIndiaInkStaining->id, "alphanumeric" => "Positive"]);
        MeasureRange::create(["measure_id" => $measureIndiaInkStaining->id, "alphanumeric" => "Negative"]);

        $measureProtein = Measure::create([
            "measure_type_id" => "4",
            "name" => "Protein"]);
        $measureWetPreparation = Measure::create([
            "measure_type_id" => "4",
            "name" => "Wet preparation (saline preparation)"]);
        $measureWhiteBloodCellCount = Measure::create([
            "measure_type_id" => "4",
            "name" => "White Blood Cell Count"]);
        $measureZNStaining = Measure::create([
            "measure_type_id" => "4",
            "name" => "ZN Staining"]);

        $measureModifiedZn = Measure::create(['measure_type_id' => '4',
            'name' => 'Modified ZN', 'unit' => '']);
        $measureWetSalineIodinePrep = Measure::create(['measure_type_id' => '4',
            'name' => 'Wet Saline Iodine Prep', 'unit' => '']);
        $measureSerumAmylase = Measure::create([
            "measure_type_id" => "2",
            "name" => "SERUM AMYLASE", "unit" => ""]);
        $measureCalcium = Measure::create([
            "measure_type_id" => "2",
            "name" => "calcium", "unit" => ""]);
        $measureSGOT = Measure::create([
            "measure_type_id" => "2",
            "name" => "SGOT", "unit" => ""]);
        $measureIndirectCOOMBSTest = Measure::create([
            "measure_type_id" => "2",
            "name" => "Indirect COOMBS test", "unit" => ""]);
        $measureDirectCOOMBSTest = Measure::create([
            "measure_type_id" => "2",
            "name" => "Direct COOMBS test", "unit" => ""]);
        $measureDuTest = Measure::create([
            "measure_type_id" => "2",
            "name" => "Du test", "unit" => ""]);

        MeasureRange::create(array("measure_id" => $measureSerumAmylase->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measureSerumAmylase->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measureSerumAmylase->id, "alphanumeric" => "Normal"));

        MeasureRange::create(array("measure_id" => $measureCalcium->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measureCalcium->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measureCalcium->id, "alphanumeric" => "Normal"));

        MeasureRange::create(array("measure_id" => $measureSGOT->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measureSGOT->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measureSGOT->id, "alphanumeric" => "Normal"));
        
        MeasureRange::create(array("measure_id" => $measureIndirectCOOMBSTest->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureIndirectCOOMBSTest->id, "alphanumeric" => "Negative"));

        MeasureRange::create(array("measure_id" => $measureDirectCOOMBSTest->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureDirectCOOMBSTest->id, "alphanumeric" => "Negative"));

        MeasureRange::create(array("measure_id" => $measureDuTest->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureDuTest->id, "alphanumeric" => "Negative"));


        echo "Measures seeded\n";


        // test type measure
        TestTypeMeasure::create([
            "test_type_id" => $testTypeCultureAndSensitivity->id,
            "measure_id" => $measureCultureAndSensitivity->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeGramStaining->id,
            "measure_id" => $measureGramStaining->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeAppearance->id,
            "measure_id" => $measureAppearance->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeIndiaInkStaining->id,
            "measure_id" => $measureIndiaInkStaining->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeProtein->id,
            "measure_id" => $measureProtein->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeWetPreparation->id,
            "measure_id" => $measureWetPreparation->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeWhiteBloodCellCount->id,
            "measure_id" => $measureWhiteBloodCellCount->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeZNStaining->id,
            "measure_id" => $measureZNStaining->id
        ]);
        TestTypeMeasure::create([
            "test_type_id" => $testTypeModifiedZn->id,
            "measure_id" => $measureModifiedZn->id
        ]);

        // test type specimen types
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeStool->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeStool->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeStool->id,
            "test_type_id" => $testTypeModifiedZn->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeProtein->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeIndiaInkStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeWhiteBloodCellCount->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeCrag->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeDifferential->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeTotalCellCount->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeLymphocytes->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeTPHA->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeQuantitativeCulture->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeRBC->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypePusSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypePusSwab->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypePusSwab->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypePusSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeWoundSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeWoundSwab->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeWoundSwab->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeWoundSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUretheralSwab->id,
            "test_type_id" => $testTypeWetPreparation->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUretheralSwab->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUretheralSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUretheralSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeHVS->id,
            "test_type_id" => $testTypeWetPreparation->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeHVS->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeHVS->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeHVS->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeEyeSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeEyeSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeEyeSwab->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeEarSwab->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeEarSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeEarSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeThroatSwab->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeThroatSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeThroatSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeAspirates->id,
            "test_type_id" => $testTypeProtein->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeAspirates->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeAspirates->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeAspirates->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeAspirates->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBAL->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBAL->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBAL->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBAL->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeSputum->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeSputum->id,
            "test_type_id" => $testTypeAppearance->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeSputum->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeSputum->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);
        echo "testtype_specimentypes seeded\n";

        $testTypeRPR = TestType::create(['name' => 'RPR','test_category_id' => $testTypeCategoryMicrobiology->id,]);
        $testTypeSerumCrag = TestType::create(['name' => 'Serum Crag','test_category_id' => $testTypeCategoryMicrobiology->id,]);

        $measureRPR = Measure::create(["measure_type_id" => "4", "name" => "RPR", "unit" => ""]);
        $measureSerumCrag = Measure::create(["measure_type_id" => "4", "name" => "Serum Crag", "unit" => ""]);

        TestTypeMeasure::create([
            "test_type_id" => $testTypeRPR->id,
            "measure_id" => $measureRPR->id
        ]);

        TestTypeMeasure::create([
            "test_type_id" => $testTypeSerumCrag->id,
            "measure_id" => $measureSerumCrag->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBlood->id,
            "test_type_id" => $testTypeRPR->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBlood->id,
            "test_type_id" => $testTypeSerumCrag->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBlood->id,
            "test_type_id" => $testTypeTPHA->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBlood->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);
        echo "more blood associated type types and measures seeded\n";

        $drugSusceptibilityMeasureS = DrugSusceptibilityMeasure::create([
            'symbol' => 'S',
            'interpretation'=>'Sensitive',
        ]);
        $drugSusceptibilityMeasureI = DrugSusceptibilityMeasure::create([
            'symbol' => 'I',
            'interpretation'=>'Intermediate',
        ]);
        $drugSusceptibilityMeasureR = DrugSusceptibilityMeasure::create([
            'symbol' => 'R',
            'interpretation'=>'Resistant',
        ]);
        echo "drug susceptibility measure seeded\n";

        DB::disableQueryLog();
        /*Drugs table*/
        DB::unprepared(file_get_contents(base_path() . "/app/database/seeds/drugs.sql"));
        echo "bulk antibiotics seeded!\n";
        /*Organisms table*/
        DB::unprepared(file_get_contents(base_path() . "/app/database/seeds/organisms.sql"));
        echo "bulk organisms seeded!\n";
        /*Zone Diameters table table*/
        DB::unprepared(file_get_contents(base_path() . "/app/database/seeds/zone_diameters.sql"));
        echo "bulk zone diameters seeded!\n";
        DB::enableQueryLog();

        GramStainRange::create(["name" => "No organism seen"]);
        GramStainRange::create(["name" => "Gram positive cocci in singles"]);
        GramStainRange::create(["name" => "Gram positive cocci in chains"]);
        GramStainRange::create(["name" => "Gram positive cocci in clusters"]);
        GramStainRange::create(["name" => "Gram positive diplococci"]);
        GramStainRange::create(["name" => "Gram positive micrococci"]);
        GramStainRange::create(["name" => "Gram positive rods"]);
        GramStainRange::create(["name" => "Gram positive rods with terminal spores"]);
        GramStainRange::create(["name" => "Gram positive rods with sub-terminal spores"]);
        GramStainRange::create(["name" => "Gram positive rods with endospores"]);
        GramStainRange::create(["name" => "Gram negative diplococci"]);
        GramStainRange::create(["name" => "Gram negative intracellular diplococci"]);
        GramStainRange::create(["name" => "Gram negative extracellular diplococci"]);
        GramStainRange::create(["name" => "Gram negative rods"]);
        GramStainRange::create(["name" => "Gram positive yeast cells"]);
        GramStainRange::create(["name" => "Gram negative pleomorphic rods"]);
        GramStainRange::create(["name" => "+ Gram positive cocci in singles"]);
        GramStainRange::create(["name" => "+ Gram positive cocci in chains"]);
        GramStainRange::create(["name" => "+ Gram positive cocci in clusters"]);
        GramStainRange::create(["name" => "+ Gram positive diplococci"]);
        GramStainRange::create(["name" => "+ Gram positive micrococci"]);
        GramStainRange::create(["name" => "+ Gram positive rods"]);
        GramStainRange::create(["name" => "+ Gram positive rods with terminal spores"]);
        GramStainRange::create(["name" => "+ Gram positive rods with sub-terminal spores"]);
        GramStainRange::create(["name" => "+ Gram positive rods with endospores"]);
        GramStainRange::create(["name" => "+ Gram negative diplococci"]);
        GramStainRange::create(["name" => "+ Gram negative intracellular diplococci"]);
        GramStainRange::create(["name" => "+ Gram negative extracellular diplococci"]);
        GramStainRange::create(["name" => "+ Gram negative rods"]);
        GramStainRange::create(["name" => "+ Gram positive yeast cells"]);
        GramStainRange::create(["name" => "+ Gram negative pleomorphic rods"]);
        GramStainRange::create(["name" => "++ Gram positive cocci in singles"]);
        GramStainRange::create(["name" => "++ Gram positive cocci in chains"]);
        GramStainRange::create(["name" => "++ Gram positive cocci in clusters"]);
        GramStainRange::create(["name" => "++ Gram positive diplococci"]);
        GramStainRange::create(["name" => "++ Gram positive micrococci"]);
        GramStainRange::create(["name" => "++ Gram positive rods"]);
        GramStainRange::create(["name" => "++ Gram positive rods with terminal spores"]);
        GramStainRange::create(["name" => "++ Gram positive rods with sub-terminal spores"]);
        GramStainRange::create(["name" => "++ Gram positive rods with endospores"]);
        GramStainRange::create(["name" => "++ Gram negative diplococci"]);
        GramStainRange::create(["name" => "++ Gram negative intracellular diplococci"]);
        GramStainRange::create(["name" => "++ Gram negative extracellular diplococci"]);
        GramStainRange::create(["name" => "++ Gram negative rods"]);
        GramStainRange::create(["name" => "++ Gram positive yeast cells"]);
        GramStainRange::create(["name" => "++ Gram negative pleomorphic rods"]);
        GramStainRange::create(["name" => "+++ Gram positive cocci in singles"]);
        GramStainRange::create(["name" => "+++ Gram positive cocci in chains"]);
        GramStainRange::create(["name" => "+++ Gram positive cocci in clusters"]);
        GramStainRange::create(["name" => "+++ Gram positive diplococci"]);
        GramStainRange::create(["name" => "+++ Gram positive micrococci"]);
        GramStainRange::create(["name" => "+++ Gram positive rods"]);
        GramStainRange::create(["name" => "+++ Gram positive rods with terminal spores"]);
        GramStainRange::create(["name" => "+++ Gram positive rods with sub-terminal spores"]);
        GramStainRange::create(["name" => "+++ Gram positive rods with endospores"]);
        GramStainRange::create(["name" => "+++ Gram negative diplococci"]);
        GramStainRange::create(["name" => "+++ Gram negative intracellular diplococci"]);
        GramStainRange::create(["name" => "+++ Gram negative extracellular diplococci"]);
        GramStainRange::create(["name" => "+++ Gram negative rods"]);
        GramStainRange::create(["name" => "+++ Gram positive yeast cells"]);
        GramStainRange::create(["name" => "+++ Gram negative pleomorphic rods"]);
        echo "Gram Stain Ranges"."\n";

        $reportDiseases = array(
            array(
                "test_type_id" => $testTypeBS->id,
                "disease_id" => $malaria->id,
                ),
             array(
                "test_type_id" => $test_types_salmonella->id,
                "disease_id" => $typhoid->id,
                ),
             array(
                "test_type_id" => $testTypeCultureAndSensitivity->id,
                "disease_id" => $dysentry->id,
                ),
        );

        foreach ($reportDiseases as $reportDisease) {
            ReportDisease::create($reportDisease);
        }
        echo "Report Disease table seeded\n";
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
