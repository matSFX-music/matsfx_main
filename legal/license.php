<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="matSFX - The new way to listen with Joy! Ad-free and Open-Source, can it be even better?" />
    <meta property="og:title" content="matSFX - Listen with Joy!" />
    <meta property="og:description" content="Experience ad-free music, unique Songs and Artists, a new and modern look!" />
    <meta property="og:image" content="https://alpha.matsfx.com/app_logos/matsfx_logo.png" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://matsfx.com/" />
    <title>matSFX License</title>
    <link rel="icon" type="image/png" href="/app_logos/matsfx_logo.png">
    <link rel="shortcut icon" type="image/png" href="/app_logos/matsfx_logo.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        :root {
            --primary-color: #2D7FF9;
            --primary-hover: #1E6AD4;
            --primary-light: rgba(45, 127, 249, 0.1);
            --accent-color: #18BFFF;
            --accent-gradient: linear-gradient(135deg, #2D7FF9, #18BFFF);
            --dark-bg: #0A1220;
            --darker-bg: #060912;
            --card-bg: #111827;
            --light-text: #FFFFFF;
            --gray-text: #94A3B8;
            --border-color: #1F2937;
            --subtle-glow: 0 0 20px rgba(45, 127, 249, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            background-color: var(--dark-bg);
            color: var(--light-text);
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(45, 127, 249, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(24, 191, 255, 0.15) 0%, transparent 40%);
            background-attachment: fixed;
            min-height: 100vh;
        }

        .page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
	}

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 7rem 1.5rem 4rem;
            width: 100%;
        }

        .license-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        h1 {
            font-size: 2.75rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.1;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #FFFFFF 20%, #94A3B8);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .license-date {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: rgba(45, 127, 249, 0.15);
            color: var(--primary-color);
            font-weight: 500;
            border-radius: 30px;
            font-size: 0.875rem;
            margin-top: 0.75rem;
            border: 1px solid rgba(45, 127, 249, 0.3);
        }

        .copyright-notice {
            color: var(--gray-text);
            font-size: 0.9375rem;
            text-align: center;
            max-width: 600px;
            margin: 0 auto 3rem;
        }

        .content-card {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.05);
            position: relative;
            overflow: hidden;
        }

        .card-bg-accent {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(45, 127, 249, 0.1) 0%, transparent 70%);
            top: -200px;
            right: -200px;
            border-radius: 50%;
            z-index: -1;
        }

        .intro-text {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #CDD9E5;
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--border-color);
        }

        .sections-container {
            counter-reset: section;
        }

        .license-section {
            margin-bottom: 3rem;
            position: relative;
            padding-left: 3rem;
        }

        .license-section::before {
            counter-increment: section;
            content: counter(section);
            position: absolute;
            left: 0;
            top: 0;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--accent-gradient);
            color: white;
            font-weight: 600;
            font-size: 1.125rem;
            box-shadow: 0 4px 10px rgba(45, 127, 249, 0.2);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #FFFFFF;
            margin-bottom: 1.25rem;
            line-height: 1.3;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--accent-gradient);
            border-radius: 3px;
        }

        ul {
            list-style: none;
            margin: 1.25rem 0;
        }

        ul li {
            margin: 1rem 0;
            position: relative;
            padding-left: 1.75rem;
            color: #B4C6D8;
        }

        ul li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0.6em;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--primary-color);
        }

        ul ul {
            margin: 1rem 0 1rem 1rem;
        }

        ul ul li::before {
            background: var(--accent-color);
            width: 5px;
            height: 5px;
        }

        .warranty {
            background: rgba(6, 9, 18, 0.6);
            padding: 2rem;
            border-radius: 10px;
            margin: 1.5rem 0 2.5rem;
            font-size: 0.9375rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
            font-family: monospace;
            color: #8C9CAD;
            line-height: 1.7;
            letter-spacing: 0.02em;
        }

        .warranty-title {
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            color: #5E718C;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        footer {
            color: var(--gray-text);
            text-align: center;
            padding: 3rem 1rem 2rem;
            background: linear-gradient(to top, rgba(6, 9, 18, 0.8), transparent);
            margin-top: auto;
        }

        .footer-content {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }

        .footer-decoration {
            margin: 0 auto 2rem;
            width: 80px;
            height: 4px;
            background: var(--accent-gradient);
            border-radius: 2px;
        }

        .agreement-text {
            font-size: 0.9375rem;
            line-height: 1.7;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            
            .container {
                padding: 6rem 1rem 3rem;
            }
            
            .content-card {
                padding: 1.75rem;
            }
            
            .license-section {
                padding-left: 2.5rem;
            }
            
            .license-section::before {
                width: 32px;
                height: 32px;
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.25rem;
            }
            
            .intro-text {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="container">
            <div class="license-header">
                <h1>License Agreement</h1>
                <span class="license-date">Effective February 19, 2025</span>
            </div>
            
            <div class="copyright-notice">Copyright © 2024-2025 matSFX. All rights reserved.</div>

            <div class="content-card">
                <div class="card-bg-accent"></div>
                
                <p class="intro-text">Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to use, modify, and distribute the Software, subject to the following conditions:</p>

                <div class="sections-container">
                    <div class="license-section">
                        <h2 class="section-title">Name and Branding Requirements</h2>
                        <ul>
                            <li>The name "matSFX" is copyrighted and must not be used in any derivative work or redistribution of this Software. The user is required to rename the project to a unique and distinct name.</li>
                            <li>The logo, app icon, and any branding (including but not limited to default icons and badges) used in the original project are also copyrighted and must be replaced in any derivative work.</li>
                        </ul>
                    </div>

                    <div class="license-section">
                        <h2 class="section-title">Design and Styling Modifications</h2>
                        <ul>
                            <li>The user is required to change at least one visual aspect of the project to ensure the derivative work is distinguishable from the original. For example:
                                <ul>
                                    <li>Changing the background color.</li>
                                    <li>Customizing the styling, layout, or theme.</li>
                                </ul>
                            </li>
                            <li>All default icons and badges provided in the original Software must be replaced with user-created designs or legally obtained alternatives.</li>
                        </ul>
                    </div>

                    <div class="license-section">
                        <h2 class="section-title">Terms and Contact Information</h2>
                        <ul>
                            <li>Any derivative work must replace the terms of service, privacy policy, and contact information provided in the original project with those of the user's own creation.</li>
                        </ul>
                    </div>

                    <div class="license-section">
                        <h2 class="section-title">Attribution</h2>
                        <ul>
                            <li>While the name and branding must be replaced, appropriate attribution to the original matSFX project must be provided in the documentation or credits of the derivative work. This attribution should include:
                                <ul>
                                    <li>A reference to the original repository or source.</li>
                                    <li>A note that the derivative work was based on matSFX, without implying endorsement by the original creators.</li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="license-section">
                        <h2 class="section-title">Prohibited Uses</h2>
                        <ul>
                            <li>The Software and its derivatives must not be used for any unlawful or unethical purposes.</li>
                        </ul>
                    </div>

                    <div class="license-section">
                        <h2 class="section-title">Warranty Disclaimer</h2>
                        <div class="warranty">
                            <div class="warranty-title">Legal Notice</div>
                            THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES, OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT, OR OTHERWISE, ARISING FROM, OUT OF, OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer-content">
                <div class="footer-decoration"></div>
                <p class="agreement-text">By using, modifying, or redistributing this Software, you agree to the terms of this license.</p>
            </div>
        </footer>
    </div>

    <script src="../js/search.js"></script>
</body>
</html>
