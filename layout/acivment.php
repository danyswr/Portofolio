
    <style>
        :root {
            --color-dark: #3B3030;
            --color-medium: #664343;
            --color-light: #795757;
            --color-accent: #FFF0D1;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--color-dark);
            color: var(--color-accent);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        .section-title {
            font-family: 'Orbitron', sans-serif;
            color: var(--color-accent);
            font-weight: 700;
            font-size: 3rem;
            margin-bottom: 2rem;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
            text-shadow: 0 0 10px var(--color-accent);
        }
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }
        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: var(--color-light);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
            box-shadow: 0 0 10px var(--color-light);
        }
        .achievement-card {
            padding: 10px 40px;
            position: relative;
            background-color: rgba(255, 255, 255, 0.1);
            width: calc(50% - 40px);
            border-radius: 15px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .achievement-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }
        .achievement-card::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -17px;
            background-color: var(--color-medium);
            border: 4px solid var(--color-accent);
            top: 15px;
            border-radius: 50%;
            z-index: 1;
            box-shadow: 0 0 10px var(--color-accent);
        }
        .left {
            left: 0;
        }
        .right {
            left: 50%;
        }
        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid rgba(255, 255, 255, 0.2);
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent rgba(255, 255, 255, 0.2);
        }
        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid rgba(255, 255, 255, 0.2);
            border-width: 10px 10px 10px 0;
            border-color: transparent rgba(255, 255, 255, 0.2) transparent transparent;
        }
        .right::after {
            left: -16px;
        }
        .achievement-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--color-medium);
            text-shadow: 0 0 10px var(--color-medium);
        }
        .achievement-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--color-accent);
        }
        .achievement-description {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: var(--color-accent);
        }
        .progress {
            height: 10px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 5px;
            overflow: hidden;
        }
        .progress-bar {
            background-color: var(--color-medium);
            transition: width 1s ease-in-out;
            box-shadow: 0 0 10px var(--color-medium);
        }
        .filters {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }
        .filter-btn {
            background-color: transparent;
            border: 2px solid var(--color-accent);
            color: var(--color-accent);
            padding: 0.5rem 1rem;
            margin: 0 0.5rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 600;
            font-family: 'Orbitron', sans-serif;
        }
        .filter-btn:hover, .filter-btn.active {
            background-color: var(--color-accent);
            color: var(--color-dark);
            box-shadow: 0 0 15px var(--color-accent);
        }
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }
        @media screen and (max-width: 600px) {
            .timeline::after {
                left: 31px;
            }
            .achievement-card {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            .achievement-card::before {
                left: 60px;
                border: medium solid rgba(255, 255, 255, 0.2);
                border-width: 10px 10px 10px 0;
                border-color: transparent rgba(255, 255, 255, 0.2) transparent transparent;
            }
            .left::after, .right::after {
                left: 15px;
            }
            .right {
                left: 0%;
            }
        }
    </style>

    <div id="particles-js"></div>
    

    <div class="container mt-5 pt-5">
    <h1 class="section-title mt-5">Achievement Timeline</h1>
    <div class="filters">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="academic">Academic</button>
        <button class="filter-btn" data-filter="professional">Professional</button>
        <button class="filter-btn" data-filter="personal">Personal</button>
    </div>
    <div class="timeline" id="achievements-container">
        <?php if (!empty($experience)): ?>
            <?php foreach ($experience as $exp): ?>
                <div class="achievement-card <?= strtolower($exp['title']); ?>">
                    <div class="achievement-icon">🏆</div>
                    <div class="achievement-title"><?= $exp['title']; ?></div>
                    <div class="achievement-description"><?= $exp['description']; ?></div>
                    <div class="progress">
                        <div class="progress-bar" style="width: <?= $exp['skill_level']; ?>%;"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No achievements found.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
<script>
    <?php include'script/partikel.js' ?>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
    <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
    <script>
    const achievements = <?php echo json_encode($achievements); ?>;

    const achievementsContainer = document.getElementById("achievements-container");

    function renderAchievements(filter = "all") {
        achievementsContainer.innerHTML = "";
        achievements.forEach(achievement => {
            if (filter === "all" || achievement.type === filter) {
                const card = document.createElement("div");
                card.className = `achievement-card ${achievement.type}`;
                card.innerHTML = `
                    <div class="achievement-icon">${achievement.icon}</div>
                    <div class="achievement-title">${achievement.title}</div>
                    <div class="achievement-description">${achievement.description}</div>
                    <div class="progress">
                        <div class="progress-bar" style="width: ${achievement.progress}%;"></div>
                    </div>
                `;
                achievementsContainer.appendChild(card);
            }
        });
    }

    document.querySelectorAll(".filter-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            document.querySelectorAll(".filter-btn").forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            renderAchievements(btn.dataset.filter);
        });
    });

    // Initial render
    renderAchievements();
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

