var count = 3;

function addCoupon() {
  count = count + 1;
  $("#coupon").append("<div class=' mb-3 mt-3'><div class= 'row coupon_added'><div class='col-lg-11 card mb-3'><div class='row'><div class='card border-0 text-center col-lg-3'><input type='text' placeholder='.........................' class='text-center border-0' id='my-input-coupon1'></div><div class=' text-center percent col-lg-3'><input class='text-center border-0' type='number' id='myInput' max='99' min='0' placeholder='.........'>%</div><div class='card border-0 text-center col-lg-3'><input class='border-0' type='date' style='font-size: 15px;' id='my-input-coupon2' class='bg-white'></div><div class='card border-0 text-center col-lg-3'><input class='text-center border-0' type='number' placeholder='........................' id='my-input-coupon3'></div></div></div><div class='col-lg-1 mb-3'><i class='bi bi-trash' style='cursor: pointer'></i></div></div></div>");
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
