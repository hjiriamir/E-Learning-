// JavaScript
var video = document.getElementById('video-preview');
var recorder;
var mediaStream;

function startRecording() {
    navigator.mediaDevices.getUserMedia({ audio: true, video: true })
        .then(function(stream) {
            mediaStream = stream;
            video.srcObject = stream;
            recorder = new MediaRecorder(stream);
            var chunks = [];

            recorder.ondataavailable = function(event) {
                if (event.data.size > 0) {
                    chunks.push(event.data);
                }
            };

            recorder.onstop = function() {
                var blob = new Blob(chunks, { type: 'video/webm' });
                var url = URL.createObjectURL(blob);
                video.srcObject = null;
                video.src = url;
                mediaStream.getTracks().forEach(track => track.stop());
                var recordedVideoFile = new File([blob], 'video.webm', { type: 'video/webm' });
            
                // Create a new FormData object
                var formData = new FormData();
                formData.append('video', recordedVideoFile, 'video.webm');
            
                // Set the hidden input value with the recorded video file
                var hiddenInput = document.getElementById('hidden-video-input');
                hiddenInput.value = recordedVideoFile;
            
                // You can also remove the hidden input name and filename attributes if necessary
                // hiddenInput.removeAttribute('name');
                // hiddenInput.removeAttribute('filename');
            };

            recorder.start();
            document.getElementById('btn-start-recording').disabled = true;
            document.getElementById('btn-stop-recording').disabled = false;
        })
        .catch(function(error) {
            console.error('Unable to capture your camera. Please check console logs.');
            console.error(error);
        });
}

function stopRecording() {
    recorder.stop();
    document.getElementById('btn-stop-recording').disabled = true;
}

document.getElementById('btn-start-recording').onclick = startRecording;
document.getElementById('btn-stop-recording').onclick = stopRecording;

 