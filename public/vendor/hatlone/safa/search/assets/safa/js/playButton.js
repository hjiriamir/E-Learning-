// Lancer la vidéo
function startVideo() {
    var video = document.getElementsByClassName("videoPlayer")[0];
    video.play();
}

function stopPropagation(event) {
    event.stopPropagation();
}


$(document).ready(function(){
    $(document).on('click', function(event) {
        // Vérifiez si le clic n'est pas dans la modalité vidéo ou dans l'un de ses enfants
        if (!$(event.target).closest('.vd-modal').length && !$(event.target).is('.vd-modal')) {
            // Fermer la modalité vidéo
            $('.vd-modal').modal('hide');
        }
    });
});

function startVideo1() {
    var video = document.getElementsByClassName("videoPlayer1")[0];
    video.play();
}
