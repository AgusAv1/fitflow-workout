@extends('layouts.app')

@section('title', 'Home - FitFlow')

@section('content')
<style>
/* ===== HOME PAGE STYLES ===== */
.home-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 24px;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* ===== HERO SECTION ===== */
.hero-section {
    background: linear-gradient(135deg, #70A604 0%, #82c341 100%);
    border-radius: 24px;
    padding: 80px 60px;
    margin-bottom: 60px;
    box-shadow: 0 20px 60px rgba(112, 166, 4, 0.3);
    position: relative;
    overflow: hidden;
    text-align: center;
    animation: fadeInUp 0.8s ease-out;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -30%;
    width: 120%;
    height: 200%;
    background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, transparent 50%);
    transform: rotate(25deg);
    animation: shimmer 3s ease-in-out infinite;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-mascot {
    margin-bottom: 30px;
}

.mascot-icon {
    font-size: 4rem;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    width: 100px;
    height: 100px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
    border: 3px solid rgba(255,255,255,0.3);
    animation: bounce 2s ease-in-out infinite;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    color: white;
    margin-bottom: 15px;
    text-shadow: 0 4px 8px rgba(0,0,0,0.2);
    animation: slideInDown 1s ease-out;
}

.hero-subtitle {
    font-size: 1.8rem;
    font-weight: 300;
    color: rgba(255,255,255,0.9);
    margin-bottom: 40px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    animation: slideInUp 1s ease-out 0.2s both;
}

.hero-description {
    max-width: 800px;
    margin: 0 auto;
    animation: fadeIn 1s ease-out 0.4s both;
}

.hero-description p {
    font-size: 1.2rem;
    line-height: 1.8;
    color: rgba(255,255,255,0.95);
    margin-bottom: 20px;
    text-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

/* ===== FLOATING ICONS ===== */
.floating-icons {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.floating-icon {
    position: absolute;
    font-size: 2rem;
    opacity: 0.6;
    animation: float 6s ease-in-out infinite;
}

.icon-1 { top: 15%; left: 10%; animation-delay: 0s; }
.icon-2 { top: 25%; right: 15%; animation-delay: 1s; }
.icon-3 { bottom: 30%; left: 8%; animation-delay: 2s; }
.icon-4 { bottom: 20%; right: 12%; animation-delay: 3s; }
.icon-5 { top: 40%; left: 5%; animation-delay: 4s; }
.icon-6 { top: 60%; right: 8%; animation-delay: 5s; }

/* ===== FEATURES HIGHLIGHT ===== */
.features-highlight {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    animation: fadeInUp 1s ease-out 0.6s both;
}

.feature-card {
    background: linear-gradient(135deg, #DAFACC 0%, #a8edea 100%);
    border-radius: 16px;
    padding: 25px 20px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(168, 237, 234, 0.3);
    border: 1px solid rgba(255,255,255,0.4);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s ease;
}

.feature-card:hover::before { left: 100%; }

.feature-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 50px rgba(168, 237, 234, 0.5);
}

.feature-card:nth-child(even) {
    background: linear-gradient(135deg, #FBE3D4 0%, #ffd3a5 100%);
    box-shadow: 0 10px 30px rgba(251, 227, 212, 0.3);
}

.feature-card:nth-child(even):hover {
    box-shadow: 0 20px 50px rgba(251, 227, 212, 0.5);
}

.feature-icon {
    font-size: 2.5rem;
    margin-bottom: 15px;
    display: inline-block;
    animation: pulse 2s ease-in-out infinite;
}

.feature-card h3 {
    font-size: 1.2rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 10px;
}

.feature-card p {
    font-size: 0.9rem;
    color: #4a5568;
    line-height: 1.5;
    margin: 0;
}

/* ===== ANIMATIONS ===== */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideInDown {
    from { opacity: 0; transform: translateY(-50px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(10deg); }
}

@keyframes shimmer {
    0%, 100% { opacity: 0.1; }
    50% { opacity: 0.3; }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    .home-container { padding: 20px 16px; }
    .hero-section { padding: 60px 30px; margin-bottom: 40px; }
    .hero-title { font-size: 2.5rem; }
    .hero-subtitle { font-size: 1.4rem; }
    .hero-description p { font-size: 1.1rem; }
    .mascot-icon { width: 80px; height: 80px; font-size: 3rem; }
    .features-highlight { grid-template-columns: repeat(2, 1fr); gap: 15px; }
    .feature-card { padding: 20px 15px; }
    .floating-icon { font-size: 1.5rem; }
}

@media (max-width: 480px) {
    .hero-title { font-size: 2rem; }
    .hero-subtitle { font-size: 1.2rem; }
    .hero-description p { font-size: 1rem; }
    .mascot-icon { width: 70px; height: 70px; font-size: 2.5rem; }
    .features-highlight { grid-template-columns: 1fr; }
}
</style>
<div class="home-container">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-mascot">
                <div class="mascot-icon">🌟</div>
            </div>
            <h1 class="hero-title">Selamat Datang di FitFlow</h1>
            <h2 class="hero-subtitle">Healthy Diet and Workout Routine</h2>
            <div class="hero-description">
                <p>Wujudkan hidup sehat impian Anda dengan FitFlow! Platform all-in-one yang menggabungkan perencanaan harian, resep masakan sehat, workout routine, dan tracking progress dalam satu website yang mudah digunakan.</p>
                <p>Mulai dari bangun tidur hingga tidur malam, FitFlow memandu setiap langkah perjalanan sehat Anda.</p>
            </div>
        </div>
        
        <!-- Decorative Elements -->
        <div class="floating-icons">
            <div class="floating-icon icon-1">🥗</div>
            <div class="floating-icon icon-2">💪</div>
            <div class="floating-icon icon-3">🏃‍♀️</div>
            <div class="floating-icon icon-4">🧘‍♂️</div>
            <div class="floating-icon icon-5">❤️</div>
            <div class="floating-icon icon-6">⚡</div>
        </div>
    </div>

    <!-- Features Highlight -->
    <div class="features-highlight">
        <div class="feature-card">
            <div class="feature-icon">📅</div>
            <h3>Perencanaan Harian</h3>
            <p>Atur jadwal aktivitas sehat Anda dengan mudah</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🍳</div>
            <h3>Resep Sehat</h3>
            <p>Temukan berbagai resep makanan bergizi dan lezat</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🏋️</div>
            <h3>Workout Routine</h3>
            <p>Program latihan yang disesuaikan dengan kebutuhan Anda</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📊</div>
            <h3>Progress Tracking</h3>
            <p>Pantau perkembangan kesehatan Anda setiap hari</p>
        </div>
    </div>
</div>
@endsection