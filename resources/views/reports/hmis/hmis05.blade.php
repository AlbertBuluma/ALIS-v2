@extends("layout")
@section("content")
<style type="text/css">
@import url('https://themes.googleusercontent.com/fonts/css?kit=fpjTOVmNbO4Lz34iLyptLUXza5VhXqVC6o75Eld_V98');
.lst-kix_list_4-1>li {
	counter-increment:lst-ctn-kix_list_4-1
}
ol.lst-kix_list_7-0 {
	list-style-type:none
}
ol.lst-kix_list_9-0.start {
	counter-reset:lst-ctn-kix_list_9-0 0
}
.lst-kix_list_8-1>li {
	counter-increment:lst-ctn-kix_list_8-1
}
ol.lst-kix_list_8-2.start {
	counter-reset:lst-ctn-kix_list_8-2 0
}
.lst-kix_list_5-0>li {
	counter-increment:lst-ctn-kix_list_5-0
}
.lst-kix_list_7-0>li {
	counter-increment:lst-ctn-kix_list_7-0
}
.lst-kix_list_9-0>li {
	counter-increment:lst-ctn-kix_list_9-0
}
ol.lst-kix_list_1-5.start {
	counter-reset:lst-ctn-kix_list_1-5 0
}
ol.lst-kix_list_9-6.start {
	counter-reset:lst-ctn-kix_list_9-6 0
}
ol.lst-kix_list_5-3.start {
	counter-reset:lst-ctn-kix_list_5-3 0
}
.lst-kix_list_4-3>li {
	counter-increment:lst-ctn-kix_list_4-3
}
ol.lst-kix_list_4-5.start {
	counter-reset:lst-ctn-kix_list_4-5 0
}
.lst-kix_list_1-2>li {
	counter-increment:lst-ctn-kix_list_1-2
}
.lst-kix_list_5-2>li {
	counter-increment:lst-ctn-kix_list_5-2
}
ol.lst-kix_list_8-8.start {
	counter-reset:lst-ctn-kix_list_8-8 0
}
ol.lst-kix_list_10-4.start {
	counter-reset:lst-ctn-kix_list_10-4 0
}
.lst-kix_list_9-2>li {
	counter-increment:lst-ctn-kix_list_9-2
}
ol.lst-kix_list_8-7.start {
	counter-reset:lst-ctn-kix_list_8-7 0
}
.lst-kix_list_5-0>li:before {
	content:"" counter(lst-ctn-kix_list_5-0, decimal) ".0. "
}
ol.lst-kix_list_6-0 {
	list-style-type:none
}
.lst-kix_list_5-4>li {
	counter-increment:lst-ctn-kix_list_5-4
}
.lst-kix_list_1-4>li {
	counter-increment:lst-ctn-kix_list_1-4
}
ol.lst-kix_list_1-6.start {
	counter-reset:lst-ctn-kix_list_1-6 0
}
.lst-kix_list_5-3>li:before {
	content:"" counter(lst-ctn-kix_list_5-0, decimal) "." counter(lst-ctn-kix_list_5-1, decimal) "." counter(lst-ctn-kix_list_5-2, decimal) "." counter(lst-ctn-kix_list_5-3, decimal) ". "
}
ol.lst-kix_list_9-5.start {
	counter-reset:lst-ctn-kix_list_9-5 0
}
.lst-kix_list_5-2>li:before {
	content:"" counter(lst-ctn-kix_list_5-0, decimal) "." counter(lst-ctn-kix_list_5-1, decimal) "." counter(lst-ctn-kix_list_5-2, decimal) ". "
}
.lst-kix_list_8-3>li {
	counter-increment:lst-ctn-kix_list_8-3
}
.lst-kix_list_5-1>li:before {
	content:"" counter(lst-ctn-kix_list_5-0, decimal) "." counter(lst-ctn-kix_list_5-1, decimal) ". "
}
.lst-kix_list_5-7>li:before {
	content:"" counter(lst-ctn-kix_list_5-0, decimal) "." counter(lst-ctn-kix_list_5-1, decimal) "." counter(lst-ctn-kix_list_5-2, decimal) "." counter(lst-ctn-kix_list_5-3, decimal) "." counter(lst-ctn-kix_list_5-4, decimal) "." counter(lst-ctn-kix_list_5-5, decimal) "." counter(lst-ctn-kix_list_5-6, decimal) "." counter(lst-ctn-kix_list_5-7, decimal) ". "
}
.lst-kix_list_5-6>li:before {
	content:"" counter(lst-ctn-kix_list_5-0, decimal) "." counter(lst-ctn-kix_list_5-1, decimal) "." counter(lst-ctn-kix_list_5-2, decimal) "." counter(lst-ctn-kix_list_5-3, decimal) "." counter(lst-ctn-kix_list_5-4, decimal) "." counter(lst-ctn-kix_list_5-5, decimal) "." counter(lst-ctn-kix_list_5-6, decimal) ". "
}
.lst-kix_list_5-8>li:before {
	content:"" counter(lst-ctn-kix_list_5-0, decimal) "." counter(lst-ctn-kix_list_5-1, decimal) "." counter(lst-ctn-kix_list_5-2, decimal) "." counter(lst-ctn-kix_list_5-3, decimal) "." counter(lst-ctn-kix_list_5-4, decimal) "." counter(lst-ctn-kix_list_5-5, decimal) "." counter(lst-ctn-kix_list_5-6, decimal) "." counter(lst-ctn-kix_list_5-7, decimal) "." counter(lst-ctn-kix_list_5-8, decimal) ". "
}
.lst-kix_list_9-4>li {
	counter-increment:lst-ctn-kix_list_9-4
}
.lst-kix_list_5-4>li:before {
	content:"" counter(lst-ctn-kix_list_5-0, decimal) "." counter(lst-ctn-kix_list_5-1, decimal) "." counter(lst-ctn-kix_list_5-2, decimal) "." counter(lst-ctn-kix_list_5-3, decimal) "." counter(lst-ctn-kix_list_5-4, decimal) ". "
}
.lst-kix_list_5-5>li:before {
	content:"" counter(lst-ctn-kix_list_5-0, decimal) "." counter(lst-ctn-kix_list_5-1, decimal) "." counter(lst-ctn-kix_list_5-2, decimal) "." counter(lst-ctn-kix_list_5-3, decimal) "." counter(lst-ctn-kix_list_5-4, decimal) "." counter(lst-ctn-kix_list_5-5, decimal) ". "
}
.lst-kix_list_10-3>li {
	counter-increment:lst-ctn-kix_list_10-3
}
ol.lst-kix_list_1-0.start {
	counter-reset:lst-ctn-kix_list_1-0 0
}
.lst-kix_list_6-1>li:before {
	content:"o  "
}
.lst-kix_list_6-3>li:before {
	content:"\0025cf  "
}
.lst-kix_list_6-0>li:before {
	content:"" counter(lst-ctn-kix_list_6-0, lower-latin) ") "
}
.lst-kix_list_6-4>li:before {
	content:"o  "
}
ol.lst-kix_list_4-0.start {
	counter-reset:lst-ctn-kix_list_4-0 3
}
.lst-kix_list_6-2>li:before {
	content:"\0025aa  "
}
.lst-kix_list_6-8>li:before {
	content:"\0025aa  "
}
.lst-kix_list_6-5>li:before {
	content:"\0025aa  "
}
.lst-kix_list_6-7>li:before {
	content:"o  "
}
.lst-kix_list_6-6>li:before {
	content:"\0025cf  "
}
ol.lst-kix_list_1-3 {
	list-style-type:none
}
ol.lst-kix_list_10-6.start {
	counter-reset:lst-ctn-kix_list_10-6 0
}
ol.lst-kix_list_1-4 {
	list-style-type:none
}
.lst-kix_list_2-7>li:before {
	content:"o  "
}
ol.lst-kix_list_1-5 {
	list-style-type:none
}
.lst-kix_list_7-4>li:before {
	content:"o  "
}
.lst-kix_list_7-6>li:before {
	content:"\0025cf  "
}
ol.lst-kix_list_1-6 {
	list-style-type:none
}
ol.lst-kix_list_1-0 {
	list-style-type:none
}
.lst-kix_list_2-5>li:before {
	content:"\0025aa  "
}
ol.lst-kix_list_1-1 {
	list-style-type:none
}
ol.lst-kix_list_1-2 {
	list-style-type:none
}
.lst-kix_list_7-2>li:before {
	content:"\0025aa  "
}
.lst-kix_list_8-6>li {
	counter-increment:lst-ctn-kix_list_8-6
}
ol.lst-kix_list_10-3.start {
	counter-reset:lst-ctn-kix_list_10-3 0
}
ol.lst-kix_list_9-4.start {
	counter-reset:lst-ctn-kix_list_9-4 0
}
ul.lst-kix_list_3-7 {
	list-style-type:none
}
ul.lst-kix_list_3-8 {
	list-style-type:none
}
ol.lst-kix_list_4-6.start {
	counter-reset:lst-ctn-kix_list_4-6 0
}
ol.lst-kix_list_9-7 {
	list-style-type:none
}
.lst-kix_list_10-1>li:before {
	content:"" counter(lst-ctn-kix_list_10-0, decimal) "." counter(lst-ctn-kix_list_10-1, decimal) ". "
}
ol.lst-kix_list_9-8 {
	list-style-type:none
}
ol.lst-kix_list_9-3 {
	list-style-type:none
}
ul.lst-kix_list_3-1 {
	list-style-type:none
}
ol.lst-kix_list_9-4 {
	list-style-type:none
}
ul.lst-kix_list_3-2 {
	list-style-type:none
}
.lst-kix_list_5-7>li {
	counter-increment:lst-ctn-kix_list_5-7
}
ol.lst-kix_list_9-5 {
	list-style-type:none
}
.lst-kix_list_7-8>li:before {
	content:"\0025aa  "
}
ol.lst-kix_list_9-6 {
	list-style-type:none
}
ul.lst-kix_list_3-0 {
	list-style-type:none
}
ol.lst-kix_list_4-3.start {
	counter-reset:lst-ctn-kix_list_4-3 0
}
ol.lst-kix_list_1-7 {
	list-style-type:none
}
ul.lst-kix_list_3-5 {
	list-style-type:none
}
.lst-kix_list_4-7>li {
	counter-increment:lst-ctn-kix_list_4-7
}
ol.lst-kix_list_9-0 {
	list-style-type:none
}
ol.lst-kix_list_1-8 {
	list-style-type:none
}
ul.lst-kix_list_3-6 {
	list-style-type:none
}
ol.lst-kix_list_9-1 {
	list-style-type:none
}
ul.lst-kix_list_3-3 {
	list-style-type:none
}
ol.lst-kix_list_9-2 {
	list-style-type:none
}
ul.lst-kix_list_3-4 {
	list-style-type:none
}
.lst-kix_list_10-7>li:before {
	content:"" counter(lst-ctn-kix_list_10-0, decimal) "." counter(lst-ctn-kix_list_10-1, decimal) "." counter(lst-ctn-kix_list_10-2, decimal) "." counter(lst-ctn-kix_list_10-3, decimal) "." counter(lst-ctn-kix_list_10-4, decimal) "." counter(lst-ctn-kix_list_10-5, decimal) "." counter(lst-ctn-kix_list_10-6, decimal) "." counter(lst-ctn-kix_list_10-7, decimal) ". "
}
.lst-kix_list_10-5>li:before {
	content:"" counter(lst-ctn-kix_list_10-0, decimal) "." counter(lst-ctn-kix_list_10-1, decimal) "." counter(lst-ctn-kix_list_10-2, decimal) "." counter(lst-ctn-kix_list_10-3, decimal) "." counter(lst-ctn-kix_list_10-4, decimal) "." counter(lst-ctn-kix_list_10-5, decimal) ". "
}
.lst-kix_list_9-8>li {
	counter-increment:lst-ctn-kix_list_9-8
}
.lst-kix_list_10-3>li:before {
	content:"" counter(lst-ctn-kix_list_10-0, decimal) "." counter(lst-ctn-kix_list_10-1, decimal) "." counter(lst-ctn-kix_list_10-2, decimal) "." counter(lst-ctn-kix_list_10-3, decimal) ". "
}
.lst-kix_list_4-1>li:before {
	content:"" counter(lst-ctn-kix_list_4-1, lower-latin) ". "
}
.lst-kix_list_9-2>li:before {
	content:"" counter(lst-ctn-kix_list_9-2, lower-roman) ". "
}
.lst-kix_list_4-3>li:before {
	content:"" counter(lst-ctn-kix_list_4-3, decimal) ". "
}
.lst-kix_list_4-5>li:before {
	content:"" counter(lst-ctn-kix_list_4-5, lower-roman) ". "
}
ol.lst-kix_list_5-7.start {
	counter-reset:lst-ctn-kix_list_5-7 0
}
.lst-kix_list_1-8>li {
	counter-increment:lst-ctn-kix_list_1-8
}
.lst-kix_list_10-5>li {
	counter-increment:lst-ctn-kix_list_10-5
}
ol.lst-kix_list_1-4.start {
	counter-reset:lst-ctn-kix_list_1-4 0
}
.lst-kix_list_5-5>li {
	counter-increment:lst-ctn-kix_list_5-5
}
ol.lst-kix_list_1-1.start {
	counter-reset:lst-ctn-kix_list_1-1 0
}
.lst-kix_list_9-0>li:before {
	content:"" counter(lst-ctn-kix_list_9-0, decimal) ". "
}
ol.lst-kix_list_4-4.start {
	counter-reset:lst-ctn-kix_list_4-4 0
}
ol.lst-kix_list_10-7 {
	list-style-type:none
}
ol.lst-kix_list_9-2.start {
	counter-reset:lst-ctn-kix_list_9-2 0
}
.lst-kix_list_9-6>li:before {
	content:"" counter(lst-ctn-kix_list_9-6, decimal) ". "
}
ol.lst-kix_list_10-8 {
	list-style-type:none
}
.lst-kix_list_9-3>li {
	counter-increment:lst-ctn-kix_list_9-3
}
ol.lst-kix_list_10-3 {
	list-style-type:none
}
.lst-kix_list_9-4>li:before {
	content:"" counter(lst-ctn-kix_list_9-4, lower-latin) ". "
}
ol.lst-kix_list_10-4 {
	list-style-type:none
}
ol.lst-kix_list_10-5 {
	list-style-type:none
}
ol.lst-kix_list_10-6 {
	list-style-type:none
}
ol.lst-kix_list_10-0 {
	list-style-type:none
}
ol.lst-kix_list_10-1 {
	list-style-type:none
}
ol.lst-kix_list_1-3.start {
	counter-reset:lst-ctn-kix_list_1-3 0
}
ul.lst-kix_list_2-8 {
	list-style-type:none
}
ol.lst-kix_list_10-2 {
	list-style-type:none
}
ol.lst-kix_list_8-8 {
	list-style-type:none
}
ol.lst-kix_list_1-2.start {
	counter-reset:lst-ctn-kix_list_1-2 0
}
ol.lst-kix_list_8-4 {
	list-style-type:none
}
ul.lst-kix_list_2-2 {
	list-style-type:none
}
ol.lst-kix_list_8-5 {
	list-style-type:none
}
ul.lst-kix_list_2-3 {
	list-style-type:none
}
ol.lst-kix_list_8-6 {
	list-style-type:none
}
ul.lst-kix_list_2-0 {
	list-style-type:none
}
ol.lst-kix_list_8-7 {
	list-style-type:none
}
ul.lst-kix_list_2-1 {
	list-style-type:none
}
ol.lst-kix_list_8-0 {
	list-style-type:none
}
.lst-kix_list_9-8>li:before {
	content:"" counter(lst-ctn-kix_list_9-8, lower-roman) ". "
}
ul.lst-kix_list_2-6 {
	list-style-type:none
}
ol.lst-kix_list_8-1 {
	list-style-type:none
}
.lst-kix_list_1-1>li:before {
	content:"" counter(lst-ctn-kix_list_1-0, decimal) "." counter(lst-ctn-kix_list_1-1, decimal) ". "
}
ul.lst-kix_list_2-7 {
	list-style-type:none
}
ol.lst-kix_list_8-2 {
	list-style-type:none
}
ul.lst-kix_list_2-4 {
	list-style-type:none
}
ol.lst-kix_list_8-3 {
	list-style-type:none
}
ul.lst-kix_list_2-5 {
	list-style-type:none
}
.lst-kix_list_8-5>li {
	counter-increment:lst-ctn-kix_list_8-5
}
.lst-kix_list_1-3>li:before {
	content:"" counter(lst-ctn-kix_list_1-0, decimal) "." counter(lst-ctn-kix_list_1-1, decimal) "." counter(lst-ctn-kix_list_1-2, decimal) "." counter(lst-ctn-kix_list_1-3, decimal) ". "
}
.lst-kix_list_10-4>li {
	counter-increment:lst-ctn-kix_list_10-4
}
ol.lst-kix_list_10-5.start {
	counter-reset:lst-ctn-kix_list_10-5 0
}
.lst-kix_list_4-8>li {
	counter-increment:lst-ctn-kix_list_4-8
}
.lst-kix_list_1-7>li:before {
	content:"" counter(lst-ctn-kix_list_1-0, decimal) "." counter(lst-ctn-kix_list_1-1, decimal) "." counter(lst-ctn-kix_list_1-2, decimal) "." counter(lst-ctn-kix_list_1-3, decimal) "." counter(lst-ctn-kix_list_1-4, decimal) "." counter(lst-ctn-kix_list_1-5, decimal) "." counter(lst-ctn-kix_list_1-6, decimal) "." counter(lst-ctn-kix_list_1-7, decimal) ". "
}
ol.lst-kix_list_5-8.start {
	counter-reset:lst-ctn-kix_list_5-8 0
}
.lst-kix_list_1-3>li {
	counter-increment:lst-ctn-kix_list_1-3
}
.lst-kix_list_1-5>li:before {
	content:"" counter(lst-ctn-kix_list_1-0, decimal) "." counter(lst-ctn-kix_list_1-1, decimal) "." counter(lst-ctn-kix_list_1-2, decimal) "." counter(lst-ctn-kix_list_1-3, decimal) "." counter(lst-ctn-kix_list_1-4, decimal) "." counter(lst-ctn-kix_list_1-5, decimal) ". "
}
ol.lst-kix_list_9-1.start {
	counter-reset:lst-ctn-kix_list_9-1 0
}
.lst-kix_list_5-6>li {
	counter-increment:lst-ctn-kix_list_5-6
}
.lst-kix_list_2-1>li:before {
	content:"o  "
}
ol.lst-kix_list_6-0.start {
	counter-reset:lst-ctn-kix_list_6-0 0
}
.lst-kix_list_2-3>li:before {
	content:"\0025cf  "
}
.lst-kix_list_4-2>li {
	counter-increment:lst-ctn-kix_list_4-2
}
.lst-kix_list_5-1>li {
	counter-increment:lst-ctn-kix_list_5-1
}
.lst-kix_list_1-1>li {
	counter-increment:lst-ctn-kix_list_1-1
}
.lst-kix_list_9-1>li {
	counter-increment:lst-ctn-kix_list_9-1
}
.lst-kix_list_3-0>li:before {
	content:"\0025cf  "
}
.lst-kix_list_3-1>li:before {
	content:"o  "
}
.lst-kix_list_3-2>li:before {
	content:"\0025aa  "
}
.lst-kix_list_8-1>li:before {
	content:"" counter(lst-ctn-kix_list_8-1, lower-latin) ". "
}
ol.lst-kix_list_1-8.start {
	counter-reset:lst-ctn-kix_list_1-8 0
}
.lst-kix_list_4-0>li {
	counter-increment:lst-ctn-kix_list_4-0
}
.lst-kix_list_8-2>li:before {
	content:"" counter(lst-ctn-kix_list_8-2, lower-roman) ". "
}
.lst-kix_list_6-0>li {
	counter-increment:lst-ctn-kix_list_6-0
}
.lst-kix_list_8-0>li {
	counter-increment:lst-ctn-kix_list_8-0
}
.lst-kix_list_3-5>li:before {
	content:"\0025aa  "
}
.lst-kix_list_10-0>li {
	counter-increment:lst-ctn-kix_list_10-0
}
.lst-kix_list_3-4>li:before {
	content:"o  "
}
.lst-kix_list_3-3>li:before {
	content:"\0025cf  "
}
.lst-kix_list_8-0>li:before {
	content:"" counter(lst-ctn-kix_list_8-0, lower-latin) ") "
}
.lst-kix_list_8-7>li:before {
	content:"" counter(lst-ctn-kix_list_8-7, lower-latin) ". "
}
.lst-kix_list_3-8>li:before {
	content:"\0025aa  "
}
.lst-kix_list_8-5>li:before {
	content:"" counter(lst-ctn-kix_list_8-5, lower-roman) ". "
}
ol.lst-kix_list_10-7.start {
	counter-reset:lst-ctn-kix_list_10-7 0
}
.lst-kix_list_8-6>li:before {
	content:"" counter(lst-ctn-kix_list_8-6, decimal) ". "
}
.lst-kix_list_8-3>li:before {
	content:"" counter(lst-ctn-kix_list_8-3, decimal) ". "
}
.lst-kix_list_3-6>li:before {
	content:"\0025cf  "
}
.lst-kix_list_3-7>li:before {
	content:"o  "
}
.lst-kix_list_8-4>li:before {
	content:"" counter(lst-ctn-kix_list_8-4, lower-latin) ". "
}
ol.lst-kix_list_5-0.start {
	counter-reset:lst-ctn-kix_list_5-0 5
}
.lst-kix_list_10-2>li {
	counter-increment:lst-ctn-kix_list_10-2
}
ol.lst-kix_list_8-5.start {
	counter-reset:lst-ctn-kix_list_8-5 0
}
ol.lst-kix_list_4-2.start {
	counter-reset:lst-ctn-kix_list_4-2 0
}
ol.lst-kix_list_9-3.start {
	counter-reset:lst-ctn-kix_list_9-3 0
}
.lst-kix_list_8-8>li:before {
	content:"" counter(lst-ctn-kix_list_8-8, lower-roman) ". "
}
ol.lst-kix_list_10-1.start {
	counter-reset:lst-ctn-kix_list_10-1 0
}
.lst-kix_list_4-4>li {
	counter-increment:lst-ctn-kix_list_4-4
}
.lst-kix_list_4-8>li:before {
	content:"" counter(lst-ctn-kix_list_4-8, lower-roman) ". "
}
.lst-kix_list_4-7>li:before {
	content:"" counter(lst-ctn-kix_list_4-7, lower-latin) ". "
}
ol.lst-kix_list_5-6.start {
	counter-reset:lst-ctn-kix_list_5-6 0
}
ol.lst-kix_list_4-1.start {
	counter-reset:lst-ctn-kix_list_4-1 0
}
ol.lst-kix_list_4-8.start {
	counter-reset:lst-ctn-kix_list_4-8 0
}
.lst-kix_list_8-4>li {
	counter-increment:lst-ctn-kix_list_8-4
}
ol.lst-kix_list_10-8.start {
	counter-reset:lst-ctn-kix_list_10-8 0
}
ol.lst-kix_list_8-6.start {
	counter-reset:lst-ctn-kix_list_8-6 0
}
ol.lst-kix_list_10-2.start {
	counter-reset:lst-ctn-kix_list_10-2 0
}
ol.lst-kix_list_5-5.start {
	counter-reset:lst-ctn-kix_list_5-5 0
}
ol.lst-kix_list_8-0.start {
	counter-reset:lst-ctn-kix_list_8-0 0
}
.lst-kix_list_7-0>li:before {
	content:"" counter(lst-ctn-kix_list_7-0, lower-latin) ") "
}
ol.lst-kix_list_4-7.start {
	counter-reset:lst-ctn-kix_list_4-7 0
}
ol.lst-kix_list_5-0 {
	list-style-type:none
}
.lst-kix_list_2-6>li:before {
	content:"\0025cf  "
}
ol.lst-kix_list_5-1 {
	list-style-type:none
}
ol.lst-kix_list_9-7.start {
	counter-reset:lst-ctn-kix_list_9-7 0
}
ol.lst-kix_list_5-2 {
	list-style-type:none
}
.lst-kix_list_2-4>li:before {
	content:"o  "
}
.lst-kix_list_2-8>li:before {
	content:"\0025aa  "
}
.lst-kix_list_7-1>li:before {
	content:"o  "
}
.lst-kix_list_7-5>li:before {
	content:"\0025aa  "
}
.lst-kix_list_9-6>li {
	counter-increment:lst-ctn-kix_list_9-6
}
ol.lst-kix_list_5-4.start {
	counter-reset:lst-ctn-kix_list_5-4 0
}
.lst-kix_list_7-3>li:before {
	content:"\0025cf  "
}
ul.lst-kix_list_7-5 {
	list-style-type:none
}
.lst-kix_list_10-0>li:before {
	content:"" counter(lst-ctn-kix_list_10-0, decimal) ".0. "
}
ul.lst-kix_list_7-6 {
	list-style-type:none
}
ul.lst-kix_list_7-3 {
	list-style-type:none
}
.lst-kix_list_9-7>li {
	counter-increment:lst-ctn-kix_list_9-7
}
ul.lst-kix_list_7-4 {
	list-style-type:none
}
ol.lst-kix_list_5-1.start {
	counter-reset:lst-ctn-kix_list_5-1 0
}
ul.lst-kix_list_7-7 {
	list-style-type:none
}
ul.lst-kix_list_7-8 {
	list-style-type:none
}
ol.lst-kix_list_5-7 {
	list-style-type:none
}
ol.lst-kix_list_5-8 {
	list-style-type:none
}
.lst-kix_list_10-6>li {
	counter-increment:lst-ctn-kix_list_10-6
}
ol.lst-kix_list_5-3 {
	list-style-type:none
}
ul.lst-kix_list_7-1 {
	list-style-type:none
}
.lst-kix_list_8-7>li {
	counter-increment:lst-ctn-kix_list_8-7
}
ol.lst-kix_list_5-4 {
	list-style-type:none
}
ul.lst-kix_list_7-2 {
	list-style-type:none
}
.lst-kix_list_1-7>li {
	counter-increment:lst-ctn-kix_list_1-7
}
ol.lst-kix_list_5-5 {
	list-style-type:none
}
ol.lst-kix_list_5-6 {
	list-style-type:none
}
.lst-kix_list_7-7>li:before {
	content:"o  "
}
ol.lst-kix_list_10-0.start {
	counter-reset:lst-ctn-kix_list_10-0 4
}
ol.lst-kix_list_8-1.start {
	counter-reset:lst-ctn-kix_list_8-1 0
}
.lst-kix_list_9-5>li {
	counter-increment:lst-ctn-kix_list_9-5
}
.lst-kix_list_5-8>li {
	counter-increment:lst-ctn-kix_list_5-8
}
.lst-kix_list_10-4>li:before {
	content:"" counter(lst-ctn-kix_list_10-0, decimal) "." counter(lst-ctn-kix_list_10-1, decimal) "." counter(lst-ctn-kix_list_10-2, decimal) "." counter(lst-ctn-kix_list_10-3, decimal) "." counter(lst-ctn-kix_list_10-4, decimal) ". "
}
.lst-kix_list_10-8>li:before {
	content:"" counter(lst-ctn-kix_list_10-0, decimal) "." counter(lst-ctn-kix_list_10-1, decimal) "." counter(lst-ctn-kix_list_10-2, decimal) "." counter(lst-ctn-kix_list_10-3, decimal) "." counter(lst-ctn-kix_list_10-4, decimal) "." counter(lst-ctn-kix_list_10-5, decimal) "." counter(lst-ctn-kix_list_10-6, decimal) "." counter(lst-ctn-kix_list_10-7, decimal) "." counter(lst-ctn-kix_list_10-8, decimal) ". "
}
.lst-kix_list_4-0>li:before {
	content:"" counter(lst-ctn-kix_list_4-0, decimal) ". "
}
.lst-kix_list_10-2>li:before {
	content:"" counter(lst-ctn-kix_list_10-0, decimal) "." counter(lst-ctn-kix_list_10-1, decimal) "." counter(lst-ctn-kix_list_10-2, decimal) ". "
}
.lst-kix_list_4-6>li {
	counter-increment:lst-ctn-kix_list_4-6
}
ol.lst-kix_list_1-7.start {
	counter-reset:lst-ctn-kix_list_1-7 0
}
.lst-kix_list_4-4>li:before {
	content:"" counter(lst-ctn-kix_list_4-4, lower-latin) ". "
}
.lst-kix_list_1-5>li {
	counter-increment:lst-ctn-kix_list_1-5
}
.lst-kix_list_4-2>li:before {
	content:"" counter(lst-ctn-kix_list_4-2, lower-roman) ". "
}
.lst-kix_list_4-6>li:before {
	content:"" counter(lst-ctn-kix_list_4-6, decimal) ". "
}
.lst-kix_list_9-3>li:before {
	content:"" counter(lst-ctn-kix_list_9-3, decimal) ". "
}
ol.lst-kix_list_7-0.start {
	counter-reset:lst-ctn-kix_list_7-0 0
}
.lst-kix_list_10-8>li {
	counter-increment:lst-ctn-kix_list_10-8
}
.lst-kix_list_10-6>li:before {
	content:"" counter(lst-ctn-kix_list_10-0, decimal) "." counter(lst-ctn-kix_list_10-1, decimal) "." counter(lst-ctn-kix_list_10-2, decimal) "." counter(lst-ctn-kix_list_10-3, decimal) "." counter(lst-ctn-kix_list_10-4, decimal) "." counter(lst-ctn-kix_list_10-5, decimal) "." counter(lst-ctn-kix_list_10-6, decimal) ". "
}
.lst-kix_list_9-1>li:before {
	content:"" counter(lst-ctn-kix_list_9-1, lower-latin) ". "
}
ol.lst-kix_list_4-0 {
	list-style-type:none
}
ol.lst-kix_list_4-1 {
	list-style-type:none
}
ol.lst-kix_list_4-2 {
	list-style-type:none
}
ol.lst-kix_list_4-3 {
	list-style-type:none
}
.lst-kix_list_9-7>li:before {
	content:"" counter(lst-ctn-kix_list_9-7, lower-latin) ". "
}
.lst-kix_list_9-5>li:before {
	content:"" counter(lst-ctn-kix_list_9-5, lower-roman) ". "
}
ul.lst-kix_list_6-6 {
	list-style-type:none
}
ul.lst-kix_list_6-7 {
	list-style-type:none
}
.lst-kix_list_5-3>li {
	counter-increment:lst-ctn-kix_list_5-3
}
ul.lst-kix_list_6-4 {
	list-style-type:none
}
ul.lst-kix_list_6-5 {
	list-style-type:none
}
ul.lst-kix_list_6-8 {
	list-style-type:none
}
ol.lst-kix_list_4-8 {
	list-style-type:none
}
.lst-kix_list_1-0>li:before {
	content:"" counter(lst-ctn-kix_list_1-0, decimal) ". "
}
ol.lst-kix_list_4-4 {
	list-style-type:none
}
ul.lst-kix_list_6-2 {
	list-style-type:none
}
ol.lst-kix_list_4-5 {
	list-style-type:none
}
ul.lst-kix_list_6-3 {
	list-style-type:none
}
.lst-kix_list_1-2>li:before {
	content:"" counter(lst-ctn-kix_list_1-0, decimal) "." counter(lst-ctn-kix_list_1-1, decimal) "." counter(lst-ctn-kix_list_1-2, decimal) ". "
}
ol.lst-kix_list_4-6 {
	list-style-type:none
}
ol.lst-kix_list_4-7 {
	list-style-type:none
}
ul.lst-kix_list_6-1 {
	list-style-type:none
}
ol.lst-kix_list_8-4.start {
	counter-reset:lst-ctn-kix_list_8-4 0
}
.lst-kix_list_1-4>li:before {
	content:"" counter(lst-ctn-kix_list_1-0, decimal) "." counter(lst-ctn-kix_list_1-1, decimal) "." counter(lst-ctn-kix_list_1-2, decimal) "." counter(lst-ctn-kix_list_1-3, decimal) "." counter(lst-ctn-kix_list_1-4, decimal) ". "
}
.lst-kix_list_10-1>li {
	counter-increment:lst-ctn-kix_list_10-1
}
.lst-kix_list_1-0>li {
	counter-increment:lst-ctn-kix_list_1-0
}
.lst-kix_list_8-8>li {
	counter-increment:lst-ctn-kix_list_8-8
}
.lst-kix_list_1-6>li {
	counter-increment:lst-ctn-kix_list_1-6
}
.lst-kix_list_1-6>li:before {
	content:"" counter(lst-ctn-kix_list_1-0, decimal) "." counter(lst-ctn-kix_list_1-1, decimal) "." counter(lst-ctn-kix_list_1-2, decimal) "." counter(lst-ctn-kix_list_1-3, decimal) "." counter(lst-ctn-kix_list_1-4, decimal) "." counter(lst-ctn-kix_list_1-5, decimal) "." counter(lst-ctn-kix_list_1-6, decimal) ". "
}
.lst-kix_list_10-7>li {
	counter-increment:lst-ctn-kix_list_10-7
}
.lst-kix_list_2-0>li:before {
	content:"\0025cf  "
}
ol.lst-kix_list_8-3.start {
	counter-reset:lst-ctn-kix_list_8-3 0
}
.lst-kix_list_4-5>li {
	counter-increment:lst-ctn-kix_list_4-5
}
ol.lst-kix_list_9-8.start {
	counter-reset:lst-ctn-kix_list_9-8 0
}
.lst-kix_list_1-8>li:before {
	content:"" counter(lst-ctn-kix_list_1-0, decimal) "." counter(lst-ctn-kix_list_1-1, decimal) "." counter(lst-ctn-kix_list_1-2, decimal) "." counter(lst-ctn-kix_list_1-3, decimal) "." counter(lst-ctn-kix_list_1-4, decimal) "." counter(lst-ctn-kix_list_1-5, decimal) "." counter(lst-ctn-kix_list_1-6, decimal) "." counter(lst-ctn-kix_list_1-7, decimal) "." counter(lst-ctn-kix_list_1-8, decimal) ". "
}
.lst-kix_list_2-2>li:before {
	content:"\0025aa  "
}
ol.lst-kix_list_5-2.start {
	counter-reset:lst-ctn-kix_list_5-2 0
}
.lst-kix_list_8-2>li {
	counter-increment:lst-ctn-kix_list_8-2
}
ol {
	margin:0;
	padding:0
}
table td, table th {
	padding:0
}
.c35 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	background-color:#ffffff;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:175.6pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c24 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	background-color:#c6d9f1;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:36.4pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c8 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	background-color:#d9d9d9;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:11.9pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c41 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	background-color:#c6d9f1;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:42.1pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c39 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	background-color:#c6d9f1;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:254.9pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c49 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:0pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	background-color:#ffffff;
	border-left-style:solid;
	border-bottom-width:0pt;
	width:11.1pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c12 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	background-color:#c6d9f1;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:62.3pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c40 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	background-color:#bfbfbf;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:58.3pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c109 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:45pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c52 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:38.1pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c103 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#a5a5a5;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:262.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c72 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:30.6pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c16 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:21.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c57 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:31.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c30 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:35.4pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c120 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:529.9pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c11 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:13.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c127 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:573.9pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c19 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:40.5pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c56 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:35.4pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c122 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:356pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c121 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:27pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c64 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:99pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c3 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:31.5pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c36 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:31.9pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c14 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:40pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c51 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:29.8pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c67 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:21.3pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c38 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:14.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c32 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:11.9pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c94 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:36pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c58 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:49.5pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c61 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:58.3pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c21 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:13.8pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c75 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:36.5pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c9 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:37.1pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c27 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:54pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c25 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:49.6pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c108 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:450.8pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c47 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:78pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c71 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:64.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c18 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:110.8pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c86 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:36.9pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c4 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:11.8pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c29 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:36.9pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c10 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:35.5pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c78 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:35.9pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c80 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:34.4pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c93 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:0pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:11.1pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c73 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:48.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c15 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:12.8pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c99 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:175.6pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c63 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:35.5pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c126 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:249.4pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c95 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:184.3pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c55 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#a5a5a5;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:276.4pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c77 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:14.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c42 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:63.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c91 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:42.1pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c79 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:239.1pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c102 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:42.3pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c123 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:531.6pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c22 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:113.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c85 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:36.4pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c84 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:44pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c87 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:36.7pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c106 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:20.1pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c31 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:13pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c53 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:65.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c88 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:65.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c28 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:140.3pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c33 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:70pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c101 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:276.6pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c26 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:12.2pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c45 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:12.6pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c107 {
	border-right-style:solid;
	padding:0pt 5.4pt 0pt 5.4pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:288.8pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c37 {
	border-right-style:solid;
	padding:0pt 5.8pt 0pt 5.8pt;
	border-bottom-color:#000000;
	border-top-width:1pt;
	border-right-width:1pt;
	border-left-color:#000000;
	vertical-align:top;
	border-right-color:#000000;
	border-left-width:1pt;
	border-top-style:solid;
	border-left-style:solid;
	border-bottom-width:1pt;
	width:42.5pt;
	border-top-color:#000000;
	border-bottom-style:solid
}
.c5 {
	color:#000000;
	font-weight:700;
	text-decoration:none;
	vertical-align:baseline;
	font-size:8pt;
	font-family:"Times New Roman";
	font-style:normal
}
.c1 {
	color:#000000;
	font-weight:400;
	text-decoration:none;
	vertical-align:baseline;
	font-size:8pt;
	font-family:"Times New Roman";
	font-style:normal
}
.c0 {
	padding-top:0pt;
	padding-bottom:0pt;
	line-height:1.0;
	orphans:2;
	widows:2;
	text-align:left;
	height:11pt
}
.c62 {
	padding-top:0pt;
	padding-bottom:10pt;
	line-height:1.0;
	orphans:2;
	widows:2;
	text-align:left
}
.c124 {
	padding-top:0pt;
	padding-bottom:0pt;
	line-height:1.0;
	orphans:2;
	widows:2;
	text-align:center
}
.c6 {
	padding-top:0pt;
	padding-bottom:0pt;
	line-height:1.0;
	orphans:2;
	widows:2;
	text-align:left
}
.c96 {
	padding-top:0pt;
	padding-bottom:0pt;
	line-height:1.0;
	orphans:2;
	widows:2;
	text-align:right
}
.c2 {
	padding-top:0pt;
	padding-bottom:0pt;
	line-height:1.15;
	text-align:left;
	height:11pt
}
.c119 {
	width:100%;
	border-spacing:0;
	border-collapse:collapse;
	margin-right:auto
}
.c83 {
	color:#ff0000;
	text-decoration:none;
	vertical-align:baseline;
	font-style:normal
}
.c113 {
	width:100%;
	border-spacing:0;
	border-collapse:collapse;
	margin-right:auto
}
.c89 {
	width:100%;
	border-spacing:0;
	border-collapse:collapse;
	margin-right:auto
}
.c129 {
	width: 100%;
	border-spacing:0;
	border-collapse:collapse;
	margin-right:auto
}
.c128 {
	border-spacing:0;
	width: 100%;
	border-collapse:collapse;
	margin-right:auto
}
.c114 {
	width:100%;
	border-spacing:0;
	border-collapse:collapse;
	margin-right:auto
}
.c20 {
	font-size:8pt;
	font-family:"Times New Roman";
	font-weight:400
}
.c59 {
	margin-left:5.7pt;
	text-indent:-5.7pt;
	margin-right:5.7pt
}
.c54 {
	font-size:8pt;
	font-family:"Times New Roman";
	font-weight:700
}
.c81 {
	margin-left:6pt;
	text-indent:-6pt
}
.c70 {
	margin-left:18pt;
	text-indent:-36pt
}
.c117 {
	margin-left:18pt;
	padding-left:-3.8pt
}
.c13 {
	padding:0;
	margin:0
}
.c100 {
	max-width:451.3pt;
	padding:14.2pt 72pt 14.2pt 72pt
}
.c111 {
	margin-left:18pt;
	padding-left:0pt
}
.c66 {
	margin-left:25.2pt;
	padding-left:-10.8pt
}
.c116 {
	height:21pt
}
.c112 {
	font-style:italic
}
.c69 {
	height:10pt
}
.c92 {
	height:20pt
}
.c34 {
	height:7pt
}
.c23 {
	background-color:#d9d9d9
}
.c44 {
	background-color:#ffff00
}
.c76 {
	height:56pt
}
.c118 {
	color:#00b050
}
.c115 {
	height:108pt
}
.c43 {
	background-color:#c6d9f1
}
.c65 {
	background-color:#bfbfbf
}
.c48 {
	color:#000000
}
.c125 {
	height:14pt
}
.c50 {
	height:2pt
}
.c7 {
	height:11pt
}
.c82 {
	background-color:#d0cece
}
.c105 {
	height:3pt
}
.c74 {
	height:27pt
}
.c90 {
	height:13pt
}
.c98 {
	height:18pt
}
.c17 {
	height:0pt
}
.c110 {
	height:42pt
}
.c104 {
	height:16pt
}
.c68 {
	height:9pt
}
.c97 {
	height:12pt
}
.c46 {
	height:8pt
}
.c60 {
	background-color:#ffffff
}
.title {
	padding-top:24pt;
	color:#000000;
	font-weight:700;
	font-size:36pt;
	padding-bottom:6pt;
	font-family:"Calibri";
	line-height:1.1500000000000001;
	page-break-after:avoid;
	orphans:2;
	widows:2;
	text-align:left
}
.subtitle {
	padding-top:18pt;
	color:#666666;
	font-size:24pt;
	padding-bottom:4pt;
	font-family:"Georgia";
	line-height:1.1500000000000001;
	page-break-after:avoid;
	font-style:italic;
	orphans:2;
	widows:2;
	text-align:left
}
li {
	color:#000000;
	font-size:11pt;
	font-family:"Calibri"
}
p {
	margin:0;
	color:#000000;
	font-size:11pt;
	font-family:"Calibri"
}
h1 {
	padding-top:24pt;
	color:#000000;
	font-weight:700;
	font-size:24pt;
	padding-bottom:6pt;
	font-family:"Calibri";
	line-height:1.1500000000000001;
	page-break-after:avoid;
	orphans:2;
	widows:2;
	text-align:left
}
h2 {
	padding-top:18pt;
	color:#000000;
	font-weight:700;
	font-size:18pt;
	padding-bottom:4pt;
	font-family:"Calibri";
	line-height:1.1500000000000001;
	page-break-after:avoid;
	orphans:2;
	widows:2;
	text-align:left
}
h3 {
	padding-top:14pt;
	color:#000000;
	font-weight:700;
	font-size:14pt;
	padding-bottom:4pt;
	font-family:"Calibri";
	line-height:1.1500000000000001;
	page-break-after:avoid;
	orphans:2;
	widows:2;
	text-align:left
}
h4 {
	padding-top:12pt;
	color:#000000;
	font-weight:700;
	font-size:12pt;
	padding-bottom:2pt;
	font-family:"Calibri";
	line-height:1.1500000000000001;
	page-break-after:avoid;
	orphans:2;
	widows:2;
	text-align:left
}
h5 {
	padding-top:11pt;
	color:#000000;
	font-weight:700;
	font-size:11pt;
	padding-bottom:2pt;
	font-family:"Calibri";
	line-height:1.1500000000000001;
	page-break-after:avoid;
	orphans:2;
	widows:2;
	text-align:left
}
h6 {
	padding-top:10pt;
	color:#000000;
	font-weight:700;
	font-size:10pt;
	padding-bottom:2pt;
	font-family:"Calibri";
	line-height:1.1500000000000001;
	page-break-after:avoid;
	orphans:2;
	widows:2;
	text-align:left
}
</style>
<div>
	<ol class="breadcrumb">
		<li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		<li class="active">{{ Lang::choice('messages.report',2) }}</li>
		<li class="active">HMIS 105</li>
	</ol>
