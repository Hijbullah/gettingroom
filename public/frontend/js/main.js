
$(document).ready(function() {
  $(function () {
      $('.selectpicker').selectpicker();
  });

  $(function() {
        $('#loginwith').on('changed.bs.select', function (e, clickedIndex) {
            let location = '';
            switch (clickedIndex) {
                case 1:
                    location = '/login/facebook';
                    break;
                case 2:
                    location = '/login/google';
                    break;
                case 3:
                    location = '/login/linkedin';
                    break;
                case 4:
                    location = '/login';
                    break;
                default:
                    location = '/login';
            }

            window.location.href = location;
        });

  });

});