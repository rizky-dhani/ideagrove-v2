<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Analytics Dashboard Setup Guide | IdeaGrove</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.7;
            color: #1a1a2e;
            background: #f8f9fa;
            padding: 2rem 1rem;
        }

        .container {
            max-width: 820px;
            margin: 0 auto;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #0f0f23;
        }

        .subtitle {
            color: #6c757d;
            font-size: 1.05rem;
            margin-bottom: 2.5rem;
        }

        .step {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 1.75rem 2rem;
            margin-bottom: 1.5rem;
        }

        .step-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .step-number {
            background: #0f0f23;
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        h2 {
            font-size: 1.2rem;
            font-weight: 600;
        }

        p, li {
            color: #333;
            font-size: 0.95rem;
        }

        ol, ul {
            padding-left: 1.25rem;
            margin-top: 0.75rem;
        }

        li {
            margin-bottom: 0.5rem;
        }

        code {
            background: #f1f3f5;
            padding: 0.15rem 0.45rem;
            border-radius: 4px;
            font-size: 0.88rem;
            font-family: 'SF Mono', 'Fira Code', monospace;
            color: #c7254e;
        }

        .callout {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1rem 1.25rem;
            border-radius: 0 6px 6px 0;
            margin-top: 1rem;
        }

        .callout.info {
            background: #d1ecf1;
            border-left-color: #17a2b8;
        }

        .callout strong {
            display: block;
            margin-bottom: 0.25rem;
        }

        a {
            color: #0d6efd;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .screenshot-placeholder {
            background: #e9ecef;
            border: 2px dashed #adb5bd;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 0.75rem;
        }

        .property-id-box {
            background: #f1f3f5;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1.25rem 1.5rem;
            margin-top: 1rem;
            text-align: center;
        }

        .property-id-box code {
            font-size: 1.3rem;
            padding: 0.3rem 0.75rem;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 6px;
        }

        footer {
            text-align: center;
            margin-top: 3rem;
            color: #adb5bd;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Google Analytics Dashboard Setup Guide</h1>
        <p class="subtitle">Step-by-step: create a GA4 property, get your Measurement ID, and paste it into Site Settings.</p>

        {{-- Step 1 --}}
        <div class="step">
            <div class="step-header">
                <span class="step-number">1</span>
                <h2>Create a Google Analytics Account</h2>
            </div>
            <ol>
                <li>Go to <a href="https://analytics.google.com/" target="_blank" rel="noopener">analytics.google.com</a>.</li>
                <li>Sign in with the Google account you want to own the analytics.</li>
                <li>Click <strong>Start measuring</strong>.</li>
                <li>Enter an <strong>Account name</strong> (e.g. your company name). This is the top-level container.</li>
                <li>Under <em>Data sharing settings</em>, choose what to share with Google, then click <strong>Next</strong>.</li>
            </ol>
        </div>

        {{-- Step 2 --}}
        <div class="step">
            <div class="step-header">
                <span class="step-number">2</span>
                <h2>Create a GA4 Property</h2>
            </div>
            <ol>
                <li>Enter a <strong>Property name</strong> (e.g. "IdeaGrove Website").</li>
                <li>Select your <strong>Reporting time zone</strong> and <strong>Currency</strong>.</li>
                <li>Click <strong>Next</strong>.</li>
                <li>Choose your <strong>Industry category</strong> and <strong>Business size</strong>.</li>
                <li>Under <em>Business objectives</em>, select <strong>Examine user behaviour</strong> (most common for websites).</li>
                <li>Click <strong>Create</strong> and accept the Terms of Service.</li>
            </ol>
        </div>

        {{-- Step 3 --}}
        <div class="step">
            <div class="step-header">
                <span class="step-number">3</span>
                <h2>Set Up a Data Stream</h2>
            </div>
            <ol>
                <li>After creating the property, you'll be prompted to add a data stream. Choose <strong>Web</strong>.</li>
                <li>Enter your <strong>Website URL</strong> (e.g. <code>https://ideagrove.studio</code>).</li>
                <li>Enter a <strong>Stream name</strong> (e.g. "IdeaGrove Main Site").</li>
                <li>Toggle <strong>Enhanced measurement</strong> ON — this auto-tracks page views, scrolls, outbound clicks, and more.</li>
                <li>Click <strong>Create stream</strong>.</li>
            </ol>
            <div class="callout info">
                <strong>ℹ️ Enhanced measurement is recommended</strong>
                It tracks page views, scrolls, file downloads, and outbound clicks with zero extra code. You can always disable individual events later.
            </div>
        </div>

        {{-- Step 4 --}}
        <div class="step">
            <div class="step-header">
                <span class="step-number">4</span>
                <h2>Copy Your Measurement ID</h2>
            </div>
            <p>After the stream is created, you'll see the <strong>Stream details</strong> page. Look for the <strong>Measurement ID</strong> in the top-right:</p>

            <div class="property-id-box">
                Measurement ID:&nbsp; <code>G-XXXXXXXXXX</code>
            </div>

            <p style="margin-top: 1rem;">This is the ID you need. It always starts with <code>G-</code> followed by 8 alphanumeric characters.</p>
            <div class="callout">
                <strong>⚠️ Don't confuse it with the older "Tracking ID"</strong>
                The old Universal Analytics format was <code>UA-XXXXXXXXX-X</code>. GA4 uses the <code>G-</code> format. If you see <code>UA-</code>, you're looking at a legacy property — create a new GA4 property instead.
            </div>
        </div>

        {{-- Step 5 --}}
        <div class="step">
            <div class="step-header">
                <span class="step-number">5</span>
                <h2>Paste It Into Site Settings</h2>
            </div>
            <ol>
                <li>Go back to your IdeaGrove admin panel.</li>
                <li>Navigate to <strong>Settings → Site Settings</strong>.</li>
                <li>Find the <strong>Google Analytics Property ID</strong> field.</li>
                <li>Paste your <code>G-XXXXXXXXXX</code> Measurement ID.</li>
                <li>Click <strong>Save</strong>.</li>
            </ol>
        </div>

        {{-- Step 6 --}}
        <div class="step">
            <div class="step-header">
                <span class="step-number">6</span>
                <h2>Verify Data Is Flowing</h2>
            </div>
            <ol>
                <li>Open your website in a new tab and browse a few pages.</li>
                <li>Go back to <a href="https://analytics.google.com/" target="_blank" rel="noopener">Google Analytics</a>.</li>
                <li>Click <strong>Reports → Realtime</strong> in the left sidebar.</li>
                <li>You should see your own visit appear within 30 seconds — including your location, device, and the page you're viewing.</li>
            </ol>
            <div class="callout info">
                <strong>ℹ️ Data takes 24–48 hours for full reports</strong>
                Realtime works immediately, but the standard <em>Acquisition</em>, <em>Engagement</em>, and <em>Monetization</em> reports need time to process. Don't worry if they're empty on day one.
            </div>
        </div>

        {{-- Step 7 --}}
        <div class="step">
            <div class="step-header">
                <span class="step-number">7</span>
                <h2>Useful Reports to Explore</h2>
            </div>
            <p>Once data starts flowing, here are the most useful reports for a business website:</p>
            <ul>
                <li><strong>Realtime</strong> — Who's on your site right now.</li>
                <li><strong>Acquisition → Overview</strong> — Where visitors come from (Google, social, direct, referral).</li>
                <li><strong>Engagement → Pages and screens</strong> — Which pages get the most views and time.</li>
                <li><strong>Engagement → Events</strong> — Scroll depth, file downloads, outbound clicks.</li>
                <li><strong>Demographics</strong> — Age, country, city of your audience.</li>
                <li><strong>Tech → Overview</strong> — Browser, device, OS breakdown.</li>
            </ul>
        </div>

        <footer>
            IdeaGrove — Google Analytics Setup Guide
        </footer>
    </div>
</body>
</html>
