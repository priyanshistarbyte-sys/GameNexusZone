<?php include 'header.php'; ?>

<!-- HERO -->
<section class="hero-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-20">

            <!-- Left: Content -->
            <div class="flex-1 text-center lg:text-left">
                <div class="hero-badge">🎯 &nbsp;Unlimited Gaming Fun Awaits</div>
                <h1 class="hero-title text-white">
                    Level Up Your
                    <br>
                    <span class="grad-text">Gaming Adventure</span>
                    <br>
                    Right Now
                </h1>
                <p class="hero-desc">
                    Experience the ultimate gaming collection with instant access to hundreds of thrilling games. Zero lag, zero waiting, pure entertainment at your fingertips. Start playing in seconds!
                </p>
                <div style="display:flex;gap:16px;flex-wrap:wrap;justify-content:center;lg:justify-start">
                    <button class="btn-play" onclick="document.getElementById('categories').scrollIntoView({behavior:'smooth'})">🚀 Start Gaming →</button>
                    <button class="btn-outline" onclick="document.getElementById('about').scrollIntoView({behavior:'smooth'})">Why Choose Us?</button>
                </div>
            </div>

            <!-- Right: Stats Grid -->
            <div class="flex-shrink-0 w-full lg:w-auto">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;max-width:360px;margin:0 auto">
                    <div class="stat-card">
                        <div class="stat-num">300+</div>
                        <div style="color:#a8bfd4;font-size:0.85rem;font-weight:600;margin-top:6px">Games</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-num">∞</div>
                        <div style="color:#a8bfd4;font-size:0.85rem;font-weight:600;margin-top:6px">Free Play</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-num">0s</div>
                        <div style="color:#a8bfd4;font-size:0.85rem;font-weight:600;margin-top:6px">Load Time</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-num">All</div>
                        <div style="color:#a8bfd4;font-size:0.85rem;font-weight:600;margin-top:6px">Devices</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- GAMES -->
<section id="categories" style="padding:90px 0;background:linear-gradient(180deg, transparent 0%, rgba(0, 217, 255, 0.06) 100%)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div style="display:flex;flex-direction:column;align-items:center;text-align:center;margin-bottom:50px">
            <div class="section-label">🎯 Game Collection</div>
            <h2 class="section-title">Browse & Play Games</h2>
            <p style="color:#a8bfd4;margin-top:12px;font-size:0.97rem">Pick a category or search your favorite game</p>
        </div>

        <!-- Category Pills -->
        <div style="display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-bottom:50px">
            <button data-category="all" class="cat-pill active">🎮 All Games</button>
            <button data-category="popular" class="cat-pill">🔥 Hot Games</button>
            <button data-category="action" class="cat-pill">⚡ Action</button>
            <button data-category="arcade" class="cat-pill">🎯 Arcade</button>
            <button data-category="strategy" class="cat-pill">🧠 Strategy</button>
            <button data-category="adventure" class="cat-pill">🗺️ Adventure</button>
            <button data-category="puzzle" class="cat-pill">🧩 Puzzle</button>
            <button data-category="sports" class="cat-pill">⚽ Sports</button>
        </div>

        <!-- Games Grid -->
        <div id="games-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:24px">
            <!-- loaded by JS -->
        </div>

        <div style="text-align:center;margin-top:60px">
            <button id="load-more" class="btn-load">Load More Games</button>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section id="about" style="padding:90px 0;background:linear-gradient(180deg, rgba(255, 107, 53, 0.05) 0%, transparent 100%)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div style="display:flex;flex-direction:column;align-items:center;text-align:center;margin-bottom:60px">
            <div class="section-label">✨ Why GameNexusZone?</div>
            <h2 class="section-title">The Ultimate Gaming Experience</h2>
            <p style="color:#a8bfd4;margin-top:12px;font-size:0.97rem">Everything you need for endless entertainment</p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:28px">
            <div class="feature-card">
                <div class="feature-icon" style="background:rgba(0, 217, 255, 0.15)">🚀</div>
                <h3 style="font-size:1.3rem;font-weight:700;color:#ffffff;margin-bottom:12px">Lightning Fast</h3>
                <p style="color:#a8bfd4;font-size:0.95rem;line-height:1.7">Play instantly without any downloads or waiting. Games load in seconds.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:rgba(255, 107, 53, 0.15)">🎁</div>
                <h3 style="font-size:1.3rem;font-weight:700;color:#ffffff;margin-bottom:12px">100% Free</h3>
                <p style="color:#a8bfd4;font-size:0.95rem;line-height:1.7">No hidden costs. No premium memberships. Play all games completely free forever.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:rgba(0, 217, 255, 0.15)">📱</div>
                <h3 style="font-size:1.3rem;font-weight:700;color:#ffffff;margin-bottom:12px">All Devices</h3>
                <p style="color:#a8bfd4;font-size:0.95rem;line-height:1.7">Play on desktop, tablet, or mobile. Your games sync everywhere you go.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:rgba(255, 107, 53, 0.15)">🎭</div>
                <h3 style="font-size:1.3rem;font-weight:700;color:#ffffff;margin-bottom:12px">Huge Library</h3>
                <p style="color:#a8bfd4;font-size:0.95rem;line-height:1.7">300+ games across all genres. Action, puzzle, strategy, sports & more.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:rgba(0, 217, 255, 0.15)">⚡</div>
                <h3 style="font-size:1.3rem;font-weight:700;color:#ffffff;margin-bottom:12px">No Sign-up</h3>
                <p style="color:#a8bfd4;font-size:0.95rem;line-height:1.7">Click and play. No registration, no email required. Instant access!</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:rgba(255, 107, 53, 0.15)">🌟</div>
                <h3 style="font-size:1.3rem;font-weight:700;color:#ffffff;margin-bottom:12px">Always Updated</h3>
                <p style="color:#a8bfd4;font-size:0.95rem;line-height:1.7">New games added weekly. Latest releases & classic favorites always available.</p>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact" style="padding:90px 0;background:linear-gradient(180deg, rgba(0, 217, 255, 0.08) 0%, transparent 100%)">
    <div class="max-w-2xl mx-auto px-4 sm:px-6">
        <div style="display:flex;flex-direction:column;align-items:center;text-align:center;margin-bottom:50px">
            <div class="section-label">💬 Let's Talk</div>
            <h2 class="section-title">Contact Our Team</h2>
            <p style="color:#a8bfd4;margin-top:12px;font-size:0.97rem">Have questions, feedback, or game suggestions? We're here to help!</p>
        </div>
        <div style="background:rgba(26, 31, 58, 0.8);border:1px solid #2a3f5f;border-radius:20px;padding:48px;backdrop-filter:blur(10px)">
            <form style="display:flex;flex-direction:column;gap:20px">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px">
                    <input type="text" placeholder="Your Name" class="contact-input">
                    <input type="email" placeholder="Email Address" class="contact-input">
                </div>
                <textarea placeholder="Your Message (Min 10 characters)" rows="6" class="contact-input" style="resize:none;font-family:'Outfit',sans-serif"></textarea>
                <button type="submit" class="btn-play" style="border-radius:12px;padding:14px;font-size:1rem">Send Message 📤</button>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