</div>
<br />
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-stats"></span>
		HMIS 105 | 
		<a title="Previous Month"
			href="{{URL::to('/report/hmis105/'.date('Y-m',strtotime(date('Y-m',strtotime($month)).' -1 month')))}}">
			<span class="btn btn-default ion-android-arrow-back"></span></a>
		{{date('Y-M',strtotime($month))}}
		<a title="Next Month"
			href="{{URL::to('/report/hmis105/'.date('Y-m',strtotime(date('Y-m',strtotime($month)).' +1 month')))}}">
			<span class="btn btn-default ion-android-arrow-forward"></span></a>
	</div>
	<div class="panel-body">
	@if (Session::has('message'))
		<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif	
		<div class="table-responsive">
			<p class="c124"><span class="c5">FACILITY LABORATORY MONTHLY REPORT</span></p>
<a id="t.7bfbc9d2907142eb0f3dc0cba0b6fcbbdf40d847"></a><a id="t.0"></a>
<table class="c89">
  <tbody>
    <tr class="c50">
      <td class="c12" colspan="2" rowspan="2"><p class="c6"><span class="c5">1.1. Total Number of laboratory client visits</span></p></td>
      <td class="c49" colspan="1" rowspan="5"><p class="c0"><span class="c5"></span></p></td>
      <td class="c43 c108" colspan="11" rowspan="1"><p class="c6"><span class="c54">1.2. Number of Specimen Collected at Facility and Received from other facilities (</span><span class="c20 c112">For tests done within</span><span class="c5">)</span></p></td>
    </tr>
    <tr class="c34">
      <td class="c71 c43" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
      <td class="c29 c43" colspan="1" rowspan="1"><p class="c6"><span class="c5">1.Blood</span></p></td>
      <td class="c24" colspan="1" rowspan="1"><p class="c6"><span class="c5">2.Stool/ Rectal swab</span></p></td>
      <td class="c24" colspan="1" rowspan="1"><p class="c6"><span class="c5">3.Urine</span></p></td>
      <td class="c84 c43" colspan="1" rowspan="1"><p class="c6"><span class="c5">4.Sputum</span></p></td>
      <td class="c36 c43" colspan="1" rowspan="1"><p class="c6"><span class="c5">5.CSF</span></p></td>
      <td class="c14 c43" colspan="1" rowspan="1"><p class="c6"><span class="c5">6.Biopsy</span></p></td>
      <td class="c73 c43" colspan="1" rowspan="1"><p class="c6"><span class="c5">7.Pus Swab</span></p></td>
      <td class="c41" colspan="1" rowspan="1"><p class="c6"><span class="c5">8.Genital Swab</span></p></td>
      <td class="c24" colspan="1" rowspan="1"><p class="c6"><span class="c5">9.Skin Snip</span></p></td>
      <td class="c80 c43" colspan="1" rowspan="1"><p class="c6"><span class="c5">10. Others</span></p></td>
    </tr>
    <tr class="c69">
      <td class="c102 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">OPd</span></p></td>
      <td class="c106" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$visits['out_patients']}}</span></p></td>
      <td class="c71" colspan="1" rowspan="1"><p class="c6"><span class="c5">Collected(IN)</span></p></td>
      <td class="c29" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['blood_collected_in']}}</span></p></td>
      <td class="c85" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['stool_collected_in']}}</span></p></td>
      <td class="c85" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['urine_collected_in']}}</span></p></td>
      <td class="c84" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['sputum_collected_in']}}</span></p></td>
      <td class="c36" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['csf_collected_in']}}</span></p></td>
      <td class="c14" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['biopsy_collected_in']}}</span></p></td>
      <td class="c73" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['pus_swab_collected_in']}}</span></p></td>
      <td class="c91" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['genital_swab_collected_in']}}</span></p></td>
      <td class="c85" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['skin_collected_in']}}</span></p></td>
      <td class="c80" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['others_collected_in']}}</span></p></td>
    </tr>
    <tr class="c68">
      <td class="c102 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">IPd</span></p></td>
      <td class="c106" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$visits['in_patients']}}</span></p></td>
      <td class="c71" colspan="1" rowspan="1"><p class="c6"><span class="c5">Received(OUT)</span></p></td>
      <td class="c29" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['blood_collected_out']}}</span></p></td>
      <td class="c85" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['stool_collected_out']}}</span></p></td>
      <td class="c85" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['urine_collected_out']}}</span></p></td>
      <td class="c84" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['sputum_collected_out']}}</span></p></td>
      <td class="c36" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['csf_collected_out']}}</span></p></td>
      <td class="c14" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['biopsy_collected_out']}}</span></p></td>
      <td class="c73" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['pus_swab_collected_out']}}</span></p></td>
      <td class="c91" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['genital_swab_collected_out']}}</span></p></td>
      <td class="c85" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['skin_collected_out']}}</span></p></td>
      <td class="c80" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sepecimen_counts['others_collected_out']}}</span></p></td>
    </tr>
    <tr class="c68">
      <td class="c102 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Total</span></p></td>
      <td class="c106" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$visits['in_patients'] + (int)$visits['out_patients']}}</span></p></td>
      <td class="c71 c23" colspan="1" rowspan="1"><p class="c96"><span class="c5">Totals</span></p></td>
      <td class="c29 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$sepecimen_counts['blood_collected_in']+(int)$sepecimen_counts['blood_collected_out'] }}</span></p></td>
      <td class="c85 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$sepecimen_counts['stool_collected_in']+(int)$sepecimen_counts['stool_collected_out'] }}</span></p></td>
      <td class="c85 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$sepecimen_counts['urine_collected_in']+(int)$sepecimen_counts['urine_collected_out'] }}</span></p></td>
      <td class="c23 c84" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$sepecimen_counts['sputum_collected_in']+(int)$sepecimen_counts['sputum_collected_out'] }}</span></p></td>
      <td class="c36 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$sepecimen_counts['csf_collected_in']+(int)$sepecimen_counts['csf_collected_out'] }}</span></p></td>
      <td class="c14 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$sepecimen_counts['biopsy_collected_in']+(int)$sepecimen_counts['biopsy_collected_out'] }}</span></p></td>
      <td class="c73 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$sepecimen_counts['pus_swab_collected_in']+(int)$sepecimen_counts['pus_swab_collected_out'] }}</span></p></td>
      <td class="c23 c91" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$sepecimen_counts['genital_swab_collected_in']+(int)$sepecimen_counts['genital_swab_collected_out'] }}</span></p></td>
      <td class="c85 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$sepecimen_counts['skin_collected_in']+(int)$sepecimen_counts['skin_collected_out'] }}</span></p></td>
      <td class="c80 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$sepecimen_counts['others_collected_in']+(int)$sepecimen_counts['others_collected_out'] }}</span></p></td>
    </tr>
  </tbody>
