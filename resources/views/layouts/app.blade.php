<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Website Statis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 76px; /* Fixed height untuk navbar */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        /* NAVBAR STYLING - Ukuran tetap dan konsisten */
        .navbar {
            height: 100px; /* Fixed height */
            padding: 0; /* Remove default padding */
            display: flex;
            align-items: center;
        }

        .navbar .container {
            height: 100%;
            display: flex;
            align-items: center;
        }

        .navbar-brand {
            font-weight: bold;
            padding: 8px 0; /* Vertical padding saja */
            display: flex;
            align-items: center;
            height: 60px; /* Fixed height untuk brand area */
        }

        .navbar-brand img {
            height: 50px; /* Fixed height untuk logo */
            width: auto;
            max-width: none;
        }

        .navbar-nav {
            height: 100%;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link {
            padding: 8px 16px;
            line-height: 1.5;
            display: flex;
            align-items: center;
            height: 44px; /* Fixed height untuk nav items */
        }

        .active {
            font-weight: bold;
        }

        /* Logout Button Styling */
        .logout-btn {
            background: none;
            border: none;
            color: rgba(0,0,0,.55);
            text-decoration: none;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            height: 44px;
            transition: color 0.15s ease-in-out;
        }

        .logout-btn:hover {
            color: rgba(0,0,0,.7);
        }

        .logout-btn:focus {
            outline: none;
            box-shadow: none;
        }

        /* Dashboard dan Logout Icons */
        .nav-link i {
            font-size: 0.9rem;
        }

        /* Navbar Toggler */
        .navbar-toggler {
            padding: 4px 8px;
            font-size: 1rem;
            border: 1px solid rgba(0,0,0,.1);
        }

        /* Logo slot untuk navbar (jika diperlukan) */
        .logo-slot {
            height: 50px;
            display: flex;
            align-items: center;
            color: #333;
            font-size: 1rem;
            padding: 5px 10px;
            background: #f8f9fa;
            border: 2px dashed #dee2e6;
            border-radius: 5px;
        }

        /* Footer Styles - Warna #274B3E */
        footer {
            background: #274B3E;
            color: white;
            padding: 50px 0 20px;
            margin-top: 30px;
        }

        .footer-section h5 {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            color: #c8e6c9;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.9rem;
        }

        .footer-section ul li a:hover {
            color: #ffffff;
        }

        .footer-description {
            color: #c8e6c9;
            line-height: 1.6;
            font-size: 0.9rem;
        }

        /* Logo slot untuk footer */
        .footer-logo-slot {
            width: 120px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px dashed rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.8rem;
            text-align: center;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .footer-logo-slot:hover {
            border-color: rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.15);
        }

        /* Newsletter Section */
        .newsletter-section {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .newsletter-input {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 25px;
            padding: 12px 20px;
            width: 100%;
            margin-bottom: 10px;
        }

        .newsletter-btn {
            background: #70A604;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .newsletter-btn:hover {
            background: #5a8503;
            transform: translateY(-2px);
        }

        /* Social Media Icons */
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            color: #c8e6c9;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: #70A604;
            color: white;
            transform: translateY(-3px);
        }

        /* Footer Bottom */
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            color: #c8e6c9;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding-top: 70px; /* Sedikit lebih kecil untuk mobile */
            }

            .navbar {
                height: 70px;
            }

            .navbar-brand img {
                height: 45px;
            }

            .navbar-nav .nav-link {
                height: auto;
                padding: 8px 12px;
            }

            footer {
                padding: 30px 0 15px;
            }

            .footer-section {
                margin-bottom: 30px;
            }

            .footer-logo-slot {
                width: 100px;
                height: 50px;
            }
        }

        /* Extra small devices */
        @media (max-width: 576px) {
            .navbar-brand img {
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <!-- SLOT UNTUK LOGO NAVBAR - Ganti div ini dengan <img> tag -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo fitflow.png') }}" alt="Logo Navbar">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <!-- Menu untuk user yang sudah login -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="/dashboard">
                                <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link logout-btn">
                                    <i class="fas fa-home me-1"></i>Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <!-- Menu untuk user yang belum login -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="/register">
                                <i class="fas fa-user-plus me-1"></i>Register
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-left">
        <div class="container">
            <div class="row">
                <!-- Logo Section - Ganti Company pertama -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <!-- SLOT UNTUK LOGO FOOTER - Ganti div ini dengan <img> tag -->
                        <img src="{{ asset('images/logo fitflow.png') }}" alt="Logo Footer" height="60">
                        <p class="footer-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem dolor sit amet, 
                            consectetur adipiscing elit.
                        </p>
                        <!-- Social Media Icons -->
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Company Links -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Company</h5>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Works</a></li>
                            <li><a href="#">Career</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Resources -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Resources</h5>
                        <ul>
                            <li><a href="#">Free eBooks</a></li>
                            <li><a href="#">Development Tutorial</a></li>
                            <li><a href="#">How to - Blog</a></li>
                            <li><a href="#">Youtube Playlist</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="col-lg-5 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Newsletter</h5>
                        <div class="newsletter-section">
                            <input type="email" class="newsletter-input" placeholder="Enter your email address">
                            <button class="newsletter-btn">Subscribe Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p class="mb-0">&copy; 2025 Project Akhir Laravel. All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>