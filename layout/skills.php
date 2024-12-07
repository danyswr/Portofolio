
<div id="particles-js"></div>
<div class="card-container">
    <button class="nav-button prev">&lt;</button>
    <div class="skill-card">
        <div class="skill-icon">📱</div>
        <h2 class="skill-name">Mobile Development</h2>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="skill-level">80%</div>
        <div class="skill-tags">
            <span class="skill-tag">React Native</span>
            <span class="skill-tag">Android</span>
            <span class="skill-tag">iOS</span>
            <span class="skill-tag">Flutter</span>
        </div>
    </div>
    <button class="nav-button next">&gt;</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const skills = <?php echo json_encode($skills); ?>;

    let currentIndex = 0;

    const updateCard = (index) => {
        const skill = skills[index];
        document.querySelector('.skill-icon').textContent = skill.icon;
        document.querySelector('.skill-name').textContent = skill.name;
        document.querySelector('.progress-bar').style.width = `${skill.level}%`;
        document.querySelector('.progress-bar').setAttribute('aria-valuenow', skill.level);
        document.querySelector('.skill-level').textContent = `${skill.level}%`;

        const tagsContainer = document.querySelector('.skill-tags');
        tagsContainer.innerHTML = '';
        skill.tags.forEach(tag => {
            const tagElement = document.createElement('span');
            tagElement.className = 'skill-tag';
            tagElement.textContent = tag;
            tagsContainer.appendChild(tagElement);
        });
    };

    document.querySelector('.nav-button.prev').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + skills.length) % skills.length;
        updateCard(currentIndex);
    });

    document.querySelector('.nav-button.next').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % skills.length;
        updateCard(currentIndex);
    });

    // Initialize with the first skill
    updateCard(currentIndex);
</script>

<style>
        :root {
            --color-dark: #3B3030;
            --color-card: #664343;
            --color-light: #FFF0D1;
            --color-tag: #3B3030;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--color-dark);
            color: var(--color-accent);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Membuat card berada di tengah secara vertikal dan horizontal */
            position: relative;
        }

        .skill-card {
            background-color: var(--color-card);
            border-radius: 15px;
            padding: 2rem;
            color: var(--color-light);
            text-align: center;
            width: 100%; /* Menjaga lebar penuh dalam kontainer */
            max-width: 500px; /* Membatasi lebar maksimal */
        }

        .skill-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .skill-name {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .progress {
            height: 10px;
            background-color: var(--color-dark);
            margin-bottom: 1rem;
        }

        .progress-bar {
            background-color: var(--color-light);
        }

        .skill-level {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .skill-tags {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .skill-tag {
            background-color: var(--color-tag);
            color: var(--color-light);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--color-light);
            color: var(--color-dark);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
            z-index: 1; /* Pastikan tombol berada di atas card */
        }

        .nav-button:hover {
            background-color: var(--color-card);
            color: var(--color-light);
        }

        .nav-button.prev {
            left: 60px;
        }

        .nav-button.next {
            right: 60px;
        }
    </style>