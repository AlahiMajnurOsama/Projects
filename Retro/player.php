<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player - Retro IPTV</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: white;
        }
        .player-container {
            padding: 20px;
            text-align: center;
        }
        .loading-indicator {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 4px solid #3b82f6;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div id="app" class="player-container">
        <h1 class="text-2xl font-bold">Playing Channel</h1>
        <div v-if="loading" class="flex items-center justify-center my-4">
            <div class="loading-indicator"></div>
        </div>
        <div id="videoContainer" v-if="!loading"></div>
    </div>
    <script src="https://content.jwplatform.com/libraries/IDzF9Zmk.js"></script>
    <script>
        const params = new URLSearchParams(window.location.search);
        const playerUrl = decodeURIComponent(params.get('id'));
        new Vue({
            el: '#app',
            data() {
                return {
                    loading: true
                };
            },
            mounted() {
                if (this.isValidUrl(playerUrl)) {
                    this.initPlayer(playerUrl);
                } else {
                    alert('Invalid streaming URL.');
                }
            },
            methods: {
                isValidUrl(url) {
                    return url && (url.startsWith('http://') || url.startsWith('https://'));
                },
                initPlayer(url) {
                    jwplayer("videoContainer").setup({
                        playlist: [{
                            sources: [{
                                file: url,
                                type: "hls"
                            }]
                        }],
                        primary: "html5",
                        autostart: true,
                        aspectratio: "16:9"
                    });
                    this.loading = false;
                }
            }
        });
    </script>
</body>
</html>
```
