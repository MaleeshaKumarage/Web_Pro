
//original canvas
var canvas = document.querySelector('#myChart4');
var context = canvas.getContext('2d');

new Chart(context).Line(myChart);

//hidden canvas
var newCanvas = document.querySelector('#myChart3');
newContext = newCanvas.getContext('2d');

var myChart3 = new Chart(newContext).Line(myChart);
myChart3.defaults.global = {
	scaleFontSize: 600
}

//add event listener to button
document.getElementById('download-pdf').addEventListener("click", downloadPDF);

//donwload pdf from original canvas
function downloadPDF() {
  var canvas = document.querySelector('#myChart4');
	//creates image
	var canvasImg = canvas.toDataURL("image/jpeg", 1.0);

	//creates PDF from img
	var doc = new jsPDF('landscape');
	doc.setFontSize(20);
	doc.text(15, 15, "Cool Chart");
	doc.addImage(canvasImg, 'JPEG', 10, 10, 280, 150 );
	doc.save('canvas.pdf');
}

//add event listener to 2nd button
document.getElementById('download-pdf2').addEventListener("click", downloadPDF2);

//download pdf form hidden canvas
function downloadPDF2() {
	var newCanvas = document.querySelector('#myChart3');

  //create image from dummy canvas
	var newCanvasImg = newCanvas.toDataURL("image/jpeg", 1.0);

  	//creates PDF from img
	var doc = new jsPDF('landscape');
	doc.setFontSize(20);
	doc.text(15, 15, "Super Cool Chart");
	doc.addImage(newCanvasImg, 'JPEG', 10, 10, 280, 150 );
	doc.save('new-canvas.pdf');
 }
