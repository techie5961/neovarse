@extends('layout.users.index')
@section('title')
    About Us
@endsection
@section('css')
    <style class="css">
         .hero-title{
            font-size:2rem;
            font-weight:900;
            text-align: center;
            background:var(--gradient);
           color:transparent;
            background-clip:text;
            -webkit-background-clip: text;
        }
        h2,h3{
            color:var(--primary-light)
        }
        h3{
            opacity: 0.6;
        }
    </style>
@endsection
@section('main')
    <section class="column g-10 w-full p-20">
     <div class="terms-container">
        <h1 class="hero-title" style="text-align: start">{{ config('app.name') }} Terms of Service</h1>
        <div class="subhead">
            <span>Smart Growth, Right Value — Legal Agreement</span>
            <span class="effective-date">Effective Date: March 1, 2026</span>
        </div>

        <p><strong>Welcome to {{ config('app.name') }}!</strong> By accessing or using the {{ config('app.name') }} platform, website, or any associated features (collectively, the "Platform"), you agree to be bound by these Terms of Service ("Terms"). If you do not agree, please do not use the Platform.</p>

        <div class="important-note">
            <strong>📘 IMPORTANT:</strong> {{ config('app.name') }} is an AI-powered digital ecosystem. These Terms govern your participation, earnings, feature access, and all transactions including sign-up fees, giftcards, profit splits, and add-ons (Fusion, Ultra, NeoChat, NeoTranslate, etc.). 
        </div>

        <h2>1. Eligibility & Account Registration</h2>
        <p>You must be at least 18 years old (or the age of majority in your jurisdiction) to register. By creating an account, you represent that all information provided is accurate and complete. You are responsible for maintaining the security of your account credentials.</p>
        <p>{{ config('app.name') }} reserves the right to verify your identity and suspend or terminate accounts found to be in violation of these Terms.</p>

       

        <p><strong>30 Minutes Login COINS:</strong> Both Fusion and Ultra members earn login coins for daily consistency. Coins contribute to bonus rewards and leaderboard eligibility.</p>

     

        <h2>2. Earning Features & Requirements</h2>

        <h3>2.1 Neo-Skill</h3>
        <p>Members can earn up to N5,000 daily by participating in online skill sessions. Reward codes are provided during classes and must be redeemed within 48 hours. Tokens valued at $3–$5 are distributed based on engagement and completion. "YouTube Automation Secrets" and "Digital Income Tips" are sample learning tracks.</p>

        <h3>2.2 NeoChat</h3>
        <p>Users earn $5 daily by chatting with {{ config('app.name') }} AI for at least 60 seconds per session. Payments are processed via Facebook, Instagram, or Telegram as shown in your account dashboard. Fraudulent or automated chatting is strictly prohibited and will result in forfeiture of earnings.</p>

        <h3>2.3 NeoTranslate</h3>
        <p>Translate between Hausa, Igbo, Yoruba, Arabic, English, and other supported languages. Earn $5 per valid translation (up to $8,000 Naira equivalent daily). The first 2 hours of translation service are free; thereafter quality checks apply. Gift cards up to $500 may be awarded for exceptional contributions.</p>

        <h3>2.4 NeoFaith, NeoGame, NeoLive & Others</h3>
        <p>Each feature (Neo Faith, Neo Game, Neo Live, Social Tasks, Surveys, etc.) carries its own reward structure as detailed in the Platform. {{ config('app.name') }} may update reward rates with 7 days' notice.</p>


       
        <h2>3. Platform Rules & Prohibited Activities</h2>
        <ul>
            <li>You must not use bots/automation.</li>
            <li>You may not engage in fraudulent translation, fake chat sessions, or skill class abuse.</li>
            <li>Harassment, hate speech, or inappropriate content in Neo Faith, Neo Chat, or any community feature will result in immediate ban.</li>
            <li>You must comply with all applicable local laws regarding earnings and taxation.</li>
        </ul>

        <h2>4. Payment & Withdrawal Terms</h2>
        <p>Earnings are credited to your {{ config('app.name') }} wallet. Withdrawals are processed within 5 minutes to your linked bank account but may exceed if we have many requests to attend to. {{ config('app.name') }} deducts applicable transaction fees (if any) as disclosed at the time of withdrawal.</p>
        <p>{{ config('app.name') }} reserves the right to hold payments for review if suspicious activity is detected.</p>

        <h2>5. Intellectual Property</h2>
        <p>All content on {{ config('app.name') }}—including but not limited to logos, text, graphics, AI models, and feature names (NeoChat, NeoSkill, etc.)—is the property of {{ config('app.name') }} and protected by intellectual property laws. You may not copy, modify, or reverse-engineer any part of the Platform without written consent.</p>

        <h2>6. Termination & Suspension</h2>
        <p>{{ config('app.name') }} may suspend or terminate your account at its discretion, including for violation of these Terms or if required by law. Upon termination, any pending earnings may be forfeited if the violation is material. You may close your account at any time via settings; remaining balance will be paid out subject to a closure fee (if applicable).</p>

        <h2>7. Disclaimers & Limitation of Liability</h2>
        <p>THE PLATFORM IS PROVIDED "AS IS" WITHOUT WARRANTIES OF ANY KIND. {{ config('app.name') }} DOES NOT GUARANTEE CONTINUOUS, UNINTERRUPTED ACCESS OR THAT EARNINGS WILL BE AT SPECIFIED LEVELS. TO THE MAXIMUM EXTENT PERMITTED BY LAW, {{ config('app.name') }} SHALL NOT BE LIABLE FOR INDIRECT, INCIDENTAL, OR CONSEQUENTIAL DAMAGES.</p>

        <h2>8. Changes to Terms</h2>
        <p>We may update these Terms from time to time. Material changes will be notified via email or Platform notice. Your continued use after changes constitutes acceptance.</p>

        <h2>9. Governing Law & Dispute Resolution</h2>
        <p>These Terms are governed by the laws of the Federal Republic of Nigeria. Any dispute arising out of or relating to these Terms shall first be attempted to be resolved through informal negotiation. If unresolved, the dispute shall be submitted to binding arbitration in Lagos, Nigeria.</p>

       
       

      
       
    </div>
    </section>
@endsection