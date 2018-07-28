
<html>
<head>
<title>Angular & PHP Crud</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="app.js"></script>
<link rel="stylesheet" type="text/css" href="a.css">
<link rel="stylesheet" type="text/css" href="b.css">
<style>
    body{
        background-color:#DAF7A6  ;
        opacity:0.9;
    }
.btn{
  background-image: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);
}
.btn{
  background-image: linear-gradient(to right, #ffecd2 0%, #fcb69f 51%, #ffecd2 100%);
}
h1{
    color:#581845;
}
#bg {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: -1;
}

#bg canvas {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
</style>
</head>
<body ng-app="myApp" ng-controller="myController">
    <div id="bg">
  <canvas></canvas>
  <canvas></canvas>
  <canvas></canvas>
</div>
<div class="container">  

 <div class="search-wrapper">
    <div class="input-holder">
        <input type="text" class="search-input" placeholder="Enter product that you want to search"ng-model="searchText">
        <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
    </div>
    <span class="close" onclick="searchToggle(this, event);"></span>
</div>
 
<hr>
<div class="btn">
    <a href="index.php"><button class="btn btn-info btn-lg pull-right" type="button" data-toggle="modal" data-target="#modalAdd">Logout</button></a>
    <button class="btn btn-info btn-lg pull-left" type="button" data-toggle="modal" data-target="#modalAdd">Add New</button></div>

<span class="clearfix"></span>
	<hr>
<div class="alert alert-success alert-dismissable" ng-if="messageInfo">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{messageInfo}}
	</div>
	<div class="table-responsive">
		<table class="table table-striped  table-responsive table-hover ">
			<thead>
				<tr class="warning">
					<th>Index</th>
					<th>productname</th>
                                         <th>price</th>
                   
                                        <th>quantity</th>
					<th>Email</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
                            <tr class="warning" ng-repeat="user in users| filter:searchText">{{ user.productname }}{{ user.email }}
			<td>{{$index + 1}}</td>
			<td>{{user.productname}}</td>
                         <td>{{user.price}}</td>
                          <td>{{user.quality}}</td>
			    <td>{{user.email}}</td>
<td><button type="button" class=" btn btn-info" data-toggle="modal" data-target="#modaledit" ng-click="selectUser(user)">Edit</button></td>
<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete" ng-click="selectUser(user)">Delete</button></td>
</tr>
</tbody>
</table>
</div>
</div>

<div class="modal fade" id="modalAdd" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add new</h4>
</div>
<div class="modal-body">
<form action="insert1.php" method="post" class="form-horizontal">
<div class="form-group">
<label class="control-label col-md-2">productname</label>
<div class="col-md-10">
<input type="text" name="productname" class="form-control" ng-model="newUser.productname" ">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2">price</label>
<div class="col-md-10">
<input type="text" name="price" class=" form-control"  ng-model="newUser.price">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2">quantity</label>
<div class="col-md-10">
<input type="text" name="quantity" class=" form-control"  ng-model="newUser.quality">
</div>			
</div>
<div class="form-group">
<label class="control-label col-md-2">Email</label>
<div class="col-md-10">
<input type="email" name="Email" class=" form-control" ng-model="newUser.email">
</div>
</div>
<div class="form-group">
<div class="col-md-2 col-md-offset-2">
<input type="button" value="submit" class="btn btn-inf" ng-click="saveUser()" data-dismiss="modal">
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-info pull-right" data-dismiss="modal" >Close</button>		
</div>
</div>
</div>
</div>
<div class="modal fade" id="modaledit" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit Record</h4>
</div>
<div class="modal-body">
<form class="form-horizontal">
<div class="form-group">
<label class="control-label col-md-2">productname</label>
<div class="col-md-10">
<input type="text" class="form-control" ng-model="clickedUser.productname">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2">price</label>
<div class="col-md-10">
<input type="text" class=" form-control" ng-model="clickedUser.price">
</div>
</div>
 <div class="form-group">
<label class="control-label col-md-2">qualtity</label>
<div class="col-md-10">
<input type="text" class=" form-control" ng-model="clickedUser.quality">
</div>
</div>
<div class="form-group">
 <label class="control-label col-md-2">Email</label>
<div class="col-md-10">
<input type="email" class=" form-control"  ng-model="clickedUser.email">
</div>
</div>
<div class="form-group">
<div class="col-md-2 col-md-offset-2">
<button type="submit" class="btn btn-info " ng-click="updateUser()" data-dismiss="modal">Update</button>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-info pull-right" data-dismiss="modal" >Close</button>		
</div>
</div>
</div>
</div>
<div class="modal fade" id="modaldelete" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Are you sure?</h4>
</div>
<div class="modal-body">
<strong style="color:green;">You are going to delete {{clickedUser.productname}}</strong>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-info " data-dismiss="modal" ng-click="deleteUser()">Yes</button> 
<button type="button" class="btn btn-info " data-dismiss="modal" >No</button>		
</div>
</div>
</div>
</div>
    <h3><center>by-Manish Gupta</center></h3>
    
