
function calculator() {
  var x = document.getElementById("hours");
  var selection = hours.options[hours.selectedIndex].value;
  var result;
  switch (selection) {
    case "1":
      result = '$25.00';
      break;
    case "2":
      result = '$45.00';
      break;
    case "3":
      result = '$65.00';
      break;
    case "4":
      result = '$80.00';
      break;
  }
  document.getElementById("price").value = result;
}

function showReviews() {
    var x = document.getElementById('recentReviews');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}


$(window).on('scroll', function () {
    var pixs = $(document).scrollTop()
    pixs = pixs/24;
    $("#banner").css({"-webkit-filter": "blur("+pixs+"px)","filter": "blur("+pixs+"px)" })
});
