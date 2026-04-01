@extends('layout.users.index')
@section('title')
    About Us
@endsection
@section('css')
    <style class="css">
         .hero-title{
            font-size:2rem;
            font-weight:900;
        
            background:var(--gradient);
           color:transparent;
            background-clip:text;
            -webkit-background-clip: text;
        }
        h2,h3{
            color:var(--primary-light)
        }
    </style>
@endsection
@section('main')
    <section class="column g-10 w-full p-20">
       <div class="container">
        <h1 style="text-align:start;" class="hero-title">About {{ config('app.name') }}</h1>
        <div class="subhead">Smart Growth, Right Value</div>

        <h2>What is {{ config('app.name') }}?</h2>
        <p>{{ config('app.name') }} is an AI-powered digital platform designed to help people learn valuable skills, engage with smart technology, and earn real rewards daily.</p>
        <p>It brings together artificial intelligence, digital education, micro-tasks, and faith-based engagement into one simple ecosystem where users are rewarded for learning, participation, consistency, and growth.</p>
        <p>{{ config('app.name') }} is built for the modern digital generation, especially young people who want to learn, grow, and earn ethically in a structured, technology-driven environment.</p>
        <p class="motto">Smart Growth, Right Value — that's our guiding principle.</p>

        <h2>All {{ config('app.name') }} Features</h2>
        <ul class="feature-list">
            <li>Neo Chat - Smart conversations, instant connections</li>
            <li>Neo Live - Real-time streaming & live engagement</li>
            <li>Neo Faith - Faith-based content & community</li>
            <li>Neo Skill - Learn, earn, and grow your skills</li>
            <li>Neo Translate - Break language barriers instantly</li>
            <li>Neo Game - Interactive gaming experience</li>
            <li>Neo Movie - On-demand movies & entertainment</li>
            <li>Social Tasks - Engage, complete tasks & earn rewards</li>
            <li>Music Stream - Unlimited music streaming</li>
            <li>Marketplace - Buy, sell & trade seamlessly</li>
            <li>Mini Ads - Amplify your posts to reach more views</li>
            <li>Surveys - Share opinions and earn from them</li>
        </ul>
        <p><em>Register and have access to all these amazing features.</em></p>

      
       

        <h2>How You Can Earn Daily</h2>

        <h3>Neo-Skill Feature</h3>
        <div class="earning-example">
            <p><strong>Make minimum of N5,000 Everyday while learning</strong></p>
            <p>Join daily online skill sessions, gain practical digital knowledge, and receive instant tokens worth $3 to $5 just for participating.</p>
            <p>Every class comes with a reward code, turning learning into real value and consistent growth.</p>
            <p><strong>Earnings:</strong> +$245 · YouTube Automation Secrets · Digital Income Tips</p>
        </div>

        <h3>NeoChat Feature</h3>
        <div class="earning-example">
            <p><strong>Claim Giftcards worth $5 Everyday</strong></p>
            <p>Chat. Earn. With NeoChat, every 60 seconds of chatting with our smart AI turns into real rewards. It's fast, fun and gamified turning conversations into value.</p>
            <p>Payment notifications: Facebook ($5 received), Instagram (chat request), Telegram (new message)</p>
        </div>

        <h3>NeoTranslate Feature</h3>
        <div class="earning-example">
            <p><strong>Translate and learn local dialects for dollars</strong></p>
            <p>Translate Hausa, Igbo, Yoruba, Arabic, English language etc., and make up to $5 = N8,000 daily.</p>
            <p>Earn $5 per translation · 2 hours of free service · Gift cards up to $500 available</p>
        </div>

     
      

      
    </div>

    </section>
@endsection