<script>
var myApp = angular.module("myApp",[]);
myApp.controller("myController",function($scope){

	$scope.messageInfo="";

	$scope.newUser = {};

	$scope.users=[ 
		{productname: "Iphone", price: "50,000", quality: "10", email:"mg143566@gmail.com"},
		{productname: "Redmi", price: "10,000",quality: "10", email:"mg921918@gmail.com"},
                {productname: "samsung", price: "20,000",quality: "20", email:"mg921918@gmail.com"},
                {productname: "Lenovo", price: "18,000",quality: "10", email:"mg921918@gmail.com"},
                {productname: "HTC", price: "15,000",quality: "20", email:"mg921918@gmail.com"},
                {productname: "Vivo", price: "15,000",quality: "10", email:"mg921918@gmail.com"},
	];

	$scope.saveUser = function(){
		$scope.users.push($scope.newUser);
		$scope.newUser = {};
		$scope.messageInfo="Records Saved";	
	};

	$scope.selectUser=function(user){ 
		$scope.clickedUser=user;	
	};

	$scope.updateUser=function(){
		$scope.messageInfo="Record was edited";
	};

	$scope.deleteUser = function(){
		$scope.users.splice($scope.users.indexOf($scope.clickedUser),1);
		$scope.messageInfo="Record has been deleted";
	};


});


