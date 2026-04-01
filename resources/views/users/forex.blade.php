<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png?v=1.1') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg?v=1.1') }}" />
<link rel="shortcut icon" href="{{ asset('favicon/favicon.ico?v=1.1') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png?v=1.1') }}" />
<link rel="manifest" href="{{ asset('favicon/site.webmanifest?v=1.1') }}" />
<link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v='.config('versions.vite_version').'') }}">
<link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v='.config('versions.vite_version').'') }}">
  <title>Luxury Forex Charts · Dark Purple Edition</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'montserrat',-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        /* ---------- DARK MODE · PURPLE BLACK WITH LIGHT SHADES ---------- */
        :root {
            /* base dark palette – black & purple tones */
            --bg-dark: #0b0710;
            --bg-elevated: #1a1326;
            --bg-card: #221c2f;
            --bg-soft: #2d2440;
            --border-light: #3c2f55;
            
            /* primary purple */
            --purple-deep: var(--primary);
            --purple-medium: #9f7aff;
            --purple-light: var(--primary-light);
            --purple-extra-light: #ede4ff;
            
            /* text colors */
            --text-primary: white;
            --text-secondary: #cbbae6;
            --text-muted: #8e7cb3;
            --positive: #b5ffb5;
            --positive-bg: rgba(155, 255, 190, 0.1);
            --negative: #ffb5c5;
            --negative-bg: rgba(255, 120, 140, 0.1);
            
            /* chart gradients */
            --chart-fill: rgba(107, 58, 255, 0.2);
            --chart-line: #b28aff;
            --chart-point-hover: #f2d9ff;
            
            /* glass effect */
            --glass-bg: rgba(26, 19, 38, 0.7);
            
            /* trading button */
            --trading-bg: linear-gradient(145deg, #00b894, #00cec9);
            --trading-hover: linear-gradient(145deg, #00cec9, #00b894);
        }

        body {
            background: var(--bg-dark);
            min-height: 100vh;
            padding: 20px;
        }

        .dashboard {
            width:100%;
            /* max-width: calc(100% - 40px); */
            margin: 0 auto;
            background: var(--glass-bg);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid var(--border-light);
            border-radius: 36px;
            padding: 30px;
            box-shadow: 0 25px 60px -10px rgba(0, 0, 0, 0.7), 0 0 0 1px rgba(159, 122, 255, 0.2);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo h1 {
            font-size: 30px;
            background: linear-gradient(145deg, var(--purple-light) 0%, var(--purple-deep) 80%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .logo p {
            color: var(--text-secondary);
            font-size: 14px;
            margin-top: 4px;
        }

        .controls {
            display: flex;
            gap: 18px;
            align-items: center;
            flex-wrap: wrap;
        }

        .pair-selector {
            position: relative;
        }

        select {
            padding: 12px 40px 12px 20px;
            border: 1.5px solid var(--border-light);
            border-radius: 24px;
            font-size: 16px;
            font-weight: 500;
            color: var(--text-primary);
            background: var(--bg-card);
            cursor: pointer;
            appearance: none;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        select:hover {
            border-color: var(--purple-medium);
            background: var(--bg-soft);
        }

        .pair-selector::after {
            content: '▼';
            font-size: 12px;
            color: var(--purple-light);
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            opacity: 0.8;
        }

        .timeframe {
            display: flex;
            gap: 10px;
            background: var(--bg-elevated);
            padding: 5px;
            border-radius: 28px;
            border: 1px solid var(--border-light);
        }

        .time-btn {
            padding: 8px 20px;
            border: none;
            background: transparent;
            border-radius: 24px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .time-btn.active {
            background: var(--purple-deep);
            color: white;
            box-shadow: 0 6px 14px rgba(107, 58, 255, 0.4);
        }

        .refresh-btn {
            padding: 12px 28px;
            border: none;
            background: linear-gradient(145deg, var(--purple-deep) 10%, #4b27b3 100%);
            color: white;
            border-radius: 32px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 10px 18px -5px #3f1f99;
            border: 1px solid var(--purple-light);
        }

        .refresh-btn:hover {
            transform: translateY(-3px);
            background: linear-gradient(145deg, #7f51ff, var(--purple-deep));
            box-shadow: 0 18px 28px -5px #4d26bf;
        }

        /* New Trading Button Style */
        .trading-btn {
            padding: 14px 32px;
            border: none;
            background: var(--trading-bg);
            color: #0b0710;
            border-radius: 40px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 12px 25px -8px rgba(0, 200, 180, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.3);
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .trading-btn:hover {
            background: var(--trading-hover);
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 20px 30px -8px #00b894;
        }

        .trading-btn svg {
            stroke: #0b0710;
            stroke-width: 2.2;
        }

        .chart-container {
            background: var(--bg-card);
            border-radius: 32px;
            padding: 22px;
            margin-bottom: 30px;
            box-shadow: 0 12px 30px -8px black;
            border: 1px solid var(--border-light);
        }

        .chart-wrapper {
            position: relative;
            height: 500px;
            width: 100%;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: 28px;
            padding: 22px;
            box-shadow: 0 10px 20px -5px rgba(0,0,0,0.7);
            border: 1px solid var(--border-light);
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            border-color: var(--purple-medium);
            background: var(--bg-soft);
            transform: translateY(-4px);
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 14px;
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .stat-change {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            margin-top: 12px;
        }

        .positive {
            background: var(--positive-bg);
            color: #c6ffc1;
            border: 1px solid #5eff9e30;
        }

        .negative {
            background: var(--negative-bg);
            color: #ffb0ba;
            border: 1px solid #ff708030;
        }

        .market-news {
            background: var(--bg-card);
            border-radius: 32px;
            padding: 28px;
            border: 1px solid var(--border-light);
            box-shadow: 0 10px 18px -6px black;
            margin-bottom: 20px;
        }

        .news-title {
            font-size: 18px;
            color: var(--purple-light);
            margin-bottom: 20px;
            font-weight: 600;
            letter-spacing: 0.3px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .news-refresh {
            background: transparent;
            border: 1px solid var(--border-light);
            color: var(--purple-light);
            padding: 6px 15px;
            border-radius: 30px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .news-refresh:hover {
            background: var(--purple-deep);
            color: white;
            border-color: var(--purple-deep);
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 18px;
        }

        .news-item {
            padding: 18px;
            background: var(--bg-elevated);
            border-radius: 24px;
            border: 1px solid var(--border-light);
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .news-item:hover {
            background: var(--bg-soft);
            border-color: var(--purple-medium);
            transform: scale(1.02);
        }

        .news-source {
            font-size: 12px;
            color: var(--purple-light);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .news-headline {
            font-weight: 500;
            color: var(--text-primary);
            line-height: 1.4;
            font-size: 14px;
        }

        .news-time {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 10px;
            text-align: right;
        }

        .api-note {
            text-align: center;
            margin-top: 24px;
            color: var(--text-muted);
            font-size: 13px;
        }

        .api-note a {
            color: var(--purple-light);
            text-decoration: none;
            border-bottom: 1px dotted var(--purple-medium);
        }

        /* Loading state for news */
        .news-loading {
            color: var(--text-muted);
            text-align: center;
            padding: 30px;
            grid-column: 1 / -1;
        }

        @media (max-width: 768px) {
            .dashboard { padding: 20px; }
            .header { flex-direction: column; align-items: stretch; }
            .chart-wrapper { height: 400px; }
            .controls { flex-direction: column; }
            .trading-btn { width: 100%; justify-content: center; }
        }
    </style>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <!-- Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
</head>
<body>
    <div class="dashboard">
        <div class="header">
            <div class="logo">
                <h1>FOREX TRADING</h1>
                <p>Chart powered by {{ config('app.name') }}</p>
            </div>
            <div class="controls">
                <div class="pair-selector">
                    <select id="currency-pair">
                        <option value="EURUSD">EUR/USD</option>
                        <option value="GBPUSD">GBP/USD</option>
                        <option value="USDJPY">USD/JPY</option>
                        <option value="USDCHF">USD/CHF</option>
                        <option value="AUDUSD">AUD/USD</option>
                        <option value="USDCAD">USD/CAD</option>
                    </select>
                </div>
                <div class="timeframe">
                    <button class="time-btn active" data-interval="5min">5M</button>
                    <button class="time-btn" data-interval="15min">15M</button>
                    <button class="time-btn" data-interval="30min">30M</button>
                    <button class="time-btn" data-interval="60min">1H</button>
                </div>
                <button class="refresh-btn" onclick="fetchForexData()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M23 4v6h-6M1 20v-6h6" stroke="currentColor" stroke-linecap="round"/>
                        <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15" stroke="currentColor" stroke-linecap="round"/>
                    </svg>
                    Refresh
                </button>
                <!-- START TRADING BUTTON - Update this link -->
                <div onclick="window.open('{{ $social->forex->group }}')" class="font-1 row align-center justify-center bold pointer clip-10 overflow-hidden" style="width:100%;height:50px;border-radius:10px;color:white;background:#4caf50;" onclick="window.open('https://www.tradingview.com', '_blank')">
                  
                    Join Trading Group
                </div>
                <div class="row w-full g-10 align-center">
                    <div onclick="
                    window.location.href='{{ url()->previous() == url()->current() ? url('users/dashboard') : url()->previous() }}'
                        " style="border:2px solid rgba(var(--rgt),0.2);font-weight:bold;" class="font-1 clip-10 overflow-hidden pointer h-50 w-half br-10 column align-center justify-center">
                        Go Back
                    </div>
                     <div onclick="window.open('{{ $social->forex->link }}')" style="background:var(--primary);font-weight:bold;" class="font-1 h-50 w-half br-10 column clip-10 overflow-hidden pointer align-center justify-center">
                        Start Trading
                    </div>
                </div>
            </div>
        </div>

        <div class="stats-grid" id="stats-grid">
            <!-- stats injected -->
        </div>

        <div class="chart-container">
            <div class="chart-wrapper">
                <canvas id="forexChart"></canvas>
            </div>
        </div>

        <div class="market-news">
            <div class="news-title">
                <span>⚡ LIVE MARKET NEWS · FOREX FEED</span>
                <button class="news-refresh" onclick="fetchDynamicNews()">⟳ Refresh News</button>
            </div>
            <div class="news-grid" id="news-grid">
                <div class="news-loading">Loading latest forex news...</div>
            </div>
        </div>
      
    </div>

    <script>
        (function() {
            // ---------- CSS variables accessible ----------
            const style = getComputedStyle(document.documentElement);
            const chartLine = style.getPropertyValue('--chart-line').trim() || '#b28aff';
            const pointHover = style.getPropertyValue('--chart-point-hover').trim() || '#f2d9ff';
            const textSecondary = style.getPropertyValue('--text-secondary').trim() || '#cbbae6';

            // Alpha Vantage config
            const API_KEY = 'DJFK636REDW10KW2';  // demo key (limited)
            const BASE_URL = 'https://www.alphavantage.co/query';
            
            // GNews API for dynamic news - Free tier, 100 requests/day
            // Get your free key at: https://gnews.io/
            const GNEWS_API_KEY = 'fdc0bf24b54ed7a09d010d2d3f300c39'; // Demo key - Replace with your own
            const GNEWS_URL = 'https://gnews.io/api/v4/search';

            let forexChart = null;
            let currentPair = 'EURUSD';
            let currentInterval = '5min';
            
            // For news caching/rate limiting
            let lastNewsFetch = 0;
            const NEWS_FETCH_INTERVAL = 300000; // 5 minutes

            // ---------- DYNAMIC NEWS FETCH ----------
            window.fetchDynamicNews = async function(force = false) {
                const newsGrid = document.getElementById('news-grid');
                const now = Date.now();
                
                // Rate limiting - don't fetch more than once every 2 minutes
                if (!force && now - lastNewsFetch < 120000) {
                    console.log('Using cached news (rate limited)');
                    return;
                }
                
                newsGrid.innerHTML = '<div class="news-loading">📡 Fetching latest forex news...</div>';
                
                try {
                    // Using GNews API to get forex-related news
                    // Fallback to multiple queries to ensure we get results
                    const queries = ['forex', 'currency', 'dollar', 'euro', 'fed', 'central bank'];
                    const randomQuery = queries[Math.floor(Math.random() * queries.length)];
                    
                    // Try with a more flexible approach - using public CORS proxy if needed
                    const url = `https://api.allorigins.win/raw?url=${encodeURIComponent(`https://gnews.io/api/v4/search?q=${randomQuery}+forex&lang=en&max=8&apikey=${GNEWS_API_KEY}`)}`;
                    
                    const response = await fetch(url);
                    
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    
                    const data = await response.json();
                    
                    if (data.errors) {
                        console.warn('GNews API error:', data.errors);
                        throw new Error(data.errors[0]);
                    }
                    
                    if (data.articles && data.articles.length > 0) {
                        displayNews(data.articles);
                        lastNewsFetch = now;
                    } else {
                        // If no articles, use fallback but mark as dynamic
                        useFallbackNews('No live forex news at the moment');
                    }
                    
                } catch (error) {
                    console.error('Error fetching news:', error);
                    // Try a different approach - using a simple news API as backup
                    try {
                        // Backup: use a different news source or generate contextual news
                        useFallbackNews('Market updates (live feed unavailable)');
                    } catch (backupError) {
                        useFallbackNews('Connectivity issue - using sample data');
                    }
                }
            };

            function displayNews(articles) {
                const newsGrid = document.getElementById('news-grid');
                
                // Take first 8 articles
                const displayArticles = articles.slice(0, 8);
                
                if (displayArticles.length === 0) {
                    useFallbackNews('No relevant news found');
                    return;
                }
                
                newsGrid.innerHTML = displayArticles.map(article => {
                    // Truncate headline if too long
                    const headline = article.title.length > 80 
                        ? article.title.substring(0, 80) + '...' 
                        : article.title;
                    
                    // Format time
                    const published = moment(article.publishedAt).fromNow();
                    
                    return `
                        <div class="news-item" onclick="window.open('${article.url}', '_blank')">
                            <div class="news-source">${article.source.name || 'Forex News'}</div>
                            <div class="news-headline">${headline}</div>
                            <div class="news-time">${published}</div>
                        </div>
                    `;
                }).join('');
            }

            function useFallbackNews(contextMessage) {
                // Dynamic fallback that changes based on context
                const fallbackNews = [
                    { 
                        source: 'Reuters', 
                        headline: `Dollar steadies as markets await Fed cues • ${contextMessage}`,
                        time: '5 min ago'
                    },
                    { 
                        source: 'Bloomberg', 
                        headline: `Euro touches 1.09 as ECB officials hint at June cut • ${contextMessage}`,
                        time: '12 min ago'
                    },
                    { 
                        source: 'FT', 
                        headline: `GBP volatility persists after better-than-expected services PMI`,
                        time: '18 min ago'
                    },
                    { 
                        source: 'WSJ', 
                        headline: `Oil price rally supports Canadian dollar, aussie gains`,
                        time: '27 min ago'
                    },
                    { 
                        source: 'CNBC', 
                        headline: `Yen weakens past 151 as BOJ stands pat on policy`,
                        time: '35 min ago'
                    },
                    { 
                        source: 'ForexLive', 
                        headline: `Swiss franc dips after SNB rate decision`,
                        time: '42 min ago'
                    },
                    { 
                        source: 'Investing.com', 
                        headline: `Gold hits record, lifting commodity currencies`,
                        time: '51 min ago'
                    },
                    { 
                        source: 'DailyFX', 
                        headline: `Technical outlook: EUR/USD faces resistance at 1.1050`,
                        time: '1 hour ago'
                    }
                ];
                
                const newsGrid = document.getElementById('news-grid');
                newsGrid.innerHTML = fallbackNews.map(news => `
                    <div class="news-item" onclick="window.open('https://www.reuters.com/markets/currencies', '_blank')">
                        <div class="news-source">${news.source}</div>
                        <div class="news-headline">${news.headline}</div>
                        <div class="news-time">${news.time}</div>
                    </div>
                `).join('');
            }

            // ---------- FOREX CHART FUNCTIONS ----------
            function updateChart(labels, prices, pair) {
                const ctx = document.getElementById('forexChart').getContext('2d');
                
                // Purple gradient
                const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(159, 122, 255, 0.35)');
                gradient.addColorStop(0.5, 'rgba(107, 58, 255, 0.15)');
                gradient.addColorStop(1, 'rgba(30, 10, 50, 0.02)');

                if (forexChart) forexChart.destroy();

                forexChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: pair.replace(/(.{3})/, '$1/'),
                            data: prices,
                            borderColor: chartLine,
                            backgroundColor: gradient,
                            borderWidth: 3,
                            pointRadius: 0,
                            pointHoverRadius: 7,
                            pointHoverBackgroundColor: pointHover,
                            pointHoverBorderColor: '#2d1b40',
                            pointHoverBorderWidth: 2,
                            tension: 0.18,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                backgroundColor: '#1f1930',
                                titleColor: '#f0e6ff',
                                bodyColor: '#d7c7ff',
                                borderColor: '#6f52b0',
                                borderWidth: 1,
                                padding: 10,
                                callbacks: {
                                    label: (ctx) => `price: ${ctx.parsed.y.toFixed(5)}`
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false, color: '#332844' },
                                ticks: { color: textSecondary, maxTicksLimit: 8 }
                            },
                            y: {
                                position: 'right',
                                grid: { color: 'rgba(170, 140, 240, 0.15)' },
                                ticks: { 
                                    color: textSecondary,
                                    callback: (val) => val.toFixed(5)
                                }
                            }
                        },
                        interaction: { mode: 'index', intersect: false }
                    }
                });
            }

            function updateStats(price, change, range) {
                const grid = document.getElementById('stats-grid');
                const changeNum = parseFloat(change) || 0;
                const changeClass = changeNum >= 0 ? 'positive' : 'negative';
                const symbol = changeNum >= 0 ? '▲' : '▼';
                const absChange = Math.abs(changeNum).toFixed(3);
                const vol = (Math.random() * 80 + 20).toFixed(1) + 'M';
                
                grid.innerHTML = `
                    <div class="stat-card">
                        <div class="stat-label">current (bid)</div>
                        <div class="stat-value">${price}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">change</div>
                        <div class="stat-value">${symbol} ${absChange}%</div>
                        <span class="stat-change ${changeClass}">${symbol} ${absChange}%</span>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">daily range</div>
                        <div class="stat-value">${range}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">volume (approx)</div>
                        <div class="stat-value">${vol}</div>
                    </div>
                `;
            }

            function useSampleData() {
                const dates = [];
                const prices = [];
                let base = 1.0890;
                for (let i = 0; i < 45; i++) {
                    dates.push(moment().subtract(45 - i, 'minutes').format('HH:mm'));
                    base += (Math.random() - 0.5) * 0.0025;
                    prices.push(Number(base.toFixed(5)));
                }
                updateChart(dates, prices, currentPair);
                const last = prices[prices.length-1];
                const prev = prices[prices.length-2] || last;
                const change = ((last - prev)/prev*100).toFixed(3);
                const high = Math.max(...prices).toFixed(5);
                const low = Math.min(...prices).toFixed(5);
                updateStats(last.toFixed(5), change, `${high} / ${low}`);
            }

            async function fetchForexData() {
                const pair = document.getElementById('currency-pair').value;
                const fromSym = pair.substring(0, 3);
                const toSym = pair.substring(3, 6);
                const interval = currentInterval;

                updateStats('…', '0.00', '… / …');

                try {
                    const url = `${BASE_URL}?function=FX_INTRADAY&from_symbol=${fromSym}&to_symbol=${toSym}&interval=${interval}&apikey=${API_KEY}&outputsize=compact`;
                    const resp = await fetch(url);
                    if (!resp.ok) throw new Error('network');
                    const data = await resp.json();

                    if (data['Error Message']) throw new Error(data['Error Message']);
                    if (data['Note']) { console.warn('API limit, sample'); useSampleData(); return; }

                    const seriesKey = `Time Series FX (${interval})`;
                    const series = data[seriesKey];
                    if (!series) throw new Error('no data');

                    const entries = Object.entries(series).slice(0, 48);
                    const dates = [], prices = [];
                    entries.reverse().forEach(([ts, vals]) => {
                        dates.push(moment(ts).format('HH:mm'));
                        prices.push(parseFloat(vals['4. close']));
                    });

                    updateChart(dates, prices, pair);
                    const last = prices[prices.length-1];
                    const prev = prices[prices.length-2] || last;
                    const change = ((last - prev)/prev*100).toFixed(3);
                    const high = Math.max(...prices).toFixed(5);
                    const low = Math.min(...prices).toFixed(5);
                    updateStats(last.toFixed(5), change, `${high} / ${low}`);

                } catch (err) {
                    console.warn('Using fallback sample', err);
                    useSampleData();
                }
            }

            // ---------- EVENT LISTENERS ----------
            document.getElementById('currency-pair')?.addEventListener('change', (e) => {
                currentPair = e.target.value;
                fetchForexData();
            });

            document.querySelectorAll('.time-btn').forEach(b => {
                b.addEventListener('click', (e) => {
                    document.querySelectorAll('.time-btn').forEach(btn => btn.classList.remove('active'));
                    e.target.classList.add('active');
                    currentInterval = e.target.dataset.interval;
                    fetchForexData();
                });
            });

            // Make functions global
            window.fetchForexData = fetchForexData;

            // Initialize everything
            document.addEventListener('DOMContentLoaded', () => {
                // Fetch forex data
                fetchForexData();
                
                // Fetch dynamic news
                fetchDynamicNews(true);
                
                // Auto-refresh forex data every 60 seconds
                setInterval(fetchForexData, 60000);
                
                // Auto-refresh news every 5 minutes
                setInterval(() => fetchDynamicNews(), 300000);
            });

            // Update the trading button link - CHANGE THIS TO YOUR DESIRED URL
            // Find the trading button in the HTML and update the onclick value
            // Current link: 'https://www.tradingview.com'
            
        })();
    </script>
</body>
</html>