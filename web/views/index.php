<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuAnalytics</title>
    <link rel="stylesheet" href="extras/bootstrap.min.css">
    <script src="extras/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .content {
            background: none;
            display: flex;
            align-items: center;
            justify-content: center;
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
        <h1>WELCOME</h1>
    </div>

</body>

</html>