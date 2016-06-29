
var main = function(){


    var l = $("address").attr("value");
    l = l.split(",");
    var x = 0;
    for (x=0;x<l.length;x++){
        l[x] = parseFloat(l[x]);
    }

    var mapDiv = document.getElementById('map');
    var map = new google.maps.Map(mapDiv, {
          center: {lat: l[0], lng: l[1]},
          zoom: 18
          //mapTypeId: google.maps.MapTypeId.ROADMAP
    });


    var markerPos = new google.maps.LatLng(l[0], l[1]);

    var marker = new google.maps.Marker({
       position: markerPos,
       map: map,
       title: "Restaurant"
    });

};






$(document).ready(main);