</table>
<ol class="c13 lst-kix_list_1-1 start" start="1">
  <li class="c62 c117"><span class="c5">ROUTINE TESTING</span></li>
</ol>
<p class="c0"><span class="c5"></span></p>
<p class="c6"><span class="c5">2.0. NUMBER OF ROUTINE TESTS DONE</span></p>
<a id="t.f2ec05dd9fcab2829a8235784ad6421fb4d36ffd"></a><a id="t.1"></a>
<table class="c114">
  <tbody>
    <tr class="c17">
      <td class="c43 c120" colspan="8" rowspan="1"><p class="c6 c81"><span class="c54">1.1. Number of Tests Done in Facility Laboratory </span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Lab Tests</span></p></td>
      <td class="c42 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Number Done</span></p></td>
      <td class="c53 c23" colspan="2" rowspan="1"><p class="c6"><span class="c5">Number Positive</span></p></td>
      <td class="c38 c23" colspan="1" rowspan="21"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Lab Tests</span></p></td>
      <td class="c47 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Number Done</span></p></td>
      <td class="c61 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Number Positive</span></p></td>
    </tr>
    <tr class="c69">
      <td class="c79 c23" colspan="4" rowspan="1"><p class="c6"><span class="c5">HEMATOLOGY (BLOOD)</span></p></td>
      <td class="c23 c101" colspan="3" rowspan="1"><p class="c6"><span class="c54">SEROLOGY</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">01. Hb (non automated)</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{ $total_test_count['hb_non_automated'] }}</span></p></td>
      <td class="c53 c65" colspan="2" rowspan="8"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="2"><p class="c0"><span class="c1"></span></p>
        <p class="c6"><span class="c1">44. VDRL/ RPR</span></p></td>
      <td class="c47" colspan="1" rowspan="2"><p class="c0"><span class="c1">{{$serology_test_counts['vdrl_rpr']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="2"><p class="c0"><span class="c1">{{$serology_test_counts['vdrl_rpr1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">02. CBC</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{ $total_test_count['cbc'] }}</span></p></td>
    </tr>
    <tr class="c105">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">03. Film Comment </span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{ $total_test_count['film_comment'] }} </span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">45. TPHA</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c83 c20">{{$serology_test_counts['tpha']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c83 c20">{{$serology_test_counts['tpha1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">04. ESR </span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">
{{ $total_test_count['esr'] }}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">46. Shigella Dysentery</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c83 c20">
{{$serology_test_counts['shigella_dysentery']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c83 c20">{{$serology_test_counts['shigella_dysentery1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">05. Bleeding time </span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">
 {{ $total_test_count['bleeding_time']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">47. Hepatitis B SAgS</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c83 c20">{{$serology_test_counts['hepatitisb_sags']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c83 c20">{{$serology_test_counts['hepatitisb_sags1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">06. Prothrombin time </span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">
{{ $total_test_count['prothrombin_time']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">48. Brucella</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['brucella']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['brucella1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">07. Clotting time </span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">
{{ $total_test_count['clotting_time']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">49. Pregnancy Test (HCG)</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['pregnancy_test']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['pregnancy_test1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">08. Sickle Cell </span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{ $total_test_count['sickle_cell']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">50. CRAG</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['crag']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['crag1']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">09. Others </span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$total_test_count['others']}}</span></p></td>
      <td class="c53 c65" colspan="2" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">51. Rheumatoid factor</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['rheumatoid_factor']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['rheumatoid_factor1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18 c23" colspan="1" rowspan="1"><p class="c6"><span class="c54">BLOOD TRANSFUSION</span><span class="c1">&nbsp;</span></p></td>
      <td class="c42 c23" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c53 c23" colspan="2" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">52. Hep B Core Ag</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['hepb_core_ag']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['hepb_core_ag1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">10. AHG (Comb's Test)</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$blood_transfussion_test_counts['ahb_combs_test']}}</span></p></td>
      <td class="c53 c82" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{(isset($testTypeCountArray['combs']['combs']))?$testTypeCountArray['combs']['combs']['positive']:''}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">53. Hep C</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['hepc']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['hepc1']}}</span></p></td>
    </tr>
    <tr class="c69">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">11. ABO Grouping</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$blood_transfussion_test_counts['abo_grouping']}}</span></p></td>
      <td class="c53 c65" colspan="2" rowspan="4"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">54. Hep A</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['hepa']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$serology_test_counts['hepa1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">12. Rhesus Grouping</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$blood_transfussion_test_counts['rhesus_grouping']}}</span></p></td>
      <td class="c28 c60" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c47 c60" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c61 c60" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">13. Cross Matching</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$blood_transfussion_test_counts['cross_matching']}}</span></p></td>
      <td class="c101" colspan="3" rowspan="1"><p class="c6"><span class="c54">MICROBIOLOGY (CSF, URINE, STOOL, BLOOD, SPUTUM, SWABS)</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c54">IMMUNOLOGY </span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">55. Auramine (FM) &nbsp;for AFBs</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['auramine_fm']}}</span></p></td> 
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['auramine_fm1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18 c23" colspan="1" rowspan="1"><p class="c6"><span class="c20 ">14. CD4 test</span></p></td>
      <td class="c42 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">
{{$immunology_counts['cd4']}} </span></p></td>
      <td class="c53 c23" colspan="2" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">56. ZN for AFBs</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['zn_for_afb']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['zn_for_afb1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">15. Viral Load Test</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$immunology_counts['hiv_viral_load']}}</span></p></td>
      <td class="c53 c65" colspan="2" rowspan="2"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">57. Leishman Stain</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['leishman_stain']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['leishman_stain1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">16. Hep B Viral Load</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$immunology_counts['hepb']}}</span>
</p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">58. Gram</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['gram']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['gram1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1"></span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c53 c60" colspan="2" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">59. India Ink</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['india_ink']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['india_ink1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c79 c65" colspan="4" rowspan="1"><p class="c6"><span class="c20">MOLECULAR</span></p></td>
      <td class="c38" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">60. Urine Microscopy</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['urine_microscopy']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['urine_microscopy1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="2"><p class="c6"><span class="c1">17. TB Genexpert </span></p>
        <p class="c6"><span class="c1">(For Genexpert sites only)</span></p></td>
      <td class="c42" colspan="1" rowspan="2"><p class="c0"><span class="c1 c44">{{$molecular_counts['tb_genexpert']}}</span></p></td>
      <td class="c30 c65" colspan="1" rowspan="1"><p class="c6"><span class="c54">MTB+</span></p></td>
      <td class="c51" colspan="1" rowspan="1"><p class="c0"><span class="c1 c44"></span></p></td>
      <td class="c38" colspan="1" rowspan="3"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">61. Wet Preps</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['wet_prep']}}</span></p></td>
      <td class="c61" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['wet_prep1']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c30 c65" colspan="1" rowspan="1"><p class="c6"><span class="c5">RR</span></p></td>
      <td class="c51" colspan="1" rowspan="1"><p class="c0"><span class="c1 c44"></span></p></td>
      <td class="c28 c60" colspan="1" rowspan="1"><p class="c6"><span class="c1">62. Others</span></p></td>
      <td class="c47 c60" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$microbiology_test_counts['others']}}</span></p></td>
      <td class="c61 c60" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">18. Latent TB Infection test</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$molecular_counts['latent_tb']}}</span></p></td>
      <td class="c53 c60" colspan="2" rowspan="1"><p class="c0"><span class="c1 c44">{{$molecular_counts['latent_tb1']}}</span></p></td>
      <td class="c28 c65" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c47 c65" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c40" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">19. TB Lamp Test</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$molecular_counts['tb_lam']}}</span></p></td>
      <td class="c53 c60" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$molecular_counts['tb_lam1']}}</span></p></td>
      <td class="c38" colspan="1" rowspan="23"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28 c65" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c47 c65" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c40" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c17">
      <td class="c23 c79" colspan="4" rowspan="1"><p class="c6"><span class="c54">PARASITOLOGY</span><span class="c1">&nbsp;(Blood)</span></p></td>
      <td class="c28 c65" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c47 c65" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c40" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">20. Malaria Microscopy</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$parasitology_test_counts['malaria_microscopy']}}</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$parasitology_test_counts['malaria_microscopy1']}}</span></p></td>
      <td class="c28 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p>
        <p class="c0"><span class="c1"></span></p></td>
      <td class="c47 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
      <td class="c61 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
    </tr>
    <tr class="c17">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">21. Malaria RDTs</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$parasitology_test_counts['malaria_rdts']}}</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">
      {{$parasitology_test_counts['malaria_rdts1']}}</span></p></td>
      <td class="c28 c23" colspan="1" rowspan="1"><p class="c6"><span class="c54">Renal Profile</span></p></td>
      <td class="c47 c23" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c61 c23" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">22. Trypanosoma</span></p></td>
      <td class="c42 c82" colspan="1" rowspan="5"><p class="c0"><span class="c1"></span></p></td>
      <td class="c53 c60" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$parasitology_test_counts['trypasonoma']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">63. Urea</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['urea']}}</span></p></td>
      <td class="c40" colspan="1" rowspan="5"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c20">23. Microfilaria</span></p></td>
      <td class="c53 c60" colspan="2" rowspan="1"><p class="c0"><span class="c5">{{$parasitology_test_counts['micro_filaria']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c20">64. Calcium</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$chemistry_test_counts['calcium']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c20">24. Leishmania</span></p></td>
      <td class="c53 c60" colspan="2" rowspan="1"><p class="c0"><span class="c5">{{$parasitology_test_counts['leishmania']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c20">65. Potassium</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$chemistry_test_counts['potassium']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c20">25. Trichinella</span></p></td>
      <td class="c53 c60" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$parasitology_test_counts['trichinella']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">66. Sodium</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['sodium']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">26. Borrellia</span></p></td>
      <td class="c53 c60" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$parasitology_test_counts['borrellia']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">67. Creatinine</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['creatinine']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c79 c23" colspan="4" rowspan="1"><p class="c6"><span class="c54">STOOL MICROSCOPY</span><span class="c1">&nbsp;</span></p></td>
      <td class="c28 c23" colspan="1" rowspan="1"><p class="c6"><span class="c54">Liver Profile</span><span class="c1">&nbsp;</span></p></td>
      <td class="c47 c23" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c40" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">27. Entamoeba</span></p></td>
      <td class="c42 c23" colspan="1" rowspan="12"><p class="c0"><span class="c1"></span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['entamoeba']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">68. ALT</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['alt']}}</span></p></td>
      <td class="c40" colspan="1" rowspan="4"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">28. Giardia Lumblia</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['giardia']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">69. AST</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['ast']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">29. Cryptosporidium </span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['cryptosporidium']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">70. Albumin</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['albumin']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">30. Isospora</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['isospora']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">71. Total Protein</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['total_protein']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">31. Cyclospora</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['cyclospora']}}</span></p></td>
      <td class="c28 c23" colspan="1" rowspan="1"><p class="c6"><span class="c54">Lipid/Thyroid Profile</span><span class="c1">&nbsp;</span></p></td>
      <td class="c47 c23" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c40" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">32. Strongyloides</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['strongyloides']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">72. Triglycerides</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['triglycerides']}}</span></p></td>
      <td class="c40" colspan="1" rowspan="5"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">33. Shistosoma</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['shistosoma']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">73. Cholesterol</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['cholesterol']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">34. Taenia</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['taenia']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">74. Free T3</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['free_t3']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">35. Askaris</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['askaris']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">75. Free T4</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['free_t4']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">36. Hookworm</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['hookworm']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">76. TSH</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['tsh']}}</span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">37. Trichuris</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['trichuris']}}</span></p></td>
      <td class="c28 c23" colspan="1" rowspan="1"><p class="c6"><span class="c54">Oher Clinical Chemistry Tests</span><span class="c1">&nbsp;</span></p></td>
      <td class="c47 c23" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c40" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c50">
      <td class="c18" colspan="1" rowspan="1"><p class="c6"><span class="c1">38. Other parasites</span></p></td>
      <td class="c53" colspan="2" rowspan="1"><p class="c0"><span class="c1">{{$stoolmicroscopy_test_counts['other_parasites']}}</span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">77. Alkaline Phosphate</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['alkaline_phosphate']}}</span></p></td>
      <td class="c40" colspan="1" rowspan="6"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c7">
      <td class="c18 c60" colspan="1" rowspan="1"><p class="c96"><span class="c5">Total Tests Done</span></p></td>
      <td class="c42" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c53 c23" colspan="2" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">78. Amylase</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['amylase']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c79 c23" colspan="4" rowspan="1"><p class="c6"><span class="c54">Culture &amp; Sensitivity</span></p></td>
      <td class="c38" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">79. Glucose&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['glucose']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c18 c60" colspan="1" rowspan="1"><p class="c6"><span class="c1">39. Blood</span></p>
        <p class="c0"><span class="c1"></span></p></td>
      <td class="c42 c60" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$culture_and_sensitivity_counts['blood']}}</span></p></td>
      <td class="c53 c23" colspan="2" rowspan="5"><p class="c0"><span class="c1"></span></p></td>
      <td class="c38" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">80. Total Bilirubin</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['total_bilirubin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c18 c60" colspan="1" rowspan="1"><p class="c6"><span class="c1">40. Urine</span></p></td>
      <td class="c42 c60" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$culture_and_sensitivity_counts['urine']}}</span></p></td>
      <td class="c38" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">81. Lipase</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['lipase']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c18 c60" colspan="1" rowspan="1"><p class="c6"><span class="c1">41. Stool</span></p></td>
      <td class="c42 c60" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$culture_and_sensitivity_counts['stool']}}</span></p></td>
      <td class="c38" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">82.. AFP</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['afp']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c18 c60" colspan="1" rowspan="1"><p class="c6"><span class="c1">42. Swabs</span></p></td>
      <td class="c42 c60" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$culture_and_sensitivity_counts['swabs']}}</span></p></td>
      <td class="c38" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c6"><span class="c1">83. Others</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$chemistry_test_counts['others']}}</span></p></td>
      <td class="c40" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
    <tr class="c7">
      <td class="c18 c60" colspan="1" rowspan="1"><p class="c6"><span class="c1">43. Sputum</span></p></td>
      <td class="c42 c60" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$culture_and_sensitivity_counts['sputum']}}</span></p></td>
      <td class="c38" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c28" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
      <td class="c40" colspan="1" rowspan="1"><p class="c0"><span class="c1"></span></p></td>
    </tr>
  </tbody>
