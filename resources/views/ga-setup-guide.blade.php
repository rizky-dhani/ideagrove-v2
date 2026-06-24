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

        h2 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        p {
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

        pre {
            background: #1e1e2e;
            color: #cdd6f4;
            padding: 1rem 1.25rem;
            border-radius: 8px;
            overflow-x: auto;
            font-size: 0.88rem;
            font-family: 'SF Mono', 'Fira Code', monospace;
            margin-top: 0.75rem;
        }

        pre code {
            background: none;
            padding: 0;
            color: inherit;
        }

        .section {
            margin-bottom: 2.5rem;
        }

        .section-badge {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.2rem 0.75rem;
            border-radius: 4px;
            margin-bottom: 0.75rem;
        }

        .badge-client {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-server {
            background: #ede9fe;
            color: #5b21b6;
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

        .callout.success {
            background: #d4edda;
            border-left-color: #28a745;
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
        <h1>Google Analytics Setup Guide</h1>
        <p class="subtitle">Two-part setup: client-side tracking snippet + server-side API dashboard for the admin panel.</p>

        <div class="section">
            <span class="section-badge badge-client">Part A — Front-end Tracking</span>
            <h2>GA4 Measurement ID (for site visitors)</h2>
            <p style="margin-bottom:0.5rem;">This powers the Google Analytics JavaScript snippet embedded in the public site. It tracks page views, events, and visitor behavior from the browser.</p>

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
                    <strong>⚠️ Don't confuse it with the older Tracking ID</strong>
                    The old Universal Analytics format was <code>UA-XXXXXXXXX-X</code>. GA4 uses the <code>G-</code> format. If you see <code>UA-</code>, you're looking at a legacy property — create a new GA4 property instead.
                </div>
            </div>

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
        </div>

        <div class="section">
            <span class="section-badge badge-server">Part B — Admin Dashboard Widgets</span>
            <h2>Server-side Analytics API with Service Account</h2>
            <p style="margin-bottom:0.5rem;">This powers the Google Analytics widgets in the Filament admin panel (visitor stats, page views, active users, etc.). It uses the <strong>spatie/laravel-analytics</strong> package to fetch data via the Google Analytics Data API.</p>

            <div class="step">
                <div class="step-header">
                    <span class="step-number">1</span>
                    <h2>Get Your GA4 Property ID</h2>
                </div>
                <p>In Google Analytics, go to <strong>Admin → Property Settings</strong>. Copy the <strong>Property ID</strong> (a numeric ID like <code>123456789</code>).</p>
                <div class="callout info">
                    <strong>ℹ️ Not the same as the Measurement ID</strong>
                    The Measurement ID (<code>G-XXXXXXXXXX</code>) is for the tracking snippet. The Property ID (numeric) is for the API. Both belong to the same property &mdash; you need both.
                </div>
            </div>

            <div class="step">
                <div class="step-header">
                    <span class="step-number">2</span>
                    <h2>Create a Google Cloud Project</h2>
                </div>
                <ol>
                    <li>Go to <a href="https://console.developers.google.com/" target="_blank" rel="noopener">Google Cloud Console</a>.</li>
                    <li>Select an existing project or create a new one via the project dropdown (<strong>New Project</strong>).</li>
                    <li>Give it a name (e.g. "IdeaGrove Analytics").</li>
                    <li>Once the project is created, make sure it's selected in the dropdown.</li>
                </ol>
            </div>

            <div class="step">
                <div class="step-header">
                    <span class="step-number">3</span>
                    <h2>Enable the Google Analytics Data API</h2>
                </div>
                <ol>
                    <li>In the Cloud Console sidebar, go to <strong>APIs &amp; Services → Library</strong>.</li>
                    <li>Search for <strong>"Google Analytics Data API"</strong>.</li>
                    <li>Click on the result and click <strong>Enable</strong>.</li>
                </ol>
                <div class="callout info">
                    <strong>ℹ️ This is the GA4 API</strong>
                    Make sure it's the <strong>Google Analytics Data API</strong> (v1beta), not the older Universal Analytics API.
                </div>
            </div>

            <div class="step">
                <div class="step-header">
                    <span class="step-number">4</span>
                    <h2>Create a Service Account</h2>
                </div>
                <ol>
                    <li>In the Cloud Console sidebar, go to <strong>APIs &amp; Services → Credentials</strong>.</li>
                    <li>Click <strong>+ Create Credentials → Service Account</strong>.</li>
                    <li>Give it a name (e.g. "laravel-analytics").</li>
                    <li>Note the <strong>Service account ID</strong> (an auto-generated email like <code>laravel-analytics@XXXX.iam.gserviceaccount.com</code>) &mdash; you'll need it later.</li>
                    <li>Skip the optional role/access steps (not needed for this API).</li>
                    <li>Click <strong>Done</strong>.</li>
                </ol>
            </div>

            <div class="step">
                <div class="step-header">
                    <span class="step-number">5</span>
                    <h2>Download the JSON Key</h2>
                </div>
                <ol>
                    <li>On the <strong>Credentials</strong> page, click the service account you just created.</li>
                    <li>Go to the <strong>Keys</strong> tab.</li>
                    <li>Click <strong>Add Key → Create New Key</strong>.</li>
                    <li>Choose <strong>JSON</strong> and click <strong>Create</strong>.</li>
                    <li>A JSON file will download automatically. This is your private key &mdash; keep it secure.</li>
                    <li>Save the file to <code>storage/app/analytics/service-account-credentials.json</code> in the project.</li>
                </ol>
                <div class="callout">
                    <strong>⚠️ Add the file to .gitignore</strong>
                    This JSON contains sensitive credentials. The <code>storage/</code> directory is already gitignored by default, but make sure the file stays out of version control.
                </div>
            </div>

            <div class="step">
                <div class="step-header">
                    <span class="step-number">6</span>
                    <h2>Grant the Service Account Access to GA4</h2>
                </div>
                <ol>
                    <li>Go back to <a href="https://analytics.google.com/" target="_blank" rel="noopener">Google Analytics</a>.</li>
                    <li>Make sure you're in the correct property (the one from Part A).</li>
                    <li>Go to <strong>Admin → Property Access Management</strong>.</li>
                    <li>Click <strong>+ Add User</strong>.</li>
                    <li>Enter the service account email (the <code>client_email</code> from the JSON file or the ID you noted in step 4).</li>
                    <li>Grant at minimum the <strong>Analyst</strong> role.</li>
                    <li>Click <strong>Add</strong>.</li>
                </ol>
                <div class="callout info">
                    <strong>ℹ️ Roles explained</strong>
                    <strong>Analyst</strong> is the minimum role &mdash; it can view data but not modify settings. <strong>Viewer</strong> also works but may have restrictions on data filters.
                </div>
            </div>

            <div class="step">
                <div class="step-header">
                    <span class="step-number">7</span>
                    <h2>Set the Property ID in .env</h2>
                </div>
                <p>Add the numeric Property ID (from step 1) to your <code>.env</code> file:</p>
                <pre><code>ANALYTICS_PROPERTY_ID=123456789</code></pre>
                <p>Also add it to <code>.env.example</code> for other developers:</p>
                <pre><code>ANALYTICS_PROPERTY_ID=</code></pre>
                <div class="callout success">
                    <strong>✅ Done</strong>
                    The spatie/laravel-analytics package reads this value from <code>config/services.php</code>. The credentials JSON is loaded from <code>storage/app/analytics/service-account-credentials.json</code> (configurable in <code>config/analytics.php</code> if needed).
                </div>
            </div>

            <div class="step">
                <div class="step-header">
                    <span class="step-number">8</span>
                    <h2>Verify the Admin Dashboard</h2>
                </div>
                <ol>
                    <li>Go to the IdeaGrove admin panel.</li>
                    <li>You should see the <strong>Google Analytics</strong> section in the sidebar with dashboard widgets.</li>
                    <li>If you see "Credentials JSON does not exist" or "Property ID not specified" errors, double-check the file path and .env value.</li>
                    <li>Open the Google Analytics dashboard page &mdash; widgets should load data within a few seconds.</li>
                </ol>
                <div class="callout info">
                    <strong>ℹ️ Caching</strong>
                    API responses are cached for 24 hours by default. To force a refresh during testing, clear the cache: <code>php artisan cache:clear</code>, or set <code>cache_lifetime_in_minutes</code> to <code>0</code> in <code>config/analytics.php</code>.
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Environment Reference</h2>
            <p style="margin-bottom:0.75rem;">Summary of all settings that need to be configured:</p>

            <div class="step">
                <table class="config-table">
                    <thead>
                        <tr>
                            <th>Setting</th>
                            <th>Where</th>
                            <th>Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>ga_property_id</code></td>
                            <td>Site Settings admin form</td>
                            <td>Measurement ID (<code>G-XXXXXXXXXX</code>) for front-end tracking snippet</td>
                        </tr>
                        <tr>
                            <td><code>ANALYTICS_PROPERTY_ID</code></td>
                            <td><code>.env</code></td>
                            <td>Numeric Property ID for server-side API (spatie/laravel-analytics)</td>
                        </tr>
                        <tr>
                            <td><code>service-account-credentials.json</code></td>
                            <td><code>storage/app/analytics/</code></td>
                            <td>Google service account JSON key for API authentication</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <style>
                .config-table {
                    width: 100%;
                    border-collapse: collapse;
                    font-size: 0.9rem;
                }
                .config-table th,
                .config-table td {
                    padding: 0.75rem 1rem;
                    text-align: left;
                    border-bottom: 1px solid #dee2e6;
                }
                .config-table th {
                    background: #f8f9fa;
                    font-weight: 600;
                    font-size: 0.8rem;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                    color: #6c757d;
                }
                .config-table td:first-child code {
                    font-size: 0.82rem;
                }
            </style>
        </div>

        <footer>
            IdeaGrove &mdash; Google Analytics Setup Guide
        </footer>
    </div>
</body>
</html>
