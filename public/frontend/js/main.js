
$(document).ready(function() {
  $(function () {
      $('.selectpicker').selectpicker();
  });

  $(function() {
        $('#loginwith').on('changed.bs.select', function (e, clickedIndex) {
            let location = '';
            switch (clickedIndex) {
                case 1:
                    location = '/socialauth/facebook';
                    break;
                case 2:
                    location = '/socialauth/google';
                    break;
                case 3:
                    location = '/socialauth/linkedin';
                    break;
                case 4:
                    location = '/login'; //instagram
                    break;
                case 5:
                    location = '/login'; //twitter
                    break;
                default:
                    location = '/login';
            }

            window.location.href = location;
        });

  });

});