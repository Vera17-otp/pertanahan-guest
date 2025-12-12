{{-- File: resources/views/identitaspengembang.blade.php --}}

@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- =============================== -->
    <!--    HEADER (PAGE HEADER)         -->
    <!-- =============================== -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('assets/img/pertanahan 4.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">
                    Identitas Pengembang Sistem
                </h1>
            </div>
        </div>
    </div>

    <!-- =============================== -->
    <!--     MAIN CONTENT SECTION         -->
    <!-- =============================== -->
    <div class="container-xxl py-5">
        <div class="container">

            <!-- SECTION TITLE -->
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">
                    Developer Information
                </h6>
                <h1 class="mb-4">
                    Profil <span class="text-primary text-uppercase">Pengembang</span>
                </h1>
            </div>

            <!-- DEVELOPER PROFILE CONTENT -->
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-12">
                    <div class="p-4 bg-light rounded shadow-sm">

                        <!-- PROFILE SECTION WITH PHOTO -->
                        <div class="row align-items-center mb-5">
                            <!-- Profile Photo -->
                            <div class="col-lg-4 text-center mb-4 mb-lg-0">
                                <div class="profile-photo-container mx-auto">
                                    <!-- Ganti dengan foto asli Anda -->
                                    <img src="{{ asset('assets/img/foto.jpg') }}" 
                                         alt="Foto Vera Zakia Ramadani" 
                                         class="img-fluid rounded-circle shadow profile-photo">
                                    <div class="verified-badge">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Personal Information -->
                            <div class="col-lg-8">
                                <h2 class="fw-bold text-primary mb-3">Vera Zakia Ramadani</h2>
                                <h5 class="text-muted mb-4">Full Stack Developer & System Analyst</h5>
                                
                                <!-- Basic Info -->
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="info-item">
                                            <i class="fas fa-id-card text-primary me-2"></i>
                                            <strong>NIM:</strong> 2457301149
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="info-item">
                                            <i class="fas fa-graduation-cap text-primary me-2"></i>
                                            <strong>Program Studi:</strong> Sistem Informasi
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="info-item">
                                            <i class="fas fa-university text-primary me-2"></i>
                                            <strong>Universitas:</strong> Politeknik Caltex Riau
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="info-item">
                                            <i class="fas fa-calendar text-primary me-2"></i>
                                            <strong>Angkatan:</strong> 2024
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CONTACT & SOCIAL MEDIA SECTION -->
                        <div class="row mb-5">
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3 text-primary">
                                    <i class="fas fa-address-card me-2"></i>Kontak
                                </h4>
                                <div class="contact-list">
                                    <div class="contact-item mb-3">
                                        <i class="fas fa-envelope text-primary me-2"></i>
                                        <span>verazakiaramadani@example.com</span>
                                    </div>
                                    <div class="contact-item mb-3">
                                        <i class="fas fa-phone text-primary me-2"></i>
                                        <span>+62 812 3456 7890</span>
                                    </div>
                                    <div class="contact-item">
                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                        <span>Indonesia</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3 text-primary">
                                    <i class="fas fa-share-alt me-2"></i>Media Sosial & Portfolio
                                </h4>
                                <div class="social-media-icons">
                                    <a href="https://linkedin.com/in/VeraZakia" target="_blank" class="social-icon linkedin" title="LinkedIn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="https://github.com/Vera17-otp" target="_blank" class="social-icon github" title="GitHub">
                                        <i class="fab fa-github"></i>
                                    </a>
                                    <a href="https://instagram.com/verra_zr" target="_blank" class="social-icon instagram" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="https://twitter.com/verazakia_" target="_blank" class="social-icon twitter" title="Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://facebook.com/JejakTerbang" target="_blank" class="social-icon facebook" title="Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://verazakiaramadani.medium.com" target="_blank" class="social-icon medium" title="Medium Blog">
                                        <i class="fab fa-medium-m"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        

                        <!-- TECH STACK -->
                        <h5 class="fw-bold mb-3 text-primary">Tech Stack</h5>
                        <div class="tech-stack mb-5">
                            <span class="tech-badge">HTML5</span>
                            <span class="tech-badge">CSS3</span>
                            <span class="tech-badge">JavaScript</span>
                            <span class="tech-badge">Bootstrap 5</span>
                            <span class="tech-badge">PHP</span>
                            <span class="tech-badge">Laravel</span>
                            <span class="tech-badge">MySQL</span>
                            <span class="tech-badge">Git</span>
                            <span class="tech-badge">Figma</span>
                            <span class="tech-badge">VS Code</span>
                            <span class="tech-badge">Postman</span>
                            <span class="tech-badge">XAMPP</span>
                        </div>

                        <!-- PROJECTS SECTION -->
                        <h4 class="fw-bold mt-5 mb-3 text-primary">
                            <i class="fas fa-project-diagram me-2"></i>Proyek yang Dikerjakan
                        </h4>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="project-card">
                                    <div class="project-icon">
                                        <i class="fas fa-hotel text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Sistem Manajemen Hotel</h6>
                                    <p class="text-muted small">Sistem reservasi dan manajemen hotel berbasis web dengan Laravel</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="project-card">
                                    <div class="project-icon">
                                        <i class="fas fa-users-cog text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Modul User Management</h6>
                                    <p class="text-muted small">Sistem manajemen pengguna dengan role-based access control</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="project-card">
                                    <div class="project-icon">
                                        <i class="fas fa-landmark text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Sistem Pertanahan</h6>
                                    <p class="text-muted small">Aplikasi manajemen data pertanahan dengan geolokasi</p>
                                </div>
                            </div>
                        </div>

                        <!-- ABOUT DEVELOPER -->
                        <div class="about-developer mt-5 pt-4 border-top">
                            <h4 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-user-circle me-2"></i>Tentang Saya
                            </h4>
                            <p class="text-muted">
                                Saya Vera Zakia Ramadani, seorang mahasiswa Sistem Informasi yang passionate dalam pengembangan web aplikasi. 
                                Memiliki ketertarikan khusus pada system analysis, database design, dan user experience. 
                                Selalu berusaha untuk menciptakan solusi teknologi yang tidak hanya functional tetapi juga user-friendly.
                            </p>
                            <p class="text-muted">
                                Sebagai seorang developer, saya percaya bahwa kode yang baik harus seperti puisi - mudah dibaca, 
                                efisien, dan memiliki struktur yang jelas. Saya terus mengasah kemampuan dalam teknologi terkini 
                                dan selalu terbuka untuk kolaborasi dalam proyek-proyek yang menantang.
                            </p>
                            <div class="mt-4">
                                <h6 class="fw-bold text-primary mb-2">Motto:</h6>
                                <blockquote class="blockquote border-start border-primary ps-3">
                                    <p class="mb-0 text-muted">"Technology is best when it brings people together."</p>
                                </blockquote>
                            </div>
                        </div>

                        <!-- CALL TO ACTION -->
                        <div class="text-center mt-5 pt-4 border-top">
                            <h5 class="fw-bold text-primary mb-3">Ingin Berkolaborasi?</h5>
                            <p class="text-muted mb-4">
                                Tertarik untuk mengembangkan proyek bersama atau ingin berdiskusi tentang teknologi? Mari terhubung!
                            </p>
                            <a href="mailto:verazakiaramadani@example.com" class="btn btn-primary btn-lg px-4 me-3">
                                <i class="fas fa-envelope me-2"></i> Kirim Email
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-lg px-4">
                                <i class="fas fa-briefcase me-2"></i> Portfolio
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<style>
    .profile-photo-container {
        position: relative;
        width: 250px;
        height: 250px;
    }
    
    .profile-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border: 5px solid #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .verified-badge {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background: #fff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        color: #0d6efd;
        font-size: 20px;
    }
    
    .info-item {
        padding: 10px 15px;
        background: #fff;
        border-radius: 8px;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
    }
    
    .info-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .contact-list {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #dee2e6;
    }
    
    .contact-item {
        padding: 10px 0;
        border-bottom: 1px solid #f1f1f1;
    }
    
    .contact-item:last-child {
        border-bottom: none;
    }
    
    .social-media-icons {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 20px;
    }
    
    .social-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        transition: all 0.3s ease;
        text-decoration: none;
        position: relative;
    }
    
    .social-icon:hover {
        transform: translateY(-5px) rotate(5deg);
    }
    
    .social-icon:hover::after {
        content: attr(title);
        position: absolute;
        bottom: -35px;
        left: 50%;
        transform: translateX(-50%);
        background: #333;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
        white-space: nowrap;
    }
    
    .linkedin {
        background: #0077B5;
    }
    
    .github {
        background: #333;
    }
    
    .instagram {
        background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
    }
    
    .twitter {
        background: #1DA1F2;
    }
    
    .facebook {
        background: #1877F2;
    }
    
    .medium {
        background: #00ab6c;
    }
    
    .skill-item {
        background: #fff;
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #dee2e6;
    }
    
    .skill-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-weight: 600;
    }
    
    .progress {
        height: 10px;
        border-radius: 5px;
        background: #f1f1f1;
        overflow: hidden;
    }
    
    .progress-bar {
        background: linear-gradient(90deg, #0d6efd, #6f42c1);
        border-radius: 5px;
    }
    
    .tech-stack {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .tech-badge {
        background: linear-gradient(135deg, #0d6efd, #6f42c1);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }
    
    .project-card {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #dee2e6;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .project-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #0d6efd20, #6f42c120);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 24px;
    }
    
    .about-developer {
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        border: 1px solid #dee2e6;
    }
    
    @media (max-width: 768px) {
        .profile-photo-container {
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
        }
        
        .social-media-icons {
            justify-content: center;
        }
    }
</style>

<script>
    // Animate skill bars on page load
    document.addEventListener('DOMContentLoaded', function() {
        const skillBars = document.querySelectorAll('.progress-bar');
        skillBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0';
            setTimeout(() => {
                bar.style.width = width;
                bar.style.transition = 'width 1.5s ease-in-out';
            }, 300);
        });
        
        // Add animation to project cards
        const projectCards = document.querySelectorAll('.project-card');
        projectCards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 * index);
            }, 100);
        });
    });
</script>
@endsection