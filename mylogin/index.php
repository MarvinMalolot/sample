<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Marvin Malolot · A Romantic Login</title>
    <!-- Google Fonts: elegant and soft -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 (delicate icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(145deg, #fdeff2 0%, #ffe6ef 100%);
            font-family: 'Quicksand', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow-x: hidden;
        }

        /* floating romantic elements (tiny hearts) */
        body::before {
            content: "❤️";
            font-size: 18px;
            position: absolute;
            bottom: 10%;
            left: 5%;
            opacity: 0.2;
            animation: floatHeart 12s infinite ease-in-out;
            pointer-events: none;
        }

        body::after {
            content: "🌸";
            font-size: 22px;
            position: absolute;
            top: 15%;
            right: 6%;
            opacity: 0.2;
            animation: floatHeart 14s infinite reverse;
            pointer-events: none;
        }

        @keyframes floatHeart {
            0% { transform: translateY(0px) rotate(0deg); opacity: 0.2; }
            50% { transform: translateY(-20px) rotate(5deg); opacity: 0.4; }
            100% { transform: translateY(0px) rotate(0deg); opacity: 0.2; }
        }

        /* main romantic card */
        .romance-card {
            max-width: 460px;
            width: 100%;
            background: rgba(255, 252, 253, 0.97);
            backdrop-filter: blur(2px);
            border-radius: 2.5rem;
            box-shadow: 0 25px 45px -12px rgba(210, 80, 120, 0.25), 0 8px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 200, 210, 0.7);
            position: relative;
            z-index: 2;
        }

        .romance-card:hover {
            transform: scale(1.01);
            box-shadow: 0 30px 50px -15px rgba(188, 90, 120, 0.3);
        }

        /* header — name with soft romantic touch */
        .romantic-header {
            background: linear-gradient(135deg, #f5b0c0 0%, #f7cad0 100%);
            padding: 2rem 1.8rem 1.8rem;
            text-align: center;
            position: relative;
            border-bottom: 2px solid #ffe2e8;
        }

        .romantic-header::after {
            content: "✦";
            font-size: 1.2rem;
            color: #fff0f3;
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: #f5b0c0;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffd9e2;
            color: #e68a9e;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            line-height: 1;
        }

        .heart-icon {
            font-size: 2.5rem;
            color: #fff2f5;
            text-shadow: 0 2px 6px rgba(190, 70, 90, 0.3);
            margin-bottom: 0.5rem;
            animation: gentleBeat 2s infinite ease;
        }

        @keyframes gentleBeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.08); }
        }

        .romantic-header h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.3rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.2px;
            text-shadow: 0 1px 4px rgba(130, 40, 60, 0.2);
            word-break: break-word;
        }

        .sub-message {
            font-size: 0.85rem;
            color: #fff2f0;
            margin-top: 0.65rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .sub-message i {
            font-size: 0.7rem;
        }

        /* form body - delicate */
        .form-body {
            padding: 2rem 1.8rem 1.5rem;
        }

        /* input groups romantic style */
        .input-group {
            margin-bottom: 1.6rem;
            display: flex;
            flex-direction: column;
        }

        .input-group label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #b45b72;
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Quicksand', sans-serif;
        }

        .input-group label i {
            font-size: 0.9rem;
            color: #e891a7;
        }

        .romantic-input {
            display: flex;
            align-items: center;
            background: #fffbfc;
            border: 1.5px solid #ffe0e7;
            border-radius: 2rem;
            transition: all 0.25s;
            padding: 0.2rem 0.2rem 0.2rem 1.2rem;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }

        .romantic-input:focus-within {
            border-color: #f0a1b8;
            box-shadow: 0 0 0 4px rgba(240, 161, 184, 0.2);
            background: #ffffff;
        }

        .romantic-input i {
            color: #e3a0b3;
            font-size: 1rem;
            margin-right: 0.7rem;
        }

        .romantic-input input {
            width: 100%;
            padding: 0.85rem 0.9rem 0.85rem 0;
            font-size: 0.95rem;
            font-weight: 500;
            border: none;
            background: transparent;
            outline: none;
            font-family: 'Quicksand', sans-serif;
            color: #5d3e48;
        }

        .romantic-input input::placeholder {
            color: #dbb2c0;
            font-weight: 400;
            font-style: italic;
            font-size: 0.85rem;
        }

        /* login button — romantic & soft */
        .love-btn {
            background: linear-gradient(95deg, #f0a6bd, #f7c2d0);
            border: none;
            width: 100%;
            padding: 0.9rem;
            border-radius: 3rem;
            font-size: 1rem;
            font-weight: 700;
            color: #5e3342;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
            font-family: 'Quicksand', sans-serif;
            letter-spacing: 1px;
            box-shadow: 0 6px 14px rgba(225, 120, 140, 0.25);
            border: 1px solid rgba(255,255,240,0.6);
        }

        .love-btn i {
            font-size: 1.1rem;
            transition: transform 0.2s;
            color: #7e4156;
        }

        .love-btn:hover {
            background: linear-gradient(95deg, #f8bacf, #ffd6e0);
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(210, 100, 120, 0.3);
            color: #4a2c36;
        }

        .love-btn:hover i {
            transform: scale(1.1);
        }

        .love-btn:active {
            transform: scale(0.97);
        }

        /* romantic message area */
        .message-love {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.6rem;
            border-radius: 2rem;
            background: #fff5f8;
            transition: all 0.2s;
            color: #bb7288;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid #ffe2ea;
        }

        /* delicate hint box */
        .romantic-hint {
            background: #fffafc;
            border-radius: 2rem;
            padding: 0.7rem 1rem;
            margin-top: 1.3rem;
            font-size: 0.7rem;
            color: #c28297;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1px dashed #f7bfcf;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
        }

        .romantic-hint i {
            font-size: 0.85rem;
            color: #e69bb0;
        }

        .romantic-hint:hover {
            background: #ffeef3;
            border-color: #e8a7bb;
            transform: scale(0.99);
        }

        footer {
            text-align: center;
            font-size: 0.68rem;
            color: #cb93a8;
            padding: 1rem 1rem 1.3rem;
            border-top: 1px solid #ffe7ed;
            background: #fffafd;
            font-weight: 500;
            letter-spacing: 0.4px;
        }

        @media (max-width: 480px) {
            .form-body {
                padding: 1.6rem;
            }
            .romantic-header h1 {
                font-size: 1.8rem;
            }
        }

        /* tiny floating hearts animation inside form */
        .floating-heart {
            position: absolute;
            pointer-events: none;
            font-size: 12px;
            opacity: 0;
            animation: floatUp 1.2s ease-out forwards;
        }

        @keyframes floatUp {
            0% {
                opacity: 0.7;
                transform: translateY(0) scale(0.8);
            }
            100% {
                opacity: 0;
                transform: translateY(-45px) scale(1.2);
            }
        }
    </style>
</head>
<body>

<div class="romance-card">
    <!-- top with name: Marvin Malolot — romantic presentation -->
    <div class="romantic-header">
        <div class="heart-icon">
            <i class="fas fa-heart"></i>
        </div>
        <h1>Marvin Malolot</h1>
        <div class="sub-message">
            <i class="fas fa-feather-alt"></i> 
            <span>a little love, a little magic</span>
            <i class="fas fa-feather-alt"></i>
        </div>
    </div>

    <!-- form body: username & password with login button -->
    <div class="form-body">
        <form id="romanticLoginForm" action="#" method="post" novalidate>
            <!-- Username field -->
            <div class="input-group">
                <label for="loverUsername">
                    <i class="far fa-heart"></i> 
                    your sweet name
                </label>
                <div class="romantic-input">
                    <i class="fas fa-user-friends"></i>
                    <input type="text" id="loverUsername" name="username" placeholder="e.g., my darling, marvin, or your nickname" autocomplete="username">
                </div>
            </div>

            <!-- Password field (romantic secret) -->
            <div class="input-group">
                <label for="loverPassword">
                    <i class="fas fa-lock"></i> 
                    secret whisper
                </label>
                <div class="romantic-input">
                    <i class="fas fa-key"></i>
                    <input type="password" id="loverPassword" name="password" placeholder="••••••••" autocomplete="current-password">
                </div>
            </div>

            <!-- Login Button with romantic text -->
            <button type="submit" class="love-btn" id="romanticLoginBtn">
                <span>enter with heart</span>
                <i class="fas fa-arrow-right"></i>
            </button>
            
            <!-- feedback area : romantic message -->
            <div id="romanticFeedback" class="message-love">
                <i class="fas fa-star-of-life"></i> 
                <span>our little secret: "marvin" + "lovely"</span>
                <i class="fas fa-star-of-life"></i>
            </div>

            <!-- subtle hint (click to fill) -->
            <div class="romantic-hint" id="romanticHint">
                <i class="fas fa-gift"></i>
                <span>✨ click me for a love shortcut ✨</span>
                <i class="fas fa-heart-broken" style="opacity: 0.7;"></i>
            </div>
        </form>
    </div>
    <footer>
        <i class="fas fa-infinity"></i> for you, with tenderness · Marvin Malolot
    </footer>
</div>

<script>
    (function() {
        const form = document.getElementById('romanticLoginForm');
        const usernameField = document.getElementById('loverUsername');
        const passwordField = document.getElementById('loverPassword');
        const feedbackDiv = document.getElementById('romanticFeedback');
        const loginBtn = document.getElementById('romanticLoginBtn');
        const hintDiv = document.getElementById('romanticHint');

        // Helper: show romantic messages
        function showRomanticMessage(msg, isSweet = true, isError = false) {
            feedbackDiv.innerHTML = `<i class="fas ${isError ? 'fa-heart-broken' : 'fa-heart'}"></i> <span>${msg}</span> <i class="fas ${isError ? 'fa-sad-tear' : 'fa-smile-wink'}"></i>`;
            if (isError) {
                feedbackDiv.style.background = "#fff0f0";
                feedbackDiv.style.color = "#b65b74";
                feedbackDiv.style.border = "1px solid #ffccd5";
            } else {
                feedbackDiv.style.background = "#fff9fc";
                feedbackDiv.style.color = "#b06d83";
                feedbackDiv.style.border = "1px solid #ffe2ec";
            }
            // auto-revert to gentle hint after 4 sec (only if not error keeps romantic default)
            setTimeout(() => {
                if (feedbackDiv.innerHTML.includes(msg) && !isError) {
                    feedbackDiv.innerHTML = `<i class="fas fa-star-of-life"></i> <span>our little secret: "marvin" + "lovely"</span> <i class="fas fa-star-of-life"></i>`;
                    feedbackDiv.style.background = "#fff5f8";
                    feedbackDiv.style.color = "#bb7288";
                } else if (isError && feedbackDiv.innerHTML.includes(msg)) {
                    // after error, reset to default hint after 4s
                    setTimeout(() => {
                        if (feedbackDiv.innerHTML.includes(msg)) {
                            feedbackDiv.innerHTML = `<i class="fas fa-star-of-life"></i> <span>our little secret: "marvin" + "lovely"</span> <i class="fas fa-star-of-life"></i>`;
                            feedbackDiv.style.background = "#fff5f8";
                            feedbackDiv.style.color = "#bb7288";
                        }
                    }, 3800);
                }
            }, 4000);
        }

        // Create floating hearts (tiny romantic effect)
        function createFloatingHeart(x, y) {
            const heart = document.createElement('div');
            heart.className = 'floating-heart';
            heart.innerHTML = ['❤️', '🌸', '🌹', '✨', '💗'][Math.floor(Math.random() * 5)];
            heart.style.left = x + 'px';
            heart.style.top = y + 'px';
            heart.style.position = 'fixed';
            heart.style.fontSize = (14 + Math.random() * 12) + 'px';
            heart.style.zIndex = '999';
            document.body.appendChild(heart);
            setTimeout(() => {
                heart.remove();
            }, 1200);
        }

        // Add hearts on successful login
        function burstHeartsFromButton(btnElement) {
            const rect = btnElement.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            for (let i = 0; i < 12; i++) {
                setTimeout(() => {
                    const offsetX = (Math.random() - 0.5) * 60;
                    const offsetY = (Math.random() - 0.5) * 50;
                    createFloatingHeart(centerX + offsetX, centerY + offsetY);
                }, i * 40);
            }
        }

        // Login logic (simple but romantic)
        function handleRomanticLogin(e) {
            e.preventDefault();
            
            let username = usernameField.value.trim();
            let password = passwordField.value.trim();
            
            // Romantic validation: both fields should not be empty
            if (username === "") {
                showRomanticMessage("darling, please tell me your name 🌷", false, true);
                usernameField.focus();
                // gentle shake
                usernameField.parentElement.style.transform = "shake 0.2s";
                return;
            }
            if (password === "") {
                showRomanticMessage("a secret word? whisper your password, love ✨", false, true);
                passwordField.focus();
                return;
            }
            
            // Romantic credentials:
            // 1) username contains "marvin" (case-insensitive) AND password "lovely"
            // 2) OR username "sweetheart" with any password containing "heart"
            // but simple: we accept: marvin + lovely / or any cute variation: 'my love' + 'forever'
            // Let's keep dreamy but functional:
            const isValidMarvinLove = (username.toLowerCase().includes("marvin") && password === "lovely");
            const isValidSweet = (username.toLowerCase() === "sweetheart" && password.toLowerCase() === "forever");
            const isValidStar = (username.toLowerCase() === "starlight" && password === "moon");
            // also for his own name: Marvin Malolot himself: password "always"
            const isValidMarvinSelf = (username.toLowerCase() === "marvin malolot" && password === "always");
            // additional universal romantic: if username includes "❤️" or any magic but let's keep clear
            
            const isValid = isValidMarvinLove || isValidSweet || isValidStar || isValidMarvinSelf;
            
            if (isValid) {
                // SUCCESS : romantic welcome
                let welcomeMsg = "";
                if (isValidMarvinLove) welcomeMsg = "oh marvin, your heart unlocks the garden 🌹";
                else if (isValidSweet) welcomeMsg = "sweetheart, you're forever welcomed 💕";
                else if (isValidStar) welcomeMsg = "starlight, your love shines bright ✨";
                else welcomeMsg = "my dearest, your love is the key. welcome 🌸";
                
                showRomanticMessage(welcomeMsg + "  entering dreamland...", true, false);
                // disable button briefly, show hearts
                loginBtn.disabled = true;
                loginBtn.style.opacity = "0.8";
                const originalText = loginBtn.innerHTML;
                loginBtn.innerHTML = `<span>logging with love</span> <i class="fas fa-heartbeat"></i>`;
                burstHeartsFromButton(loginBtn);
                
                // Gentle success effect: change header glow
                const headerDiv = document.querySelector('.romantic-header');
                headerDiv.style.transition = "0.3s";
                headerDiv.style.boxShadow = "inset 0 0 20px #ffe2ea, 0 4px 12px rgba(0,0,0,0.05)";
                
                setTimeout(() => {
                    loginBtn.disabled = false;
                    loginBtn.style.opacity = "1";
                    loginBtn.innerHTML = originalText;
                    showRomanticMessage("✨ you are now connected, lovely soul. forever welcome ✨", true, false);
                    // reset after few seconds to default
                    setTimeout(() => {
                        if (feedbackDiv.innerHTML.includes("connected")) {
                            feedbackDiv.innerHTML = `<i class="fas fa-star-of-life"></i> <span>our little secret: "marvin" + "lovely"</span> <i class="fas fa-star-of-life"></i>`;
                            feedbackDiv.style.background = "#fff5f8";
                        }
                        headerDiv.style.boxShadow = "";
                    }, 4500);
                }, 1800);
            } else {
                // romantic error feedback with subtle hint
                let errorSuggestion = "try: 'marvin' with password 'lovely' • or 'sweetheart' & 'forever'";
                showRomanticMessage(`oh dear, the heart needs the right key 💔 ${errorSuggestion}`, false, true);
                passwordField.value = "";
                passwordField.focus();
                // tiny sad animation
                const card = document.querySelector('.romance-card');
                card.style.transform = "translateX(3px)";
                setTimeout(() => card.style.transform = "", 120);
                card.style.transform = "translateX(-3px)";
                setTimeout(() => card.style.transform = "", 120);
            }
        }
        
        // attach event
        form.addEventListener('submit', handleRomanticLogin);
        
        // romantic hint click: autofill marvin + lovely (the easiest romantic combo)
        if (hintDiv) {
            hintDiv.addEventListener('click', () => {
                usernameField.value = "marvin";
                passwordField.value = "lovely";
                showRomanticMessage("💌 filled with a lover's secret — press enter with heart 💌", true, false);
                // create tiny floating hearts on hint click
                const rect = hintDiv.getBoundingClientRect();
                for (let i = 0; i < 6; i++) {
                    setTimeout(() => {
                        createFloatingHeart(rect.left + rect.width/2 + (Math.random() - 0.5)*40, rect.top + rect.height/2);
                    }, i * 50);
                }
                usernameField.focus();
            });
        }
        
        // Additional background spark: add tiny heart on input focus
        const inputs = [usernameField, passwordField];
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                const parentDiv = input.parentElement;
                parentDiv.style.borderColor = "#f0a1b8";
            });
            input.addEventListener('blur', () => {
                const parentDiv = input.parentElement;
                parentDiv.style.borderColor = "#ffe0e7";
            });
        });
    })();
</script>
</body>
</html>