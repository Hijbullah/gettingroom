let autocomplete;
let types = ['needrooms', 'offerrooms', 'needapartments', 'offerapartments']
let type = types.includes(window.location.href.substring(window.location.href.lastIndexOf('/') + 1)) ? window.location.href.substring(window.location.href.lastIndexOf('/') + 1) : 'offerrooms';


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



$('.searchtype').click(function (e) {
    e.preventDefault();

    if ($('#autocomplete').val()) {
        $('.searchtype').removeClass('gr-active');
        $(this).addClass('gr-active');
        type = $(this).data('type');
    } else {
        window.location.href = $(this).attr('href');
    }
});

$('#autocomplete').keyup(function(){
    if ($(this).val().length > 0){
        $('.clearsearch').removeClass('d-none');
    }else{
        $('.clearsearch').addClass('d-none');
    }
})

$('.clearsearch').click(function(e){
    e.preventDefault();
    if($('#autocomplete').val()){
        $('#autocomplete').val('');
        axios.get('/clear-search');
        history.pushState(null, null, window.location.pathname);
        $(this).addClass('d-none');
        return;
    }else{
        return;
    }
})

if ($('#autocomplete').val()){
    $('.clearsearch').removeClass('d-none');
};