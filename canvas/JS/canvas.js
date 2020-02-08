// 初始化
var canvas=document.getElementById('canvas');
var eraser=document.getElementById('btn');
var content=canvas.getContext('2d');
Window_Size();
window.onresize=function(){
	Window_Size();
}
window.ontouchmove=function(e){
    e.preventDefault && e.preventDefault();
}
var is_draw=false;
var lastLine={x:undefined,y:undefined};
var is_eraser=false;
eraser.onclick=function(e){
	if(is_eraser){
		is_eraser=false;
	}else{
		is_eraser=true;
	}
}
if(document.body.ontouchstart===null){
	// 手机端
	canvas.ontouchstart=function(e){
		is_draw=true;
		lastLine={x:e.touches[0].clientX,y:e.touches[0].clientY};
	}
	
	canvas.ontouchmove=function(e){
		if(is_eraser && is_draw){
			var newLine={x:e.touches[0].clientX,y:e.touches[0].clientY};
			Earser_Line(lastLine,newLine);
			lastLine=newLine;
		}else if(is_draw){
			var newLine={x:e.touches[0].clientX,y:e.touches[0].clientY};
			Draw_Line(lastLine,newLine);
			lastLine=newLine;
		}
	}
	
	canvas.ontouchend=function(){
		is_draw=false;
	}
}else{
	// 电脑端
	canvas.onmousedown=function(e){
		is_draw=true;
		lastLine={x:e.clientX,y:e.clientY};
	}
	
	canvas.onmousemove=function(e){
		if(is_eraser && is_draw){
			var newLine={x:e.clientX,y:e.clientY};
			Earser_Line(lastLine,newLine);
			lastLine=newLine;
		}else if(is_draw){
			var newLine={x:e.clientX,y:e.clientY};
			Draw_Line(lastLine,newLine);
			lastLine=newLine;
		}
	}
	
	canvas.onmouseup=function(){
		is_draw=false;
	}
}

//划线
function Draw_Line(lastLine,newLine){
	content.beginPath();
	// console.log(lastLine,newLine);
	content.strokeStyle='red';
	content.lineWidth=50;
	content.moveTo(lastLine.x,lastLine.y);
	content.lineTo(newLine.x,newLine.y);
	content.stroke();
}

// 橡皮擦
function Earser_Line(lastLine,newLine){
	content.beginPath();
	// console.log(lastLine,newLine);
	content.clearRect(lastLine.x-25,lastLine.y-25,50,50);
}

// 修改画布大小
function Window_Size(){
	canvas.width=document.documentElement.clientWidth;
	canvas.height=document.documentElement.clientHeight;
}