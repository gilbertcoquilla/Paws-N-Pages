function initMap() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showMap);
    } else {
      alert('Geolocation is not supported by this browser.');
    }
  }
  
  function showMap(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
  
    const mapDiv = document.getElementById('map');
  
    const mapOptions = {
      center: { lat: latitude, lng: longitude },
      zoom: 15
    };
  
    const map = new google.maps.Map(mapDiv, mapOptions);
  
    const marker = new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map
    });
  }
  
  window.onload = function() {
    initMap();
  };
  