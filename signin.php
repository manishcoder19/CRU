<!DOCTYPE html>
<html>
<style>
@import 'https://fonts.googleapis.com/css?family=Mountains+of+Christmas';
html {
  width: 100%;
  height: 100%;
  margin: 0;
}

body {
  height: 100%;
  margin: 0;
   background-image:url(14.jpg);
    overflow: hidden;
  opacity:1.5;
}

canvas {
  position: absolute;

}
h1 {
  position: fixed;
  margin: 0 auto;
  bottom: 1em;
  left: 0;
  right: 0;
  width: 20em;
  text-align: center;
  font-size: 1.4em;
  font-weight: 100;
  font-family: 'Mountains of Christmas';
  color: white;
  text-shadow: 0 0 20px black;
  opacity: .8;
}
#form{
     color:white;
       width:60%;
	height:35px;
	padding:11px;
	font-size:30px;
	box-shadow:15px 15px 25px black;
	border:2px solid #8A2BE2;
	background:#CDAFA8;
        border-radius:0 100px 0 100px ;
    animation:example 5s linear alternate; 
	}
   @keyframes example {
100%{
    transform:translate3d(0px,0px,0px0px,);
  }
 

 0%{
    transform:translate3d(210px,0px,0px);
  }
  
}

	
	.form-control{
	width:60%;
	border-bottom:15px;
	border: solid #8A2BE2;
	box-shadow:9px 9px 25px black;
        margin-bottom:20px;
       margin-left:10px;
      border-radius: 30px 0 30px 0;
      padding:5px 50px 5px 50px;
	}
	.form-control:focus{
	border: solid red;
	box-shadow:15px 15px 25px black;
  
	}

	
	#login{
	background:#8A2BE2;
	box-shadow:9px 9px 25px black;
	text-decoration:none;
	border:2px solid #8A2BE2;
	padding:5px 25px 5px 25px;
	font-size:20px;
	color:black;
     border-radius: 50px 0 50px 0;
	}
	
	#login:focus{
	border:2px solid black;
	box-shadow:9px 9px 25px black;
	box-shadow:15px 15px 25px black;
   
	}
	
	#box{
	background:#CDAFA8;
	border:2px solid #8A2BE2;
	padding:55px;
	box-shadow:9px 9px 25px black;
      border-radius: 150px 0 150px 0;
       width:30%;
       animation:exam 5s linear alternate; 
	}

@keyframes exam {
100%{
   transform:translate3d(0px,0px,0px)
  }

 0%{
 
  transform:translate3d(-210px,0px,0px)
  }
}

label{box-shadow:9px 9px 25px black;
background:#8A2BE2;
color:white;
padding:10px 50px 10px 50px;
font-size:22px;
border-radius: 75px 0 75px 0;
width:100%;}

input[type=text], input[type=password]{
  outline:none;
}

span {
    display: inline-block;
    position: relative;
    padding: 4px;
    margin-top: 10px;
    width: 300px;
    background-color: #CDAFA8;
    border-radius: 5px;
    font: 20px verdana;
    color: #fff; 
    text-align:center;
   
}
p {
    margin: 5px;
}
</style>
<body>
    <span>
<p><b><i><a style=text-decoration:none;  href="signup.php">Signup</a></i></b>
<b><i><a style=text-decoration:none; href="index.php">Home</a></i></b>
<b><i><a style=text-decoration:none; href="team.php">Team</a></i></b></p>
</span>
<form action="login.php" method="post" name="myform">
<center><p id="form"><i>Please Login</i></P>
<div id="box">
<label>Entet name  </label></br>
  </br><input type="text" class="form-control" name="name"></br>
<label>Password </label></br> </br><input type="password" class="form-control" name="password">
</br>
</br>
<input type="submit"id="login" value="Login" onclick="dosubmit();">
<input type="button"id="login" value="Clear" onclick="doclear();">
</center>
	</form>
</div>
<script>
function dosubmit()
{
if (validateText() == false)
	{
	alert("Required data missing in Step 1");
	return;
	}
	alert("Your data has been submitted");
	return;
	}
function validateText()
	{
	var user = document.myform.name.value; 
	if (user.length == 0) return false; 
	var pass= document.myform.password.value; 
	if (pass.length == 0) return false;
	alert("Username "+ user +"  Password " + pass);
}
function doclear()
{
document.myform.name.value = "";
	document.myform.password.value = "";
 }
 
