<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuAnalytics</title>
    <link rel="stylesheet" href="extras/bootstrap.min.css">
    <script src="extras/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="extras/jquery-3.7.1.js"></script>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 200px;
            height: 34px;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #5B4488;
            transition: 0.4s;
            border-radius: 34px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 50px;
            left: 4px;
            bottom: 4px;
            background-color: rgb(192, 192, 192);
            transition: 0.4s;
            border-radius: 20px;
        }
        
        input:checked+.slider {
            background-color: #5B4488;
        }
        
        input:checked+.slider:before {
            transform: translateX(140px);
        }
        
        .content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        
        form {
            width: 100%;
        }
        
        input {
            width: 100%;
            border-radius: 15px;
            height: 50px;
            border: none;
            padding: 5px;
            margin-top: 20px;
        }
        
        input:focus {
            outline: none;
        }
        
        .content button {
            width: 100%;
            border-radius: 15px;
            height: 50px;
            border: none;
            padding: 5px;
            margin-top: 20px;
            background-color: #3E4D88;
            color: white;
        }
        
        .photoBox {
            width: 100%;
            height: 500px;
            margin-top: 10px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .photoBox * {
            background-color: rebeccapurple;
            width: 50%;
            margin: 20px;
            height: 100%;
        }
        
        #fileForm {
            display: none;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a href="./">TuAnalytics</a>
            <div>
                <button onclick="window.location='persons'" type="button" class="btn btn-primary">persons</button>
                <button onclick="window.location='addperson'" type="button" class="btn btn-primary">add persons</button>
                <button onclick="window.location='logs'" type="button" class="btn btn-primary">logs</button>
            </div>
        </div>
    </nav>
    <div class="container content">
        <h2>ADD PERSON</h2>
        <label class="switch">
            <input type="checkbox" id="toggleSwitch">
            <span class="slider"></span>
        </label>
        <form id="cameraForm" action="add.php" method="POST">
            <button style="width: 40%;">Çek</button>
            <div class="photoBox">
                <video id="video" autoplay playsinline muted></video>
                <img src="">
            </div>
            <input type="hidden" name="photoData" id="photoData">
            <input type="text" name="name" required placeholder="Name">
            <input type="datetime-local" required name="datetime">
            <button>Gönder</button>
        </form>
        <form id="fileForm" action="add.php" method="POST" enctype="multipart/form-data">
            <div class="photoBox">
                <input type="file" name="fileInput">
                <img src="">
            </div>
            <input type="text" name="name" placeholder="Name">
            <input type="datetime-local" name="datetime">
            <button>Gönder</button>
        </form>
    </div>
    <script>
        const toggleSwitch = document.getElementById('toggleSwitch');
        toggleSwitch.addEventListener('change', function() {
            if (this.checked) {
                $("#cameraForm").css("display", "none");
                $("#fileForm").css("display", "block");
            } else {
                $("#cameraForm").css("display", "block");
                $("#fileForm").css("display", "none");
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
    </script>
</body>

</html>