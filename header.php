<?php
$ROOT_URL = (str_contains($_SERVER['SERVER_NAME'], "localhost")) ? "http://localhost/GameNexusZone/" : "https://" . $_SERVER['SERVER_NAME'] . "/";
$primary_id = 0;
if (isset($_REQUEST['id'])) {
    $primary_id = $_REQUEST['id'];
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameNexusZone - Play Free Games Online</title>
    <meta name="description" content="Play 500+ free online games instantly. No downloads, no sign-up required.">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='80'>🚀</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#00d9ff',
                        'primary-light': '#00f0ff',
                        'accent': '#ff6b35',
                        'accent-light': '#ff8c5a',
                        'surface': '#0a0e27',
                        'card': '#1a1f3a',
                        'border': '#2a3f5f',
                        'muted': '#7a8ba3'
                    },
                    fontFamily: {
                        'outfit': ['Outfit', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <script>
        var ROOT_URL = "<?php echo $ROOT_URL; ?>";
        var gameData = <?php include 'data.json'; ?>;
        var PRIMARY_ID = '<?php echo $primary_id; ?>';
    </script>
    <script>
        window.googletag = window.googletag || { cmd: [] };
        googletag.cmd.push(() => {
            googletag.defineSlot("/22583435288/display_1", [[970, 90], [728, 90], [300, 250]], "banner-ad").addService(googletag.pubads());
            googletag.enableServices();
        });
        let anchorSlot;
        googletag.cmd.push(() => {
            anchorSlot = googletag.defineOutOfPageSlot("/22583435288/ancher_1", document.body.clientWidth <= 500 ? googletag.enums.OutOfPageFormat.BOTTOM_ANCHOR : googletag.enums.OutOfPageFormat.BOTTOM_ANCHOR);
            if (anchorSlot) { anchorSlot.addService(googletag.pubads()); }
            googletag.pubads().enableSingleRequest();
            googletag.enableServices();
        });
    </script>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background: linear-gradient(135deg, #0a0e27 0%, #0f1a3f 50%, #0a0e27 100%);
            color: #e2e8f0;
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
        }
        /* NAV */
        .site-nav {
            background: rgba(10, 14, 39, 0.95);
            backdrop-filter: blur(30px);
            border-bottom: 2px solid #00d9ff;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .nav-logo-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, #00d9ff, #ff6b35);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 0 20px rgba(0, 217, 255, 0.4);
        }
        .nav-link {
            color: #a8bfd4;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s;
            text-decoration: none;
            position: relative;
        }
        .nav-link:hover { 
            color: #00d9ff;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: #00d9ff;
            transition: width 0.3s;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .search-bar {
            background: rgba(26, 31, 58, 0.8);
            border: 1px solid #2a3f5f;
            border-radius: 50px;
            color: #e2e8f0;
            padding: 8px 18px 8px 40px;
            font-size: 0.85rem;
            outline: none;
            transition: all 0.3s;
            width: 220px;
        }
        .search-bar:focus { 
            border-color: #00d9ff;
            box-shadow: 0 0 15px rgba(0, 217, 255, 0.3);
        }
        .search-wrap { position: relative; }
        .search-icon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #7a8ba3; font-size: 0.85rem;
        }
        .btn-nav {
            background: linear-gradient(135deg, #00d9ff, #ff6b35);
            color: #0a0e27;
            border-radius: 50px;
            padding: 10px 24px;
            font-weight: 700;
            font-size: 0.85rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 0 20px rgba(0, 217, 255, 0.3);
        }
        .btn-nav:hover { 
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(0, 217, 255, 0.5);
        }

        /* HERO */
        .hero-section {
            background: linear-gradient(180deg, rgba(0, 217, 255, 0.08) 0%, transparent 100%);
            position: relative;
            overflow: hidden;
            padding: 100px 0 70px;
        }
        .hero-section::before {
            content: '';
            position: absolute; inset: 0;
            background:
                radial-gradient(ellipse 70% 50% at 30% 50%, rgba(0, 217, 255, 0.15) 0%, transparent 70%),
                radial-gradient(ellipse 50% 60% at 75% 30%, rgba(255, 107, 53, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(0, 217, 255, 0.12);
            border: 1px solid rgba(0, 217, 255, 0.4);
            border-radius: 50px;
            padding: 8px 18px;
            font-size: 0.78rem;
            font-weight: 600;
            color: #00d9ff;
            letter-spacing: 0.04em;
            margin-bottom: 24px;
        }
        .hero-title {
            font-size: clamp(2.8rem, 6vw, 5rem);
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -0.02em;
            color: #ffffff;
        }
        .grad-text {
            background: linear-gradient(135deg, #00d9ff 0%, #ff6b35 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hero-desc {
            color: #a8bfd4;
            font-size: 1.1rem;
            line-height: 1.8;
            max-width: 500px;
            margin: 24px 0 40px;
        }
        .btn-play {
            background: linear-gradient(135deg, #00d9ff, #ff6b35);
            color: #0a0e27;
            border-radius: 50px;
            padding: 15px 40px;
            font-weight: 800;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 35px rgba(0, 217, 255, 0.4);
        }
        .btn-play:hover { 
            transform: translateY(-3px); 
            box-shadow: 0 15px 45px rgba(0, 217, 255, 0.6);
        }
        .btn-outline {
            background: transparent;
            color: #00d9ff;
            border: 2px solid #00d9ff;
            border-radius: 50px;
            padding: 13px 40px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-outline:hover { 
            background: rgba(0, 217, 255, 0.15);
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(0, 217, 255, 0.4);
        }
        .stat-card {
            background: rgba(26, 31, 58, 0.8);
            border: 1px solid rgba(0, 217, 255, 0.3);
            border-radius: 16px;
            padding: 24px 28px;
            backdrop-filter: blur(10px);
            transition: all 0.3s;
        }
        .stat-card:hover {
            border-color: #00d9ff;
            box-shadow: 0 0 25px rgba(0, 217, 255, 0.2);
        }
        .stat-num {
            font-size: 2.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #00d9ff, #ff6b35);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* CATEGORIES */
        .section-label {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(0, 217, 255, 0.12);
            border: 1px solid rgba(0, 217, 255, 0.3);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #00d9ff;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }
        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #ffffff;
        }
        .cat-pill {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(26, 31, 58, 0.6);
            border: 1px solid #2a3f5f;
            border-radius: 50px;
            padding: 10px 22px;
            font-size: 0.82rem;
            font-weight: 600;
            color: #a8bfd4;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }
        .cat-pill:hover { 
            border-color: #00d9ff; 
            color: #00d9ff; 
            background: rgba(0, 217, 255, 0.08);
        }
        .cat-pill.active {
            background: linear-gradient(135deg, #00d9ff, #ff6b35);
            border-color: transparent;
            color: #0a0e27;
            box-shadow: 0 8px 25px rgba(0, 217, 255, 0.4);
        }

        /* GAME CARDS */
        .game-card {
            background: rgba(26, 31, 58, 0.6);
            border: 1px solid #2a3f5f;
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.4s ease;
            cursor: pointer;
        }
        .game-card:hover {
            transform: translateY(-8px);
            border-color: #00d9ff;
            box-shadow: 0 25px 50px rgba(0, 217, 255, 0.25);
        }
        .game-card:hover .card-img { transform: scale(1.1); }
        .card-img { transition: transform 0.4s ease; width: 100%; height: 180px; object-fit: cover; display: block; }
        .badge-new {
            background: linear-gradient(135deg, #00d9ff, #ff6b35);
            color: #0a0e27; font-size: 0.65rem; font-weight: 700;
            padding: 4px 12px; border-radius: 50px; letter-spacing: 0.05em;
        }
        .badge-top {
            background: rgba(255, 107, 53, 0.15);
            border: 1px solid rgba(255, 107, 53, 0.5);
            color: #ff8c5a; font-size: 0.65rem; font-weight: 700;
            padding: 4px 12px; border-radius: 50px;
        }
        .play-btn {
            width: 100%;
            background: linear-gradient(135deg, #00d9ff, #ff6b35);
            color: #0a0e27;
            border: none;
            border-radius: 10px;
            padding: 11px;
            font-weight: 700;
            font-size: 0.82rem;
            cursor: pointer;
            transition: all 0.3s;
            letter-spacing: 0.03em;
        }
        .play-btn:hover { 
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 217, 255, 0.3);
        }

        /* FEATURES */
        .feature-card {
            background: rgba(26, 31, 58, 0.6);
            border: 1px solid #2a3f5f;
            border-radius: 20px;
            padding: 36px;
            transition: all 0.4s;
        }
        .feature-card:hover { 
            border-color: #00d9ff; 
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 217, 255, 0.15);
        }
        .feature-icon {
            width: 60px; height: 60px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        /* CONTACT */
        .contact-input {
            width: 100%;
            background: rgba(26, 31, 58, 0.6);
            border: 1px solid #2a3f5f;
            border-radius: 12px;
            color: #e2e8f0;
            padding: 14px 18px;
            font-size: 0.9rem;
            font-family: 'Outfit', sans-serif;
            outline: none;
            transition: all 0.3s;
        }
        .contact-input:focus { 
            border-color: #00d9ff;
            box-shadow: 0 0 15px rgba(0, 217, 255, 0.2);
        }
        .contact-input::placeholder { color: #7a8ba3; }

        /* LOAD MORE */
        .btn-load {
            background: transparent;
            border: 2px solid #00d9ff;
            color: #00d9ff;
            border-radius: 50px;
            padding: 12px 40px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-load:hover { 
            background: rgba(0, 217, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(0, 217, 255, 0.3);
        }

        /* MOBILE MENU */
        #mobile-menu { display: none; }
        #mobile-menu.open { display: block; }
    </style>
</head>
<body>

    <nav class="site-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="<?php echo $ROOT_URL; ?>index.php" class="flex items-center gap-3">
                    <div class="nav-logo-icon">🎮</div>
                    <span style="font-size:1.2rem;font-weight:800;background:linear-gradient(135deg,#00d9ff,#ff6b35);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">GameNexusZone</span>
                </a>

                <div class="hidden md:flex items-center gap-8">
                    <a href="<?php echo $ROOT_URL; ?>index.php" class="nav-link">Home</a>
                    <a href="<?php echo $ROOT_URL; ?>index.php#about" class="nav-link">About</a>
                    <a href="<?php echo $ROOT_URL; ?>index.php#categories" class="nav-link">Games</a>
                    <a href="<?php echo $ROOT_URL; ?>index.php#contact" class="nav-link">Contact</a>
                </div>

                <div class="flex items-center gap-3">
                    <div class="search-wrap hidden lg:block">
                        <span class="search-icon">🔍</span>
                        <input type="text" placeholder="Search games..." class="search-bar">
                    </div>
                    <button class="btn-nav">Play</button>
                    <button id="mobile-menu-btn" class="md:hidden p-2 text-gray-400 hover:text-white">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" style="border-top:1px solid #2a3f5f;padding:16px 0">
                <div style="display:flex;flex-direction:column;gap:12px">
                    <a href="<?php echo $ROOT_URL; ?>index.php" class="nav-link" style="padding:6px 0">Home</a>
                    <a href="<?php echo $ROOT_URL; ?>index.php#categories" class="nav-link" style="padding:6px 0">Games</a>
                    <a href="<?php echo $ROOT_URL; ?>index.php#about" class="nav-link" style="padding:6px 0">About</a>
                    <a href="<?php echo $ROOT_URL; ?>index.php#contact" class="nav-link" style="padding:6px 0">Contact</a>
                    <input type="text" placeholder="Search games..." class="search-bar" style="width:100%;margin-top:8px">
                </div>
            </div>
        </div>
    </nav>

    <div>
