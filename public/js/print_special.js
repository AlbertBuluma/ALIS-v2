var gAutoPrint = true; // Tells whether to automatically call the print function

function printSpecial(header_msg)
{
if (document.getElementById != null)
{
var html = "<HTML>\n<HEAD>\n<style>@media print{table{width:100%;} div#content{font-family:Arial; font-size:0.7em; color:;} td{font-family:Arial; font-size:0.7em;color:;}}</style>";

if (document.getElementsByTagName != null)
{
var headTags = document.getElementsByTagName("head");
if (headTags.length > 0)
html += headTags[0].innerHTML;
}

html += "\n</HEAD>\n<BODY align=''>\n<div id='content'>";

html += "<div id='' style='background-color:white; padding-left:5px; padding-left:5px;'><center><b>"+header_msg+"</b><hr></center>";

var printReadyElem = document.getElementById("printReady");

if (printReadyElem != null)
{
html += printReadyElem.innerHTML;
}
else
{
alert("Could not find the printReady function");
return;
}

html += "\n</div></BODY>\n</HTML>";

var printWin = window.open("","printSpecial");
printWin.document.open();
printWin.document.write(html);
printWin.document.close();
if (gAutoPrint){
printWin.print();
printWin.onfocus=function(){ printWin.close();}}
}
else
{
alert("The print ready feature is only available if you are using an browser. Please update your browswer.");
}
}