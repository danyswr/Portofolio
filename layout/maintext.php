<?php include 'config/config.php'; ?>

<section id="home" class="hero">
    <div id="particles-js"></div>
    <div class="container content">
        <div class="row align-items-center">
            <div class="col-lg-6">
            <h1>Hello, I'm <span id="typed-text"><?php echo $row['name']; ?></span></h1>
                <p><?php echo $row['description']; ?></p>
                <div class="social-icons mb-4">
                    <a href="<?php echo $row['facebook_link']; ?>"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo $row['twitter_link']; ?>"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo $row['linkedin_link']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="<?php echo $row['github_link']; ?>" target="_blank"><i class="fab fa-github"></i></a>
                </div>
                <a href="contact.php" class="btn btn-custom">Hire Me</a>
            </div target ="_blank">

            <div class="col-lg-6 text-center">
                <img src="<?php echo $row['profile_image']; ?>" alt="Profile Image" class="profile-image">
            </div>
        </div>
    </div>
</section>
