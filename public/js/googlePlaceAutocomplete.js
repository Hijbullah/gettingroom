let autocomplete;
let types = ['needrooms', 'offerrooms', 'needapartments', 'offerapartments']
let type = types.includes(window.location.href.substring(window.location.href.lastIndexOf('/') + 1)) ? window.location.href.substring(window.location.href.lastIndexOf('/') + 1) : 'needrooms';


function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));
    autocomplete.addListener('place_changed', function(){
        let place = autocomplete.getPlace();
        let location = place.formatted_address;
        let lat = place.geometry.location.lat();
        let lng = place.geometry.location.lng();
        window.location.href = `/lists/${type}?loc=${location}&lat=${lat}&lng=${lng}`;
    });
}
initAutocomplete();


// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
// function geolocate() {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(function (position) {
//             var geolocation = {
//                 lat: position.coords.latitude,
//                 lng: position.coords.longitude
//             };
//             var circle = new google.maps.Circle(
//                 { center: geolocation, radius: position.coords.accuracy });
//             autocomplete.setBounds(circle.getBounds());
//         });
//     }
// }