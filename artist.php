<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';

$artist = isset($_GET['name']) ? trim(urldecode($_GET['name'])) : null;

if (!$artist) {
    header("Location: index");
    exit();
}

function getArtistProfilePicture($artistName) {
    global $conn;
    try {
        $query = "SELECT profile_picture FROM users WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":username", $artistName, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result && $result['profile_picture']) {
            $filename = basename($result['profile_picture']);
            return 'uploads/profiles/' . $filename;
        }
        return 'defaults/default-profile.jpg';
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return 'defaults/default-profile.jpg';
    }
}

function getArtistSongs($artistName) {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT * FROM songs WHERE artist = :artist ORDER BY upload_date DESC");
        $stmt->bindValue(':artist', $artistName, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return [];
    }
}

function checkArtistExists($artistName) {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT *, is_verified, bio, is_developer FROM users WHERE username = :username");
        $stmt->bindValue(':username', $artistName, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

function sanitizeFilename($filename) {
    return preg_replace('/[^a-zA-Z0-9-_.]/', '', $filename);
}

$artistData = checkArtistExists($artist);
$songs = $artistData ? getArtistSongs($artist) : [];
$profilePicture = getArtistProfilePicture($artist);

if (!$artistData) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Not Found - matSFX</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="https://matsfx.com/app-images/matsfx-logo.png">
        <link rel="stylesheet" href="style.css">
        <style>
            .error-user-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 91vh;
                background-color: var(--dark-bg);
                text-align: center;
                padding: 20px;
                box-sizing: border-box;
            }
            .error-user-heading {
                font-size: 48px;
                font-weight: bold;
                color: var(--primary-color);
                margin-bottom: 16px;
            }

            .error-user-text {
                font-size: 20px;
                color: var(--gray-text);
                margin-bottom: 32px;
            }

            .error-user-button {
                display: inline-block;
                text-decoration: none;
                padding: 12px 24px;
                font-size: 18px;
                font-weight: 600;
                color: var(--light-text);
                background-color: var(--primary-color);
                border-radius: var(--border-radius);
                box-shadow: var(--shadow-sm);
                transition: var(--transition);
            }

            .error-user-button:hover {
                background-color: var(--primary-hover);
                box-shadow: var(--shadow-md);
            }
        </style>
    </head>
    <body>
        <nav class="navbar">
            <div class="logo">matSFX - Alpha 0.1</div>
            <div class="nav-links">
                <a href="../">Home</a>
                <a href="upload">Upload</a>
                <a href="settings">Settings</a>
                <a href="logout">Logout</a>
            </div>
        </nav>
        <div class="error-user-container">
            <h1 class="error-user-heading">User Not Found</h1>
            <p class="error-user-text">The requested user does not exist.</p>
            <a href="../" class="error-user-button">Back to Home</a>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($artist); ?> - matSFX</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .verified-badge {
            width: 20px;
            height: 20px;
            margin-left: 8px;
            vertical-align: middle;
        }
	    .developer-badge {
            width: 20px;
            height: 20px;
            
            vertical-align: middle;
        }	    
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">matSFX - Alpha 0.1</div>
        <div class="nav-links">
            <a href="../">Home</a>
            <a href="upload">Upload</a>
            <a href="settings">Settings</a>
            <a href="logout">Logout</a>
        </div>
    </nav>

		<div class="artist-profile">
			<div class="profile-header">
				<div class="profile-content">
					<img src="<?php echo htmlspecialchars($profilePicture); ?>" alt="Artist" class="profile-image">
					<div class="profile-info">
						<h1 class="profile-name">
							<?php 
							echo htmlspecialchars($artist); 
							if ($artistData['is_admin'] == 1): 
							?>
							<img src="app-images/admin-badge.png" alt="Admin" class="verified-badge" title="Admin">
							<?php 
							elseif ($artistData['is_verified'] == 1): 
							?>
							<img src="app-images/verified-badge.png" alt="Verified" class="verified-badge" title="Verified Artist">
							<?php 
							endif; 
							if ($artistData['is_developer'] == 1): 
							?>
							<img src="app-images/developer-badge.png" alt="Developer" class="developer-badge" title="Developer">
							<?php endif; ?>
						</h1>
						 <?php if (!empty($artistData['bio'])): ?>
                            <p><?php echo nl2br(htmlspecialchars($artistData['bio'])); ?></p>
                           <?php endif; ?>
                    <div class="profile-stats">
                        <span><?php echo count($songs); ?> Songs</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="artist-songs" style="padding-bottom: 10%;">
            <div class="songs-header">
                <h2 class="songs-title">Songs</h2>
            </div>
            <div class="music-grid">
                <?php if (empty($songs)): ?>
                    <p>No songs uploaded yet.</p>
                <?php else: ?>
                    <?php foreach ($songs as $song): ?>
                        <div class="song-card" onclick="playSong('<?php echo htmlspecialchars($song['file_path']); ?>', this)">
                            <img src="<?php echo htmlspecialchars($song['cover_art'] ?? 'defaults/default-cover.jpg'); ?>" alt="Cover Art" class="cover-art">
                            <div class="song-title"><?php echo htmlspecialchars($song['title']); ?></div>
                            <div class="song-artist"><?php echo htmlspecialchars($song['artist']); ?></div>
                            <div class="song-controls">
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="player">
        <audio id="audio-player" controls>
            Your browser does not support the audio element.
        </audio>
    </div>

    <script>
		const audioPlayer = document.getElementById('audio-player');

		function playSong(songPath, button) {
			if (audioPlayer.src.endsWith(songPath) && !audioPlayer.paused) {
				audioPlayer.pause();  
			} else {
				audioPlayer.src = songPath;  
				audioPlayer.play().catch(error => {
					console.error('Error playing song:', error);
					alert('Error playing song. Please try again.');
				});
			}
		}
		
		audioPlayer.addEventListener('ended', () => {
			if (currentButton) {
				currentButton.textContent = 'Play';
			}
		});
		
		const player = document.querySelector('.player');

		audioPlayer.addEventListener('play', () => {
			player.classList.add('active');
		});

		audioPlayer.addEventListener('pause', () => {
			player.classList.remove('active');
		});
    </script>
</body>
</html>