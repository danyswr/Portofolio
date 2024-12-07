<section id="home" class="hero">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hidden">
                    <h1 class="mb-4 animate__animated animate__fadeInLeft">Hello, I'm <?php echo !empty($row['name']) ? htmlspecialchars($row['name']) : 'Daniswara Apriliano'; ?></h1>
                    <p class="lead mb-4 animate__animated animate__fadeInLeft animate__delay-1s"><?php echo !empty($row['description']) ? htmlspecialchars($row['description']) : 'A student majoring in Informatics with a strong interest in web development and cybersecurity.'; ?></p>
                    <p class="animate__animated animate__fadeInLeft animate__delay-2s">
                        Experienced in using technologies such as HTML, CSS, JavaScript, and Python, and has worked on several projects, including the creation of a portfolio website and participation in Capture The Flag (CTF) competitions.
                    </p>
                </div>
                <div class="col-lg-6 text-center hidden">
                    <img src="<?php echo !empty($row['profile_image']) ? htmlspecialchars($row['profile_image']) : 'style/default-profile.jpg'; ?>" alt="<?php echo !empty($row['name']) ? htmlspecialchars($row['name']) : 'Daniswara Apriliano'; ?>" class="profile-image animate__animated animate__zoomIn animate__delay-3s">
                </div>
            </div>
        </div>
        <div class="scroll-indicator">↓</div>
    </section>

<!--------------------------------------------------------------------------------------->

<section id="experience" class="experience-section section">
    <div class="container">
        <h2 class="section-title text-center mb-5 hidden">My Experience</h2>
        <div class="position-relative">
            <div class="experience-carousel">
                <div class="experience-track">
                    <?php if (!empty($experience)) : ?>
                        <?php foreach ($experience as $index => $exp) : ?>
                            <div class="experience-card">
                                <div class="card h-100">
                                    <img src="<?php echo htmlspecialchars($exp['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($exp['title']); ?>">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><?php echo htmlspecialchars($exp['title']); ?></h5>
                                        <p class="card-text flex-grow-1"><?php echo htmlspecialchars($exp['description']); ?></p>
                                        <div class="mt-auto">
                                            <div class="skill-bar mb-2">
                                                <div class="skill-progress" style="width: <?php echo htmlspecialchars($exp['skill_level']); ?>%;"></div>
                                            </div>
                                            <button class="btn btn-custom w-100" data-bs-toggle="modal" data-bs-target="#projectModal<?php echo $index; ?>">Learn More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No experience data available.</p>
                    <?php endif; ?>
                </div>
            </div>
            <button class="carousel-control carousel-control-prev" type="button" data-bs-target="#experienceCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control carousel-control-next" type="button" data-bs-target="#experienceCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Modals (unchanged) -->
    <?php if (!empty($experience)) : ?>
        <?php foreach ($experience as $index => $exp) : ?>
            <div class="modal fade custom-modal" id="projectModal<?php echo $index; ?>" tabindex="-1" aria-labelledby="projectModalLabel<?php echo $index; ?>" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="projectModalLabel<?php echo $index; ?>"><?php echo htmlspecialchars($exp['title']); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="<?php echo htmlspecialchars($exp['image_url']); ?>" class="img-fluid mb-3" alt="<?php echo htmlspecialchars($exp['title']); ?>">
                            <p><?php echo htmlspecialchars($exp['description']); ?></p>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>

