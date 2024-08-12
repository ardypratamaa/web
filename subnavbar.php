<?php
require 'database/connect.php'; 


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; 
    $selectStmt = $mysqli->prepare("SELECT flag FROM users WHERE username = ?");
    $selectStmt->bind_param('s', $username);
    $selectStmt->execute();
    $selectResult = $selectStmt->get_result();
    $userData = $selectResult->fetch_assoc();
    
   
    $userFlag = $userData['flag'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub Navbar</title>
    <style>
        .sub-navbar .sub-container-fluid {
            background-color: #133B5C;
            padding: 10px 0;
        }

        .sub-navbar .sub-container-fluid .sub-navbar-nav {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            list-style-type: none;
            padding-left: 0;
        }

        .sub-navbar .sub-container-fluid .sub-nav-item {
            margin-right: 10px;
        }

        .sub-navbar .sub-container-fluid .sub-nav-link {
            color: #000;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sub-navbar .sub-container-fluid .social-btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-bottom: -15px;
        }

        .sub-navbar .sub-container-fluid .discord-btn {
            background-color: #7289da;
        }

        .sub-navbar .sub-container-fluid .discord-btn:hover {
            background-color: #5f73bc;
        }

        .sub-navbar .sub-container-fluid .tiktok-btn {
            background-color: black;
        }

        .sub-navbar .sub-container-fluid .tiktok-btn:hover {
            background-color: black;
        }

        .sub-navbar .sub-container-fluid .instagram-btn {
            background-color: #e4405f;
        }

        .sub-navbar .sub-container-fluid .instagram-btn:hover {
            background-color: #c72c4d;
        }

        .sub-navbar .sub-container-fluid .profile-btn {
            background-color: #36BA98;
            margin-left: 900px;
            display: <?php echo isset($_SESSION['username']) ? 'inline-block' : 'none'; ?>;
        }

        .sub-navbar .sub-container-fluid .profile-btn:hover {
            background-color: #36BA98;
        }

        .flag-icon {
            width: 25px;
            height: auto;
            vertical-align: middle;
            margin-right: 8px;
        }
    </style>
</head>
<body>

<div class="sub-navbar">
    <div class="sub-container-fluid">
        <ul class="sub-navbar-nav">
            <li class="sub-nav-item">
                <a class="sub-nav-link social-btn discord-btn" href="https://discord.gg/EQg8HkQYAF" target="_blank">Discord</a>
            </li>
            <li class="sub-nav-item">
                <a class="sub-nav-link social-btn tiktok-btn" href="https://www.tiktok.com/@jellydrinkkkz" target="_blank">TikTok</a>
            </li>
            <li class="sub-nav-item">
                <a class="sub-nav-link social-btn instagram-btn" href="https://www.instagram.com/rsihaxball/" target="_blank">Instagram</a>
            </li>
            <li class="sub-nav-item">
                <?php if (isset($_SESSION['username'])) : ?>
                    <a class="sub-nav-link social-btn profile-btn" href="#">
                        <img src="assets/resources/flags/<?php echo htmlspecialchars($userFlag); ?>.svg" alt="" class="flag-icon">
                        <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</div>

</body>
</html>
