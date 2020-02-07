// 初始化
var canvas=document.getElementById('canvas');
var content=canvas.getContext('2d');
Window_Size();
window.onresize=function(){
	Window_Size();
}

var is_draw=false;
var lastLine={x:undefined,y:undefined};
canvas.onmousedown=function(e){
	is_draw=true;
	lastLine={x:e.clientX,y:e.clientY};
}

canvas.onmousemove=function(e){
	if(is_draw){
	var newLine={x:e.clientX,y:e.clientY};
		Draw_Line(lastLine,newLine);
		lastLine=newLine;
	}
}

canvas.onmouseup=function(){
	is_draw=false;
}

//划线
function Draw_Line(lastLine,newLine){
	content.beginPath();
	console.log(lastLine,newLine);
	content.strokeStyle='red';
	content.lineWidth='5px';
	content.moveTo(lastLine.x,lastLine.y);
	content.lineTo(newLine.x,newLine.y);
	content.stroke();
}
// 修改画布大小
function Window_Size(){
	canvas.width=document.documentElement.clientWidth;
	canvas.height=document.documentElement.clientHeight;
}