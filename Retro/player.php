

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPTV Player</title>
    <script src="https://content.jwplatform.com/libraries/IDzF9Zmk.js"></script>
    <style>
        body {
            font-family: Poppins, sans-serif;
            background: #000;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        #videoContainer {
            width: 100%;
            height: 80vh;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div id="videoContainer"></div>

<script>
    function getQueryParam(key) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(key);
    }

    function playChannel(url) {
        jwplayer('videoContainer').setup({
            file: url,
            width: "100%",
            height: "100%",
            aspectratio: "16:9",
            autostart: true
        });
    }

    window.onload = function() {
        const channelUrl = getQueryParam('id');
        if (channelUrl) {
            playChannel(channelUrl);
        } else {
            document.getElementById('videoContainer').innerHTML = 'No channel URL provided.';
        }
    }
</script>

</body>
</html>
