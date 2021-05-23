<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="js/1351.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
    $('.img-home-1').hover(function () {
        $(this).find('.fa-play-circle').show();
    }, function () {
        $(this).find('.fa-play-circle').hide();
    });
    $('.img-home-2').hover(function () {
        $(this).find('.fa-play-circle').show();
    }, function () {
        $(this).find('.fa-play-circle').hide();
    });
    $('.img-home-3').hover(function () {
        $(this).find('.fa-play-circle').show();
    }, function () {
        $(this).find('.fa-play-circle').hide();
    });
    $('.img-home-4').hover(function () {
        $(this).find('.fa-play-circle').show();
    }, function () {
        $(this).find('.fa-play-circle').hide();
    });
});
</script>
<script>
$(function () {
  $(window).scroll(function () {
	  var $nav = $(".navbar");
	  $nav.toggleClass('fixed-top scrolled', $(this).scrollTop() > $nav.height());
        var value = $(this).scrollTop();
        if (value > 100)
            $(".logo").attr("src", "pics/Logo-white-01.png");
        else
            $(".logo").attr("src", "pics/Logo-01.png");
  });
});
</script>
<script>
function checkStrength(password){
  let meterStatus = $("#meter-text").find("#meter-status");
  let strength = 0;
  if(password.length < 6){
    meterStatus.css("color","#6B778D");
    meterStatus.text("too short") ;
  }
  if(password.length > 7) strength += 1;
  if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
  if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
  if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
  if(strength < 2){
    meterStatus.css("color","red");
    meterStatus.text("weak");
  }else if(strength == 2){
    meterStatus.css("color","#ff6a00");
    meterStatus.text("good");
  }else{
    meterStatus.css("color","green");
    meterStatus.text("strong");
  }
}

$("#input-password").on("keyup",function(){
 checkStrength($(this).val());
});
</script>
