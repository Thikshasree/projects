<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<base href="http://www.coothead.co.uk/images/"><!--this is for coothead testing and can be removed-->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="language" content="english"> 
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">

<title>random background-image rotation</title>

<style type="text/css">
body {
    background-image:url(anim.gif);
</style>

<script type="text/javascript">

   var num;
   var temp=0;
   var speed=5000; /* this is set for 5 seconds, edit value to suit requirements */
   var preloads=[];

/* add any number of images here */

preload(
        'tree.gif',
        'tree1.jpg',
        'book.jpg',
        'read.jpg',
        'book1.jpg',
        'question.jpg'
       );

function preload(){

for(var c=0;c<arguments.length;c++) {
   preloads[preloads.length]=new Image();
   preloads[preloads.length-1].src=arguments[c];
  }
 }

function rotateImages() {
   num=Math.floor(Math.random()*preloads.length);
if(num==temp){
   rotateImages();
 }
else{
   document.body.style.backgroundImage='url('+preloads[num].src+')';
   temp=num;

setTimeout(function(){rotateImages()},speed);
  }
 }

if(window.addEventListener){
   window.addEventListener('load',function(){setTimeout(function(){rotateImages()},speed)},false);
 }
else { 
if(window.attachEvent){
   window.attachEvent('onload',function(){setTimeout(function(){rotateImages()},speed)});
  }
 }
</script>

</head>
<body>

<div>
</div>

</body>
</html>