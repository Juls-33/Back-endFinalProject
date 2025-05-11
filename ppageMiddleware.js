$(document).ready(function() {
  // Get the modelID from the URL
  const urlParams = new URLSearchParams(window.location.search);
  const modelId = urlParams.get('id');
  
  if (modelId) {
    $.ajax({
      url: 'ppquery.php',
      data: {id: modelId},
      method: 'GET',
      success: function(pdetails) {
        $('#mainpart').html(pdetails);
      },
      error: function(xhr, status, error) {
        console.error('Error loading product details: ' + error);
        $('#mainpart').html('Error loading product details. Please try again.');
      }
    });
  } else {
    $('#mainpart').html('No product ID provided.');
  }
});