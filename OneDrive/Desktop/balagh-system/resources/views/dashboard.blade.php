<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>لوحة المستخدم | بلاغ</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    <style>

        .dashboard-page {
            min-height: 100vh;
            padding: 110px 0 60px;
        }

        .dashboard-container {
            width: min(1200px, 92%);
            margin: auto;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 35px;
            flex-wrap: wrap;
        }

        .dashboard-header h1 {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .dashboard-header p {
            color: var(--muted);
        }

        .logout-button {
            border: 1px solid var(--border);
            background: transparent;
            color: white;
            padding: 11px 18px;
            border-radius: 12px;
            cursor: pointer;
            font-family: inherit;
            font-weight: 700;
        }

        .logout-button:hover {
            border-color: #ef4444;
            color: #f87171;
        }

        .success-message {
            margin-bottom: 25px;
            padding: 15px 20px;
            border-radius: 14px;
            background: rgba(34, 197, 94, 0.12);
            border: 1px solid rgba(34, 197, 94, 0.25);
            color: #4ade80;
            font-weight: 700;
        }

        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .dashboard-stat {
            padding: 25px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .dashboard-stat .icon {
            font-size: 28px;
        }

        .dashboard-stat h2 {
            font-size: 30px;
            margin: 10px 0 5px;
        }

        .dashboard-stat p {
            color: var(--muted);
            font-size: 14px;
        }

        .reports-panel {
            padding: 28px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .panel-title {
            margin-bottom: 25px;
        }

        .panel-title h2 {
            margin-bottom: 7px;
        }

        .panel-title p {
            color: var(--muted);
            font-size: 14px;
        }

        .user-report {
            padding: 20px 0;
            border-bottom: 1px solid var(--border);
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .user-report:last-child {
            border-bottom: none;
        }

        .user-report-image {
            width: 120px;
            height: 90px;
            border-radius: 12px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .user-report-no-image {
            width: 120px;
            height: 90px;
            border-radius: 12px;
            background: rgba(255,255,255,0.04);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
        }

        .report-content {
            flex: 1;
        }

        .report-content h3 {
            margin-bottom: 7px;
        }

        .report-content p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .report-meta {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 10px;
            color: var(--muted);
            font-size: 13px;
        }

        .report-status {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .report-status.pending {
            background: rgba(245,158,11,0.12);
            color: var(--orange);
        }

        .report-status.progress {
            background: rgba(99,102,241,0.12);
            color: var(--primary-light);
        }

        .report-status.done {
            background: rgba(34,197,94,0.12);
            color: var(--green);
        }

        .details-link {
            color: var(--cyan);
            font-weight: 700;
            white-space: nowrap;
        }

        .empty-reports {
            text-align: center;
            padding: 60px 20px;
            color: var(--muted);
        }

        .dashboard-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .dashboard-links a {
            color: var(--muted);
        }

        .dashboard-links a:hover {
            color: white;
        }

        @media (max-width: 900px) {

            .dashboard-stats {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 600px) {

            .dashboard-stats {
                grid-template-columns: 1fr;
            }

            .dashboard-header h1 {
                font-size: 27px;
            }

            .user-report {
                align-items: flex-start;
            }

            .user-report-image,
            .user-report-no-image {
                width: 85px;
                height: 70px;
            }

        }

    </style>

</head>

<body>

    <main class="dashboard-page">

        <div class="dashboard-container">

            <header class="dashboard-header">

                <div>

                    <h1>
                        مرحبًا {{ $user->name }} 👋
                    </h1>

                    <p>
                        هذه لوحة التحكم الخاصة ببلاغاتك.
                    </p>

                </div>


                <form
                    action="/logout"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-button"
                    >
                        تسجيل الخروج
                    </button>

                </form>

            </header>


            @if(session('success'))

                <div class="success-message">
                    {{ session('success') }}
                </div>

            @endif


            <!-- الإحصائيات -->

            <section class="dashboard-stats">

                <div class="dashboard-stat">

                    <div class="icon">
                        📋
                    </div>

                    <h2>
                        {{ $totalReports }}
                    </h2>

                    <p>
                        إجمالي بلاغاتك
                    </p>

                </div>


                <div class="dashboard-stat">

                    <div class="icon">
                        🟡
                    </div>

                    <h2>
                        {{ $pendingReports }}
                    </h2>

                    <p>
                        قيد المراجعة
                    </p>

                </div>


                <div class="dashboard-stat">

                    <div class="icon">
                        🔵
                    </div>

                    <h2>
                        {{ $progressReports }}
                    </h2>

                    <p>
                        قيد المعالجة
                    </p>

                </div>


                <div class="dashboard-stat">

                    <div class="icon">
                        🟢
                    </div>

                    <h2>
                        {{ $doneReports }}
                    </h2>

                    <p>
                        تم الحل
                    </p>

                </div>

            </section>


            <!-- البلاغات -->

            <section class="reports-panel">

                <div class="panel-title">

                    <h2>
                        بلاغاتي
                    </h2>

                    <p>
                        جميع البلاغات التي قمت بإرسالها.
                    </p>

                </div>


                @forelse($reports as $report)

                    @php

                        $categories = [
                            'roads' => 'الطرق والشوارع',
                            'water' => 'المياه',
                            'electricity' => 'الكهرباء',
                            'lighting' => 'الإنارة',
                            'waste' => 'النظافة والنفايات',
                            'buildings' => 'المباني والمنشآت',
                            'other' => 'أخرى',
                        ];

                    @endphp


                    <article class="user-report">

                        @if($report->image)

                            <img
                                src="{{ asset('storage/' . $report->image) }}"
                                alt="{{ $report->title }}"
                                class="user-report-image"
                            >

                        @else

                            <div class="user-report-no-image">
                                📋
                            </div>

                        @endif


                        <div class="report-content">

                            <h3>
                                {{ $report->title }}
                            </h3>

                            <p>
                                {{ $report->description }}
                            </p>


                            <div class="report-meta">

                                <span>
                                    📍 {{ $report->location }}
                                </span>

                                <span>
                                    {{ $categories[$report->category] ?? $report->category }}
                                </span>


                                @if($report->status === 'pending')

                                    <span class="report-status pending">
                                        قيد المراجعة
                                    </span>

                                @elseif($report->status === 'progress')

                                    <span class="report-status progress">
                                        قيد المعالجة
                                    </span>

                                @elseif($report->status === 'done')

                                    <span class="report-status done">
                                        تم الحل
                                    </span>

                                @endif

                            </div>

                        </div>


                        <a
                            href="{{ route('reports.show', $report) }}"
                            class="details-link"
                        >
                            التفاصيل ←
                        </a>

                    </article>

                @empty

                    <div class="empty-reports">

                        <div style="font-size: 45px; margin-bottom: 15px;">
                            📋
                        </div>

                        <h3>
                            لا توجد بلاغات بعد
                        </h3>

                        <p style="margin-top: 8px;">
                            ابدأ بإرسال أول بلاغ لك.
                        </p>

                        <a
                            href="/report"
                            style="
                                display:inline-block;
                                margin-top:20px;
                                color:var(--cyan);
                                font-weight:700;
                            "
                        >
                            إرسال بلاغ جديد →
                        </a>

                    </div>

                @endforelse

            </section>


            <div class="dashboard-links">

                <a href="/">
                    الرئيسية
                </a>

                <a href="/reports">
                    جميع البلاغات
                </a>

                <a href="/report">
                    إرسال بلاغ جديد
                </a>

            </div>

        </div>

    </main>


    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>