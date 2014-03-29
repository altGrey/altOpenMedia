function fooDataAssistGETShow() {
	
	   DarkShow = window.frames['dataAssist'].document.getElementById('show').innerHTML;
}
function fooDataAssistGETStatus() {
	DarkStatus = window.frames['dataAssist'].document.getElementById('status').innerHTML;
	
}
function fooDataAssistUPDATEShow() {
	document.getElementById("dataSHOW1").innerHTML = DarkShow;
	document.getElementById("dataSHOW2").innerHTML = DarkShow;
}
function fooDataAssistUPDATEStatus() {
	document.getElementById("dataSTATUS1").innerHTML = DarkStatus;
	document.getElementById("dataSTATUS2").innerHTML = DarkStatus;
}
function fooDataAssistManualUpdate() {
	window.frames['dataAssist'].location.href=window.frames['dataAssist'].location.href;
   fooDataAssistGETShow();
			fooDataAssistGETStatus();
			fooDataAssistUPDATEShow();
			fooDataAssistUPDATEStatus();
}
