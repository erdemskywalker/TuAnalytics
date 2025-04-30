$(".fileForm").css("display", "none");


const toggleSwitch = document.getElementById('toggleSwitch');
toggleSwitch.addEventListener('change', function() {
    if (this.checked) {
        $(".cameraForm").css("display", "none");
        $(".fileForm").css("display", "block");
    } else {
        $(".cameraForm").css("display", "block");
        $(".fileForm").css("display", "none");
    }
});



const video = document.getElementById('video');
const canvas = document.createElement('canvas');
const img = document.querySelector('#cameraForm img');
const captureButton = document.querySelector('#cameraForm button');
if (navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({
            video: true
        })
        .then(function(stream) {
            video.srcObject = stream;
        })
        .catch(function(error) {
            console.log("Hata oluştu:", error);
        });
}
captureButton.addEventListener('click', function(e) {
    e.preventDefault();
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
    img.src = canvas.toDataURL('image/png');
    document.getElementById('photoData').value = img.src;
});
const fileInput = document.querySelector('#fileForm input[type="file"]');
const fileImg = document.querySelector('#fileForm img');
fileInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            fileImg.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});