</script>
<canvas></canvas>
<script>
(function() {

  var regular_stars = [],
    falling_star;

  var R = Math.PI / 5;
  var G = 1.2;
  var TOTAL = 35;
  var SIZE = 3.8;
  var CURVE = 0.25;
  var ENERGY = 0.02;
  var FALLING_CHANCE = 0.1;

  var canvas = document.querySelector('canvas');
  var cx = canvas.getContext('2d');
  canvas.style.backgroundColor = '#000822';
  resizeViewport();

  function Star() {
    this.r = Math.random() * SIZE * SIZE + SIZE;
    this.rp = Math.PI / Math.random();
    this.rd = Math.random() * 2 - 1;
    this.c = Math.random() * (CURVE * 2 - CURVE) + CURVE;
    this.x = Math.random() * canvas.width;
    this.y = Math.random() * canvas.height;
    this.e = 0;
    this.d = false;
  }

  function FallingStar() {
    Star.call(this);
    this.y = Math.random() * canvas.height / 2;
    this.falling = false;
  }

  function setShape(p) {
    var o = p.o;
    cx.save();
    cx.beginPath();
    cx.translate(o.x, o.y);
    cx.rotate(o.rp);
    o.rp += o.rd * 0.01;
    cx.moveTo(0, 0 - o.r);
    for (var i = 0; i < 5; i++) {
      cx.rotate(R);
      cx.lineTo(0, 0 - o.r * o.c);
      cx.rotate(R);
      cx.lineTo(0, 0 - o.r);
    }
  }

  function drawShape() {
    cx.stroke();
    cx.fill();
    cx.restore();
  }

  Star.prototype.shine = function() {
    this.d ? this.e -= ENERGY : this.e += ENERGY;
    if (this.e > 1 - ENERGY && this.d === false) {
      this.d = true;
    }
    setShape({
      o: this
    });
    cx.strokeStyle = "rgba(255, 209, 143, " + this.e + ")";
    cx.shadowColor = "rgba(255, 209, 143, " + this.e + ")";
    cx.fillStyle = "rgba(255, 209, 143, " + this.e + ")";
    cx.lineWidth = this.c * 2;
    cx.shadowBlur = this.r / SIZE;
    cx.shadowOffsetX = 0;
    cx.shadowOffsetY = 0;
    drawShape();
  };

  FallingStar.prototype.shine = function() {
    this.d ? this.e -= ENERGY * 0.2 : this.e += ENERGY * 5;
    if (this.e > 1 - ENERGY && this.d === false) {
      this.d = true;
    }
    setShape({
      o: this
    });
    cx.strokeStyle = "rgba(221, 19, 255, " + this.e * 2 + ")";
    cx.shadowColor = "rgba(221, 19, 255, " + this.e * 2 + ")";
    cx.fillStyle = "rgba(221, 19, 255, " + this.e * 2 + ")";
    cx.lineWidth = this.c * 2;
    cx.shadowBlur = 50;
    cx.shadowOffsetX = 0;
    cx.shadowOffsetY = 0;
    drawShape();
  };

  FallingStar.prototype.fall = function() {
    this.e -= ENERGY * 0.5;
    this.r -= this.r * ENERGY;
    cx.save();
    cx.translate(this.x + this.vx, this.y + this.vy);
    cx.scale(1, Math.pow(this.e, 2));
    cx.beginPath();
    cx.rotate(this.rp);
    this.rp += .1;
    cx.moveTo(0, 0 - this.r);
    for (var i = 0; i < 5; i++) {
      cx.rotate(R);
      cx.lineTo(0, 0 - this.r * this.c);
      cx.rotate(R);
      cx.lineTo(0, 0 - this.r);
    }
    this.vx += this.vx;
    this.vy += (this.vy * G);
    cx.strokeStyle = "rgba(255, 210, 93, " + 1 / this.e + ")";
    cx.shadowColor = "rgba(255, 210, 93, " + 1 / this.e + ")";
    cx.fillStyle = "rgba(255, 210, 93, " + 1 / this.e + ")";
    cx.shadowBlur = 100;
    drawShape();
  };

  function redrawWorld() {
    resizeViewport();
    cx.clearRect(0, 0, canvas.width, canvas.height);
    if (regular_stars.length < TOTAL) regular_stars.push(new Star);
    for (var i = 0; i < regular_stars.length; i++) {
      regular_stars[i].shine();
      if (regular_stars[i].d === true && regular_stars[i].e < ENERGY) {
        regular_stars.splice(regular_stars[i], 1);
      }
    }
    if (!falling_star && FALLING_CHANCE > Math.random()) {
      falling_star = new FallingStar;
    }
    if (falling_star) {
      falling_star.falling ? falling_star.fall() : falling_star.shine();
      if (falling_star.e < ENERGY) {
        falling_star = null;
      }
    }
    requestAnimationFrame(redrawWorld, canvas);
  }

  function resizeViewport() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }

  function mouseMove(e) {
    if (falling_star) {
      if (e.clientX > falling_star.x - falling_star.r && e.clientX < falling_star.x + falling_star.r && e.clientY > falling_star.y - falling_star.r && e.clientY < falling_star.y + falling_star.r) {
        if (!falling_star.falling) {
          falling_star.falling = true;
          falling_star.e = 1;
          falling_star.r *= 2;
          falling_star.vy = 0.001;
          if (e.clientX > canvas.width / 2) {
            falling_star.vx = -(Math.random() * .01 + .01);
          } else {
            falling_star.vx = Math.random() * .01 + .01;
          }
        }
      }
    }
  }

  document.addEventListener('resize', resizeViewport, false);
  canvas.addEventListener('mousemove', mouseMove, false);
  canvas.addEventListener("touchstart", mouseMove, false)
  redrawWorld();

})();
</script>
</body>
</html>

