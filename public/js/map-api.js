var myEx = document.getElementById('location');
myEx.addEventListener('click',function(){
	document.getElementById('myModal3').style.display = 'block';
	
})

function myMap() {
	 var uluru = {lat: 21.008922, lng: 105.828548};
	var mapProp= {
		center:new google.maps.LatLng(21.008922, 105.828548),
		zoom:15,
	};
	var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
	var marker = new google.maps.Marker({position: uluru, map: map});
}
var closeBtn = document.getElementById('map_close');
closeBtn.addEventListener('click',function(){
	document.getElementById('myModal3').style.display = 'none';
})