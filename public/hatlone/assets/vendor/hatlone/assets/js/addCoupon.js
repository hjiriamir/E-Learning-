const addCouponButton = document.querySelector('.moreCoupon');
    addCouponButton.addEventListener('click', () => {
    const couponRow = document.getElementById('myCoupon2');
    const newCouponRow = couponRow.cloneNode(true);
    couponRow.parentNode.insertBefore(newCouponRow, addCouponButton);
    couponRow.parentNode.appendChild(addCouponButton);

    const newMaxDiscount = newCouponRow.querySelector('#maxDiscount');
    newMaxDiscount.addEventListener('input', () => {
        if (newMaxDiscount.value.length > 2) {
        newMaxDiscount.value = newMaxDiscount.value.slice(0, 2);
        }
    });
});

