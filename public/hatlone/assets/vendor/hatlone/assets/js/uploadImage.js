const imageInput = document.getElementById('imageInput');
const imagePreview = document.getElementById('imagePreview');
const icon = document.querySelector('.uploadImg .iconImg');

imageInput.addEventListener('change', function() {
const file = imageInput.files[0];
const reader = new FileReader();

reader.addEventListener('load', function() {
    imagePreview.src = reader.result;
    icon.remove();
}, false);

if (file) {
    reader.readAsDataURL(file);
}
}, false);


