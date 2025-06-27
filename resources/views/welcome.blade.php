

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPVOKASI - Sistem Informasi Pengaduan Vokasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #1a56db, #1e429f);
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
        }
        
        .stat-card {
            background: linear-gradient(135deg, #1e429f, #1a56db);
        }
        
        .testimonial-card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .nav-link {
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #FCD34D;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .mobile-menu {
            transition: transform 0.3s ease-in-out;
        }
        
        .mobile-menu.hidden {
            transform: translateX(-100%);
        }
        
        /* Custom container class to limit width */
        .container-custom {
            width: 100%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        
        @media (min-width: 1400px) {
            .container-custom {
                max-width: 1140px;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-blue-800 text-white sticky top-0 z-50 shadow-md">
        <div class="container-custom mx-auto py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-comment-alt text-yellow-300 text-2xl"></i>
                    <span class="font-bold text-xl tracking-tight">SIPVOKASI</span>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="#beranda" class="nav-link hover:text-yellow-300 transition duration-300">Beranda</a>
                    <a href="#fitur" class="nav-link hover:text-yellow-300 transition duration-300">Fitur</a>
                    <a href="#tentang" class="nav-link hover:text-yellow-300 transition duration-300">Tentang</a>
                    <a href="#statistik" class="nav-link hover:text-yellow-300 transition duration-300">Statistik</a>
                    <a href="#kontak" class="nav-link hover:text-yellow-300 transition duration-300">Kontak</a>
                </div>
                
                <div class="hidden md:flex space-x-4">
                    <a href="{{route ('mahasiswa.login')}}" class="px-4 py-2 rounded-md bg-transparent border border-yellow-300 text-yellow-300 hover:bg-yellow-300 hover:text-blue-800 transition duration-300">Masuk</a>
                    <a href="{{route ('mahasiswa.register')}}" class="px-4 py-2 rounded-md bg-yellow-300 text-blue-800 hover:bg-yellow-400 transition duration-300">Daftar</a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="menu-toggle" class="focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="mobile-menu hidden md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#beranda" class="hover:bg-blue-700 px-3 py-2 rounded-md">Beranda</a>
                    <a href="#fitur" class="hover:bg-blue-700 px-3 py-2 rounded-md">Fitur</a>
                    <a href="#tentang" class="hover:bg-blue-700 px-3 py-2 rounded-md">Tentang</a>
                    <a href="#statistik" class="hover:bg-blue-700 px-3 py-2 rounded-md">Statistik</a>
                    <a href="#kontak" class="hover:bg-blue-700 px-3 py-2 rounded-md">Kontak</a>
                    <div class="flex space-x-2 pt-2">
                        <a href="#" class="flex-1 text-center px-3 py-2 rounded-md bg-transparent border border-yellow-300 text-yellow-300 hover:bg-yellow-300 hover:text-blue-800 transition duration-300">Masuk</a>
                        <a href="#" class="flex-1 text-center px-3 py-2 rounded-md bg-yellow-300 text-blue-800 hover:bg-yellow-400 transition duration-300">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="hero-gradient text-white">
        <div class="container-custom mx-auto py-20 md:py-32">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">Sistem Informasi Pengaduan Vokasi</h1>
                    <p class="text-lg md:text-xl mb-8 text-blue-100">Platform digital untuk menyampaikan pengaduan, aspirasi, dan saran untuk meningkatkan kualitas fakultas vokasi.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{route ('mahasiswa.login')}}" class="px-6 py-3 bg-yellow-400 text-blue-900 font-medium rounded-lg hover:bg-yellow-300 transition duration-300 text-center">Buat Pengaduan</a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <svg class="w-full max-w-md" viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg">
                        <rect x="50" y="50" width="400" height="300" rx="20" fill="#2563EB" opacity="0.3"/>
                        <rect x="80" y="80" width="340" height="240" rx="10" fill="white"/>
                        <rect x="100" y="110" width="200" height="20" rx="5" fill="#DBEAFE"/>
                        <rect x="100" y="150" width="300" height="20" rx="5" fill="#DBEAFE"/>
                        <rect x="100" y="190" width="250" height="20" rx="5" fill="#DBEAFE"/>
                        <rect x="100" y="230" width="150" height="20" rx="5" fill="#DBEAFE"/>
                        <rect x="100" y="270" width="100" height="30" rx="5" fill="#FCD34D"/>
                        <circle cx="380" cy="150" r="30" fill="#FCD34D"/>
                        <path d="M370 150 L380 160 L390 140" stroke="#1E40AF" stroke-width="4" fill="none"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white">
            <div class="container-custom mx-auto">
                <div class="flex flex-wrap justify-center -mt-10">
                    <div class="w-full md:w-10/12 bg-white rounded-lg shadow-xl p-6 flex flex-wrap justify-around">
                        <div class="text-center px-4 py-2">
                            <div class="text-blue-800 text-4xl font-bold">1000+</div>
                            <div class="text-gray-600">Pengaduan Terselesaikan</div>
                        </div>
                        <div class="text-center px-4 py-2">
                            <div class="text-blue-800 text-4xl font-bold">50+</div>
                            <div class="text-gray-600">Institusi Terdaftar</div>
                        </div>
                        <div class="text-center px-4 py-2">
                            <div class="text-blue-800 text-4xl font-bold">24/7</div>
                            <div class="text-gray-600">Layanan Dukungan</div>
                        </div>
                        <div class="text-center px-4 py-2">
                            <div class="text-blue-800 text-4xl font-bold">98%</div>
                            <div class="text-gray-600">Tingkat Kepuasan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-gray-50">
        <div class="container-custom mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Fitur Unggulan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">SIPVOKASI menyediakan berbagai fitur untuk memudahkan proses pengaduan dan penanganan masalah di lingkungan fakultas vokasi.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-comment-dots text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Pengaduan Online</h3>
                    <p class="text-gray-600 text-center">Sampaikan pengaduan secara online dengan mudah dan cepat melalui platform yang user-friendly.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Tracking Pengaduan</h3>
                    <p class="text-gray-600 text-center">Pantau status pengaduan Anda secara real-time dan dapatkan notifikasi perkembangan terbaru.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Keamanan Data</h3>
                    <p class="text-gray-600 text-center">Data pengaduan Anda dijamin keamanannya dengan sistem enkripsi terbaru.</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="feature-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-users text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Manajemen Pengguna</h3>
                    <p class="text-gray-600 text-center">Sistem manajemen pengguna yang terstruktur untuk mahasiswa, dosen, dan administrator.</p>
                </div>
                
                <!-- Feature 5 -->
                <div class="feature-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-file-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Laporan & Analitik</h3>
                    <p class="text-gray-600 text-center">Dapatkan laporan dan analisis data pengaduan untuk evaluasi dan peningkatan layanan.</p>
                </div>
                
                <!-- Feature 6 -->
                <div class="feature-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-bell text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Notifikasi</h3>
                    <p class="text-gray-600 text-center">Dapatkan notifikasi langsung melalui email atau aplikasi saat ada update pengaduan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 bg-white">
        <div class="container-custom mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Cara Kerja SIPVOKASI</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Proses pengaduan yang sederhana dan efektif untuk menyelesaikan masalah dengan cepat.</p>
            </div>
            
            <div class="flex flex-col md:flex-row justify-center items-center md:items-start space-y-8 md:space-y-0 md:space-x-4">
                <!-- Step 1 -->
                <div class="w-full md:w-1/4 flex flex-col items-center">
                    <div class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold mb-4">1</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Daftar Akun</h3>
                    <p class="text-gray-600 text-center">Buat akun dengan mengisi data diri dan institusi pendidikan Anda.</p>
                </div>
                
                <!-- Arrow -->
                <div class="hidden md:block self-center">
                    <i class="fas fa-chevron-right text-blue-300 text-2xl"></i>
                </div>
                
                <!-- Step 2 -->
                <div class="w-full md:w-1/4 flex flex-col items-center">
                    <div class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold mb-4">2</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Buat Pengaduan</h3>
                    <p class="text-gray-600 text-center">Isi formulir pengaduan dengan detail masalah yang ingin disampaikan.</p>
                </div>
                
                <!-- Arrow -->
                <div class="hidden md:block self-center">
                    <i class="fas fa-chevron-right text-blue-300 text-2xl"></i>
                </div>
                
                <!-- Step 3 -->
                <div class="w-full md:w-1/4 flex flex-col items-center">
                    <div class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold mb-4">3</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Proses Verifikasi</h3>
                    <p class="text-gray-600 text-center">Admin akan memverifikasi dan meneruskan pengaduan ke pihak terkait.</p>
                </div>
                
                <!-- Arrow -->
                <div class="hidden md:block self-center">
                    <i class="fas fa-chevron-right text-blue-300 text-2xl"></i>
                </div>
                
                <!-- Step 4 -->
                <div class="w-full md:w-1/4 flex flex-col items-center">
                    <div class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold mb-4">4</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Penyelesaian</h3>
                    <p class="text-gray-600 text-center">Dapatkan respon dan solusi dari pengaduan yang telah disampaikan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-20 bg-blue-50">
        <div class="container-custom mx-auto">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <svg class="w-full max-w-md mx-auto" viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="250" cy="200" r="150" fill="#DBEAFE"/>
                        <rect x="150" y="120" width="200" height="160" rx="10" fill="white"/>
                        <rect x="170" y="150" width="160" height="15" rx="3" fill="#93C5FD"/>
                        <rect x="170" y="180" width="120" height="15" rx="3" fill="#93C5FD"/>
                        <rect x="170" y="210" width="140" height="15" rx="3" fill="#93C5FD"/>
                        <rect x="170" y="240" width="80" height="15" rx="3" fill="#93C5FD"/>
                        <circle cx="320" cy="130" r="25" fill="#FCD34D"/>
                        <path d="M310 130 L320 140 L335 120" stroke="#1E40AF" stroke-width="4" fill="none"/>
                    </svg>
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Tentang SIPVOKASI</h2>
                    <p class="text-gray-600 mb-6">SIPVOKASI adalah sistem informasi pengaduan yang dirancang khusus untuk lingkungan fakultas vokasi. Platform ini bertujuan untuk memfasilitasi komunikasi yang efektif antara mahasiswa, dosen, dan manajemen institusi.</p>
                    <p class="text-gray-600 mb-6">Dengan SIPVOKASI, setiap pengaduan akan ditangani secara profesional dan transparan, sehingga dapat meningkatkan kualitas layanan pendidikan dan menciptakan lingkungan belajar yang lebih baik.</p>
                    <div class="flex flex-wrap">
                        <div class="w-1/2 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Transparan</span>
                            </div>
                        </div>
                        <div class="w-1/2 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Responsif</span>
                            </div>
                        </div>
                        <div class="w-1/2 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Terpercaya</span>
                            </div>
                        </div>
                        <div class="w-1/2 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Profesional</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="statistik" class="py-20 bg-white">
        <div class="container-custom mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Statistik Pengaduan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Data statistik pengaduan yang telah diproses melalui SIPVOKASI.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Stat Card 1 -->
                <div class="stat-card rounded-lg p-6 text-white text-center">
                    <div class="text-4xl font-bold mb-2">75%</div>
                    <div class="text-lg">Pengaduan Akademik</div>
                </div>
                
                <!-- Stat Card 2 -->
                <div class="stat-card rounded-lg p-6 text-white text-center">
                    <div class="text-4xl font-bold mb-2">15%</div>
                    <div class="text-lg">Pengaduan Fasilitas</div>
                </div>
                
                <!-- Stat Card 3 -->
                <div class="stat-card rounded-lg p-6 text-white text-center">
                    <div class="text-4xl font-bold mb-2">8%</div>
                    <div class="text-lg">Pengaduan Administrasi</div>
                </div>
                
                <!-- Stat Card 4 -->
                <div class="stat-card rounded-lg p-6 text-white text-center">
                    <div class="text-4xl font-bold mb-2">2%</div>
                    <div class="text-lg">Pengaduan Lainnya</div>
                </div>
            </div>
            
            <div class="mt-16 bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">Tingkat Penyelesaian Pengaduan</h3>
                <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full bg-green-500 rounded-full" style="width: 92%;">
                        <div class="flex h-full items-center justify-center text-white font-medium">92% Terselesaikan</div>
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                    <div>
                        <div class="text-green-500 font-bold text-xl">92%</div>
                        <div class="text-gray-600">Terselesaikan</div>
                    </div>
                    <div>
                        <div class="text-yellow-500 font-bold text-xl">6%</div>
                        <div class="text-gray-600">Dalam Proses</div>
                    </div>
                    <div>
                        <div class="text-red-500 font-bold text-xl">2%</div>
                        <div class="text-gray-600">Menunggu Tindakan</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20 bg-gray-50">
        <div class="container-custom mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Testimoni Pengguna</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Apa kata pengguna tentang pengalaman mereka menggunakan SIPVOKASI.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="testimonial-card bg-white p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold">AS</span>
                        </div>
                        <div>
                            <h4 class="font-semibold">Andi Saputra</h4>
                            <p class="text-sm text-gray-600">Mahasiswa Teknik</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"SIPVOKASI sangat membantu saya dalam menyampaikan keluhan tentang fasilitas laboratorium. Responnya cepat dan masalah segera ditangani."</p>
                    <div class="mt-4 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="testimonial-card bg-white p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold">DP</span>
                        </div>
                        <div>
                            <h4 class="font-semibold">Dewi Pratiwi</h4>
                            <p class="text-sm text-gray-600">Dosen Akuntansi</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Sebagai dosen, saya merasa terbantu dengan adanya SIPVOKASI. Sistem ini memudahkan komunikasi dengan mahasiswa dan manajemen kampus."</p>
                    <div class="mt-4 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="testimonial-card bg-white p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold">BS</span>
                        </div>
                        <div>
                            <h4 class="font-semibold">Budi Santoso</h4>
                            <p class="text-sm text-gray-600">Kepala Program Studi</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"SIPVOKASI membantu kami mengidentifikasi masalah di program studi dengan lebih cepat. Data analitiknya sangat berguna untuk evaluasi dan perbaikan."</p>
                    <div class="mt-4 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 hero-gradient text-white">
        <div class="container-custom mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Siap Untuk Memulai?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Bergabunglah dengan SIPVOKASI dan jadilah bagian dari perubahan positif dalam pendidikan vokasi.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{route ('mahasiswa.register')}}" class="px-8 py-3 bg-yellow-400 text-blue-900 font-medium rounded-lg hover:bg-yellow-300 transition duration-300">Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-20 bg-white">
        <div class="container-custom mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Punya pertanyaan atau butuh bantuan? Jangan ragu untuk menghubungi tim SIPVOKASI.</p>
            </div>
            
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 mb-10 md:mb-0 md:pr-8">
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="subject" class="block text-gray-700 mb-2">Subjek</label>
                            <input type="text" id="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                            <textarea id="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                        <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300">Kirim Pesan</button>
                    </form>
                </div>
                <div class="md:w-1/2 md:pl-8">
                    <div class="bg-gray-50 p-6 rounded-lg h-full">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Informasi Kontak</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Alamat</h4>
                                    <p class="text-gray-600">Jl. Pendidikan Vokasi No. 123, Jakarta Pusat, Indonesia</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-phone text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Telepon</h4>
                                    <p class="text-gray-600">+62 21 1234 5678</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-envelope text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Email</h4>
                                    <p class="text-gray-600">info@sipvokasi.ac.id</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-clock text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Jam Operasional</h4>
                                    <p class="text-gray-600">Senin - Jumat: 08.00 - 16.00 WIB</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="font-medium mb-4">Ikuti Kami</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-200 transition duration-300">
                                    <i class="fab fa-facebook-f text-blue-600"></i>
                                </a>
                                <a href="#" class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-200 transition duration-300">
                                    <i class="fab fa-twitter text-blue-600"></i>
                                </a>
                                <a href="#" class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-200 transition duration-300">
                                    <i class="fab fa-instagram text-blue-600"></i>
                                </a>
                                <a href="#" class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-200 transition duration-300">
                                    <i class="fab fa-linkedin-in text-blue-600"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-gray-50">
        <div class="container-custom mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Pertanyaan Umum</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Jawaban untuk pertanyaan yang sering diajukan tentang SIPVOKASI.</p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="faq-toggle w-full flex justify-between items-center p-4 bg-white hover:bg-gray-50 focus:outline-none" onclick="toggleFAQ(this)">
                            <span class="font-medium text-left">Bagaimana cara mendaftar di SIPVOKASI?</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300"></i>
                        </button>
                        <div class="faq-content hidden p-4 bg-gray-50 border-t border-gray-200">
                            <p class="text-gray-600">Untuk mendaftar di SIPVOKASI, kunjungi halaman pendaftaran dan isi formulir dengan data diri Anda. Setelah itu, Anda akan menerima email konfirmasi untuk verifikasi akun.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="faq-toggle w-full flex justify-between items-center p-4 bg-white hover:bg-gray-50 focus:outline-none" onclick="toggleFAQ(this)">
                            <span class="font-medium text-left">Berapa lama waktu yang dibutuhkan untuk menyelesaikan pengaduan?</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300"></i>
                        </button>
                        <div class="faq-content hidden p-4 bg-gray-50 border-t border-gray-200">
                            <p class="text-gray-600">Waktu penyelesaian pengaduan bervariasi tergantung pada kompleksitas masalah. Secara umum, pengaduan akan ditanggapi dalam waktu 1-3 hari kerja dan diselesaikan dalam waktu 5-10 hari kerja.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 3 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="faq-toggle w-full flex justify-between items-center p-4 bg-white hover:bg-gray-50 focus:outline-none" onclick="toggleFAQ(this)">
                            <span class="font-medium text-left">Apakah pengaduan saya akan dijamin kerahasiaannya?</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300"></i>
                        </button>
                        <div class="faq-content hidden p-4 bg-gray-50 border-t border-gray-200">
                            <p class="text-gray-600">Ya, SIPVOKASI menjamin kerahasiaan identitas pelapor. Anda dapat memilih untuk membuat pengaduan secara anonim jika diperlukan.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 4 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="faq-toggle w-full flex justify-between items-center p-4 bg-white hover:bg-gray-50 focus:outline-none" onclick="toggleFAQ(this)">
                            <span class="font-medium text-left">Bagaimana cara melacak status pengaduan saya?</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300"></i>
                        </button>
                        <div class="faq-content hidden p-4 bg-gray-50 border-t border-gray-200">
                            <p class="text-gray-600">Anda dapat melacak status pengaduan melalui dashboard akun SIPVOKASI Anda. Setiap perubahan status akan diinformasikan melalui notifikasi email.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 5 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="faq-toggle w-full flex justify-between items-center p-4 bg-white hover:bg-gray-50 focus:outline-none" onclick="toggleFAQ(this)">
                            <span class="font-medium text-left">Apakah SIPVOKASI tersedia dalam bentuk aplikasi mobile?</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300"></i>
                        </button>
                        <div class="faq-content hidden p-4 bg-gray-50 border-t border-gray-200">
                            <p class="text-gray-600">Saat ini SIPVOKASI tersedia dalam versi web yang responsif untuk perangkat mobile. Aplikasi mobile sedang dalam tahap pengembangan dan akan segera diluncurkan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white">
        <div class="container-custom mx-auto py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-6">
                        <i class="fas fa-comment-alt text-yellow-300 text-2xl"></i>
                        <span class="font-bold text-xl">SIPVOKASI</span>
                    </div>
                    <p class="text-blue-200 mb-6">Sistem Informasi Pengaduan Vokasi yang memudahkan komunikasi antara mahasiswa, dosen, dan manajemen institusi.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-200 hover:text-white transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-6">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="#beranda" class="text-blue-200 hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="#fitur" class="text-blue-200 hover:text-white transition duration-300">Fitur</a></li>
                        <li><a href="#tentang" class="text-blue-200 hover:text-white transition duration-300">Tentang Kami</a></li>
                        <li><a href="#statistik" class="text-blue-200 hover:text-white transition duration-300">Statistik</a></li>
                        <li><a href="#kontak" class="text-blue-200 hover:text-white transition duration-300">Kontak</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-6">Layanan</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-blue-200 hover:text-white transition duration-300">Pengaduan Online</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition duration-300">Tracking Pengaduan</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition duration-300">Laporan & Analitik</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition duration-300">Bantuan & Dukungan</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition duration-300">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-6">Kontak</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-300"></i>
                            <span>Jl. Prof. Moch Yamin, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone mt-1 mr-3 text-blue-300"></i>
                            <span>+6231-99421834</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3 text-blue-300"></i>
                            <span>info@unesa.ac.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-blue-800 mt-12 pt-8 text-center text-blue-200">
                <p>&copy; 2023 SIPVOKASI. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    document.getElementById('mobile-menu').classList.add('hidden');
                }
            });
        });
        
        // FAQ toggle
        function toggleFAQ(element) {
            const content = element.nextElementSibling;
            const icon = element.querySelector('i');
            
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
        
        // Add active class to nav links based on scroll position
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if(pageYOffset >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('text-yellow-300');
                if(link.getAttribute('href') === `#${current}`) {
                    link.classList.add('text-yellow-300');
                }
            });
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'94eccbc757f8fdaf',t:'MTc0OTc2NzQ2Mi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
