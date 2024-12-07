<?php
// Pastikan error reporting aktif
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config/config.php';
// Initialize variables
$success = '';
$error = '';

// Create connection
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['konfirm'])) {
    try {
        // Basic validation
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
            throw new Exception("All fields are required!");
        }

        // Validate email
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format!");
        }

        // Sanitize inputs
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

        // Debug connection
        if (!$conn || $conn->connect_errno) {
            throw new Exception("Database connection lost: " . $conn->connect_error);
        }

        // Mengubah query untuk menggunakan tabel 'contacts'
        $query = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
        
        // Prepare statement with error checking
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        // Bind parameters with error checking
        if (!$stmt->bind_param("sss", $name, $email, $message)) {
            throw new Exception("Binding parameters failed: " . $stmt->error);
        }

        // Execute with error checking
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        $success = "Message sent successfully!";
        $stmt->close();

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>


    <style>
        body {
            background-color: #1a1a1a;
            color: #f0e6d2;
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
        }

        .contact-container {
            background-color: rgba(42, 37, 34, 0.7);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            position: relative;
            backdrop-filter: blur(10px);
        }

        .contact-form {
            padding: 2rem;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            border-bottom: 2px solid #f0e6d2;
            border-radius: 0;
            color: #f0e6d2;
            padding: 0.75rem 0.5rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: none;
            border-color: #c0392b;
        }

        .form-control::placeholder {
            color: rgba(240, 230, 210, 0.7);
        }

        .btn-submit {
            background-color: #c0392b;
            border: none;
            color: #f0e6d2;
            padding: 0.75rem 2rem;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-submit:hover {
            background-color: #a93226;
        }

        .contact-info {
            padding: 2rem;
        }

        .contact-info h2 {
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .social-icons a {
            color: #f0e6d2;
            font-size: 1.5rem;
            margin: 0 1rem;
            transition: all 0.3s ease;
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .animate-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .animate-in.show {
            opacity: 1;
            transform: translateY(0);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, 15px); }
            100% { transform: translate(0, -0px); }
        }

        .success-message.show {
            opacity: 1;
            transform: translateX(0);
        }

    </style>
<

    <div id="particles-js"></div>
    <div class="container py-5">
    <h1 class="text-center mb-5 animate-in typing-effect" id="typing-title">Contact Me</h1>
    <div class="row contact-container animate-in">
        <div class="col-lg-7 contact-form">
            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <form id="contactForm" method="POST">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" name="konfirm" class="btn btn-submit">Send Message</button>
            </form>
        </div>

            <div class="col-lg-5 contact-info">
                <h2 class="floating">Get in Touch</h2>
                <p>Feel free to reach out to me for any inquiries or collaboration opportunities. I'm always excited to work on new projects and meet fellow developers!</p>
                <p><i class="fas fa-envelope"></i> Daniswara.173a@example.com</p>
                <p><i class="fas fa-phone"></i> +62 123 456 7890</p>
                <p><i class="fas fa-map-marker-alt"></i> Tangerang Selatan, Indonesia</p>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            particlesJS('particles-js', {
                particles: {
                    number: { value: 80, density: { enable: true, value_area: 800 } },
                    color: { value: '#8e7f7f' },
                    shape: { type: 'circle' },
                    opacity: { value: 0.5, random: false },
                    size: { value: 3, random: true },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: '#8e7f7f',
                        opacity: 0.4,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 6,
                        direction: 'none',
                        random: false,
                        straight: false,
                        out_mode: 'out',
                        bounce: false,
                        attract: { enable: false, rotateX: 600, rotateY: 1200 }
                    }
                },
                retina_detect: true
            });

            const formElements = document.querySelectorAll('.animate-in');
            formElements.forEach((element, index) => {
                setTimeout(() => {
                    element.classList.add('show');
                }, index * 200);
            });

            const typingTitle = document.getElementById('typing-title');
            const text = typingTitle.textContent;
            typingTitle.textContent = '';

            let i = 0;
            function typeEffect() {
                if (i < text.length) {
                    typingTitle.textContent += text.charAt(i);
                    i++;
                    setTimeout(typeEffect, 150);
                }
            }
            typeEffect();
        });
    </script>