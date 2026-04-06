<?php
session_start();
require 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
     $username = $_POST['username'];
     $password = md5($_POST['password']);

     $stmt = $pdo-> prepare('SELECT * FROM users WHERE username = ? AND password = ?');
     $stmt->execute([$username, $password]);

   if($stmt->rowCount() > 0) {
     $_SESSION['user'] = $username;
     header('Location: dashboard.php');
     exit();

    }  else {
     $error = 'Invalid Username or Password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Marvin Malolot · Black & Green | Cyber Login</title>
    <!-- Google Fonts: futuristic & clean -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: radial-gradient(circle at 20% 30%, #0a0f0a, #030603);
            font-family: 'Space Grotesk', 'JetBrains Mono', monospace;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow-x: hidden;
        }

        /* matrix-like scanline effect */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(0deg, rgba(0, 255, 0, 0.03) 0px, rgba(0, 255, 0, 0.03) 2px, transparent 2px, transparent 6px);
            pointer-events: none;
            z-index: 1;
        }

        /* animated green grid background */
        .grid-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(0, 255, 0, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 255, 0, 0.08) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 0;
            animation: gridShift 20s linear infinite;
        }

        @keyframes gridShift {
            0% { transform: translate(0, 0); }
            100% { transform: translate(40px, 40px); }
        }

        /* main terminal card - black & green theme */
        .cyber-card {
            max-width: 480px;
            width: 100%;
            background: #050804;
            border: 1.5px solid #1a3a1a;
            border-radius: 1.5rem;
            box-shadow: 0 25px 40px rgba(0, 0, 0, 0.8), 0 0 15px rgba(0, 255, 0, 0.2), inset 0 1px 0 rgba(0, 255, 0, 0.1);
            overflow: hidden;
            transition: all 0.25s ease;
            position: relative;
            z-index: 10;
            backdrop-filter: blur(2px);
        }

        .cyber-card:hover {
            box-shadow: 0 30px 50px rgba(0, 0, 0, 0.9), 0 0 22px rgba(0, 255, 0, 0.4);
            border-color: #2f9e2f;
        }

        /* header - black meets green neon */
        .cyber-header {
            background: #030703;
            padding: 1.8rem 1.5rem 1.5rem;
            text-align: center;
            border-bottom: 2px solid #1a4f1a;
            position: relative;
        }

        .cyber-header::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 10%;
            width: 80%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #0f0, transparent);
            box-shadow: 0 0 6px #0f0;
        }

        .glitch-icon {
            font-size: 2.5rem;
            color: #0c8c0c;
            text-shadow: 0 0 4px #00cc00, 0 0 8px #00aa33;
            margin-bottom: 0.5rem;
            display: inline-block;
            animation: pulseGreen 2s infinite;
        }

        @keyframes pulseGreen {
            0%, 100% { text-shadow: 0 0 2px #0f0, 0 0 5px #0a8a0a; opacity: 0.9; }
            50% { text-shadow: 0 0 10px #0f0, 0 0 20px #1f9e1f; opacity: 1; }
        }

        .cyber-header h1 {
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.9rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #b3ffb3;
            background: linear-gradient(135deg, #b3ffb3, #55ff55);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 6px rgba(0, 255, 0, 0.4);
            word-break: break-word;
        }

        .status-badge {
            margin-top: 0.7rem;
            font-size: 0.7rem;
            font-family: 'JetBrains Mono', monospace;
            color: #55dd55;
            background: #0a130a;
            display: inline-block;
            padding: 0.2rem 0.9rem;
            border-radius: 20px;
            border: 1px solid #2a6e2a;
            letter-spacing: 1px;
        }

        /* form body */
        .form-body {
            padding: 2rem 1.8rem 1.8rem;
        }

        /* input groups - dark with green accents */
        .input-group {
            margin-bottom: 1.7rem;
        }

        .input-group label {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.8px;
            color: #6fbf6f;
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'JetBrains Mono', monospace;
        }

        .input-group label i {
            font-size: 0.8rem;
            color: #1faf1f;
        }

        .green-input {
            display: flex;
            align-items: center;
            background: #030a03;
            border: 1px solid #1f551f;
            border-radius: 0.8rem;
            transition: all 0.2s;
            padding: 0.15rem 0.15rem 0.15rem 1rem;
            box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.6);
        }

        .green-input:focus-within {
            border-color: #3eff3e;
            box-shadow: 0 0 0 2px rgba(0, 255, 0, 0.2), inset 0 0 5px #0a2f0a;
            background: #041004;
        }

        .green-input i {
            color: #33cc33;
            font-size: 1rem;
            margin-right: 0.7rem;
        }

        .green-input input {
            width: 100%;
            padding: 0.85rem 0.8rem 0.85rem 0;
            font-size: 0.95rem;
            font-weight: 500;
            border: none;
            background: transparent;
            outline: none;
            font-family: 'Space Grotesk', monospace;
            color: #c0ffc0;
            letter-spacing: 0.3px;
        }

        .green-input input::placeholder {
            color: #2a622a;
            font-weight: 400;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8rem;
        }

        /* login button - neon green style */
        .neon-btn {
            background: #0c2f0c;
            border: 1px solid #2faa2f;
            width: 100%;
            padding: 0.9rem;
            border-radius: 1rem;
            font-size: 0.95rem;
            font-weight: 700;
            color: #b9ffb9;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 0.7rem;
            font-family: 'JetBrains Mono', monospace;
            letter-spacing: 2px;
            text-transform: uppercase;
            backdrop-filter: blur(2px);
            box-shadow: 0 0 5px rgba(0, 255, 0, 0.2);
        }

        .neon-btn:hover {
            background: #0f4a0f;
            border-color: #57f557;
            box-shadow: 0 0 12px #3eff3e66;
            color: #ebffeb;
            gap: 16px;
        }

        .neon-btn:active {
            transform: scale(0.98);
        }

        /* feedback console style */
        .feedback-console {
            margin-top: 1.6rem;
            text-align: center;
            font-size: 0.7rem;
            font-weight: 500;
            padding: 0.7rem 0.8rem;
            border-radius: 0.8rem;
            background: #030b03;
            border: 1px solid #1b4f1b;
            color: #76e676;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: 'JetBrains Mono', monospace;
            letter-spacing: 0.5px;
            backdrop-filter: blur(2px);
        }

        /* hint box - dark terminal */
        .hint-terminal {
            background: #041004;
            border-radius: 0.8rem;
            padding: 0.7rem 0.8rem;
            margin-top: 1.2rem;
            font-size: 0.68rem;
            color: #58c458;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1px dashed #2b7a2b;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
            font-family: 'JetBrains Mono', monospace;
        }

        .hint-terminal:hover {
            background: #0c1c0c;
            border-color: #55ff55;
            color: #a5ffa5;
            transform: scale(0.99);
        }

        footer {
            text-align: center;
            font-size: 0.55rem;
            color: #3d7a3d;
            padding: 1rem;
            border-top: 1px solid #123012;
            background: #030703;
            font-family: 'JetBrains Mono', monospace;
            letter-spacing: 1px;
        }

        /* glitch text effect for success */
        @keyframes textGlitch {
            0% { text-shadow: -1px 0 #0f0, 1px 0 #00ff00; }
            50% { text-shadow: 1px 0 #0f0, -1px 0 #33ff33; }
            100% { text-shadow: -1px 0 #0f0, 1px 0 #00ff00; }
        }

        .glitch-success {
            animation: textGlitch 0.2s ease-in-out 2;
        }

        /* scanning animation */
        .scan-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #00ff41;
            opacity: 0.5;
            box-shadow: 0 0 10px #0f0;
            animation: scanMove 4s linear infinite;
            pointer-events: none;
            z-index: 20;
        }

        @keyframes scanMove {
            0% { top: 0%; opacity: 0.6; }
            50% { top: 100%; opacity: 0.2; }
            100% { top: 0%; opacity: 0.6; }
        }

        @media (max-width: 480px) {
            .form-body {
                padding: 1.5rem;
            }
            .cyber-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="grid-overlay"></div>
<div class="cyber-card">
    <!-- animated scanline effect -->
    <div class="scan-line"></div>
    
    <!-- header with name Marvin Malolot - black/green style -->
    <div class="cyber-header">
        <div class="glitch-icon">
            <i class="fas fa-terminal"></i>
        </div>
        <h1>MARVIN MALOLOT</h1>
        <div class="status-badge">
            <i class="fas fa-circle" style="font-size: 0.5rem; color:#2eff2e;"></i> SECURE ACCESS v2.0
        </div>
    </div>

    <!-- login form -->
    <div class="form-body">
        <form id="blackGreenForm" novalidate>
            <!-- username field -->
            <div class="input-group">
                <label for="bGUser"><i class="fas fa-user-secret"></i> USERNAME /  ID</label>
                <div class="green-input">
                    <i class="fas fa-fingerprint"></i>
                    <input type="text" id="bGUser" name="username" placeholder="[ marvin / admin / guest ]" autocomplete="username">
                </div>
            </div>

            <!-- password field -->
            <div class="input-group">
                <label for="bGPass"><i class="fas fa-key"></i> PASSWORD /  KEY</label>
                <div class="green-input">
                    <i class="fas fa-shield-haltered"></i>
                    <input type="password" id="bGPass" name="password" placeholder="••••••••" autocomplete="current-password">
                </div>
            </div>

            <!-- login button -->
            <button type="submit" class="neon-btn" id="loginNeonBtn">
                <span>◆ LOGIN ◆</span>
                <i class="fas fa-plug"></i>
            </button>

            <!-- feedback area (console like) -->
            <div id="cyberFeedback" class="feedback-console">
                <i class="fas fa-microchip"></i> [system] ready. credentials: marvin / nexus
            </div>

            <!-- clickable hint terminal -->
            <div class="hint-terminal" id="hintTerminal">
                <i class="fas fa-code-branch"></i>
                <span>>_ auto-fill: marvin + nexus [green access]</span>
                <i class="fas fa-arrow-right"></i>
            </div>
        </form>
    </div>
    <footer>
        <i class="fas fa-laptop-code"></i> [ BLACK•GREEN ]  encrypted channel  |  marvin.malolot@cyber
    </footer>
</div>

<script>
    (function() {
        const form = document.getElementById('blackGreenForm');
        const usernameField = document.getElementById('bGUser');
        const passwordField = document.getElementById('bGPass');
        const feedbackDiv = document.getElementById('cyberFeedback');
        const loginBtn = document.getElementById('loginNeonBtn');
        const hintDiv = document.getElementById('hintTerminal');

        // function to simulate matrix / green flash effect
        function greenFlash() {
            const flash = document.createElement('div');
            flash.style.position = 'fixed';
            flash.style.top = 0;
            flash.style.left = 0;
            flash.style.width = '100%';
            flash.style.height = '100%';
            flash.style.backgroundColor = 'rgba(0, 255, 0, 0.08)';
            flash.style.pointerEvents = 'none';
            flash.style.zIndex = '999';
            document.body.appendChild(flash);
            setTimeout(() => flash.remove(), 120);
        }

        function showCyberMessage(msg, isError = false) {
            feedbackDiv.innerHTML = `<i class="fas ${isError ? 'fa-skull-crossbones' : 'fa-check-circle'}"></i> ${msg} <i class="fas ${isError ? 'fa-bug' : 'fa-microchip'}"></i>`;
            if (isError) {
                feedbackDiv.style.background = "#0a0505";
                feedbackDiv.style.border = "1px solid #aa4444";
                feedbackDiv.style.color = "#ff8a8a";
                feedbackDiv.style.boxShadow = "0 0 6px rgba(255,0,0,0.2)";
            } else {
                feedbackDiv.style.background = "#031003";
                feedbackDiv.style.border = "1px solid #33aa33";
                feedbackDiv.style.color = "#b3ffb3";
                feedbackDiv.style.boxShadow = "0 0 5px rgba(0,255,0,0.2)";
            }
            // reset to default after 4 seconds (only if not error persistent)
            setTimeout(() => {
                if (feedbackDiv.innerHTML.includes(msg) && !isError) {
                    feedbackDiv.innerHTML = `<i class="fas fa-microchip"></i> [system] ready. credentials: marvin / nexus`;
                    feedbackDiv.style.background = "#030b03";
                    feedbackDiv.style.border = "1px solid #1b4f1b";
                    feedbackDiv.style.color = "#76e676";
                } else if (isError && feedbackDiv.innerHTML.includes(msg)) {
                    setTimeout(() => {
                        if (feedbackDiv.innerHTML.includes(msg)) {
                            feedbackDiv.innerHTML = `<i class="fas fa-microchip"></i> [system] ready. credentials: marvin / nexus`;
                            feedbackDiv.style.background = "#030b03";
                            feedbackDiv.style.border = "1px solid #1b4f1b";
                            feedbackDiv.style.color = "#76e676";
                        }
                    }, 3500);
                }
            }, 4200);
        }

        // green matrix spark effect on success
        function addMatrixRings(element) {
            const rect = element.getBoundingClientRect();
            for (let i=0;i<14;i++) {
                setTimeout(() => {
                    const ring = document.createElement('div');
                    ring.style.position = 'fixed';
                    ring.style.left = rect.left + rect.width/2 + 'px';
                    ring.style.top = rect.top + rect.height/2 + 'px';
                    ring.style.width = (10 + i*5) + 'px';
                    ring.style.height = (10 + i*5) + 'px';
                    ring.style.border = '2px solid #0f0';
                    ring.style.borderRadius = '50%';
                    ring.style.transform = 'translate(-50%, -50%) scale(0)';
                    ring.style.opacity = '0.8';
                    ring.style.pointerEvents = 'none';
                    ring.style.zIndex = '1000';
                    ring.style.boxShadow = '0 0 8px #0f0';
                    ring.style.animation = 'ringPop 0.5s ease-out forwards';
                    document.body.appendChild(ring);
                    setTimeout(() => ring.remove(), 500);
                }, i*35);
            }
        }
        
        // add style for ring animation if not exists
        if (!document.querySelector('#ringAnimStyle')) {
            const style = document.createElement('style');
            style.id = 'ringAnimStyle';
            style.textContent = `
                @keyframes ringPop {
                    0% { transform: translate(-50%, -50%) scale(0.2); opacity: 0.9; }
                    100% { transform: translate(-50%, -50%) scale(2.5); opacity: 0; }
                }
            `;
            document.head.appendChild(style);
        }

        // login handler (black & green anime/cyberpunk)
        function handleBlackGreenLogin(e) {
            e.preventDefault();
            const username = usernameField.value.trim();
            const password = passwordField.value.trim();
            
            if (username === "") {
                showCyberMessage("[!] ACCESS DENIED: username missing", true);
                usernameField.focus();
                greenFlash();
                return;
            }
            if (password === "") {
                showCyberMessage("[!] ACCESS DENIED: security key missing", true);
                passwordField.focus();
                greenFlash();
                return;
            }
            
            // Black & Green credentials (anime cyber edition)
            // 1) marvin + nexus
            // 2) admin + greenlight
            // 3) zero + kai
            // 4) marvinmalolot + 0x1F33
            const lowerUser = username.toLowerCase();
            const isValidMarvinNexus = (lowerUser === "marvin" || lowerUser === "marvin malolot") && password === "nexus";
            const isValidAdmin = lowerUser === "admin" && password === "greenlight";
            const isValidZero = lowerUser === "zero" && password === "kai";
            const isValidTech = lowerUser === "neo" && password === "matrix";
            const isValidMarvinGreen = lowerUser === "marvin-green" && password === "0x1F33";
            
            const loginValid = isValidMarvinNexus || isValidAdmin || isValidZero || isValidTech || isValidMarvinGreen;
            
            if (loginValid) {
                let successMsg = "> ACCESS GRANTED. Welcome, operator.";
                if (isValidMarvinNexus) successMsg = "> ✔ MARVIN • NEXUS protocol: authorized. System unlocked.";
                else if (isValidAdmin) successMsg = "> ✔ ADMIN greenlight: full root access.";
                else if (isValidZero) successMsg = "> ✔ ZERO_KAI: ghost entry permitted.";
                else if (isValidTech) successMsg = "> ✔ NEO: you are the one. Welcome to the grid.";
                else successMsg = "> ✔ biometric match: green access confirmed.";
                
                showCyberMessage(successMsg + "  [LOGGED IN]", false);
                greenFlash();
                addMatrixRings(loginBtn);
                
                // disable button for 2 sec to simulate processing
                loginBtn.disabled = true;
                const originalBtnText = loginBtn.innerHTML;
                loginBtn.innerHTML = `<span>◆ ACCESSING ◆</span> <i class="fas fa-spinner fa-pulse"></i>`;
                loginBtn.style.opacity = "0.8";
                
                // glitch effect on header
                const headerName = document.querySelector('.cyber-header h1');
                headerName.classList.add('glitch-success');
                setTimeout(() => headerName.classList.remove('glitch-success'), 400);
                
                setTimeout(() => {
                    loginBtn.disabled = false;
                    loginBtn.innerHTML = originalBtnText;
                    loginBtn.style.opacity = "1";
                    showCyberMessage("✅ SYSTEM READY | SECURE CONNECTION ESTABLISHED", false);
                    // final reset after some seconds to default message
                    setTimeout(() => {
                        if (feedbackDiv.innerHTML.includes("ESTABLISHED")) {
                            feedbackDiv.innerHTML = `<i class="fas fa-microchip"></i> [system] ready. credentials: marvin / nexus`;
                            feedbackDiv.style.background = "#030b03";
                            feedbackDiv.style.border = "1px solid #1b4f1b";
                            feedbackDiv.style.color = "#76e676";
                        }
                    }, 4500);
                }, 2000);
            } else {
                showCyberMessage("[✘] LOGIN FAILURE: invalid credentials. hint: marvin / nexus", true);
                passwordField.value = "";
                passwordField.focus();
                greenFlash();
                // error shake effect
                const card = document.querySelector('.cyber-card');
                card.style.transform = "translateX(3px)";
                setTimeout(() => card.style.transform = "", 70);
                card.style.transform = "translateX(-3px)";
                setTimeout(() => card.style.transform = "", 70);
                card.style.transform = "translateX(2px)";
                setTimeout(() => card.style.transform = "", 70);
                // small red flash
                const flashRed = document.createElement('div');
                flashRed.style.position = 'fixed';
                flashRed.style.top = 0;
                flashRed.style.left = 0;
                flashRed.style.width = '100%';
                flashRed.style.height = '100%';
                flashRed.style.backgroundColor = 'rgba(100, 0, 0, 0.1)';
                flashRed.style.pointerEvents = 'none';
                flashRed.style.zIndex = '999';
                document.body.appendChild(flashRed);
                setTimeout(() => flashRed.remove(), 100);
            }
        }
        
        form.addEventListener('submit', handleBlackGreenLogin);
        
        // Hint autofill (marvin + nexus) — green theme
        if (hintDiv) {
            hintDiv.addEventListener('click', () => {
                usernameField.value = "marvin";
                passwordField.value = "nexus";
                showCyberMessage(">> auto-filled: marvin / nexus. press LOGIN to enter.", false);
                // green flash effect on hint
                const hintRect = hintDiv.getBoundingClientRect();
                const glint = document.createElement('div');
                glint.style.position = 'fixed';
                glint.style.left = hintRect.left + 'px';
                glint.style.top = hintRect.top + 'px';
                glint.style.width = hintRect.width + 'px';
                glint.style.height = hintRect.height + 'px';
                glint.style.backgroundColor = 'rgba(0, 255, 0, 0.2)';
                glint.style.borderRadius = '0.8rem';
                glint.style.pointerEvents = 'none';
                glint.style.zIndex = '100';
                glint.style.transition = '0.2s';
                document.body.appendChild(glint);
                setTimeout(() => glint.remove(), 300);
                usernameField.focus();
            });
        }
        
        // extra: terminal-like prompt effect on input focus
        const inputs = [usernameField, passwordField];
        inputs.forEach(inp => {
            inp.addEventListener('focus', () => {
                inp.parentElement.style.borderColor = "#44ff44";
                inp.parentElement.style.boxShadow = "0 0 0 2px rgba(0, 255, 0, 0.3)";
            });
            inp.addEventListener('blur', () => {
                inp.parentElement.style.borderColor = "#1f551f";
                inp.parentElement.style.boxShadow = "inset 0 0 4px rgba(0, 0, 0, 0.6)";
            });
        });
    })();
</script>
</body>
</html>