<?php
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset to utf8mb4
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}



//---------------------------------------------------------------------------




// Ambil data dari tabel user_info
$sql = "SELECT name, description, facebook_link, twitter_link, linkedin_link, github_link, profile_image FROM user_info WHERE id=1";
$result = $conn->query($sql);

$row = [];
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No data found for user_info<br>";
    var_dump($conn->error); // Output error jika ada
}

// Ambil data dari tabel experience
$sql_experience = "SELECT title, description, skill_level, image_url FROM experience";
$result_experience = $conn->query($sql_experience);

$experience = [];
if ($result_experience && $result_experience->num_rows > 0) {
    while ($row_experience = $result_experience->fetch_assoc()) {
        $experience[] = $row_experience;
    }
} else {
    echo "No experience data found<br>";
    var_dump($conn->error); // Output error jika ada
}


// Ambil data skill dari tabel skills
$sql_skills = "SELECT name, icon, level, tags FROM skills";
$result_skills = $conn->query($sql_skills);

$skills = [];
if ($result_skills && $result_skills->num_rows > 0) {
    while ($row_skills = $result_skills->fetch_assoc()) {
        // Pecah tags jika diperlukan
        $row_skills['tags'] = explode(',', $row_skills['tags']);
        $skills[] = $row_skills;
    }
} else {
    echo "No skills data found<br>";
    var_dump($conn->error); // Output error jika ada
}


// Ambil data dari tabel achievements
$sql_achievements = "SELECT title, description, icon, type, progress FROM achievements";
$result_achievements = $conn->query($sql_achievements);

$achievements = [];
if ($result_achievements && $result_achievements->num_rows > 0) {
    while ($row_achievement = $result_achievements->fetch_assoc()) {
        $achievements[] = $row_achievement;
    }
} else {
    echo "No achievements data found<br>";
    var_dump($conn->error); // Output error jika ada
}


// Tutup koneksi setelah data diambil
$conn->close();
?>