</table>
<p class="c0"><span class="c5"></span></p>
<p class="c62"><span class="c5">4.0. Summary of HIV Test by Purpose</span></p>
<a id="t.4176207b0439548ddc42ba1627537ecf3b3083aa"></a><a id="t.2"></a>
<table class="c89">
  <tbody>
    <tr class="c17">
      <td class="c64 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Category </span></p></td>
      <td class="c57 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">HCT</span></p></td>
      <td class="c19 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">eMTCT</span></p></td>
      <td class="c109 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Clinical Diagnosis</span></p></td>
      <td class="c3 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">SMC</span></p></td>
      <td class="c94 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Repeat Tests</span></p></td>
      <td class="c23 c27" colspan="1" rowspan="1"><p class="c6"><span class="c5">Test for Verification</span></p></td>
      <td class="c27 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Inconclusive Results</span></p></td>
      <td class="c23 c58" colspan="1" rowspan="1"><p class="c6"><span class="c5">DNA Confirmed Tests</span></p></td>
      <td class="c121 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">IQC</span></p></td>
      <td class="c3 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">EQA</span></p></td>
      <td class="c72 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Total</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c64" colspan="1" rowspan="1"><p class="c6"><span class="c1">84. Determine</span></p></td>
      <td class="c57" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$hct_test['determine_h']}}</span></p></td>
      <td class="c19" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$emtct_test['determine_p']}}</span></p></td>
      <td class="c109" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$clinical_diagnosis_test['determine_cd']}}</span></p></td>
      <td class="c3" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$smc_test['determine_s']}}</span></p></td>
      <td class="c94" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$repeat_test['determine_rt']}}</span></p></td>
      <td class="c27" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$verification_test['determine_tv']}}</span></p></td>
      <td class="c27" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$inconclusive_test['determine_ir']}}</span></p></td>
      <td class="c58" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$dna_confirmatory_test['determine_dct']}}</span></p></td>
      <td class="c121" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$iqc_test['determine_qc']}}</span></p></td>
      <td class="c3" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$eqa_test['determine_eqa']}}</span></p></td>
      <td class="c72" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$eqa_test['determine_eqa'] + $iqc_test['determine_qc'] + $dna_confirmatory_test['determine_dct'] + $inconclusive_test['determine_ir'] + $verification_test['determine_tv'] + $repeat_test['determine_rt'] + $smc_test['determine_s'] + $clinical_diagnosis_test['determine_cd'] + $emtct_test['determine_p'] + $hct_test['determine_h']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c64" colspan="1" rowspan="1"><p class="c6"><span class="c1">85. Statpak</span></p></td>
      <td class="c57" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$hct_test['statpak_h']}}</span></p></td>
      <td class="c19" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$emtct_test['statpak_p']}}</span></p></td>
      <td class="c109" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$clinical_diagnosis_test['statpak_cd']}}</span></p></td>
      <td class="c3" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$smc_test['statpak_s']}}</span></p></td>
      <td class="c94" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$repeat_test['statpak_rt']}}</span></p></td>
      <td class="c27" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$verification_test['statpak_tv']}}</span></p></td>
      <td class="c27" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$inconclusive_test['statpak_ir']}}</span></p></td>
      <td class="c58" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$dna_confirmatory_test['statpak_dct']}}</span></p></td>
      <td class="c121" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$iqc_test['statpak_qc']}}</span></p></td>
      <td class="c3" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$eqa_test['statpak_eqa']}}</span></p></td>
      <td class="c72" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$eqa_test['statpak_eqa'] + $iqc_test['statpak_qc'] + $dna_confirmatory_test['statpak_dct'] + $inconclusive_test['statpak_ir'] + $verification_test['statpak_tv'] + $repeat_test['statpak_rt'] + $smc_test['statpak_s'] + $clinical_diagnosis_test['statpak_cd'] + $emtct_test['statpak_p'] + $hct_test['statpak_h']}}</span></p></td>