<!---------------------------------------------------------------------------------->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            

    // Scroll animation using IntersectionObserver
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    });

    const hiddenElements = document.querySelectorAll('.hidden');
    hiddenElements.forEach((el) => observer.observe(el));

    // Skill bar animation
    const skillBars = document.querySelectorAll('.skill-progress');
    skillBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0';
        setTimeout(() => {
            bar.style.width = width;
        }, 500);
    });

    // Smooth scrolling
    document.querySelector('.scroll-indicator').addEventListener('click', () => {
        document.querySelector('#experience').scrollIntoView({ behavior: 'smooth' });
    });

     // Experience Carousel
     const track = document.querySelector('.experience-track');
    const cards = document.querySelectorAll('.experience-card');
    const prevButton = document.querySelector('.carousel-control-prev');
    const nextButton = document.querySelector('.carousel-control-next');

    let cardIndex = 0;
    const cardWidth = cards[0].offsetWidth + 20; // 20px for margin-right
    const maxIndex = cards.length - Math.floor(track.offsetWidth / cardWidth);

    function updateCarousel() {
        track.style.transform = `translateX(-${cardIndex * cardWidth}px)`;
        prevButton.style.display = cardIndex === 0 ? 'none' : 'flex';
        nextButton.style.display = cardIndex === maxIndex ? 'none' : 'flex';
    }

    prevButton.addEventListener('click', () => {
        cardIndex = Math.max(0, cardIndex - 1);
        updateCarousel();
    });

    nextButton.addEventListener('click', () => {
        cardIndex = Math.min(maxIndex, cardIndex + 1);
        updateCarousel();
    });

    // Initial update
    updateCarousel();

    // Update on window resize
    window.addEventListener('resize', () => {
        cardIndex = 0;
        updateCarousel();
    });

});
    </script>

<style>
 :root {
    --color-dark: #3B3030;
    --color-medium: #664343;
    --color-light: #795757;
    --color-accent: #FFF0D1;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: var(--color-dark);
    color: var(--color-accent);
    transition: background-color 0.3s ease, color 0.3s ease;
}

.section {
    padding: 80px 0;
}

.section-title {
    color: var(--color-accent);
    margin-bottom: 40px;
    font-weight: bold;
}

.card {
    background-color: var(--color-medium);
    color: var(--color-accent);
    border: none;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 0.75rem;
}

.card-text {
    font-size: 0.9rem;
}

.skill-bar {
    height: 10px;
    background-color: var(--color-light);
    border-radius: 5px;
    overflow: hidden;
}

.skill-progress {
    height: 100%;
    background-color: var(--color-accent);
    transition: width 1s ease-in-out;
}

.btn-custom {
    background-color: var(--color-light);
    color: var(--color-accent);
    border: none;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-custom:hover {
    background-color: var(--color-accent);
    color: var(--color-dark);
}

.modal-content {
    background-color: var(--color-medium);
    color: var(--color-accent);
}

.modal-header, .modal-footer {
    border-color: var(--color-light);
}

.btn-secondary {
    background-color: var(--color-light);
    border-color: var(--color-light);
    color: var(--color-accent);
}

.btn-secondary:hover {
    background-color: var(--color-dark);
    border-color: var(--color-dark);
    color: var(--color-accent);
}

.hidden {
    opacity: 0;
    filter: blur(5px);
    transform: translateX(-100%);
    transition: all 1s;
}

.show {
    opacity: 1;
    filter: blur(0);
    transform: translateX(0);
}

.modal {
    z-index: 1060;
}

.modal-backdrop {
    z-index: 1050;
}

.custom-modal .modal-dialog {
    max-width: 500px;
}

.custom-modal .modal-content {
    padding: 20px;
}

.custom-modal .modal-body img {
    max-height: 300px;
    width: 100%;
    object-fit: cover;
}

.experience-section {
    overflow: hidden;
}

.experience-carousel {
    position: relative;
    overflow: hidden;
    padding: 20px 0;
}

.experience-track {
    display: flex;
    transition: transform 0.5s ease;
}

.experience-card {
    flex: 0 0 300px;
    margin-right: 20px;
}

.carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    background-color: var(--color-medium);
    border: none;
    border-radius: 50%;
    color: var(--color-accent);
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.carousel-control:hover {
    background-color: var(--color-light);
}

.carousel-control-prev {
    left: -20px;
}

.carousel-control-next {
    right: -20px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    display: inline-block;
    width: 20px;
    height: 20px;
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 100% 100%;
}

.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e");
}

.carousel-control-next-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
}

</style>