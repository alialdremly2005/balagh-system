<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>بلاغ | منصة البلاغات الذكية</title>

    <meta name="description"
        content="بلاغ - منصة رقمية حديثة لإرسال البلاغات ومتابعتها بطريقة سهلة وسريعة.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

       <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>


<body>


    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    <header class="navbar" id="navbar">

        <div class="nav-container">

            <a href="#" class="logo">

                <div class="logo-icon">
                    !
                </div>

                <span>بلاغ</span>

            </a>


            <ul class="nav-links">

                <li>
                    <a href="#home">الرئيسية</a>
                </li>

                <li>
                    <a href="#reports">البلاغات</a>
                </li>

                <li>
                    <a href="#how">كيف تعمل؟</a>
                </li>

                <li>
                    <a href="#map">الخريطة</a>
                </li>

                <li>
                    <a href="#about">عن المنصة</a>
                </li>

            </ul>


            <div class="nav-actions">

                <a href="/login">
    تسجيل الدخول
</a>

                <a href="/report" class="nav-report-btn">
                    + إرسال بلاغ
                </a>

                <button class="mobile-menu">
                    ☰
                </button>

            </div>

        </div>

    </header>



    <!-- =====================================================
         HERO
    ====================================================== -->

    <main id="home">

        <section class="hero">

            <div class="hero-grid"></div>


            <div class="hero-container">


                <div class="hero-content">

                    <div class="hero-badge">

                        <span class="live-dot"></span>

                        منصة مجتمعية رقمية

                    </div>


                    <h1>

                        خلي صوتك
                        <br>

                        <span class="gradient-text">
                            يوصل للمكان الصح
                        </span>

                    </h1>


                    <p class="hero-description">

                        بلاغ هي منصة رقمية حديثة تتيح للمستخدمين
                        إرسال البلاغات والمشاكل الموجودة في مناطقهم،
                        مع إمكانية متابعة حالة البلاغ من لحظة إرساله
                        وحتى معالجته.

                    </p>


                    <div class="hero-buttons">

                        <a href="/report" class="btn btn-primary">

                            <span>＋</span>

                            إرسال بلاغ جديد

                        </a>


                        <a href="#reports" class="btn btn-secondary">

                            استعراض البلاغات

                            <span>←</span>

                        </a>

                    </div>


                    <div class="trust-row">

                        <div class="avatars">

                            <div class="avatar"></div>

                            <div class="avatar"></div>

                            <div class="avatar"></div>

                            <div class="avatar"></div>

                        </div>

                        <span>
                            منصة تهدف لتنظيم البلاغات
                            ومتابعتها بشكل أفضل
                        </span>

                    </div>

                </div>



                <!-- Dashboard -->

                <div class="dashboard-wrapper">


                    <div class="dashboard">


                        <div class="dash-top">

                            <div class="dash-title">
                                لوحة متابعة البلاغات
                            </div>

                            <div class="dash-menu">

                                <span></span>
                                <span></span>
                                <span></span>

                            </div>

                        </div>


                        <div class="dash-stat-grid">

                            <div class="mini-stat">

                                <small>
                                    إجمالي البلاغات
                                </small>

                                <strong class="blue">
                                    1,250
                                </strong>

                            </div>


                            <div class="mini-stat">

                                <small>
                                    تم حلها
                                </small>

                                <strong class="green">
                                    860
                                </strong>

                            </div>

                        </div>


                        <div class="report-list">


                            <div class="report-item">

                                <div class="report-info">

                                    <div class="report-icon">
                                        ⚠
                                    </div>

                                    <div>

                                        <strong>
                                            مشكلة في الطريق
                                        </strong>

                                        <small>
                                            منذ 25 دقيقة
                                        </small>

                                    </div>

                                </div>

                                <span class="status orange">
                                    قيد المعالجة
                                </span>

                            </div>


                            <div class="report-item">

                                <div class="report-info">

                                    <div class="report-icon">
                                        💧
                                    </div>

                                    <div>

                                        <strong>
                                            مشكلة مياه
                                        </strong>

                                        <small>
                                            منذ ساعة
                                        </small>

                                    </div>

                                </div>

                                <span class="status blue">
                                    جديد
                                </span>

                            </div>


                            <div class="report-item">

                                <div class="report-info">

                                    <div class="report-icon">
                                        ✓
                                    </div>

                                    <div>

                                        <strong>
                                            مشكلة إنارة
                                        </strong>

                                        <small>
                                            منذ 3 ساعات
                                        </small>

                                    </div>

                                </div>

                                <span class="status green">
                                    تم الحل
                                </span>

                            </div>


                            <div class="report-item">

                                <div class="report-info">

                                    <div class="report-icon">
                                        🛠
                                    </div>

                                    <div>

                                        <strong>
                                            عطل في خدمة
                                        </strong>

                                        <small>
                                            منذ 5 ساعات
                                        </small>

                                    </div>

                                </div>

                                <span class="status orange">
                                    قيد المعالجة
                                </span>

                            </div>


                        </div>

                    </div>


                    <div class="floating-card one">

                        <div class="floating-title">
                            نسبة معالجة البلاغات
                        </div>

                        <div class="floating-number">
                            68%
                        </div>

                    </div>


                    <div class="floating-card two">

                        <div class="floating-title">
                            البلاغات الجديدة اليوم
                        </div>

                        <div class="floating-number">
                            +48
                        </div>

                    </div>


                </div>

            </div>

        </section>



        <!-- =====================================================
             STATISTICS
        ====================================================== -->

        <section class="stats-section">

            <div class="container">

                <div class="stats-grid">


                    <div class="stat-card">

                        <div class="stat-number">
                            1,250+
                        </div>

                        <div class="stat-label">
                            إجمالي البلاغات
                        </div>

                    </div>


                    <div class="stat-card">

                        <div class="stat-number">
                            860+
                        </div>

                        <div class="stat-label">
                            بلاغات تمت معالجتها
                        </div>

                    </div>


                    <div class="stat-card">

                        <div class="stat-number">
                            320+
                        </div>

                        <div class="stat-label">
                            بلاغ قيد المتابعة
                        </div>

                    </div>


                    <div class="stat-card">

                        <div class="stat-number">
                            70%
                        </div>

                        <div class="stat-label">
                            نسبة الإنجاز
                        </div>

                    </div>


                </div>

            </div>

        </section>



        <!-- =====================================================
             REPORTS
        ====================================================== -->

        <section class="section reports-section" id="reports">

            <div class="container">


                <div class="section-header">

                    <div class="section-title">

                        <h2>
                            آخر <span>البلاغات</span>
                        </h2>

                        <p>
                            مجموعة من أحدث البلاغات المسجلة على المنصة
                        </p>

                    </div>

                    <a href="#" class="view-all">
                        مشاهدة جميع البلاغات ←
                    </a>

                </div>



                <div class="reports-grid">


                    <article class="report-card">

                        <div class="report-image">

                            <div class="image-pattern">
                                🚧
                            </div>

                        </div>

                        <div class="report-content">

                            <div class="report-meta">

                                <span class="category">
                                    طرق ومواصلات
                                </span>

                                <span class="time">
                                    منذ 25 دقيقة
                                </span>

                            </div>

                            <h3>
                                مشكلة في أحد الطرق
                            </h3>

                            <p>
                                تم تسجيل مشكلة تحتاج إلى
                                المتابعة والمعالجة.
                            </p>

                            <div class="report-bottom">

                                <span class="location">
                                    📍 المنطقة
                                </span>

                                <span class="status orange">
                                    قيد المعالجة
                                </span>

                            </div>

                        </div>

                    </article>



                    <article class="report-card">

                        <div class="report-image">

                            <div class="image-pattern">
                                💧
                            </div>

                        </div>

                        <div class="report-content">

                            <div class="report-meta">

                                <span class="category">
                                    خدمات المياه
                                </span>

                                <span class="time">
                                    منذ ساعة
                                </span>

                            </div>

                            <h3>
                                انقطاع خدمة المياه
                            </h3>

                            <p>
                                بلاغ حول وجود مشكلة في
                                توفر خدمة المياه.
                            </p>

                            <div class="report-bottom">

                                <span class="location">
                                    📍 المنطقة
                                </span>

                                <span class="status blue">
                                    جديد
                                </span>

                            </div>

                        </div>

                    </article>



                    <article class="report-card">

                        <div class="report-image">

                            <div class="image-pattern">
                                💡
                            </div>

                        </div>

                        <div class="report-content">

                            <div class="report-meta">

                                <span class="category">
                                    إنارة
                                </span>

                                <span class="time">
                                    منذ 3 ساعات
                                </span>

                            </div>

                            <h3>
                                مشكلة في الإنارة
                            </h3>

                            <p>
                                تم إرسال البلاغ وتمت
                                معالجته بنجاح.
                            </p>

                            <div class="report-bottom">

                                <span class="location">
                                    📍 المنطقة
                                </span>

                                <span class="status green">
                                    تم الحل
                                </span>

                            </div>

                        </div>

                    </article>


                </div>

            </div>

        </section>



        <!-- =====================================================
             HOW IT WORKS
        ====================================================== -->

        <section class="section how-section" id="how">

            <div class="container">


                <div class="section-title"
                    style="text-align:center;margin-bottom:55px;">

                    <h2>
                        كيف تعمل <span>بلاغ؟</span>
                    </h2>

                    <p>
                        أربع خطوات بسيطة لإرسال البلاغ ومتابعته
                    </p>

                </div>


                <div class="steps">


                    <div class="step">

                        <div class="step-number">
                            01
                        </div>

                        <h3>
                            أنشئ بلاغ
                        </h3>

                        <p>
                            أضف تفاصيل المشكلة
                            التي تريد الإبلاغ عنها.
                        </p>

                    </div>


                    <div class="step">

                        <div class="step-number">
                            02
                        </div>

                        <h3>
                            أضف التفاصيل
                        </h3>

                        <p>
                            أضف صورة ووصفاً
                            وموقعاً تقريبياً.
                        </p>

                    </div>


                    <div class="step">

                        <div class="step-number">
                            03
                        </div>

                        <h3>
                            مراجعة البلاغ
                        </h3>

                        <p>
                            تتم مراجعة البلاغ
                            من الإدارة.
                        </p>

                    </div>


                    <div class="step">

                        <div class="step-number">
                            04
                        </div>

                        <h3>
                            متابعة الحالة
                        </h3>

                        <p>
                            تابع حالة البلاغ
                            حتى يتم التعامل معه.
                        </p>

                    </div>


                </div>

            </div>

        </section>



        <!-- =====================================================
             MAP
        ====================================================== -->

        <section class="map-section" id="map">

            <div class="container">


                <div class="section-title"
                    style="margin-bottom:35px;">

                    <h2>
                        البلاغات على <span>الخريطة</span>
                    </h2>

                    <p>
                        تصور مبدئي لتوزيع البلاغات حسب المناطق
                    </p>

                </div>


                <div class="map-container">

                    <div class="map-grid"></div>


                    <div class="map-pin pin-1"></div>

                    <div class="map-pin pin-2"></div>

                    <div class="map-pin pin-3"></div>

                    <div class="map-pin pin-4"></div>


                    <div class="map-info">

                        <h3>
                            خريطة البلاغات
                        </h3>

                        <p>
                            يمكن للمستخدم مشاهدة البلاغات
                            المسجلة في المناطق المختلفة
                            ومعرفة حالتها.
                        </p>

                        <a href="#" class="btn btn-primary">
                            فتح الخريطة
                        </a>

                    </div>

                </div>

            </div>

        </section>



        <!-- =====================================================
             CTA
        ====================================================== -->

        <section class="cta-section">

            <div class="container">

                <div class="cta">

                    <h2>
                        عندك مشكلة؟
                        <span class="gradient-text">
                            بلّغ عنها.
                        </span>
                    </h2>

                    <p>
                        ساهم في إيصال المشاكل والملاحظات
                        بطريقة منظمة وسهلة، وساعد في تحسين
                        متابعة الخدمات والمشاكل في المجتمع.
                    </p>

                    <a href="#" class="btn btn-primary">
                        + إرسال بلاغ الآن
                    </a>

                </div>

            </div>

        </section>


    </main>



    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer id="about">

        <div class="container">


            <div class="footer-grid">


                <div class="footer-brand">

                    <a href="#" class="logo">

                        <div class="logo-icon">
                            !
                        </div>

                        <span>بلاغ</span>

                    </a>

                    <p>
                        منصة رقمية تهدف إلى تنظيم البلاغات
                        المجتمعية وتسهيل إرسالها ومتابعتها
                        من خلال واجهة حديثة وسهلة الاستخدام.
                    </p>

                </div>


                <div class="footer-column">

                    <h4>
                        المنصة
                    </h4>

                    <a href="#">
                        الرئيسية
                    </a>

                    <a href="#">
                        البلاغات
                    </a>

                    <a href="#">
                        الخريطة
                    </a>

                    <a href="#">
                        عن المنصة
                    </a>

                </div>


                <div class="footer-column">

                    <h4>
                        الخدمات
                    </h4>

                    <a href="#">
                        إرسال بلاغ
                    </a>

                    <a href="#">
                        متابعة البلاغ
                    </a>

                    <a href="reports.html">
                        استعراض البلاغات
                    </a>

                    <a href="#">
                        الأسئلة الشائعة
                    </a>

                </div>


                <div class="footer-column">

                    <h4>
                        تواصل معنا
                    </h4>

                    <a href="#">
                        البريد الإلكتروني
                    </a>

                    <a href="#">
                        مركز المساعدة
                    </a>

                    <a href="#">
                        سياسة الخصوصية
                    </a>

                    <a href="#">
                        الشروط والأحكام
                    </a>

                </div>


            </div>


            <div class="footer-bottom">

                <span>
                    © 2026 بلاغ — جميع الحقوق محفوظة
                </span>

                <span>
                    تم تطوير المنصة كمشروع جامعي من قبل المهندس على الدريملي
                </span>

            </div>


        </div>

    </footer>



    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>