</tr>
    <tr class="c17">
      <td class="c64" colspan="1" rowspan="1"><p class="c6"><span class="c1">86. SD Bioline</span></p></td>
      <td class="c57" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$hct_test['sdbioline_h']}}</span></p></td>
      <td class="c19" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$emtct_test['sdbioline_p']}}</span></p></td>
      <td class="c109" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$clinical_diagnosis_test['sdbioline_cd']}}</span></p></td>
      <td class="c3" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$smc_test['sdbioline_s']}}</span></p></td>
      <td class="c94" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$repeat_test['sdbioline_rt']}}</span></p></td>
      <td class="c27" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$verification_test['sdbioline_tv']}}</span></p></td>
      <td class="c27" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$inconclusive_test['sdbioline_ir']}}</span></p></td>
      <td class="c58" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$dna_confirmatory_test['sdbioline_dct']}}</span></p></td>
      <td class="c121" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$iqc_test['sdbioline_qc']}}</span></p></td>
      <td class="c3" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$eqa_test['sdbioline_eqa']}}</span></p></td>
      <td class="c72" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$eqa_test['sdbioline_eqa'] + $iqc_test['sdbioline_qc'] + $dna_confirmatory_test['sdbioline_dct'] + $inconclusive_test['sdbioline_ir'] + $verification_test['sdbioline_tv'] + $repeat_test['sdbioline_rt'] + $smc_test['sdbioline_s'] + $clinical_diagnosis_test['sdbioline_cd'] + $emtct_test['sdbioline_p'] + $hct_test['sdbioline_h']}}</span></p></td>
</tr>
    <tr class="c17">
      <td class="c64" colspan="1" rowspan="1"><p class="c6"><span class="c1">87. HIV hiv_syphilis_duo DUO</span></p></td>
      <td class="c57" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$hct_test['hiv_syphilis_duo_h']}}</span></p></td>
      <td class="c19" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$emtct_test['hiv_syphilis_duo_p']}}</span></p></td>
      <td class="c109" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$clinical_diagnosis_test['hiv_syphilis_duo_cd']}}</span></p></td>
      <td class="c3" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$smc_test['hiv_syphilis_duo_s']}}</span></p></td>
      <td class="c94" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$repeat_test['hiv_syphilis_duo_rt']}}</span></p></td>
      <td class="c27" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$verification_test['hiv_syphilis_duo_tv']}}</span></p></td>
      <td class="c27" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$inconclusive_test['hiv_syphilis_duo_ir']}}</span></p></td>
      <td class="c58" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$dna_confirmatory_test['hiv_syphilis_duo_dct']}}</span></p></td>
      <td class="c121" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$iqc_test['hiv_syphilis_duo_qc']}}</span></p></td>
      <td class="c3" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$eqa_test['hiv_syphilis_duo_eqa']}}</span></p></td>
      <td class="c72" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$eqa_test['hiv_syphilis_duo_eqa'] + $iqc_test['hiv_syphilis_duo_qc'] + $dna_confirmatory_test['hiv_syphilis_duo_dct'] + $inconclusive_test['hiv_syphilis_duo_ir'] + $verification_test['hiv_syphilis_duo_tv'] + $repeat_test['hiv_syphilis_duo_rt'] + $smc_test['hiv_syphilis_duo_s'] + $clinical_diagnosis_test['hiv_syphilis_duo_cd'] + $emtct_test['hiv_syphilis_duo_p'] + $hct_test['hiv_syphilis_duo_h']}}</span></p></td>
