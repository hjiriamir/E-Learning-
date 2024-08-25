var count = 3;

function addCoupon() {
  count = count + 1;
  $("#coupon").append("<div class='couponBox '><div class='row'><div class='card box1 col-lg-9'><div class='row'><div class='card border-0 text-center col-lg-3'><input class='border-0 text-center' type='text' placeholder='.........................' class='bg-white border-0'></div><div class='text-center percent col-lg-3'><input class='text-center border-0' type='number' max='99' min='0' placeholder='.........'>%</div><div class='card border-0 text-center col-lg-3'><input class='border-0' type='date' style='font-size: 15px;' class='bg-white'></div><div class='card border-0 text-center col-lg-3'><input class='border-0 text-center' type='number' placeholder='........................' class='bg-white'></div></div></div><div class='card col-lg-3 enableCoupon'>Enable Coupon</div></div></div>"+"<span class=''><a class='btn border-0'>"
  +"<i class='bi bi-trash iconEnable'></i></a></span></div>");
}

function deleteELement(e, item) {
  e.preventDefault();
  $(item).parent().fadeOut('200', function() { 
    $(item).parent().remove();
  });
}

$(function() {
 
   $("#add-coupon").on('click', function(e){
     e.preventDefault();
     addCoupon()
   });

  $("#coupon").on('click', '.removeItemElement', function(e){
    var item = this; 
    deleteELement(e, item)
  })

});
