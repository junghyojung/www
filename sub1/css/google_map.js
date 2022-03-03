// JavaScript Document

 function initialize() {
  var myLatlng = new google.maps.LatLng(37.545687, 126.951612);
  var myOptions = {
   zoom: 15,
   center: myLatlng

  }
  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
  var marker = new google.maps.Marker({
   position: myLatlng, 
   map: map, 
   title:"(주)효성그룹(본사)"
  });   
  
 
  var infowindow = new google.maps.InfoWindow({
   content: "(주)효성그룹(본사)"
  });
 
  infowindow.open(map,marker);
 }
 
 
 window.onload=function(){
  initialize();
 }

