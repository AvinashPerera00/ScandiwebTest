$(document).ready(function() {
    $('#productType').change(function() {
      var selectedType = $(this).val();
      if (selectedType == 'dvd') {
        $('#dvd_details').show();
        $('#book_details').hide();
        $('#furniture_details').hide();
      } else if (selectedType == 'book') {
        $('#dvd_details').hide();
        $('#book_details').show();
        $('#furniture_details').hide();
      } else if (selectedType == 'furniture') {
        $('#dvd_details').hide();
        $('#book_details').hide();
        $('#furniture_details').show();
      }
    });
});
  