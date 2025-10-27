<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GA Portal - Customer Hub</title>
    <link rel="stylesheet" href="{{ asset('css/hub.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
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
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            animation: slideDown 0.3s;
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
            padding: 20px 24px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #111827;
            margin: 0;
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 24px;
            color: #6b7280;
            cursor: pointer;
            padding: 0;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            transition: all 0.2s;
        }

        .btn-close:hover {
            background-color: #f3f4f6;
            color: #111827;
        }

        .modal-body {
            padding: 24px;
        }

        .mb-3 {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.2s;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }

        .btn-secondary {
            background-color: #f3f4f6;
            color: #374151;
        }

        .btn-secondary:hover {
            background-color: #e5e7eb;
        }

        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2563eb;
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
                            <button class="tab-btn">Customer</button>
                            <button class="tab-btn active" id="adminTabBtn">Admin</button>
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
                <h2 class="section-title">Pilih topik sesuai kendala pembelianmu</h2>

                <div class="topic-grid">
                    <div class="topic-card">
                        <div class="topic-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3 class="topic-title">Akun & Keamanan</h3>
                    </div>

                    <div class="topic-card">
                        <div class="topic-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3 class="topic-title">Pesanan</h3>
                    </div>

                    <div class="topic-card">
                        <div class="topic-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3 class="topic-title">Pembayaran</h3>
                    </div>

                    <div class="topic-card">
                        <div class="topic-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h3 class="topic-title">Pengiriman</h3>
                    </div>

                    <div class="topic-card">
                        <div class="topic-icon">
                            <i class="fas fa-undo"></i>
                        </div>
                        <h3 class="topic-title">Pengembalian Dana</h3>
                    </div>

                    <div class="topic-card">
                        <div class="topic-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h3 class="topic-title">Komplain Pesanan</h3>
                    </div>

                    <div class="topic-card">
                        <div class="topic-icon">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <h3 class="topic-title">Promosi</h3>
                    </div>

                    <div class="topic-card">
                        <div class="topic-icon">
                            <i class="fas fa-th"></i>
                        </div>
                        <h3 class="topic-title">Lainnya</h3>
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

    <script>
        // Get modal and buttons
        const modal = document.getElementById('adminLoginModal');
        const adminTabBtn = document.getElementById('adminTabBtn');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');

        // Open modal when Admin button is clicked
        adminTabBtn.addEventListener('click', function(e) {
            e.preventDefault();
            modal.classList.add('show');
        });

        // Close modal when X button is clicked
        closeModal.addEventListener('click', function() {
            modal.classList.remove('show');
        });

        // Close modal when Cancel button is clicked
        cancelBtn.addEventListener('click', function() {
            modal.classList.remove('show');
        });

        // Close modal when clicking outside of it
        window.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('show');
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('show')) {
                modal.classList.remove('show');
            }
        });
    </script>
</body>

</html>