<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuAnalytics</title>
    <link rel="stylesheet" href="extras/bootstrap.min.css">
    <script src="extras/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="extras/style.css">
    <script src="extras/jquery-3.7.1.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a href="./">TuAnalytics</a>
        </div>
    </nav>
    <div class="container content_three">
        <div class="header">
            <h2>Yeni Kişi Ekle</h2>
            <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
            </label>
        </div>

        <div id="cameraForm" class="cameraForm">
            <button class="extrasButton">Foto Çek</button>
            <form action="add.php" method="post">
                <div class="photoBox">
                    <video id="video" autoplay playsinline muted></video>
                    <img src="">
                </div>
                <input type="hidden" name="photoData" id="photoData">
                <input type="text" name="name" required placeholder="Ad">
                <input type="datetime-local" required name="datetime">
                <button>Kaydet</button>
            </form>
        </div>

        <div id="fileForm" class="fileForm">
            <form action="add.php" method="post" enctype="multipart/form-data">
                <div class="photoBox">
                    <label for="fileInput" class="file-upload">📁 Dosya Yükle</label>
                    <input type="file" id="fileInput" name="fileInput">
                    <img src="">
                </div>
                <input type="text" name="name" required placeholder="Ad">
                <input type="datetime-local" required name="datetime">
                <button>Kaydet</button>
            </form>
        </div>
    </div>
    <script src="extras/app.js"></script>
</body>

</html>