</tr>
    <tr class="c17">
      <td class="c64" colspan="1" rowspan="1"><p class="c6"><span class="c1">88. Oraquick (Self Testing)</span></p></td>
      <td class="c57" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$hct_test['oraquick_h']}}</span></p></td>
      <td class="c19" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$emtct_test['oraquick_p']}}</span></p></td>
      <td class="c109" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$clinical_diagnosis_test['oraquick_cd']}}</span></p></td>
      <td class="c3" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$smc_test['oraquick_s']}}</span></p></td>
      <td class="c94" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$repeat_test['oraquick_rt']}}</span></p></td>
      <td class="c27" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$verification_test['oraquick_tv']}}</span></p></td>
      <td class="c27" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$inconclusive_test['oraquick_ir']}}</span></p></td>
      <td class="c58" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$dna_confirmatory_test['oraquick_dct']}}</span></p></td>
      <td class="c121" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$iqc_test['oraquick_qc']}}</span></p></td>
      <td class="c3" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$eqa_test['oraquick_eqa']}}</span></p></td>
      <td class="c72" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$eqa_test['oraquick_eqa'] + $iqc_test['oraquick_qc'] + $dna_confirmatory_test['oraquick_dct'] + $inconclusive_test['oraquick_ir'] + $verification_test['oraquick_tv'] + $repeat_test['oraquick_rt'] + $smc_test['oraquick_s'] + $clinical_diagnosis_test['oraquick_cd'] + $emtct_test['oraquick_p'] + $hct_test['oraquick_h']}}</span></p></td>
</tr>
  </tbody>
