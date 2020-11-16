//angular stuff

/*
Authors
Simon Peter Muwanga
Adapted from the VL Dashboard
*/
var app=angular.module('alis-module', ['ngSanitize','highcharts-ng'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });



var ctrllers={};

ctrllers.AlisController=function($scope,$http){
  


    $scope.params = {
        'districts':[],'hubs':[],'regions':[],'care_levels':[],'age_ranges':[],'genders':[],'pcrs':[],
        'mother_prophylaxes':[],'infant_prophylaxes':[]
    };

    var getData=function(){
        $scope.loading = true;
            var prms = {};
         
            prms.fro_date = $scope.fro_date_parameter;
            prms.to_date = $scope.to_date_parameter;
            prms.age_ids = JSON.stringify(convertAgeRangesToAgeIds($scope.params.age_ranges));
            prms.districts = JSON.stringify($scope.params.districts);
            prms.regions = JSON.stringify($scope.params.regions);
            prms.hubs = JSON.stringify($scope.params.hubs);
            prms.care_levels = JSON.stringify($scope.params.care_levels);
            prms.genders = JSON.stringify($scope.params.genders);
            prms.pcrs = JSON.stringify($scope.params.pcrs);
            prms.source = $scope.source_val;
           
            $http({method:'GET',url:"/live/",params:prms}).success(function(data) {
                
                //console.log("we rrrr"+JSON.stringify($scope.params));

      
                $scope.loading = false;

                //transposeDurationNumbers();
                //console.log("lalallalal:: samples_received:: "+data.samples_received+" suppressed:: "+data.suppressed+" "+data.valid_results);
            });
    }
    getData(); 
    
   
    $scope.displaySamplesRecieved=function(){ 
        
        $scope.months_array=[]; 
        $scope.first_pcr_array=[];
        $scope.second_pcr_array=[];
        $scope.third_pcr_array=[];
        $scope.pcr_r1_array=[];
        $scope.pcr_r2_array=[];
        $scope.pcr_r3_array=[];

        $scope.positivity_array=[];

        for(var i in $scope.duration_numbers){
            var obj=$scope.duration_numbers[i];
            var positivity_rate = ((obj.hiv_positive_infants/obj.total_tests)*100);
            

            $scope.months_array.push(dateFormatYearMonth(obj._id));
            $scope.first_pcr_array.push(obj.pcr_one); 
            $scope.second_pcr_array.push(obj.pcr_two);
            $scope.third_pcr_array.push(obj.pcr_three);
            $scope.pcr_r1_array.push(obj.pcr_R1);
            $scope.pcr_r2_array.push(obj.pcr_R2);
            $scope.pcr_r3_array.push(obj.pcr_R3);

            $scope.positivity_array.push(Math.round(positivity_rate));
        }


                     var chartConfig = {
                          chart: {
                              type: 'xy'
                          },
                          title: {
                              text: 'Samples Tested'
                          },
                          xAxis: {
                              categories: $scope.months_array
                          },
                         yAxis: [{ // Primary yAxis
                                labels: {
                                    format: '{value}',
                                    style: {
                                        color: Highcharts.getOptions().colors[1]
                                    }
                                },
                                title: {
                                    text: 'Tests',
                                    style: {
                                        color: Highcharts.getOptions().colors[1]
                                    }
                                }
                            }, { // Secondary yAxis
                                title: {
                                    text: 'Positivity',
                                    style: {
                                        color: '#F44336'
                                    }
                                },
                                labels: {
                                    format: '{value} %',
                                    style: {
                                        color: '#F44336'
                                    }
                                },
                                opposite: true
                            }],
                          legend: {
                              align: 'right',
                              x: -70,
                              verticalAlign: 'top',
                              y: 20,
                              floating: true,
                              backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                              borderColor: '#CCC',
                              borderWidth: 1,
                              shadow: false
                          },
                          tooltip: {
                              formatter: function() {
                                  return '<b>'+ this.x +'</b><br/>'+
                                      this.series.name +': '+ this.y ;
                              }
                          },
                          plotOptions: {
                              column: {
                                  stacking: 'normal',
                                  dataLabels: {
                                      enabled: false,
                                      color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                                      style: {
                                          textShadow: '0 0 3px black, 0 0 3px black'
                                      }
                                  }
                              }

                          },

                          series: [ 
                          {
                              name: '1st PCR',
                              type: 'column',
                              data: $scope.first_pcr_array
                          },
                          {
                              name: '2nd PCR',
                              type: 'column',
                              data: $scope.second_pcr_array
                          },
                            {
                              name: '3rd PCR',
                              type: 'column',
                              data: $scope.third_pcr_array
                           },
                           {
                              name: 'R1',
                              type: 'column',
                              data: $scope.pcr_r1_array
                          },
                          {
                              name: 'R2',
                              type: 'column',
                              data: $scope.pcr_r2_array
                          },
                          {
                              name: 'R3',
                              type: 'column',
                              data: $scope.pcr_r3_array
                          }, {
                                name: 'Positivity',
                                type: 'spline',
                                yAxis: 1,
                                color: '#d9534f',
                                data: $scope.positivity_array,
                                tooltip: {
                                    valueSuffix: '%'
                                }
                              }
                          ]
                      };
                    $scope.chartConfig = chartConfig;
                    
                    $('#divchart1').highcharts(chartConfig); 
       
    }
    
    
    
};
app.controller(ctrllers);