</script>
<script>
function searchToggle(obj, evt){
    var container = $(obj).closest('.search-wrapper');
        if(!container.hasClass('active')){
            container.addClass('active');
            evt.preventDefault();
        }
        else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
            container.removeClass('active');
            // clear input
            container.find('.search-input').val('');
        }
}
</script>
<script>
(function($){
	var canvas = $('#bg').children('canvas'),
		background = canvas[0],
		foreground1 = canvas[1],
		foreground2 = canvas[2],
		config = {
			circle: {
				amount: 18,
				layer: 3,
				color: [157, 97, 207],
				alpha: 0.3
			},
			line: {
				amount: 12,
				layer: 3,
				color: [255, 255, 255],
				alpha: 0.3
			},
			speed: 0.5,
			angle: 20
		};

	if (background.getContext){
		var bctx = background.getContext('2d'),
			fctx1 = foreground1.getContext('2d'),
			fctx2 = foreground2.getContext('2d'),
			M = window.Math, // Cached Math
			degree = config.angle/360*M.PI*2,
			circles = [],
			lines = [],
			wWidth, wHeight, timer;
		
		requestAnimationFrame = window.requestAnimationFrame || 
			window.mozRequestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.msRequestAnimationFrame ||
			window.oRequestAnimationFrame ||
			function(callback, element) { setTimeout(callback, 1000 / 60); };

		cancelAnimationFrame = window.cancelAnimationFrame ||
			window.mozCancelAnimationFrame ||
			window.webkitCancelAnimationFrame ||
			window.msCancelAnimationFrame ||
			window.oCancelAnimationFrame ||
			clearTimeout;

		var setCanvasHeight = function(){
			wWidth = $(window).width();
			wHeight = $(window).height(),

			canvas.each(function(){
				this.width = wWidth;
				this.height = wHeight;
			});
		};

		var drawCircle = function(x, y, radius, color, alpha){
			var gradient = fctx1.createRadialGradient(x, y, radius, x, y, 0);
			gradient.addColorStop(0, 'rgba('+color[0]+','+color[1]+','+color[2]+','+alpha+')');
			gradient.addColorStop(1, 'rgba('+color[0]+','+color[1]+','+color[2]+','+(alpha-0.1)+')');

			fctx1.beginPath();
			fctx1.arc(x, y, radius, 0, M.PI*2, true);
			fctx1.fillStyle = gradient;
			fctx1.fill();
		};

		var drawLine = function(x, y, width, color, alpha){
			var endX = x+M.sin(degree)*width,
				endY = y-M.cos(degree)*width,
				gradient = fctx2.createLinearGradient(x, y, endX, endY);
			gradient.addColorStop(0, 'rgba('+color[0]+','+color[1]+','+color[2]+','+alpha+')');
			gradient.addColorStop(1, 'rgba('+color[0]+','+color[1]+','+color[2]+','+(alpha-0.1)+')');

			fctx2.beginPath();
			fctx2.moveTo(x, y);
			fctx2.lineTo(endX, endY);
			fctx2.lineWidth = 3;
			fctx2.lineCap = 'round';
			fctx2.strokeStyle = gradient;
			fctx2.stroke();
		};

		var drawBack = function(){
			bctx.clearRect(0, 0, wWidth, wHeight);

			var gradient = [];
			
			gradient[0] = bctx.createRadialGradient(wWidth*0.3, wHeight*0.1, 0, wWidth*0.3, wHeight*0.1, wWidth*0.9);
			gradient[0].addColorStop(0, 'rgb(0, 26, 77)');
			gradient[0].addColorStop(1, 'transparent');

			bctx.translate(wWidth, 0);
			bctx.scale(-1,1);
			bctx.beginPath();
			bctx.fillStyle = gradient[0];
			bctx.fillRect(0, 0, wWidth, wHeight);

			gradient[1] = bctx.createRadialGradient(wWidth*0.1, wHeight*0.1, 0, wWidth*0.3, wHeight*0.1, wWidth);
			gradient[1].addColorStop(0, 'rgb(0, 150, 240)');
			gradient[1].addColorStop(0.8, 'transparent');

			bctx.translate(wWidth, 0);
			bctx.scale(-1,1);
			bctx.beginPath();
			bctx.fillStyle = gradient[1];
			bctx.fillRect(0, 0, wWidth, wHeight);

			gradient[2] = bctx.createRadialGradient(wWidth*0.1, wHeight*0.5, 0, wWidth*0.1, wHeight*0.5, wWidth*0.5);
			gradient[2].addColorStop(0, 'rgb(40, 20, 105)');
			gradient[2].addColorStop(1, 'transparent');

			bctx.beginPath();
			bctx.fillStyle = gradient[2];
			bctx.fillRect(0, 0, wWidth, wHeight);
		};

		var animate = function(){
			var sin = M.sin(degree),
				cos = M.cos(degree);

			if (config.circle.amount > 0 && config.circle.layer > 0){
				fctx1.clearRect(0, 0, wWidth, wHeight);
				for (var i=0, len = circles.length; i<len; i++){
					var item = circles[i],
						x = item.x,
						y = item.y,
						radius = item.radius,
						speed = item.speed;

					if (x > wWidth + radius){
						x = -radius;
					} else if (x < -radius){
						x = wWidth + radius
					} else {
						x += sin*speed;
					}

					if (y > wHeight + radius){
						y = -radius;
					} else if (y < -radius){
						y = wHeight + radius;
					} else {
						y -= cos*speed;
					}

					item.x = x;
					item.y = y;
					drawCircle(x, y, radius, item.color, item.alpha);
				}
			}

			if (config.line.amount > 0 && config.line.layer > 0){
				fctx2.clearRect(0, 0, wWidth, wHeight);
				for (var j=0, len = lines.length; j<len; j++){
					var item = lines[j],
						x = item.x,
						y = item.y,
						width = item.width,
						speed = item.speed;

					if (x > wWidth + width * sin){
						x = -width * sin;
					} else if (x < -width * sin){
						x = wWidth + width * sin;
					} else {
						x += sin*speed;
					}

					if (y > wHeight + width * cos){
						y = -width * cos;
					} else if (y < -width * cos){
						y = wHeight + width * cos;
					} else {
						y -= cos*speed;
					}
					
					item.x = x;
					item.y = y;
					drawLine(x, y, width, item.color, item.alpha);
				}
			}

			timer = requestAnimationFrame(animate);
		};

		var createItem = function(){
			circles = [];
			lines = [];

			if (config.circle.amount > 0 && config.circle.layer > 0){
				for (var i=0; i<config.circle.amount/config.circle.layer; i++){
					for (var j=0; j<config.circle.layer; j++){
						circles.push({
							x: M.random() * wWidth,
							y: M.random() * wHeight,
							radius: M.random()*(20+j*5)+(20+j*5),
							color: config.circle.color,
							alpha: M.random()*0.2+(config.circle.alpha-j*0.1),
							speed: config.speed*(1+j*0.5)
						});
					}
				}
			}

			if (config.line.amount > 0 && config.line.layer > 0){
				for (var m=0; m<config.line.amount/config.line.layer; m++){
					for (var n=0; n<config.line.layer; n++){
						lines.push({
							x: M.random() * wWidth,
							y: M.random() * wHeight,
							width: M.random()*(20+n*5)+(20+n*5),
							color: config.line.color,
							alpha: M.random()*0.2+(config.line.alpha-n*0.1),
							speed: config.speed*(1+n*0.5)
						});
					}
				}
			}

			cancelAnimationFrame(timer);
			timer = requestAnimationFrame(animate);
			drawBack();
		};

		$(document).ready(function(){
			setCanvasHeight();
			createItem();
		});
		$(window).resize(function(){
			setCanvasHeight();
			createItem();
		});
	}
})(jQuery);
</script>
</body>
</html>

