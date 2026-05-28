<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Krishna Attitude | Divine Music + Flowers</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: 'Poppins', 'Segoe UI', 'Times New Roman', serif;
            overflow-x: hidden;
            position: relative;
            cursor: crosshair;
        }

        /* YOUR BACKGROUND IMAGE from Pinterest */
        .krishna-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background-image: url('https://i.pinimg.com/736x/45/01/c9/4501c91ffd143fc134a37ddfc3d3fd2e.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(0.85) contrast(1.05);
        }

        /* Royal Blue + Golden Glossy Overlay */
        .royal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 30% 20%, rgba(0, 25, 70, 0.4), rgba(0, 10, 30, 0.65));
            z-index: -1;
            pointer-events: none;
        }

        /* Glossy golden shine animation */
        .gloss-shine {
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,215,0,0.08) 0%, rgba(212,175,55,0.03) 50%, transparent 80%);
            pointer-events: none;
            z-index: -1;
            animation: shineMove 14s ease-in-out infinite;
        }

        @keyframes shineMove {
            0% { transform: translate(0%, 0%) rotate(0deg);}
            50% { transform: translate(5%, 3%) rotate(3deg);}
            100% { transform: translate(0%, 0%) rotate(0deg);}
        }

        /* Main Card */
        .attitude-card {
            max-width: 680px;
            width: 90%;
            margin: 2rem auto;
            position: relative;
            z-index: 10;
            background: rgba(6, 8, 22, 0.55);
            backdrop-filter: blur(12px);
            border-radius: 2.5rem;
            border: 2px solid rgba(212, 175, 55, 0.7);
            box-shadow: 0 25px 45px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,215,0,0.3) inset, 0 0 35px rgba(212,175,55,0.2);
            overflow: hidden;
            pointer-events: none;
        }

        .golden-header {
            background: linear-gradient(135deg, rgba(212,175,55,0.85), rgba(184,134,11,0.8));
            padding: 1.2rem 1rem;
            text-align: center;
            border-bottom: 2px solid #ffea9e;
        }

        .golden-header h1 {
            font-size: 1.7rem;
            font-weight: 800;
            letter-spacing: 2px;
            color: #1f1400;
            text-shadow: 0 2px 5px rgba(255,230,140,0.8);
        }

        .golden-header p {
            font-size: 0.75rem;
            font-weight: 500;
            color: #2c2410;
            letter-spacing: 1px;
        }

        .minimal-verse {
            margin: 2rem 1.5rem;
            padding: 1.5rem;
            background: rgba(0,0,0,0.55);
            border-radius: 1.8rem;
            text-align: center;
            border-left: 3px solid #d4af37;
            border-right: 3px solid #d4af37;
        }

        .english-verse {
            font-size: 1.3rem;
            font-weight: 600;
            color: #ffefb9;
            letter-spacing: 1px;
            text-shadow: 0 0 5px #b8860b;
            line-height: 1.5;
        }

        .english-sub {
            font-size: 1rem;
            font-weight: 500;
            color: #fff5e6;
            margin-top: 0.8rem;
        }

        .audio-minimal {
            text-align: center;
            padding: 0.3rem 1rem 1rem;
            color: #f5cb5c;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 1px;
        }

        /* Croccer Point */
        .croccer-point {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, #ffdd77, #d4af37);
            border-radius: 50%;
            filter: blur(8px);
            opacity: 0.55;
            z-index: 25;
            pointer-events: none;
            animation: pulseGlow 2s infinite alternate;
            box-shadow: 0 0 30px gold;
        }

        .croccer-point::after {
            content: "✨";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 32px;
            filter: blur(0px);
            text-shadow: 0 0 12px white;
            opacity: 0.9;
        }

        @keyframes pulseGlow {
            0% { transform: scale(0.9); opacity: 0.4; box-shadow: 0 0 15px gold; }
            100% { transform: scale(1.2); opacity: 0.7; box-shadow: 0 0 45px #ffcc44; }
        }

        .crystal-core {
            position: fixed;
            bottom: 40px;
            right: 40px;
            width: 14px;
            height: 14px;
            background: white;
            border-radius: 50%;
            z-index: 26;
            box-shadow: 0 0 15px 5px gold;
            pointer-events: none;
        }

        #flowerCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 30;
        }

        .footer-minimal {
            text-align: center;
            padding: 1rem;
            font-size: 0.6rem;
            color: #c9b06b;
            border-top: 1px solid rgba(212,175,55,0.4);
            background: rgba(0,0,0,0.3);
        }

        /* Play button overlay - appears if autoplay fails */
        .play-overlay {
            position: fixed;
            bottom: 80px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #d4af37, #b8860b);
            padding: 12px 28px;
            border-radius: 50px;
            color: #1f1400;
            font-weight: bold;
            cursor: pointer;
            z-index: 200;
            font-size: 14px;
            box-shadow: 0 0 20px rgba(212,175,55,0.8);
            border: 1px solid #ffea9e;
            transition: all 0.3s;
            font-family: monospace;
            letter-spacing: 1px;
            display: none;
        }

        .play-overlay:hover {
            transform: translateX(-50%) scale(1.05);
            background: linear-gradient(135deg, #e6c368, #c97e1a);
            box-shadow: 0 0 30px gold;
        }

        @media (max-width: 600px) {
            .english-verse { font-size: 1rem; }
            .english-sub { font-size: 0.85rem; }
            .golden-header h1 { font-size: 1.2rem; }
            .attitude-card { width: 95%; margin: 1rem auto; }
            .croccer-point { width: 55px; height: 55px; bottom: 70px; right: 15px; }
            .croccer-point::after { font-size: 24px; }
            .crystal-core { bottom: 85px; right: 28px; }
            .play-overlay { bottom: 100px; padding: 8px 20px; font-size: 12px; }
        }
    </style>
</head>
<body>

<div class="krishna-bg"></div>
<div class="royal-overlay"></div>
<div class="gloss-shine"></div>

<!-- Play button overlay (shows only if autoplay fails) -->
<div class="play-overlay" id="playOverlay">
    🎵 CLICK TO PLAY DIVINE MUSIC 🎵
</div>

<div class="attitude-card">
    <div class="golden-header">
        <h1>🔱 I AM KRISHNA 🔱</h1>
        <p>|| THE DIVINE ATTITUDE ||</p>
    </div>

    <div class="minimal-verse">
        <div class="english-verse">
            "I am Krishna.<br>
            My flute is the song of the universe.<br>
            My discus protects righteousness."
        </div>
        <div class="english-sub">
            ~ The Supreme Consciousness
        </div>
    </div>

    <div class="audio-minimal" id="audioStatus">
        🎵 Move your mouse anywhere to start divine music 🎵
    </div>

    <div class="footer-minimal">
        Sri Krishna · Eternal Divine Sound · Hover anywhere for more flowers
    </div>
</div>

<div class="croccer-point"></div>
<div class="crystal-core"></div>

<canvas id="flowerCanvas"></canvas>

<script>
    // ============================================================
    // YOUTUBE AUDIO - Starts on first mouse movement (100% reliable)
    // ============================================================
    
    let player = null;
    let audioStarted = false;
    let playAttempted = false;
    const statusDiv = document.getElementById('audioStatus');
    const playOverlay = document.getElementById('playOverlay');
    
    // Create a hidden container for YouTube player
    const playerContainer = document.createElement('div');
    playerContainer.style.position = 'fixed';
    playerContainer.style.bottom = '-100px';
    playerContainer.style.right = '-100px';
    playerContainer.style.width = '1px';
    playerContainer.style.height = '1px';
    playerContainer.style.opacity = '0.01';
    playerContainer.style.pointerEvents = 'none';
    playerContainer.style.zIndex = '-1';
    document.body.appendChild(playerContainer);
    
    // Load YouTube IFrame API
    function loadYouTubeAPI() {
        const tag = document.createElement('script');
        tag.src = 'https://www.youtube.com/iframe_api';
        const firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }
    
    // This function is called by YouTube API when ready
    window.onYouTubeIframeAPIReady = function() {
        player = new YT.Player(playerContainer, {
            height: '1',
            width: '1',
            videoId: 'etnQMyMPxWk',
            playerVars: {
                autoplay: 0,  // Don't autoplay initially - wait for user interaction
                controls: 0,
                rel: 0,
                showinfo: 0,
                modestbranding: 1,
                iv_load_policy: 3,
                disablekb: 1,
                fs: 0,
                playsinline: 0,
                loop: 1,
                playlist: 'etnQMyMPxWk'
            },
            events: {
                onReady: onPlayerReady,
                onStateChange: onPlayerStateChange,
                onError: onPlayerError
            }
        });
    };
    
    function onPlayerReady(event) {
        console.log('Player ready');
        playAttempted = true;
        // Don't autoplay here - wait for user interaction
    }
    
    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.PLAYING) {
            audioStarted = true;
            updateStatus('🎵 Krishna\'s divine melody is playing 🎵');
            // Hide overlay if visible
            if (playOverlay) playOverlay.style.display = 'none';
        } else if (event.data === YT.PlayerState.ENDED) {
            // Loop: replay when ended
            if (player && player.playVideo) {
                setTimeout(() => { player.playVideo(); }, 300);
            }
        } else if (event.data === YT.PlayerState.PAUSED && audioStarted) {
            // If paused and should be playing, resume
            setTimeout(() => { 
                if (player && player.getPlayerState() === 2 && audioStarted) {
                    player.playVideo();
                }
            }, 200);
        }
    }
    
    function onPlayerError(event) {
        console.log('Player error:', event);
        updateStatus('🎵 Click the button below to play music 🎵');
        if (playOverlay) playOverlay.style.display = 'flex';
    }
    
    function updateStatus(msg) {
        if (statusDiv) statusDiv.innerHTML = msg;
    }
    
    // Start audio on first user interaction (mouse move, click, or touch)
    function startAudioOnInteraction() {
        if (audioStarted) return;
        
        if (player && player.playVideo) {
            player.playVideo();
            audioStarted = true;
            updateStatus('🎵 Starting divine music... 🎵');
            
            // Also create a backup iframe for reliability
            createBackupAudio();
        } else {
            // If player not ready yet, wait a bit
            setTimeout(() => {
                if (player && player.playVideo && !audioStarted) {
                    player.playVideo();
                    audioStarted = true;
                    updateStatus('🎵 Divine music is playing 🎵');
                }
            }, 500);
        }
    }
    
    // Backup audio method
    function createBackupAudio() {
        const backupIframe = document.createElement('iframe');
        backupIframe.src = 'https://www.youtube.com/embed/etnQMyMPxWk?autoplay=1&mute=0&controls=0&rel=0&loop=1&playlist=etnQMyMPxWk';
        backupIframe.style.position = 'fixed';
        backupIframe.style.bottom = '-200px';
        backupIframe.style.right = '-200px';
        backupIframe.style.width = '1px';
        backupIframe.style.height = '1px';
        backupIframe.style.opacity = '0';
        backupIframe.style.pointerEvents = 'none';
        backupIframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope';
        document.body.appendChild(backupIframe);
    }
    
    // Manual play button handler
    if (playOverlay) {
        playOverlay.addEventListener('click', function() {
            if (player && player.playVideo) {
                player.playVideo();
                audioStarted = true;
                updateStatus('🎵 Krishna\'s divine melody is playing 🎵');
                playOverlay.style.display = 'none';
            } else {
                // Reload and try again
                window.location.reload();
            }
        });
    }
    
    // Trigger audio on first mouse movement (most intuitive)
    document.body.addEventListener('mousemove', startAudioOnInteraction, { once: true });
    document.body.addEventListener('click', startAudioOnInteraction, { once: true });
    document.body.addEventListener('touchstart', startAudioOnInteraction, { once: true });
    
    // Load YouTube API on page load
    window.addEventListener('load', () => {
        loadYouTubeAPI();
        
        // Fallback: if user doesn't move mouse, show overlay after 3 seconds
        setTimeout(() => {
            if (!audioStarted && !playAttempted) {
                if (playOverlay) playOverlay.style.display = 'flex';
                updateStatus('🎵 Click the button below to start divine music 🎵');
            }
        }, 3000);
    });
    
    // ============================================================
    // FLOWER FALLING + MOUSE HOVER BURST
    // ============================================================
    
    const canvas = document.getElementById('flowerCanvas');
    const ctx = canvas.getContext('2d');
    let width = window.innerWidth;
    let height = window.innerHeight;
    let petals = [];
    
    const petalColors = ['#ffb7c5', '#ffd966', '#ffaa88', '#e6a8d7', '#f5cb9e', '#ffbc6e', '#d4af37', '#ff9f7a', '#f7c56e', '#ffc0cb', '#ffe0b5', '#ffb3ba', '#ffcc99'];
    
    function resizeCanvas() {
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = width;
        canvas.height = height;
    }
    
    class Petal {
        constructor(x = null, y = null, fromHover = false) {
            if (x !== null && y !== null) {
                this.x = x + (Math.random() - 0.5) * 35;
                this.y = y + (Math.random() - 0.5) * 30;
                this.isHoverFlower = true;
            } else {
                this.x = Math.random() * width;
                this.y = Math.random() * height - height * 0.8;
                this.isHoverFlower = false;
            }
            this.size = 5 + Math.random() * 13;
            this.speedY = 0.8 + Math.random() * 3.2;
            this.speedX = -0.8 + Math.random() * 1.6;
            this.rotation = Math.random() * Math.PI * 2;
            this.rotationSpeed = (Math.random() - 0.5) * 0.045;
            this.color = petalColors[Math.floor(Math.random() * petalColors.length)];
            this.opacity = 0.55 + Math.random() * 0.45;
            if (this.isHoverFlower) {
                this.size *= 1.15;
                this.speedY *= 1.2;
                this.speedX *= 1.1;
            }
        }
        
        update() {
            this.y += this.speedY;
            this.x += this.speedX;
            this.rotation += this.rotationSpeed;
            if (this.y > height + 70) {
                this.y = -50;
                this.x = Math.random() * width;
                this.isHoverFlower = false;
            }
            if (this.x > width + 80) this.x = -60;
            if (this.x < -80) this.x = width + 60;
        }
        
        draw() {
            ctx.save();
            ctx.translate(this.x, this.y);
            ctx.rotate(this.rotation);
            ctx.globalAlpha = this.opacity;
            ctx.beginPath();
            ctx.ellipse(0, 0, this.size * 0.65, this.size, 0, 0, Math.PI * 2);
            ctx.fillStyle = this.color;
            ctx.fill();
            ctx.beginPath();
            ctx.arc(0, 0, this.size * 0.2, 0, Math.PI * 2);
            ctx.fillStyle = '#ffdd99';
            ctx.fill();
            ctx.restore();
        }
    }
    
    function initPetals(count) {
        petals = [];
        for (let i = 0; i < count; i++) {
            petals.push(new Petal());
        }
    }
    
    // BURST FLOWERS FROM MOUSE POSITION
    function burstFlowersFromCursor(x, y, quantity = 10) {
        for (let i = 0; i < quantity; i++) {
            petals.push(new Petal(x, y, true));
        }
        // Add sparkle effect
        for (let s = 0; s < 3; s++) {
            const spark = document.createElement('div');
            spark.style.position = 'fixed';
            spark.style.left = (x - 3 + Math.random() * 6) + 'px';
            spark.style.top = (y - 3 + Math.random() * 6) + 'px';
            spark.style.width = '6px';
            spark.style.height = '6px';
            spark.style.background = 'radial-gradient(circle, gold, #ffaa55)';
            spark.style.borderRadius = '50%';
            spark.style.pointerEvents = 'none';
            spark.style.zIndex = '45';
            spark.style.opacity = '0.7';
            spark.style.filter = 'blur(1px)';
            spark.style.boxShadow = '0 0 8px gold';
            document.body.appendChild(spark);
            setTimeout(() => spark.remove(), 250);
        }
    }
    
    function trackMouseMove(e) {
        let clientX, clientY;
        if (e.touches) {
            clientX = e.touches[0].clientX;
            clientY = e.touches[0].clientY;
        } else {
            clientX = e.clientX;
            clientY = e.clientY;
        }
        const burstCount = 6 + Math.floor(Math.random() * 8);
        burstFlowersFromCursor(clientX, clientY, burstCount);
    }
    
    function addHoverEvent() {
        document.body.addEventListener('mousemove', trackMouseMove);
        document.body.addEventListener('touchmove', trackMouseMove);
    }
    
    function animatePetals() {
        ctx.clearRect(0, 0, width, height);
        if (petals.length > 700) {
            petals = petals.slice(-580);
        }
        for (let i = 0; i < petals.length; i++) {
            petals[i].update();
            petals[i].draw();
        }
        requestAnimationFrame(animatePetals);
    }
    
    window.addEventListener('resize', () => {
        resizeCanvas();
        for (let p of petals) {
            if (p.x > width) p.x = width - 20;
            if (p.y > height) p.y = height - 50;
        }
    });
    
    resizeCanvas();
    initPetals(130);
    addHoverEvent();
    animatePetals();
    
    setInterval(() => {
        if (petals.length < 450) {
            for (let i = 0; i < 8; i++) petals.push(new Petal());
        }
    }, 1300);
    
    // Croccer Point Effects
    setInterval(() => {
        const spark = document.createElement('div');
        spark.style.position = 'fixed';
        spark.style.bottom = (20 + Math.random() * 45) + 'px';
        spark.style.right = (20 + Math.random() * 45) + 'px';
        spark.style.width = '6px';
        spark.style.height = '6px';
        spark.style.background = 'radial-gradient(circle, #ffdd99, #ffaa33)';
        spark.style.borderRadius = '50%';
        spark.style.pointerEvents = 'none';
        spark.style.zIndex = '50';
        spark.style.opacity = '0.9';
        spark.style.boxShadow = '0 0 12px gold';
        document.body.appendChild(spark);
        setTimeout(() => spark.remove(), 450);
    }, 600);
    
    const crystal = document.querySelector('.crystal-core');
    if (crystal) {
        setInterval(() => {
            crystal.style.boxShadow = `0 0 ${18 + Math.random() * 20}px ${6 + Math.random() * 4}px #ffcc55`;
        }, 500);
    }
    
    console.log("✨ Krishna Attitude Ready: Move mouse to start music + flowers burst ✨");
</script>
</body>
</html>
