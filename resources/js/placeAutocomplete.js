
import { OpenStreetMapProvider } from 'leaflet-geosearch';
const provider = new OpenStreetMapProvider();


let types = ['needrooms', 'offerrooms', 'needapartments', 'offerapartments']
let type = types.includes(window.location.href.substring(window.location.href.lastIndexOf('/') + 1)) ? window.location.href.substring(window.location.href.lastIndexOf('/') + 1) : 'needrooms';


$('.searchtype').click(function(e){
    e.preventDefault();

    if ($('#placesearch').val()){
        $('.searchtype').removeClass('gr-active');
        $(this).addClass('gr-active');
        type = $(this).data('type');
    }else{
        window.location.href = $(this).attr('href');
    }
})


$('#placesearch').keyup(function(event) { 
    let value = $(this).val();
    if(value.length >= 3) {
        provider
            .search({ query: value })
            .then(result => {
                let dom = generateDom(result);
                $('#place-content').html(dom);
                $('#place-content').removeClass('d-none');
            })
    }else{
        $('#place-content').innerHTML = '';
        $('#place-content').addClass('d-none');
    }
});

$(document).on('click', '.address-item', function () { 
    let location = $(this).text();
    let lat = $(this).data('lat');
    let lng = $(this).data('lng');
    $('#place-content').addClass('d-none');
    window.location.href = `/lists/${type}?loc=${location}&lat=${lat}&lng=${lng}`;

});


function generateDom(result){
    let html = `<ul class="list-group">`;
    if(result.length > 0) {
        result.forEach(element => {
            html += `
                 <li class="list-group-item address-item" data-lat="${element.y}" data-lng="${element.x}">${element.label}</li>
            `;
        });
    }else{
        html += `
                 <li class="list-group-item">No result found</li>
            `;
    }

    html += `</ul>`;
    return html;
}


