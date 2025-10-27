<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GA Portal - Customer Hub</title>
    <link rel="stylesheet" href="{{ asset('css/hub.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        Enhanced Header Styles
        .header {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 999;
            background: white;
        }

        .header-top {
            padding: 12px 0;
        }

        .header-top .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-info {
            display: flex;
            gap: 30px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 14px;
        }

        .contact-item i {
            font-size: 14px;
        }

        .btn-login {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 8px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
            border: 1px solid rgba(255,255,255,0.3);
            cursor: pointer;
        }

        .btn-login:hover {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .header-main {
            background: white;
            padding: 20px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 70px;
            height: 70px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .logo-text {
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        .company-name {
            font-size: 24px;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
            letter-spacing: 0.5px;
        }

        .company-desc {
            font-size: 13px;
            color: #718096;
            margin: 5px 0 0 0;
        }

        /* Enhanced Navigation */
        .navigation {
            background: white;
            padding: 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .nav-menu {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
            gap: 0;
        }

        .nav-menu li {
            position: relative;
            flex: 1;
        }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 0.8px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border-bottom: 3px solid transparent;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform: translateY(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: -1;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover {
            color: #667eea;
            transform: translateY(-2px);
        }

        .nav-link:hover::before {
            transform: translateY(0);
        }

        .nav-link:hover::after {
            transform: translateX(-50%) scaleX(1);
        }

        .nav-link.active {
            color: white;
            border-bottom-color: #764ba2;
        }

        .nav-link.active::before {
            display: none;
        }

        .nav-link.active::after {
            display: none;
        }

        .nav-link i {
            font-size: 11px;
            margin-left: 6px;
            transition: all 0.3s ease;
        }

        .nav-link:hover i {
            transform: rotate(180deg);
            color: #764ba2;
        }

        .nav-link.active i {
            color: white;
        }

        /* Topic Section Styles */
        .topic-section {
            padding: 60px 0;
            background: linear-gradient(to bottom, #f8f9fa, #ffffff);
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 40px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .topic-card-hover {
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
        }

        .topic-card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(102, 126, 234, 0.2);
            border-color: #667eea;
        }

        .topic-card-hover .card-body {
            padding: 25px 15px;
            background-color: #1e40af !important;
        }

        .topic-card-hover .rounded-circle {
            /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
            /* color: white !important; */
            transition: all 0.3s ease;
            background-color: #fbbf24 !important;
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(251, 191, 36, 0.15);
        }

        .topic-card-hover:hover .rounded-circle {
            transform: scale(1.1) rotate(10deg);
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
        }

        .topic-card-hover .card-title {
            color: #2d3748;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .topic-card-hover:hover .card-title {
            color: #667eea;
        }

        .topic-card-hover .card-text {
            font-size: 13px;
            color: #718096;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            animation: fadeIn 0.3s;
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-dialog {
            background: white;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            animation: slideDown 0.3s;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-content {
            padding: 0;
        }

        .modal-header {
            padding: 24px;
            border-bottom: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 12px 12px 0 0;
        }

        .modal-title {
            font-size: 22px;
            font-weight: 600;
            margin: 0;
        }

        .btn-close {
            background: rgba(255,255,255,0.2);
            border: none;
            font-size: 24px;
            color: white;
            cursor: pointer;
            padding: 0;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s;
        }

        .btn-close:hover {
            background-color: rgba(255,255,255,0.3);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 30px;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2d3748;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .modal-footer {
            padding: 20px 30px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.3s;
        }

        .btn-secondary {
            background-color: #e2e8f0;
            color: #2d3748;
        }

        .btn-secondary:hover {
            background-color: #cbd5e0;
            transform: translateY(-2px);
        }

        .btn-primary {
            /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .contact-info {
                flex-direction: column;
                gap: 10px;
            }
            
            .nav-menu {
                flex-direction: column;
            }
            
            .nav-link {
                padding: 15px 20px;
            }

            .section-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>(62-31) 7860808 / 52601717</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>info@geluran.co.id</span>
                    </div>
                </div>
                <div class="header-actions">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-login">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="header-main">
            <div class="container">
                <div class="logo-section">
                    <div class="logo">
                        <span class="logo-text">GA</span>
                    </div>
                    <div class="company-info">
                        <h1 class="company-name">PT. GELURAN ADIKARYA</h1>
                        <p class="company-desc">Plants, Process Equipments, LPG Storage & Transport Tanks Manufacturer</p>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navigation">
            <div class="container">
                <ul class="nav-menu">
                    <li><a href="#" class="nav-link active">HOME</a></li>
                    <li><a href="#" class="nav-link">PRODUCTS <i class="fas fa-chevron-down"></i></a></li>
                    <li><a href="#" class="nav-link">CONTACT</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-content">
                    <div class="hero-left">
                        <!-- Tab Selector -->
                        <div class="tab-selector">
                            <button class="tab-btn active">Customer</button>
                            <button class="tab-btn" id="adminTabBtn">Admin</button>
                        </div>

                        <!-- Greeting -->
                        <h1 class="greeting">Selamat Siang, Ada yang bisa kami bantu?</h1>

                        <!-- Search Bar -->
                        <div class="search-container">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Ketik kata kunci (misal: status pesanan)">
                        </div>

                        <!-- Login Section -->
                        <div class="login-section">
                            <p class="login-text">Masuk untuk mendapat bantuan terkait transaksi</p>
                            <div class="login-actions">
                                <a href="#" class="btn-primary">Dashboard</a>
                                <a href="#" class="login-help">Tidak dapat masuk?</a>
                            </div>
                        </div>
                    </div>

                    <div class="hero-right">
                        <div class="illustration">
                            <div class="service-character">
                                <div class="character-body">
                                    <i class="fas fa-headset"></i>
                                </div>
                            </div>
                            <div class="support-elements">
                                <div class="element element-1">
                                    <i class="fas fa-question-circle"></i>
                                </div>
                                <div class="element element-2">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div class="element element-3">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <div class="element element-4">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Topic Selection -->
            <section class="topic-section">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-title">Pilih Topik Bantuan</h2>
                    </div>
                    <div class="row g-4 mt-3">
                        @foreach($category as $cat)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ route('category.show', $cat->id) }}" class="text-decoration-none">
                                <div class="card h-100 shadow-sm border-0 text-center topic-card-hover">
                                    <div class="card-body rounded-3" id="customerLgo">
                                        <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width:70px; height:70px;">
                                            <i class="fas fa-folder-open fa-2x"></i>
                                        </div>
                                        <h5 class="card-title text-light">{{ $cat->name }}</h5>
                                        <p class="card-text">{{ $cat->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 PT. Geluran Adikarya. All rights reserved.</p>
        </div>
    </footer>

    <!-- Admin Login Modal -->
    <div class="modal" id="adminLoginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login Admin</h5>
                    <button type="button" class="btn-close" id="closeModal">&times;</button>
                </div>

                <form method="POST" action="{{ route('login.process') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="cancelBtn">Batal</button>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <div class="modal" id="customerLoginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login Customer</h5>
                    <button type="button" class="btn-close" id="closeModal">&times;</button>
                </div>

                <form method="POST" action="{{ route('login.process') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="cancelBtn">Batal</button>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Get modal and buttons
        const modal = document.getElementById('adminLoginModal');
        const adminTabBtn = document.getElementById('adminTabBtn');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');

        adminTabBtn.addEventListener('click', function(e) {
            e.preventDefault();
            modal.classList.add('show');
        });

        closeModal.addEventListener('click', function() {
            modal.classList.remove('show');
        });

        cancelBtn.addEventListener('click', function() {
            modal.classList.remove('show');
        });

        window.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('show');
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('show')) {
                modal.classList.remove('show');
            }
        });
    </script>
</body>

</html>