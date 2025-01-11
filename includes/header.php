<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="includes/css/header.css">
		<style>
		* {
			font-family: 'Inter', system-ui, -apple-system, sans-serif;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		:root {
			--header-bg: rgba(17, 24, 39, 0.95);
			--header-border: rgba(255, 255, 255, 0.08);
			--primary-text: rgba(255, 255, 255, 0.95);
			--secondary-text: rgba(255, 255, 255, 0.7);
			--hover-bg: rgba(255, 255, 255, 0.12);
			--active-bg: rgba(255, 255, 255, 0.15);
			--dropdown-bg: rgba(25, 28, 35, 0.98);
		}

		.global-header {
			background-color: var(--header-bg);
			backdrop-filter: blur(12px) saturate(180%);
			padding: 0.875rem;
			width: 100%;
			position: fixed;
			top: 0;
			left: 0;
			z-index: 1000;
			border-bottom: 1px solid var(--header-border);
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
		}

		.header-container {
			display: flex;
			align-items: center;
			justify-content: space-between;
			max-width: 1400px;
			margin: 0 auto;
			gap: 2rem;
			padding: 0 1.5rem;
		}

		/* Logo Styles */
		.brand {
			text-decoration: none;
			color: var(--primary-text);
			transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.brand:hover {
			transform: translateY(-1px);
		}

		.logo-wrapper {
			display: flex;
			align-items: center;
			gap: 0.875rem;
		}

		.logo-image {
			width: 38px;
			height: 38px;
			border-radius: 5px;
			object-fit: contain;
			filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
		}

		.brand-text {
			font-size: 0.9375rem;
			font-weight: 600;
			background: linear-gradient(120deg, #fff, rgba(255, 255, 255, 0.8));
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		/* Navigation Styles */
		.main-nav {
			display: flex;
			gap: 1.5rem;
			align-items: center;
		}

		.nav-link {
			color: var(--secondary-text);
			text-decoration: none;
			font-weight: 500;
			padding: 0.625rem 1rem;
			border-radius: 10px;
			transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
			font-size: 0.9375rem;
			position: relative;
			overflow: hidden;
		}

		.nav-link::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: var(--hover-bg);
			transform: translateY(100%);
			transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
			z-index: -1;
			border-radius: 10px;
		}

		.nav-link:hover {
			color: var(--primary-text);
		}

		.nav-link:hover::before {
			transform: translateY(0);
		}

		/* Search Bar Styles */
		.search-container {
			position: relative;
			flex-grow: 1;
			max-width: 480px;
		}

		.search-input {
			width: 100%;
			padding: 0.875rem 1.125rem 0.875rem 2.75rem;
			border: 1px solid var(--header-border);
			border-radius: 14px;
			background-color: rgba(255, 255, 255, 0.07);
			color: var(--primary-text);
			font-size: 0.9375rem;
			transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.search-input::placeholder {
			color: rgba(255, 255, 255, 0.4);
		}

		.search-input:focus {
			background-color: rgba(255, 255, 255, 0.1);
			outline: none;
			border-color: rgba(255, 255, 255, 0.2);
			box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.1);
		}

		.search-icon {
			position: absolute;
			left: 1rem;
			top: 50%;
			transform: translateY(-50%);
			color: rgba(255, 255, 255, 0.4);
			pointer-events: none;
			transition: color 0.3s ease;
		}

		.search-input:focus + .search-icon {
			color: rgba(255, 255, 255, 0.7);
		}
		
		/* Search Results Container */
		.search-results {
			position: absolute;
			top: calc(100% + 0.5rem);
			left: 0;
			right: 0;
			background-color: var(--card-bg);
			border: 1px solid var(--border-color);
			border-radius: var(--border-radius);
			box-shadow: var(--shadow-lg);
			max-height: min(400px, 70vh);
			overflow-y: auto;
			z-index: 1000;
		}

		/* Search Section Styles */
		.search-section {
			padding: 0.5rem;
		}

		.search-section h3 {
			color: var(--gray-text);
			font-size: 0.8rem;
			text-transform: uppercase;
			padding: 0.5rem 1rem;
			margin: 0;
		}

		/* Search Result Item */
		.search-result-item {
			display: flex;
			align-items: center;
			padding: 0.875rem 1rem;
			text-decoration: none;
			transition: var(--transition);
			border-radius: var(--border-radius);
			margin: 0.25rem 0;
		}

		.search-result-item:hover {
			background-color: var(--card-hover);
		}

		.result-image {
			width: 40px;
			height: 40px;
			border-radius: 8px;
			margin-right: 1rem;
			object-fit: cover;
		}

		.result-info {
			flex: 1;
		}

		.result-name {
			color: var(--light-text);
			font-weight: 500;
			margin-bottom: 0.25rem;
		}

		.result-subtitle {
			color: var(--gray-text);
			font-size: 0.8rem;
		}

		.result-type {
			color: var(--primary-color);
			font-size: 0.75rem;
			text-transform: uppercase;
			margin-top: 0.25rem;
		}

		/* Loading State */
		.search-loading {
			padding: 1rem;
		}

		.shimmer-item {
			height: 60px;
			background: linear-gradient(
				90deg,
				var(--card-bg) 0%,
				var(--card-hover) 50%,
				var(--card-bg) 100%
			);
			background-size: 200% 100%;
			animation: shimmer 2s infinite linear;
			border-radius: var(--border-radius);
			margin: 0.5rem 0;
		}

		@keyframes shimmer {
			0% {
				background-position: 200% 0;
			}
			100% {
				background-position: -200% 0;
			}
		}

		/* No Results State */
		.no-results {
			padding: 2rem;
			text-align: center;
			color: var(--gray-text);
		}

		.no-results-icon {
			font-size: 2rem;
			margin-bottom: 1rem;
		}

		.no-results-text p {
			color: var(--light-text);
			margin-bottom: 0.5rem;
		}

		.no-results-text span {
			font-size: 0.875rem;
		}

		/* Scrollbar Styles */
		.search-results::-webkit-scrollbar {
			width: 8px;
		}

		.search-results::-webkit-scrollbar-track {
			background: var(--card-bg);
			border-radius: 4px;
		}

		.search-results::-webkit-scrollbar-thumb {
			background: var(--border-color);
			border-radius: 4px;
		}

		.search-results::-webkit-scrollbar-thumb:hover {
			background: var(--primary-color);
		}
			
		@media (max-width: 768px) {
		  .header-container {
			grid-template-columns: auto 1fr auto;
			gap: 1rem;
		  }

		  .search-container {
			position: relative;
			width: 100%;
			right: auto;
			left: auto;
		  }

		  .search-results {
			left: 0;
			transform: none;
			width: 100%;
		  }

		  .search-icon {
			left: 1rem;
		  }
		}

		@media (max-width: 480px) {
			.search-container {
				top: 0.25rem;
				right: 0.25rem;
				left: 0.25rem;
			}

			.search-input {
				padding: 0.875rem 0.875rem 0.875rem 2.5rem;
				font-size: 0.875rem;
			}

			.search-icon {
				left: 0.875rem;
				font-size: 0.875rem;
			}

			.result-name {
				font-size: 0.875rem;
			}

			.result-subtitle {
				font-size: 0.75rem;
			}
		}

		/* Touch Device Optimizations */
		@media (hover: none) {
			.search-result-item {
				padding: 1rem;
				min-height: 44px;
			}

			.search-input {
				-webkit-appearance: none;
				appearance: none;
			}
		}
			
		/* Notification Bell */
			
		.notification-container {
			position: relative;
			display: flex;
			align-items: center;
			margin-right: 20px;
		}

		.notification-bell {
			cursor: pointer;
			padding: 8px;
			position: relative;
			color: var(--primary-text);
			transition: background-color 0.2s ease;
			border-radius: 4px;
		}

		.notification-bell:hover {
			background-color: var(--hover-bg);
		}

		.notification-bell i {
			font-size: 20px;
		}

		.notification-count {
			position: absolute;
			top: 0;
			right: 0;
			background: #ff4444;
			color: var(--primary-text);
			border-radius: 50%;
			padding: 2px 6px;
			font-size: 11px;
			min-width: 15px;
			text-align: center;
			transform: translate(25%, -25%);
		}

		.notification-panel {
			display: none;
			position: absolute;
			right: 0;
			top: 100%;
			width: 300px;
			background: var(--dropdown-bg);
			border: 1px solid var(--header-border);
			border-radius: 8px;
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
			z-index: 1000;
			margin-top: 10px;
		}

		.notification-header {
			padding: 12px;
			border-bottom: 1px solid var(--header-border);
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.notification-header h3 {
			margin: 0;
			font-size: 16px;
			color: var(--primary-text);
		}

		.notification-header button {
			padding: 6px 12px;
			border: none;
			background: var(--hover-bg);
			border-radius: 4px;
			cursor: pointer;
			font-size: 12px;
			color: var(--primary-text);
			transition: background-color 0.2s ease;
		}

		.notification-header button:hover {
			background: var(--active-bg);
		}

		.notification-list {
			max-height: 400px;
			overflow-y: auto;
		}

		.notification-list::-webkit-scrollbar {
			width: 8px;
		}

		.notification-list::-webkit-scrollbar-track {
			background: transparent;
		}

		.notification-list::-webkit-scrollbar-thumb {
			background: var(--hover-bg);
			border-radius: 4px;
		}

		.notification-item {
			padding: 12px;
			border-bottom: 1px solid var(--header-border);
			cursor: pointer;
			color: var(--secondary-text);
			transition: background-color 0.2s ease;
		}

		.notification-item:hover {
			background: var(--hover-bg);
		}

		.notification-item.unread {
			background: rgba(59, 130, 246, 0.1);
			color: var(--primary-text);
		}

		.notification-item .timestamp {
			font-size: 12px;
			color: var(--secondary-text);
			margin-top: 4px;
		}

		/* Empty state styling */
		.notification-item.empty {
			text-align: center;
			color: var(--secondary-text);
			cursor: default;
		}

		.notification-item.empty:hover {
			background: none;
		}

		/* User Profile Styles */
		.nav-user-profile {
			position: relative;
		}

		.nav-profile-picture {
			width: 42px;
			height: 42px;
			border-radius: 50%;
			object-fit: cover;
			cursor: pointer;
			border: 2px solid var(--header-border);
			transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
			box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
		}

		.nav-profile-picture:hover {
			border-color: rgba(255, 255, 255, 0.3);
			transform: scale(1.05);
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
		}

		/* Dropdown Menu Styles */
		.profile-dropdown {
			position: absolute;
			top: calc(100% + 14px);
			right: 0;
			background-color: var(--dropdown-bg);
			backdrop-filter: blur(20px) saturate(180%);
			border-radius: 0px 0px 16px 16px;
			width: 280px;
			opacity: 0;
			visibility: hidden;
			transform: translateY(-8px) scale(0.98);
			transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
			box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
			border: 1px solid var(--header-border);
		}

		.profile-dropdown.show {
			opacity: 1;
			visibility: visible;
			transform: translateY(0) scale(1);
		}

		.dropdown-item {
			display: flex;
			align-items: center;
			gap: 14px;
			padding: 14px 18px;
			color: var(--secondary-text);
			text-decoration: none;
			font-size: 0.9375rem;
			transition: all 0.2s ease;
			position: relative;
			overflow: hidden;
		}

		.dropdown-item::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: var(--hover-bg);
			transform: translateX(-100%);
			transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
			z-index: 0;
		}

		.dropdown-item:hover::before {
			transform: translateX(0);
		}

		.dropdown-item:hover {
			color: var(--primary-text);
		}

		.dropdown-item svg {
			color: rgba(255, 255, 255, 0.5);
			transition: all 0.3s ease;
			position: relative;
			z-index: 1;
		}

		.dropdown-item:hover svg {
			color: var(--primary-text);
			transform: scale(1.1);
		}

		/* Dropdown Footer Styles */
		.dropdown-footer {
			margin-top: 10px;
			border-top: 1px solid var(--header-border);
		}

		.social-links {
			display: flex;
			justify-content: center;
			gap: 28px;
			padding: 20px 0;
		}

		.social-links a {
			position: relative;
			transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.social-links a img {
			width: 22px;
			height: 22px;
			opacity: 0.6;
			transition: all 0.3s ease;
			filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
		}

		.social-links a:hover {
			transform: translateY(-2px);
		}

		.social-links a:hover img {
			opacity: 1;
			filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
		}

		.footer-links {
			padding: 18px;
			background-color: rgba(37, 42, 52, 0.5);
			border-bottom-left-radius: 16px;
			border-bottom-right-radius: 16px;
			backdrop-filter: blur(8px);
		}

		.footer-links p {
			color: var(--secondary-text);
			font-size: 0.9375rem;
			margin-bottom: 14px;
			font-weight: 500;
		}

		.footer-links .links {
			display: flex;
			flex-direction: column;
			gap: 10px;
		}

		.footer-links .links a {
			color: rgba(255, 255, 255, 0.5);
			text-decoration: none;
			font-size: 0.875rem;
			transition: all 0.3s ease;
			display: inline-block;
		}

		.footer-links .links a:hover {
			color: var(--primary-text);
			transform: translateX(4px);
		}

		/* Responsive Design */
		@media (max-width: 768px) {
			.header-container {
				padding: 0 1rem;
				gap: 1rem;
			}

			.search-container {
				max-width: none;
				flex-grow: 1;
			}

			.brand-text {
				display: none;
			}

			.nav-link {
				padding: 0.5rem 0.75rem;
			}

			.profile-dropdown {
				width: 260px;
			}
		}

		@media (prefers-color-scheme: dark) {
			.global-header {
				background-color: rgba(10, 12, 16, 0.95);
			}

			.profile-dropdown {
				background-color: rgba(20, 22, 28, 0.98);
			}
		}

		html {
			scroll-behavior: smooth;
		}
	</style>
</head>
<body>
    <header class="global-header">
        <div class="header-container">
            <!-- Logo -->
            <a href="/" class="brand">
                <div class="logo-wrapper">
                    <img src="app_logos/matsfx_logo.png" alt="Logo" class="logo-image">
                    <span class="brand-text">alpha_0.4.22</span>
                </div>
            </a>

            <!-- Search Bar -->
			<div class="search-container">
				<span class="search-icon">🔍</span>
				<input type="text" class="search-input" placeholder="Search for Songs, Artists and more..." id="artistSearch">
				<div class="search-results" id="searchResults" style="display: none;"></div>
			</div>
			
			<!-- Notification Bell 
			<div class="notification-container">
				<div class="notification-bell" onclick="toggleNotifications(event)">
					<i class="fas fa-bell"></i>
					<span class="notification-count" id="notifCount">0</span>
				</div>
				<div class="notification-panel" id="notifPanel">
					<div class="notification-header">
						<h3>Notifications</h3>
						<button onclick="markAllRead()">Mark all as read</button>
					</div>
					<div class="notification-list" id="notifList"></div>
				</div>
			</div> -->

            <!-- User Profile with Dropdown -->
            <div class="nav-user-profile">
				<img src="<?php echo htmlspecialchars($user['profile_picture'] ?? 'defaults/default-profile.jpg'); ?>" 
                 alt="User Profile" class="nav-profile-picture" onclick="toggleDropdown()">
                
                <!-- Dropdown Menu -->
                <div class="profile-dropdown" id="profileDropdown">
                    <a href="/settings" class="dropdown-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        Settings
                    </a>
                    <a href="/upload" class="dropdown-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                        Upload
                    </a>
                    <a href="/logout" class="dropdown-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        Logout
                    </a>
                    <div class="dropdown-footer">
                        <div class="social-links">
                            <a href="https://discord.gg/YjvgAGU2ys" target="_blank" title="Discord">
                                <img src="includes/images/discord.png" alt="Discord">
                            </a>
							 <a href="https://youtube.com/@matsfxmusic" target="_blank" title="YouTube">
                                <img src="includes/images/youtube.png" alt="YouTube">
                            </a>
                            <a href="https://twitter.com/@matsfxmusic" target="_blank" title="Twitter">
                                <img src="includes/images/twitter.png" alt="Twitter">
                            </a>
                            <a href="https://tiktok.com/@matsfxmusic" target="_blank" title="TikTok">
                                <img src="includes/images/tiktok.png" target="_blank" alt="TikTok">
                            </a>
                        </div>
                        <div class="footer-links">
                            <div class="links">
								<a href="/what-are-these-badges">What are these Badges?</a>
                                <a href="/legal/terms">Terms of Service</a>
                                <a href="/legal/privacy">Privacy Policies</a>
                                <a href="/legal/license">Open Source License Agreements</a>

                                <a href="/legal/contact">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

	<script src="js/search.js"></script>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('show');

            // Close dropdown when clicking outside
            document.addEventListener('click', function closeDropdown(e) {
                if (!e.target.closest('.nav-user-profile')) {
                    dropdown.classList.remove('show');
                    document.removeEventListener('click', closeDropdown);
                }
            });
        }
		
		function toggleNotifications(event) {
			event.stopPropagation(); // Prevent event from bubbling up
			const panel = document.getElementById('notifPanel');
			panel.style.display = panel.style.display === 'none' ? 'block' : 'none';

			if (panel.style.display === 'block') {
				fetchNotifications();
			}

			// Close notification panel when clicking outside
			document.addEventListener('click', function closeNotifications(e) {
				if (!e.target.closest('.notification-container')) {
					panel.style.display = 'none';
					document.removeEventListener('click', closeNotifications);
				}
			});
		}

		function fetchNotifications() {
			fetch('get_notifications.php')
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						updateNotificationDisplay(data.notifications);
					}
				})
				.catch(error => console.error('Error:', error));
		}

		function updateNotificationDisplay(notifications) {
			const unreadCount = notifications.filter(n => !n.read).length;
			document.getElementById('notifCount').textContent = unreadCount || '0';

			const notifList = document.getElementById('notifList');
			notifList.innerHTML = notifications.length ? '' : '<div class="notification-item">No notifications</div>';

			notifications.forEach(notif => {
				const item = document.createElement('div');
				item.className = `notification-item ${notif.read ? '' : 'unread'}`;
				item.innerHTML = `
					<div>${notif.message}</div>
					<div class="timestamp">${new Date(notif.created_at).toLocaleString()}</div>
				`;
				item.onclick = () => markNotificationRead(notif.id);
				notifList.appendChild(item);
			});
		}

		function markNotificationRead(id) {
			fetch('mark_read.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
				body: `notification_id=${id}`
			})
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						fetchNotifications();
					}
				})
				.catch(error => console.error('Error:', error));
		}

		function markAllRead() {
			fetch('mark_all_read.php', {
				method: 'POST'
			})
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						fetchNotifications();
					}
				})
				.catch(error => console.error('Error:', error));
		}

		// Initial fetch
		fetchNotifications();

		// Fetch notifications every minute
		setInterval(fetchNotifications, 60000);
    </script>