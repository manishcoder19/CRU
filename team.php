<html>
<head>
<style>
@import url(https://fonts.googleapis.com/css?family=Lato:400,300,700);
body {
  width: 100%;
  margin: 0;
  opacity:0.8;
  overflow: hidden;
}
canvas {
  width: 100%;
  height: 100%;
}
#card {
  overflow:hidden;
  text-align:center;
  width:320px;
  height:535px;
  background: url(9.jpg);
  background-size:cover;
  background-position:center center;
  position:absolute;
  top:0; left:0; right:0; bottom:0;
  margin:auto;
  box-shadow: 
    0px 30px 30px -20px rgba(0,0,0,1), 
    inset 0 0 0 1000px rgba(67,52,109,.6);
  transition: all .4s cubic-bezier(.37,.26,.35,1)
}
#card:hover { 
  box-shadow: 
    0px 30px 30px -20px rgba(0,0,0,.9), 
    inset 0 0 0 1000px rgba(67,52,109,.2);
}
#card:hover #avatar {
  animation:none;
  box-shadow:0;
  width:200px; 
  height:200px;
}

#card:hover #profile{
  opacity:1;
  bottom:0;
}
#profile {
  transition: all .5s cubic-bezier(.37,.26,.35,1);
  opacity:0;
  position:absolute; 
  bottom:20px; 
  width:100%;
}
#profile h1 {
  color:#fff;
  padding:0;
  margin:0;
}

#profile h3 {
  color:#aaa;
  padding:0;
  margin:5px 0 40px 0; 
  font-size:.9em
}
#avatar {
  transition: all .4s cubic-bezier(.37,.26,.35,1);
  animation: circleAn 4s infinite;
  width:150px; height:150px;
  position:absolute;
  top:0; left:0; right:0; bottom:0;
  margin:auto;
  background:url(manish_1.jpg);
  background-size:cover;
  background-position:center center;
  border-radius:100%;
  box-shadow:0px 30px 30px -25px rgba(0,0,0,0.6);
}
@keyframes circleAn {
  0%   { 
    box-shadow:
      0px 30px 30px -25px rgba(0,0,0,0.6), 
      0px 0px 0px 0px rgba(102,52,105,1), 
      0px 0px 0px 0px rgba(102,52,105,.7),
      0px 0px 0px 0px rgba(102,52,105,.5);
  }
 100% { 
   box-shadow:
     0px 30px 30px -25px rgba(0,0,0,0.6), 
     0px 0px 0px 70px rgba(102,52,105,0),
     0px 0px 0px 200px rgba(102,52,105,0),
     0px 0px 0px 300px rgba(102,52,105,0);
  }
}
span {
    display: inline-block;
    position: relative;
    padding: 4px;
    width: 300px;
    margin-top: 10px;
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
<div id="card">
  <div id="avatar"></div>
  <div id="profile">
    <h1>Manish Gupta</h1>
    <h3> Student of CSE</h3>
  </div>
</div>
<canvas id="canv" width="32" height="32">
<script>
var c = document.getElementById('canv');
var $ = c.getContext('2d');


var col = function(x, y, r, g, b) {
  $.fillStyle = "rgb(" + r + "," + g + "," + b + ")";
  $.fillRect(x, y, 1,1);
}
var R = function(x, y, t) {
  return( Math.floor(192 + 64*Math.cos( (x*x-y*y)/300 + t )) );
}

var G = function(x, y, t) {
  return( Math.floor(192 + 64*Math.sin( (x*x*Math.cos(t/4)+y*y*Math.sin(t/3))/300 ) ) );
}

var B = function(x, y, t) {
  return( Math.floor(192 + 64*Math.sin( 5*Math.sin(t/9) + ((x-100)*(x-100)+(y-100)*(y-100))/1100) ));
}

var t = 0;

var run = function() {
  for(x=0;x<=35;x++) {
    for(y=0;y<=35;y++) {
      col(x, y, R(x,y,t), G(x,y,t), B(x,y,t));
    }
  }
  t = t + 0.120;
  window.requestAnimationFrame(run);
}

run();

</script>
</body>
</html>

