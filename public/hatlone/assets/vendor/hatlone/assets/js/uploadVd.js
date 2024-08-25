const videoInput = document.getElementById('videoInput');
const videoPreview = document.getElementById('videoPreview');
const iconVd = document.querySelector('.uploadVd .iconVd');

videoInput.addEventListener('change', function() {
const file = videoInput.files[0];
const reader = new FileReader();

reader.addEventListener('load', function() {
    videoPreview.src = reader.result;
    iconVd.remove(); 
    videoPreview.style.display = 'block'; 
}, false);

if (file) {
    reader.readAsDataURL(file);
}
}, false);