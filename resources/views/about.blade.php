@extends('layout.main')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | StockMarket Pro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --secondary: #0f172a;
            --accent: #22c55e;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Source Sans Pro', sans-serif;
            color: var(--dark);
            line-height: 1.6;
            background-color: #f1f5f9;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 1rem;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?ixlib=rb-4.0.3') no-repeat center center/cover;
            color: white;
            padding: 6rem 0;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            color: white;
            animation: fadeInDown 1s ease;
        }
        
        .hero p {
            font-size: 1.5rem;
            max-width: 800px;
            margin: 0 auto;
            animation: fadeInUp 1s ease;
        }
        
        /* Section Styles */
        section {
            padding: 5rem 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            display: inline-block;
            position: relative;
            padding-bottom: 1rem;
        }
        
        .section-title h2:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background-color: var(--accent);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* Mission Section */
        .mission {
            background-color: white;
        }
        
        .mission-content {
            display: flex;
            align-items: center;
            gap: 3rem;
        }
        
        .mission-text {
            flex: 1;
        }
        
        .mission-image {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: perspective(1000px) rotateY(-5deg);
            transition: var(--transition);
        }
        
        .mission-image:hover {
            transform: perspective(1000px) rotateY(0);
        }
        
        .mission-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        /* Values Section */
        .values {
            background-color: #f8fafc;
        }
        
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .value-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
        }
        
        .value-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .value-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }
        
        .value-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        /* Compliance Section */
        .compliance {
            background-color: white;
        }
        
        .compliance-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .compliance-item {
            display: flex;
            gap: 2rem;
            padding: 2rem;
            background: #f8fafc;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
            opacity: 0;
            transform: translateX(-50px);
        }
        
        .compliance-item:nth-child(even) {
            transform: translateX(50px);
        }
        
        .compliance-item.visible {
            opacity: 1;
            transform: translateX(0);
        }
        
        .compliance-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .compliance-icon {
            font-size: 2.5rem;
            color: var(--accent);
        }
        
        /* Terms Section */
        .terms {
            background-color: #f8fafc;
        }
        
        .accordion {
            margin-top: 2rem;
        }
        
        .accordion-item {
            margin-bottom: 1rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .accordion-header {
            background: white;
            padding: 1.5rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition);
        }
        
        .accordion-header:hover {
            background: #f1f5f9;
        }
        
        .accordion-header h3 {
            margin: 0;
            font-size: 1.2rem;
        }
        
        .accordion-content {
            background: white;
            padding: 0 1.5rem;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .accordion-content.active {
            max-height: 500px;
            padding: 1.5rem;
        }
        
        /* License Section */
        .license {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
            color: white;
        }
        
        .license h2, .license h3 {
            color: white;
        }
        
        .license-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .license-badge {
            font-size: 4rem;
            color: var(--accent);
            margin-bottom: 2rem;
            animation: pulse 2s infinite;
        }
        
        /* Team Section */
        .team {
            background-color: white;
        }
        
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .team-member {
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        
        .team-member.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .team-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1.5rem;
            border: 5px solid #f1f5f9;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }
        
        .team-member:hover .team-image {
            transform: scale(1.05);
            border-color: var(--primary);
        }
        
        /* Footer */
        footer {
            background-color: var(--secondary);
            color: white;
            padding: 4rem 0 2rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .footer-column h3 {
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column li {
            margin-bottom: 0.8rem;
        }
        
        .footer-column a {
            color: #cbd5e1;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .footer-column a:hover {
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: var(--transition);
        }
        
        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .mission-content {
                flex-direction: column;
            }
            
            .hero h1 {
                font-size: 2.8rem;
            }
            
            .hero p {
                font-size: 1.2rem;
            }
        }
        
        @media (max-width: 768px) {
            nav ul {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .compliance-item {
                flex-direction: column;
                text-align: center;
            }
        }
        
        /* Utility Classes */
        .text-center {
            text-align: center;
        }
        
        .mt-4 {
            margin-top: 2rem;
        }
        
        .btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 0.8rem 1.8rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .btn-accent {
            background: var(--accent);
        }
        
        .btn-accent:hover {
            background: #16a34a;
        }
    </style>
</head>
<body>
    

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>About StockMarket Pro</h1>
            <p>Your trusted partner in the financial markets. We're dedicated to providing cutting-edge tools and insights for traders and investors.</p>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission">
        <div class="container">
            <div class="section-title">
                <h2>Our Mission & Vision</h2>
            </div>
            <div class="mission-content">
                <div class="mission-text">
                    <h3>Democratizing Financial Markets</h3>
                    <p>At StockMarket Pro, our mission is to democratize access to financial markets by providing professional-grade tools and insights to traders and investors of all experience levels.</p>
                    <p>We believe that everyone should have the opportunity to participate in financial markets with confidence, backed by robust technology and comprehensive educational resources.</p>
                    <p>Our vision is to become the most trusted platform for market analysis, trading, and investment education worldwide.</p>
                    <a href="#" class="btn mt-4">Learn More About Us</a>
                </div>
                <div class="mission-image">
                    <img src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=400&q=80" alt="Stock Market Analysis">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values">
        <div class="container">
            <div class="section-title">
                <h2>Our Core Values</h2>
            </div>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Integrity</h3>
                    <p>We maintain the highest ethical standards in all our operations and client interactions.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>We continuously evolve our platform to incorporate the latest technological advancements.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Client Focus</h3>
                    <p>Our clients' success is our top priority. We tailor our services to meet their unique needs.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Excellence</h3>
                    <p>We strive for excellence in every aspect of our platform and customer experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Compliance Section -->
    <section class="compliance">
        <div class="container">
            <div class="section-title">
                <h2>Regulatory Compliance</h2>
            </div>
            <div class="compliance-content">
                <div class="compliance-item">
                    <div class="compliance-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="compliance-text">
                        <h3>Licensing Information</h3>
                        <p>StockMarket Pro is fully licensed and regulated by the International Financial Commission (IFC) under license number SMPro78945. Our operations comply with all international financial regulations.</p>
                    </div>
                </div>
                <div class="compliance-item">
                    <div class="compliance-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="compliance-text">
                        <h3>Data Protection</h3>
                        <p>We adhere to strict data protection regulations including GDPR. All client data is encrypted and stored securely with multiple layers of protection against unauthorized access.</p>
                    </div>
                </div>
                <div class="compliance-item">
                    <div class="compliance-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="compliance-text">
                        <h3>Client Fund Security</h3>
                        <p>Client funds are held in segregated accounts at top-tier banks, separate from our corporate funds. We maintain comprehensive insurance coverage for additional protection.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms Section -->
    <section class="terms">
        <div class="container">
            <div class="section-title">
                <h2>Terms & Policies</h2>
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Terms of Service</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>By accessing our platform, you agree to comply with our Terms of Service. These terms govern your use of our website, trading platform, and all related services. Please read them carefully before using our services.</p>
                        <p>We reserve the right to modify these terms at any time. Continued use of our services after changes constitutes acceptance of the modified terms.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Privacy Policy</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>Your privacy is important to us. Our Privacy Policy explains how we collect, use, and protect your personal information. We are committed to transparency about our data practices.</p>
                        <p>We collect information necessary to provide our services, improve your experience, and comply with regulatory requirements. You have control over your data and can manage your privacy settings at any time.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Risk Disclosure</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>Trading financial instruments involves significant risk and may not be suitable for all investors. The possibility exists that you could lose some or all of your initial investment.</p>
                        <p>You should be aware of all the risks associated with trading and seek advice from an independent financial advisor if you have any doubts. Past performance is not indicative of future results.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- License Section -->
    <section class="license">
        <div class="container">
            <div class="section-title">
                <h2>Licensing Information</h2>
            </div>
            <div class="license-content">
                <div class="license-badge">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3>Fully Regulated & Licensed</h3>
                <p>StockMarket Pro operates under the strict supervision of international financial authorities. Our license number is SMPro78945, issued by the International Financial Commission (IFC).</p>
                <p>We are proud to maintain the highest standards of compliance and regularly undergo audits to ensure we meet all regulatory requirements. Our clients can trade with confidence knowing that we operate with full transparency and adherence to financial regulations.</p>
                <a href="#" class="btn btn-accent mt-4">Verify Our License</a>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team">
        <div class="container">
            <div class="section-title">
                <h2>Leadership Team</h2>
            </div>
            <div class="team-grid">
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=400&q=80" alt="CEO" class="team-image">
                    <h3>Sarah Johnson</h3>
                    <p>Chief Executive Officer</p>
                </div>
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=400&q=80" alt="CFO" class="team-image">
                    <h3>Michael Chen</h3>
                    <p>Chief Financial Officer</p>
                </div>
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=400&q=80" alt="CTO" class="team-image">
                    <h3>David Wilson</h3>
                    <p>Chief Technology Officer</p>
                </div>
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=400&q=80" alt="CCO" class="team-image">
                    <h3>Emily Rodriguez</h3>
                    <p>Chief Compliance Officer</p>
                </div>
            </div>
        </div>
    </section>

   
  


    <script>
        // Accordion functionality
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                content.classList.toggle('active');
                
                const icon = header.querySelector('i');
                if (content.classList.contains('active')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });
        
        // Scroll animations
        function checkVisibility() {
            const elements = document.querySelectorAll('.value-card, .compliance-item, .team-member');
            
            elements.forEach(element => {
                const position = element.getBoundingClientRect();
                
                // If the element is in the viewport
                if(position.top < window.innerHeight - 100 && position.bottom >= 0) {
                    element.classList.add('visible');
                }
            });
        }
        
        // Check visibility on load and scroll
        window.addEventListener('load', checkVisibility);
        window.addEventListener('scroll', checkVisibility);
        
        // Initial check
        checkVisibility();
    </script>
</body>
</html>
 