function iniciarMap(){
    var coord={lat:25.5407847,lng:-103.4614101 };
    var map =new google.maps.Map(document.getElementById('map'),{
        zoom:18,
        center:coord


    });
    var marker =new google.maps.Marker({
        position: coord,
        map:map
    });
}