</table>
<p class="c0"><span class="c5"></span></p>
<p class="c0"><span class="c5"></span></p>
<p class="c0"><span class="c5"></span></p>
<p class="c0"><span class="c5"></span></p>
<p class="c0"><span class="c5"></span></p>
<p class="c0"><span class="c5"></span></p>
<p class="c6"><span class="c5">3.0. AMR SURVEILLANCE</span></p>
<a id="t.0a262dff7c35cf53ce624d8eb6c6c4e7e9404a52"></a><a id="t.3"></a>
<table class="c119">
  <tbody>
    <tr class="c97">
      <td class="c23 c127" colspan="43" rowspan="1"><p class="c6 c59"><span class="c5">3.1. National Priority AMR Organisms</span></p></td>
    </tr>
    <tr class="c125">
      <td class="c33 c23" colspan="1" rowspan="1"><p class="c6 c59"><span class="c54">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span></p></td>
      <td class="c23 c107" colspan="24" rowspan="1"><p class="c124"><span class="c5">3.2. WHO Priority AMR Organisms</span></p></td>
      <td class="c56" colspan="3" rowspan="2"><p class="c6 c59"><span class="c1">9.Vibrio cholerae</span></p></td>
      <td class="c56" colspan="3" rowspan="2"><p class="c6 c59"><span class="c1">10..Enterococcus spp</span></p></td>
      <td class="c56" colspan="3" rowspan="2"><p class="c6 c59"><span class="c1">11..Haemophilus influenzae</span></p></td>
      <td class="c56" colspan="3" rowspan="2"><p class="c6 c59"><span class="c1">12..Neisseria meningitides</span></p></td>
      <td class="c56" colspan="3" rowspan="2"><p class="c6 c59"><span class="c1">13..Campylobacter</span></p></td>
      <td class="c52" colspan="3" rowspan="2"><p class="c6 c59"><span class="c1">14..Others</span></p></td>
    </tr>
    <tr class="c76">
      <td class="c33" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
      <td class="c86" colspan="3" rowspan="1"><p class="c6 c59"><span class="c1">1.Klebsiella pneumoniae</span></p></td>
      <td class="c87" colspan="3" rowspan="1"><p class="c6 c59"><span class="c1">2.Escherichia coli</span></p></td>
      <td class="c75" colspan="3" rowspan="1"><p class="c6 c59"><span class="c1">3.Salmonella spp</span></p></td>
      <td class="c75" colspan="3" rowspan="1"><p class="c6 c59"><span class="c1">4.Shigella spp</span></p></td>
      <td class="c78" colspan="3" rowspan="1"><p class="c6 c59"><span class="c1">5.Neisseria gonorrhoeae</span></p></td>
      <td class="c56" colspan="3" rowspan="1"><p class="c6 c59"><span class="c1">6.Staphylococcus aureus </span></p></td>
      <td class="c56" colspan="3" rowspan="1"><p class="c6 c59"><span class="c1">7.Streptococcus pneumoniae</span></p></td>
      <td class="c63" colspan="3" rowspan="1"><p class="c6 c59"><span class="c1">8.Acinetobacter baumannii</span></p></td>
    </tr>
    <tr class="c104">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">15. No. of Isolates</span></p></td>
      <td class="c86" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Klebsiella_pneumoniae']}}</span></p></td>
      <td class="c87" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Escherichia_coli']}}</span></p></td>
      <td class="c75" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Salmonella_spp']}}</span></p></td>
      <td class="c75" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Shigella_spp']}}</span></p></td>
      <td class="c78" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Neisseria_gonorrhoeae']}}</span></p></td>
      <td class="c56" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Staphylococcus_aureus']}}</span></p></td>
      <td class="c56" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Streptococcus_pneumoniae']}}</span></p></td>
      <td class="c63" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Acinetobacter_baumannii']}}</span></p></td>
      <td class="c56" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Vibrio_cholerae']}}</span></p></td>
      <td class="c56" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Enterococcus_spp']}}</span></p></td>
      <td class="c56" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Haemophilus_influenzae']}}</span></p></td>
      <td class="c56" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Neisseria_meningitides']}}</span></p></td>
      <td class="c56" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['Campylobacter']}}</span></p></td>
      <td class="c52" colspan="3" rowspan="1"><p class="c0"><span class="c1">{{$isolates['others']}}</span></p></td>
    </tr>
    <tr class="c90">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c5">ANTIBIOTICS</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c6"><span class="c5">R </span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c6"><span class="c5">I</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c6"><span class="c5">S</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">16.Ampicilin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ampicilin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ampicilin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ampicilin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ampicilin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ampicilin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ampicilin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ampicilin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ampicilin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ampicilin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ampicilin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ampicilin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ampicilin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ampicilin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ampicilin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ampicilin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ampicilin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ampicilin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ampicilin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">17.Azithromycin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['azithromycin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['azithromycin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['azithromycin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['azithromycin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['azithromycin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['azithromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['azithromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['azithromycin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['azithromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['azithromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['azithromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['azithromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['azithromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['azithromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['azithromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['azithromycin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['azithromycin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['azithromycin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">18.Amikacin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['amikacin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['amikacin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['amikacin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['amikacin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['amikacin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['amikacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['amikacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['amikacin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['amikacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['amikacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['amikacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['amikacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['amikacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['amikacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['amikacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['amikacin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['amikacin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['amikacin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">19.Ceftriaxone</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ceftriaxone']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ceftriaxone3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ceftriaxone2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ceftriaxone']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">20.Ceftazidime</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ceftazidime2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ceftazidime2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ceftazidime2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ceftazidime2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ceftazidime2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ceftazidime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ceftazidime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ceftazidime2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ceftazidime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ceftazidime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ceftazidime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ceftazidime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ceftazidime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ceftazidime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ceftazidime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ceftazidime3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ceftazidime2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ceftazidime']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">21.Cefotaxime</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cefotaxime2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cefotaxime2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cefotaxime2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cefotaxime2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cefotaxime2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cefotaxime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cefotaxime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cefotaxime2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cefotaxime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cefotaxime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cefotaxime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cefotaxime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cefotaxime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cefotaxime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cefotaxime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cefotaxime3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cefotaxime2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cefotaxime']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">22.Cefoxitin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cefoxitin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cefoxitin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cefoxitin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cefoxitin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cefoxitin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cefoxitin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cefoxitin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cefoxitin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cefoxitin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cefoxitin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cefoxitin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cefoxitin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cefoxitin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cefoxitin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cefoxitin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cefoxitin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cefoxitin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cefoxitin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">23.Cefixime</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cefixime2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cefixime2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cefixime2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cefixime2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cefixime2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cefixime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cefixime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cefixime2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cefixime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cefixime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cefixime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cefixime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cefixime3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cefixime2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cefixime']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cefixime3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cefixime2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cefixime']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">24.Cotrimoxazole</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['cotrimoxazole']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cotrimoxazole3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cotrimoxazole2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['cotrimoxazole']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">25.Ciprofloxacin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['ciprofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ciprofloxacin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ciprofloxacin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['ciprofloxacin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">26.Colistin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['colistin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['colistin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['colistin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['colistin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['colistin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['colistin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['colistin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['colistin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['colistin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['colistin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['colistin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['colistin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['colistin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['colistin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['colistin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['colistin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['colistin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['colistin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">27.Gentamicin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['gentamicin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['gentamicin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['gentamicin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['gentamicin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['gentamicin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['gentamicin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['gentamicin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['gentamicin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['gentamicin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['gentamicin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['gentamicin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['gentamicin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['gentamicin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['gentamicin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['gentamicin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['gentamicin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['gentamicin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['gentamicin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">28.Imipenem</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['imipenem2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['imipenem2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['imipenem2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['imipenem2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['imipenem2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['imipenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['imipenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['imipenem2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['imipenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['imipenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['imipenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['imipenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['imipenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['imipenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['imipenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['imipenem3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['imipenem2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['imipenem']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">29.Levofloxacin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['levofloxacin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['levofloxacin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['levofloxacin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['levofloxacin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['levofloxacin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['levofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['levofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['levofloxacin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['levofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['levofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['levofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['levofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['levofloxacin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['levofloxacin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['levofloxacin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['levofloxacin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['levofloxacin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['levofloxacin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">30.Meropenem</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['meropenem2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['meropenem2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['meropenem2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['meropenem2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['meropenem2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['meropenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['meropenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['meropenem2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['meropenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['meropenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['meropenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['meropenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['meropenem3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['meropenem2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['meropenem']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['meropenem3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['meropenem2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['meropenem']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">31.Oxacillin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['oxacillin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['oxacillin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['oxacillin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['oxacillin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['oxacillin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['oxacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['oxacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['oxacillin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['oxacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['oxacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['oxacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['oxacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['oxacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['oxacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['oxacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['oxacillin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['oxacillin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['oxacillin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">32.Penicillin G</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['penicillin_g2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['penicillin_g2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['penicillin_g2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['penicillin_g2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['penicillin_g2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['penicillin_g2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['penicillin_g2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['penicillin_g2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['penicillin_g2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['penicillin_g2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['penicillin_g2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['penicillin_g2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['penicillin_g3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['penicillin_g2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['penicillin_g']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['penicillin_g3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['penicillin_g2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['penicillin_g']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">33.Vancomycin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['vancomycin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['vancomycin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['vancomycin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['vancomycin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['vancomycin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['vancomycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['vancomycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['vancomycin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['vancomycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['vancomycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['vancomycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['vancomycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['vancomycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['vancomycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['vancomycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['vancomycin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['vancomycin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['vancomycin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">34. Augmentin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['augmentin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['augmentin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['augmentin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['augmentin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['augmentin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['augmentin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['augmentin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['augmentin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['augmentin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['augmentin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['augmentin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['augmentin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['augmentin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['augmentin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['augmentin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['augmentin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['augmentin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['augmentin']}}</span></p></td>
    </tr>
    <tr class="c116">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">35.Chloramphenicol</span></p>
        <p class="c0"><span class="c1"></span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['chloramphenicol']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['chloramphenicol3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['chloramphenicol2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['chloramphenicol']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">36.Clindamycin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['clindamycin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['clindamycin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['clindamycin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['clindamycin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['clindamycin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['clindamycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['clindamycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['clindamycin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['clindamycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['clindamycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['clindamycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['clindamycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['clindamycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['clindamycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['clindamycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['clindamycin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['clindamycin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['clindamycin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">37.Erythromycin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['erythromycin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['erythromycin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['erythromycin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['erythromycin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['erythromycin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['erythromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['erythromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['erythromycin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['erythromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['erythromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['erythromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['erythromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['erythromycin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['erythromycin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['erythromycin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['erythromycin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['erythromycin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['erythromycin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">38.Nalidixic acid</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['nalidixic_acid']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['nalidixic_acid3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['nalidixic_acid2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['nalidixic_acid']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">39.Nitrofurantoin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['nitrofurantoin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['nitrofurantoin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['nitrofurantoin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['nitrofurantoin']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">40.Piperacillin</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['piperacillin2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['piperacillin2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['piperacillin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['piperacillin2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['piperacillin2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['piperacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['piperacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['piperacillin2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['piperacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['piperacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['piperacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['piperacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['piperacillin3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['piperacillin2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['piperacillin']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['piperacillin3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['piperacillin2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['piperacillin']}}</span></p></td>
    </tr>
    <tr class="c116">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">41.Piperacillin/Tazobactam</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['piperacillin_tazobactam']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['piperacillin_tazobactam3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['piperacillin_tazobactam2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['piperacillin_tazobactam']}}</span></p></td>
    </tr>
    <tr class="c7">
      <td class="c33" colspan="1" rowspan="1"><p class="c6"><span class="c1">42.Tetracycline</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['tetracycline2']}}</span></p></td>
      <td class="c11" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$KlebsiellaOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['tetracycline2']}}</span></p></td>
      <td class="c31" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EscherichiaOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['tetracycline2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$salmonellaOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['tetracycline2']}}</span></p></td>
      <td class="c15" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$ShigellaOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['tetracycline2']}}</span></p></td>
      <td class="c26" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriaOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['tetracycline2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StaphylococcusOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['tetracycline2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$StreptococcusOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['tetracycline2']}}</span></p></td>
      <td class="c32" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$AcinetobacterOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['tetracycline2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$VibrioOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['tetracycline2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$EnterococcusOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['tetracycline2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$HaemophilusOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['tetracycline2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$NeisseriamOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['tetracycline3']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['tetracycline2']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$CampylobacterOrganism['tetracycline']}}</span></p></td>
      <td class="c4" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['tetracycline3']}}</span></p></td>
      <td class="c21" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['tetracycline2']}}</span></p></td>
      <td class="c45" colspan="1" rowspan="1"><p class="c0"><span class="c1">{{$OthersOrganism['tetracycline']}}</span></p></td>
    </tr>
  </tbody>
</table>
<p class="c0"><span class="c5"></span></p>
<p class="c62"><span class="c5">4.0. REFFERRAL TESTING</span></p>
<a id="t.80f42347fffb44d87277e6fc087c364b6bf2089d"></a><a id="t.4"></a>
<table class="c113">
  <tbody>
    <tr class="c110">
      <td class="c55" colspan="1" rowspan="1"><p class="c2"><span class="c5"></span></p>
        <a id="t.5d138b17033eb9b212659cebc7300fba4c972bb5"></a><a id="t.5"></a>
        <table class="c128">
          <tbody>
            <tr class="c46">
              <td class="c39" colspan="4" rowspan="1"><p class="c6"><span class="c5">4.1. Volume of Sample Referred</span></p></td>
            </tr>
            <tr class="c74">
              <td class="c22 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Type of Test</span></p></td>
              <td class="c25 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">No. of Specimen Referred </span></p></td>
              <td class="c37 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Average Turn Around Time</span></p></td>
              <td class="c25 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">No. of Pending Results/Feedback</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c22" colspan="1" rowspan="1"><p class="c6"><span class="c1">01. EID</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['eid']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['eid1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['eid2']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c22" colspan="1" rowspan="1"><p class="c6"><span class="c1">02. Viral Load for HIV</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['hiv_viral_load']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['hiv_viral_load1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['hiv_viral_load2']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c22" colspan="1" rowspan="1"><p class="c6"><span class="c1">03. CD4</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['cd4']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['cd41']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['cd42']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><p class="c6"><span class="c1">04. Sickle Cell Disease Confirmation</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['sickle_cell_confirmation']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['sickle_cell_confirmation1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['sickle_cell_confirmation2']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c22" colspan="1" rowspan="1"><p class="c6"><span class="c20">05. Histology</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['histology']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['histology1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['histology2']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c22" colspan="1" rowspan="1"><p class="c6"><span class="c20">06. Polio/</span><span class="c20 c118">&nbsp;</span><span class="c1">or Acute Flaccid Paralysis</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['polio']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['polio1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['polio2']}}</span></p></td>
            </tr>
            <tr class="c98">
              <td class="c22" colspan="1" rowspan="1"><p class="c6"><span class="c1">07. Severe Acute Respiratory Syndrome/Infection (SARS/SARI)</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['sars']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['sars1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['sars2']}}</span></p></td>
            </tr>
            <tr class="c69">
              <td class="c22" colspan="1" rowspan="1"><p class="c6"><span class="c1">08. TB Genexpert</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['tb_genexpert']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['tb_genexpert1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['tb_genexpert2']}}</span></p></td>
            </tr>
            <tr class="c98">
              <td class="c22" colspan="1" rowspan="1"><p class="c6"><span class="c1">09. DST for Multi Drug Resistance TB (MDR TB)</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['mdr_tb']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['mdr_tb1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referral_tests['mdr_tb2']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c22 c23" colspan="1" rowspan="1"><p class="c6"><span class="c1">09. Microbiology</span></p></td>
              <td class="c25 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
              <td class="c37 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
              <td class="c25 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_6-0 start" start="1">
                  <li class="c6 c66"><span class="c20">Typhoid Fever </span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['typhoid_fever']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['typhoid_fever1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['typhoid_fever2']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_6-0" start="2">
                  <li class="c6 c66"><span class="c1">Cholera </span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['cholera']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['cholera1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['cholera2']}}</span></p></td>
            </tr>
            <tr class="c69">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_6-0" start="3">
                  <li class="c6 c66"><span class="c1">Dysentery </span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['dysentry']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['dysentry1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['dysentry2']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_6-0" start="4">
                  <li class="c6 c66"><span class="c1">Rota Virus </span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['rota_virus']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['rota_virus1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['rota_virus2']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_6-0" start="5">
                  <li class="c6 c66"><span class="c1">Meningitis</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['meningitis']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['meningitis1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['meningitis2']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_6-0" start="6">
                  <li class="c6 c66"><span class="c1">Neonatal tetanus</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['neonatal_tetanus']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['neonatal_tetanus1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['neonatal_tetanus2']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_6-0" start="7">
                  <li class="c6 c66"><span class="c1">Plague</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['plague']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['plague1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['plague2']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_6-0" start="8">
                  <li class="c6 c66"><span class="c1">Isolates</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['isolates']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['isolates1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_microbiology['isolates2']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c22 c23" colspan="1" rowspan="1"><p class="c6"><span class="c1">10. Virology</span></p></td>
              <td class="c25 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
              <td class="c37 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
              <td class="c25 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
            </tr>
            <tr class="c69">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_7-0 start" start="1">
                  <li class="c6 c66"><span class="c1">Measles or Rubella</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['measles']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['measles1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['measles2']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_7-0" start="2">
                  <li class="c6 c66"><span class="c1">Viral Haemarrhagic Fevers(VHF)</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['vhf']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['vhf1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['vhf2']}}</span></p></td>
            </tr>
            <tr class="c50">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_7-0" start="3">
                  <li class="c6 c66"><span class="c1">Animal Bites (suspected rabies)</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['animal_bites']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['animal_bites1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['animal_bites2']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_7-0" start="4">
                  <li class="c6 c66"><span class="c1">Suspected outbreak samples (EBOLA, Marburg, others)</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['suspected_outbreak_sample']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['suspected_outbreak_sample1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['suspected_outbreak_sample2']}}</span></p></td>
            </tr>
            <tr class="c50">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_7-0" start="5">
                  <li class="c6 c66"><span class="c1">Hepatitis B core Ag</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['hepbAg']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['hepbAg1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['hepbAg2']}}</span></p></td>
            </tr>
            <tr class="c50">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_7-0" start="6">
                  <li class="c6 c66"><span class="c1">Hepatitis B Viral Load </span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['hepb_vl']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['hepb_vl1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['hepb_vl2']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_7-0" start="7">
                  <li class="c6 c66"><span class="c1">Hepatitis C Viral load</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['hepc_vl']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['hepc_vl1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_virology['hepc_vl2']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c22 c23" colspan="1" rowspan="1"><p class="c6"><span class="c1">11. Parasitology</span></p></td>
              <td class="c25 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
              <td class="c37 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
              <td class="c25 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
            </tr>
            <tr class="c50">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_8-0 start" start="1">
                  <li class="c6 c66"><span class="c1">Hemo parasites</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_parasitology['hemo_parasites']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_parasitology['hemo_parasites1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_parasitology['hemo_parasites2']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_8-0" start="2">
                  <li class="c6 c66"><span class="c1">Intestinal parasites</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_parasitology['intestinal_parasites']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_parasitology['intestinal_parasites1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_parasitology['intestinal_parasites2']}}</span></p></td>
            </tr>
            <tr class="c50">
              <td class="c22" colspan="1" rowspan="1"><ol class="c13 lst-kix_list_8-0" start="3">
                  <li class="c6 c66"><span class="c1">Tissue parasites</span></li>
                </ol></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_parasitology['tissue_parasites']}}</span></p></td>
              <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_parasitology['tissue_parasites1']}}</span></p></td>
              <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$referred_parasitology['tissue_parasites2']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c22 c23" colspan="1" rowspan="1"><p class="c96"><span class="c5">Totals</span></p></td>
              <td class="c25 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$referred_parasitology['tissue_parasites'] + $referred_parasitology['intestinal_parasites'] + $referred_parasitology['hemo_parasites'] + $referred_virology['hepc_vl'] + $referred_virology['hepb_vl'] + $referred_virology['hepbAg'] +$referred_virology['suspected_outbreak_sample'] + $referred_virology['animal_bites'] + $referred_virology['vhf'] + $referred_virology['measles'] + $referred_microbiology['isolates'] + $referred_microbiology['plague'] + $referred_microbiology['neonatal_tetanus'] + $referred_microbiology['meningitis'] + $referred_microbiology['rota_virus'] + $referred_microbiology['dysentry'] + $referred_microbiology['cholera'] + $referred_microbiology['typhoid_fever'] + $referral_tests['mdr_tb'] + $referral_tests['tb_genexpert'] + $referral_tests['sars'] + $referral_tests['polio'] + $referral_tests['histology'] + $referral_tests['sickle_cell_confirmation'] + $referral_tests['cd4'] + $referral_tests['hiv_viral_load'] + $referral_tests['eid']}}</span></p></td>
              <td class="c37 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5"></span></p></td>
              <td class="c25 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$referred_parasitology['tissue_parasites2'] + $referred_parasitology['intestinal_parasites2'] + $referred_parasitology['hemo_parasites2'] + $referred_virology['hepc_vl2'] + $referred_virology['hepb_vl2'] + $referred_virology['hepbAg2'] +$referred_virology['suspected_outbreak_sample2'] + $referred_virology['animal_bites2'] + $referred_virology['vhf2'] + $referred_virology['measles2'] + $referred_microbiology['isolates2'] + $referred_microbiology['plague2'] + $referred_microbiology['neonatal_tetanus2'] + $referred_microbiology['meningitis2'] + $referred_microbiology['rota_virus2'] + $referred_microbiology['dysentry2'] + $referred_microbiology['cholera2'] + $referred_microbiology['typhoid_fever2'] + $referral_tests['mdr_tb2'] + $referral_tests['tb_genexpert2'] + $referral_tests['sars2'] + $referral_tests['polio2'] + $referral_tests['histology2'] + $referral_tests['sickle_cell_confirmation2'] + $referral_tests['cd42'] + $referral_tests['hiv_viral_load2'] + $referral_tests['eid2']}}</span></p></td>
            </tr>
          </tbody>
        </table>
        <p class="c0"><span class="c5"></span></p></td>
      <td class="c103" colspan="1" rowspan="1"><p class="c2"><span class="c5"></span></p>
        <a id="t.23db3c9268955fee7aafea61f577d361e3306a3c"></a><a id="t.6"></a>
        <table class="c128">
          <tbody>
            <tr class="c46">
              <td class="c23 c126" colspan="10" rowspan="1"><p class="c6"><span class="c5">4.2. Number of Routine Tests that could not be conducted at facility and were referred to hub or other facility </span></p></td>
            </tr>
            <tr class="c92">
              <td class="c88" colspan="1" rowspan="2"><p class="c6"><span class="c54">Routine Test Type </span><span class="c20 c112">(specify type test)</span></p></td>
              <td class="c23 c95" colspan="9" rowspan="1"><p class="c6"><span class="c5">Reasons for Referrals and Reasons for not conducting tests that are on test menu</span></p></td>
            </tr>
            <tr class="c115">
              <td class="c16" colspan="1" rowspan="1"><p class="c6 c59"><span class="c5">Equipment break down</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c6 c59"><span class="c5">Reagent stock out</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c6 c59"><span class="c5">Supplies stock out</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c6 c59"><span class="c5">Power outage</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c6 c59"><span class="c5">No testing expertise</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c6 c59"><span class="c5">Lack of required equipment</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c6 c59"><span class="c5">Confirmatory testing</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c6 c59"><span class="c5">For QA re-testing</span></p></td>
              <td class="c77" colspan="1" rowspan="1"><p class="c6 c59"><span class="c5">Others</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c88" colspan="1" rowspan="1"><p class="c6"><span class="c5">CD4</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$equipment_breakdown['CD4']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$reagent_stockout['CD4']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$supplies_stockout['CD4']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$power_outage['CD4']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$no_testing_expertise['CD4']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$required_equipment['CD4']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$confirmatory_testing['CD4']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$qa_retesting['CD4']}}</span></p></td>
              <td class="c77" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_referral_reasons['CD4']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c88" colspan="1" rowspan="1"><p class="c6"><span class="c5">TB </span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$equipment_breakdown['TB']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$reagent_stockout['TB']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$supplies_stockout['TB']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$power_outage['TB']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$no_testing_expertise['TB']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$required_equipment['TB']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$confirmatory_testing['TB']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$qa_retesting['TB']}}</span></p></td>
              <td class="c77" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_referral_reasons['TB']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c88" colspan="1" rowspan="1"><p class="c6"><span class="c5">CBC</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$equipment_breakdown['CBC']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$reagent_stockout['CBC']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$supplies_stockout['CBC']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$power_outage['CBC']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$no_testing_expertise['CBC']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$required_equipment['CBC']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$confirmatory_testing['CBC']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$qa_retesting['CBC']}}</span></p></td>
              <td class="c77" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_referral_reasons['CBC']}}</span></p></td>
            </tr>
            <tr class="c68">
              <td class="c88" colspan="1" rowspan="1"><p class="c6"><span class="c5">Chemistry</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$equipment_breakdown['Chemistry']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$reagent_stockout['Chemistry']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$supplies_stockout['Chemistry']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$power_outage['Chemistry']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$no_testing_expertise['Chemistry']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$required_equipment['Chemistry']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$confirmatory_testing['Chemistry']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$qa_retesting['Chemistry']}}</span></p></td>
              <td class="c77" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_referral_reasons['Chemistry']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c88" colspan="1" rowspan="1"><p class="c6"><span class="c5">Microbiology</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$equipment_breakdown['Microbiology']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$reagent_stockout['Microbiology']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$supplies_stockout['Microbiology']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$power_outage['Microbiology']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$no_testing_expertise['Microbiology']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$required_equipment['Microbiology']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$confirmatory_testing['Microbiology']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$qa_retesting['Microbiology']}}</span></p></td>
              <td class="c77" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_referral_reasons['Microbiology']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c88" colspan="1" rowspan="1"><p class="c6"><span class="c5">HIV screening</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$equipment_breakdown['hiv']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$reagent_stockout['hiv']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$supplies_stockout['hiv']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$power_outage['hiv']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$no_testing_expertise['hiv']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$required_equipment['hiv']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$confirmatory_testing['hiv']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$qa_retesting['hiv']}}</span></p></td>
              <td class="c77" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_referral_reasons['hiv']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c88" colspan="1" rowspan="1"><p class="c6"><span class="c5">VDRL</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$equipment_breakdown['VDRL']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$reagent_stockout['VDRL']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$supplies_stockout['VDRL']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$power_outage['VDRL']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$no_testing_expertise['VDRL']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$required_equipment['VDRL']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$confirmatory_testing['VDRL']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$qa_retesting['VDRL']}}</span></p></td>
              <td class="c77" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_referral_reasons['VDRL']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c88" colspan="1" rowspan="1"><p class="c6"><span class="c5">Haematology</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$equipment_breakdown['Haematology']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$reagent_stockout['Haematology']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$supplies_stockout['Haematology']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$power_outage['Haematology']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$no_testing_expertise['Haematology']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$required_equipment['Haematology']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$confirmatory_testing['Haematology']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$qa_retesting['Haematology']}}</span></p></td>
              <td class="c77" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_referral_reasons['Haematology']}}</span></p></td>
            </tr>
            <tr class="c46">
              <td class="c88" colspan="1" rowspan="1"><p class="c6"><span class="c5">Parasitology</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$equipment_breakdown['Parasitolog']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$reagent_stockout['Parasitolog']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$supplies_stockout['Parasitolog']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$power_outage['Parasitolog']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$no_testing_expertise['Parasitolog']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$required_equipment['Parasitolog']}}</span></p></td>
              <td class="c16" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$confirmatory_testing['Parasitolog']}}</span></p></td>
              <td class="c67" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$qa_retesting['Parasitolog']}}</span></p></td>
              <td class="c77" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_referral_reasons['Parasitolog']}}</span></p></td>
            </tr>
          </tbody>
        </table>
        <p class="c0"><span class="c5"></span></p></td>
    </tr>
  </tbody>
</table>
<p class="c0 c70"><span class="c5"></span></p>
<p class="c0 c70"><span class="c5"></span></p>
<p class="c0 c70"><span class="c5"></span></p>
<ol class="c13 lst-kix_list_10-0 start" start="5">
  <li class="c62 c111"><span class="c5">MONTHLY LABORATORY REPORT ON REJECTED SPECIMEN</span></li>
</ol>
<a id="t.e45ddff25573c00cf290f8ea966fead2ed7d7f70"></a><a id="t.7"></a>
<table class="c129">
  <tbody>
    <tr class="c17">
      <td class="c43 c123" colspan="9" rowspan="1"><p class="c6"><span class="c5">5.1. Rejection Rate of Specimen Collected at a Facility</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c99 c23" colspan="1" rowspan="2"><p class="c0"><span class="c5"></span></p>
        <p class="c6"><span class="c5">Reasons for Specimen Rejection</span></p></td>
      <td class="c23 c122" colspan="8" rowspan="1"><p class="c124"><span class="c54 c48">Sample Type</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c9 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Blood</span></p></td>
      <td class="c47 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Stool/Rectal Swab</span></p></td>
      <td class="c10 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Urine</span></p></td>
      <td class="c37 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Sputum</span></p></td>
      <td class="c25 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Pus Swab</span></p></td>
      <td class="c37 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Genital Swab</span></p></td>
      <td class="c10 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Skin snip</span></p></td>
      <td class="c10 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">Others</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20 c48">01. Inadequate specimen volume</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['inadequate_specimen_volume']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['inadequate_specimen_volume']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['inadequate_specimen_volume']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['inadequate_specimen_volume']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['inadequate_specimen_volume']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['inadequate_specimen_volume']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['inadequate_specimen_volume']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['inadequate_specimen_volume']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20 c48">02. Hemolyzed specimen</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['hemolyzed_specimen']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['hemolyzed_specimen']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['hemolyzed_specimen']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['hemolyzed_specimen']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['hemolyzed_specimen']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['hemolyzed_specimen']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['hemolyzed_specimen']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['hemolyzed_specimen']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20 c48">03. Specimen without lab request form</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['specimen_without_lab_request_form']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['specimen_without_lab_request_form']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['specimen_without_lab_request_form']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['specimen_without_lab_request_form']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['specimen_without_lab_request_form']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['specimen_without_lab_request_form']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['specimen_without_lab_request_form']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['specimen_without_lab_request_form']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20">04. No test specified on </span><span class="c1">lab request form accompanying specimen</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20 c48">05. Specimen without label or identifier</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['Specimen_without_label_or_identifier']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['Specimen_without_label_or_identifier']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['Specimen_without_label_or_identifier']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['Specimen_without_label_or_identifier']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['Specimen_without_label_or_identifier']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['Specimen_without_label_or_identifier']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['Specimen_without_label_or_identifier']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['Specimen_without_label_or_identifier']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c1">06. Wrong specimen label</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['Wrong_specimen_label']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['Wrong_specimen_label']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['Wrong_specimen_label']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['Wrong_specimen_label']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['Wrong_specimen_label']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['Wrong_specimen_label']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['Wrong_specimen_label']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['Wrong_specimen_label']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20">07. Unclear specimen label</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['Unclear_specimen_label']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['Unclear_specimen_label']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['Unclear_specimen_label']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['Unclear_specimen_label']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['Unclear_specimen_label']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['Unclear_specimen_label']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['Unclear_specimen_label']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['Unclear_specimen_label']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20 c48">08. Wrong specimen container</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['Wrong_specimen_container']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['Wrong_specimen_container']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['Wrong_specimen_container']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['Wrong_specimen_container']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['Wrong_specimen_container']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['Wrong_specimen_container']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['Wrong_specimen_container']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['Wrong_specimen_container']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20">09. Damaged </span><span class="c20 c48">specimen</span><span class="c1">&nbsp;container</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['Damaged_specimen_container']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['Damaged_specimen_container']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['Damaged_specimen_container']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['Damaged_specimen_container']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['Damaged_specimen_container']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['Damaged_specimen_container']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['Damaged_specimen_container']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['Damaged_specimen_container']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20">10. Too old </span><span class="c20 c48">specimen</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['Too_old_specimen']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['Too_old_specimen']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['Too_old_specimen']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['Too_old_specimen']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['Too_old_specimen']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['Too_old_specimen']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['Too_old_specimen']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['Too_old_specimen']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20">11. Date of </span><span class="c20 c48">specimen</span><span class="c1">&nbsp;collection not specified</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['Date_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['Date_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['Date_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['Date_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['Date_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['Date_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['Date_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['Date_of_specimen_collection_not_specified']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20">12. Time of </span><span class="c20 c48">specimen</span><span class="c1">&nbsp;collection not specified</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['Time_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['Time_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['Time_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['Time_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['Time_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['Time_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['Time_of_specimen_collection_not_specified']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['Time_of_specimen_collection_not_specified']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c20">13. </span><span class="c20 c48">Specimen</span><span class="c1">&nbsp;type unacceptable for required test</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['Specimen_type_unacceptable_for_required_test']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['Specimen_type_unacceptable_for_required_test']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['Specimen_type_unacceptable_for_required_test']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['Specimen_type_unacceptable_for_required_test']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['Specimen_type_unacceptable_for_required_test']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['Specimen_type_unacceptable_for_required_test']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['Specimen_type_unacceptable_for_required_test']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['Specimen_type_unacceptable_for_required_test']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c35" colspan="1" rowspan="1"><p class="c6"><span class="c1">14. Other reasons</span></p></td>
      <td class="c9" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$blood_specimen_rejection['Other_reasons']}}</span></p></td>
      <td class="c47" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$stool_specimen_rejection['Other_reasons']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$urine_specimen_rejection['Other_reasons']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$sputum_specimen_rejection['Other_reasons']}}</span></p></td>
      <td class="c25" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$pus_specimen_rejection['Other_reasons']}}</span></p></td>
      <td class="c37" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$genital_specimen_rejection['Other_reasons']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$skin_specimen_rejection['Other_reasons']}}</span></p></td>
      <td class="c10" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{$other_specimen_rejection['Other_reasons']}}</span></p></td>
    </tr>
    <tr class="c17">
      <td class="c99 c23" colspan="1" rowspan="1"><p class="c96"><span class="c5">Totals </span></p></td>
      <td class="c9 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$blood_specimen_rejection['inadequate_specimen_volume']+(int)$blood_specimen_rejection['hemolyzed_specimen']+(int)$blood_specimen_rejection['specimen_without_lab_request_form']+(int)$blood_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']+(int)$blood_specimen_rejection['Specimen_without_label_or_identifier']+(int)$blood_specimen_rejection['Wrong_specimen_label']+(int)$blood_specimen_rejection['Unclear_specimen_label']+(int)$blood_specimen_rejection['Wrong_specimen_container']+(int)$blood_specimen_rejection['Damaged_specimen_container']+(int)$blood_specimen_rejection['Too_old_specimen']+(int)$blood_specimen_rejection['Date_of_specimen_collection_not_specified']+(int)$blood_specimen_rejection['Time_of_specimen_collection_not_specified']+(int)$blood_specimen_rejection['Specimen_type_unacceptable_for_required_test']+(int)$blood_specimen_rejection['Other_reasons'] }}</span></p></td>
      <td class="c47 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$stool_specimen_rejection['inadequate_specimen_volume']+(int)$stool_specimen_rejection['hemolyzed_specimen']+(int)$stool_specimen_rejection['specimen_without_lab_request_form']+(int)$stool_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']+(int)$stool_specimen_rejection['Specimen_without_label_or_identifier']+(int)$stool_specimen_rejection['Wrong_specimen_label']+(int)$stool_specimen_rejection['Unclear_specimen_label']+(int)$stool_specimen_rejection['Wrong_specimen_container']+(int)$stool_specimen_rejection['Damaged_specimen_container']+(int)$stool_specimen_rejection['Too_old_specimen']+(int)$stool_specimen_rejection['Date_of_specimen_collection_not_specified']+(int)$stool_specimen_rejection['Time_of_specimen_collection_not_specified']+(int)$stool_specimen_rejection['Specimen_type_unacceptable_for_required_test']+(int)$stool_specimen_rejection['Other_reasons'] }}</span></p></td>
      <td class="c10 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$urine_specimen_rejection['inadequate_specimen_volume']+(int)$urine_specimen_rejection['hemolyzed_specimen']+(int)$urine_specimen_rejection['specimen_without_lab_request_form']+(int)$urine_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']+(int)$urine_specimen_rejection['Specimen_without_label_or_identifier']+(int)$urine_specimen_rejection['Wrong_specimen_label']+(int)$urine_specimen_rejection['Unclear_specimen_label']+(int)$urine_specimen_rejection['Wrong_specimen_container']+(int)$urine_specimen_rejection['Damaged_specimen_container']+(int)$urine_specimen_rejection['Too_old_specimen']+(int)$urine_specimen_rejection['Date_of_specimen_collection_not_specified']+(int)$urine_specimen_rejection['Time_of_specimen_collection_not_specified']+(int)$urine_specimen_rejection['Specimen_type_unacceptable_for_required_test']+(int)$urine_specimen_rejection['Other_reasons'] }}</span></p></td>
      <td class="c25 c23" colspan="1" rowspan="1"><p class="c6"><span class="c5">{{(int)$sputum_specimen_rejection['inadequate_specimen_volume']+(int)$sputum_specimen_rejection['hemolyzed_specimen']+(int)$sputum_specimen_rejection['specimen_without_lab_request_form']+(int)$sputum_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']+(int)$sputum_specimen_rejection['Specimen_without_label_or_identifier']+(int)$sputum_specimen_rejection['Wrong_specimen_label']+(int)$sputum_specimen_rejection['Unclear_specimen_label']+(int)$sputum_specimen_rejection['Wrong_specimen_container']+(int)$sputum_specimen_rejection['Damaged_specimen_container']+(int)$sputum_specimen_rejection['Too_old_specimen']+(int)$sputum_specimen_rejection['Date_of_specimen_collection_not_specified']+(int)$sputum_specimen_rejection['Time_of_specimen_collection_not_specified']+(int)$sputum_specimen_rejection['Specimen_type_unacceptable_for_required_test']+(int)$sputum_specimen_rejection['Other_reasons'] }}</span></p></td>
      <td class="c37 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$pus_specimen_rejection['inadequate_specimen_volume']+(int)$pus_specimen_rejection['hemolyzed_specimen']+(int)$pus_specimen_rejection['specimen_without_lab_request_form']+(int)$pus_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']+(int)$pus_specimen_rejection['Specimen_without_label_or_identifier']+(int)$pus_specimen_rejection['Wrong_specimen_label']+(int)$pus_specimen_rejection['Unclear_specimen_label']+(int)$pus_specimen_rejection['Wrong_specimen_container']+(int)$pus_specimen_rejection['Damaged_specimen_container']+(int)$pus_specimen_rejection['Too_old_specimen']+(int)$pus_specimen_rejection['Date_of_specimen_collection_not_specified']+(int)$pus_specimen_rejection['Time_of_specimen_collection_not_specified']+(int)$pus_specimen_rejection['Specimen_type_unacceptable_for_required_test']+(int)$pus_specimen_rejection['Other_reasons'] }}</span></p></td>
      <td class="c10 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$genital_specimen_rejection['inadequate_specimen_volume']+(int)$genital_specimen_rejection['hemolyzed_specimen']+(int)$genital_specimen_rejection['specimen_without_lab_request_form']+(int)$genital_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']+(int)$genital_specimen_rejection['Specimen_without_label_or_identifier']+(int)$genital_specimen_rejection['Wrong_specimen_label']+(int)$genital_specimen_rejection['Unclear_specimen_label']+(int)$genital_specimen_rejection['Wrong_specimen_container']+(int)$genital_specimen_rejection['Damaged_specimen_container']+(int)$genital_specimen_rejection['Too_old_specimen']+(int)$genital_specimen_rejection['Date_of_specimen_collection_not_specified']+(int)$genital_specimen_rejection['Time_of_specimen_collection_not_specified']+(int)$genital_specimen_rejection['Specimen_type_unacceptable_for_required_test']+(int)$genital_specimen_rejection['Other_reasons'] }}</span></p></td>
      <td class="c10 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$skin_specimen_rejection['inadequate_specimen_volume']+(int)$skin_specimen_rejection['hemolyzed_specimen']+(int)$skin_specimen_rejection['specimen_without_lab_request_form']+(int)$skin_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']+(int)$skin_specimen_rejection['Specimen_without_label_or_identifier']+(int)$skin_specimen_rejection['Wrong_specimen_label']+(int)$skin_specimen_rejection['Unclear_specimen_label']+(int)$skin_specimen_rejection['Wrong_specimen_container']+(int)$skin_specimen_rejection['Damaged_specimen_container']+(int)$skin_specimen_rejection['Too_old_specimen']+(int)$skin_specimen_rejection['Date_of_specimen_collection_not_specified']+(int)$skin_specimen_rejection['Time_of_specimen_collection_not_specified']+(int)$skin_specimen_rejection['Specimen_type_unacceptable_for_required_test']+(int)$skin_specimen_rejection['Other_reasons'] }}</span></p></td>
      <td class="c37 c23" colspan="1" rowspan="1"><p class="c0"><span class="c5">{{(int)$other_specimen_rejection['inadequate_specimen_volume']+(int)$other_specimen_rejection['hemolyzed_specimen']+(int)$other_specimen_rejection['specimen_without_lab_request_form']+(int)$other_specimen_rejection['No_test_specified_on_lab_request_form_accompanying_specimen']+(int)$other_specimen_rejection['Specimen_without_label_or_identifier']+(int)$other_specimen_rejection['Wrong_specimen_label']+(int)$other_specimen_rejection['Unclear_specimen_label']+(int)$other_specimen_rejection['Wrong_specimen_container']+(int)$other_specimen_rejection['Damaged_specimen_container']+(int)$other_specimen_rejection['Too_old_specimen']+(int)$other_specimen_rejection['Date_of_specimen_collection_not_specified']+(int)$other_specimen_rejection['Time_of_specimen_collection_not_specified']+(int)$other_specimen_rejection['Specimen_type_unacceptable_for_required_test']+(int)$other_specimen_rejection['Other_reasons'] }}</span></p></td>
    </tr>
  </tbody>
</table>
		</div>
        
        
        
	</div>
</div>

@stop