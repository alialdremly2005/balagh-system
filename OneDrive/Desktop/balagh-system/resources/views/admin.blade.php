<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>لوحة الإدارة | بلاغ</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    <style>

        .admin-page {
            min-height: 100vh;
            padding: 110px 0 60px;
        }

        .admin-container {
            width: min(1250px, 92%);
            margin: auto;
        }

        .admin-header {
            margin-bottom: 35px;
        }

        .admin-header h1 {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .admin-header p {
            color: var(--muted);
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

        .error-message {
            margin-bottom: 25px;
            padding: 15px 20px;
            border-radius: 14px;
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #f87171;
            font-weight: 700;
        }

        .admin-stats {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .admin-stat {
            padding: 25px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            transition: 0.3s;
        }

        .admin-stat:hover {
            transform: translateY(-3px);
        }

        .admin-stat span {
            font-size: 28px;
        }

        .admin-stat h2 {
            font-size: 30px;
            margin: 10px 0 5px;
        }

        .admin-stat p {
            color: var(--muted);
            font-size: 14px;
        }

        .admin-panel {
            padding: 28px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow-x: auto;
        }

        .panel-title {
            margin-bottom: 25px;
        }

        .panel-title h2 {
            margin-bottom: 6px;
        }

        .panel-title p {
            color: var(--muted);
            font-size: 14px;
        }

        .reports-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
        }

        .reports-table th,
        .reports-table td {
            padding: 16px 12px;
            text-align: right;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        .reports-table th {
            color: var(--muted);
            font-size: 13px;
        }

        .reports-table td {
            font-size: 14px;
        }

        .reports-table tbody tr {
            transition: 0.2s;
        }

        .reports-table tbody tr:hover {
            background: rgba(255,255,255,0.025);
        }

        .report-title {
            font-weight: bold;
            color: white;
            max-width: 220px;
        }

        .report-image {
            width: 65px;
            height: 50px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid var(--border);
        }

        .no-image {
            width: 65px;
            height: 50px;
            border-radius: 10px;
            background: rgba(255,255,255,0.04);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            border: 1px solid var(--border);
        }

        .status-select {
            padding: 8px 10px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: #0b1020;
            color: white;
            font-family: inherit;
            outline: none;
            cursor: pointer;
            min-width: 125px;
        }

        .status-select.pending {
            color: var(--orange);
        }

        .status-select.progress {
            color: var(--primary-light);
        }

        .status-select.done {
            color: var(--green);
        }

        .admin-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .view-btn {
            display: inline-block;
            border: 1px solid var(--border);
            background: transparent;
            color: white;
            padding: 8px 12px;
            border-radius: 9px;
            cursor: pointer;
            font-family: inherit;
            font-size: 13px;
            text-decoration: none;
            transition: 0.2s;
        }

        .view-btn:hover {
            border-color: var(--primary);
            background: rgba(99,102,241,0.08);
        }

        .delete-btn {
            border-color: rgba(239,68,68,0.25);
            color: #f87171;
        }

        .delete-btn:hover {
            border-color: #ef4444;
            background: rgba(239,68,68,0.08);
        }

        .empty-admin {
            text-align: center;
            color: var(--muted);
            padding: 60px 20px;
        }

        .empty-admin-icon {
            font-size: 45px;
            margin-bottom: 12px;
        }

        .admin-footer {
            margin-top: 25px;
        }

        .admin-footer a {
            color: var(--muted);
        }

        .admin-footer a:hover {
            color: white;
        }

        @media (max-width: 1100px) {

            .admin-stats {
                grid-template-columns: repeat(3, 1fr);
            }

        }

        @media (max-width: 850px) {

            .admin-stats {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 550px) {

            .admin-stats {
                grid-template-columns: 1fr;
            }

            .admin-header h1 {
                font-size: 27px;
            }

        }

    </style>

</head>

<body>

    <main class="admin-page">

        <div class="admin-container">

            <!-- رأس الصفحة -->

            <header class="admin-header">

                <h1>
                    لوحة الإدارة ⚙️
                </h1>

                <p>
                    إدارة ومتابعة البلاغات الواردة إلى منصة بلاغ.
                </p>

            </header>


            <!-- رسالة النجاح -->

            @if(session('success'))

                <div class="success-message">
                    {{ session('success') }}
                </div>

            @endif


            <!-- رسالة الخطأ -->

            @if(session('error'))

                <div class="error-message">
                    {{ session('error') }}
                </div>

            @endif


            <!-- الإحصائيات -->

            <section class="admin-stats">

                <!-- إجمالي البلاغات -->

                <div class="admin-stat">

                    <span>
                        📋
                    </span>

                    <h2>
                        {{ $totalReports }}
                    </h2>

                    <p>
                        إجمالي البلاغات
                    </p>

                </div>


                <!-- البلاغات الجديدة -->

                <div class="admin-stat">

                    <span>
                        🟡
                    </span>

                    <h2>
                        {{ $pendingReports }}
                    </h2>

                    <p>
                        بلاغات جديدة
                    </p>

                </div>


                <!-- قيد المعالجة -->

                <div class="admin-stat">

                    <span>
                        🔵
                    </span>

                    <h2>
                        {{ $progressReports }}
                    </h2>

                    <p>
                        قيد المعالجة
                    </p>

                </div>


                <!-- تم الحل -->

                <div class="admin-stat">

                    <span>
                        🟢
                    </span>

                    <h2>
                        {{ $doneReports }}
                    </h2>

                    <p>
                        تم حلها
                    </p>

                </div>


                <!-- المستخدمون -->

                <div class="admin-stat">

                    <span>
                        👥
                    </span>

                    <h2>
                        {{ $usersCount }}
                    </h2>

                    <p>
                        المستخدمون
                    </p>

                </div>

            </section>


            <!-- جدول البلاغات -->

            <section class="admin-panel">

                <div class="panel-title">

                    <h2>
                        إدارة البلاغات
                    </h2>

                    <p>
                        يمكنك متابعة البلاغات وتغيير حالتها أو عرض تفاصيلها أو حذفها.
                    </p>

                </div>


                @if($reports->count() > 0)

                    <table class="reports-table">

                        <thead>

                            <tr>

                                <th>
                                    الصورة
                                </th>

                                <th>
                                    البلاغ
                                </th>

                                <th>
                                    التصنيف
                                </th>

                                <th>
                                    المرسل
                                </th>

                                <th>
                                    التاريخ
                                </th>

                                <th>
                                    الحالة
                                </th>

                                <th>
                                    الإجراء
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($reports as $report)

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

                                    $categoryName =
                                        $categories[$report->category]
                                        ?? $report->category;

                                    $statusClass =
                                        $report->status;

                                @endphp


                                <tr>

                                    <!-- الصورة -->

                                    <td>

                                        @if($report->image)

                                            <img
                                                src="{{ asset('storage/' . $report->image) }}"
                                                alt="{{ $report->title }}"
                                                class="report-image"
                                            >

                                        @else

                                            <div class="no-image">
                                                📋
                                            </div>

                                        @endif

                                    </td>


                                    <!-- عنوان البلاغ -->

                                    <td class="report-title">

                                        {{ $report->title }}

                                    </td>


                                    <!-- التصنيف -->

                                    <td>

                                        {{ $categoryName }}

                                    </td>


                                    <!-- المرسل -->

                                    <td>

                                        {{ $report->user?->name ?? 'غير مسجل حاليًا' }}

                                    </td>


                                    <!-- التاريخ -->

                                    <td>

                                        {{ $report->created_at->format('d/m/Y') }}

                                    </td>


                                    <!-- الحالة -->

                                    <td>

                                        <form
                                            action="{{ route('admin.reports.status', $report) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            @method('PATCH')

                                            <select
                                                name="status"
                                                class="status-select {{ $statusClass }}"
                                                onchange="this.form.submit()"
                                            >

                                                <option
                                                    value="pending"
                                                    {{ $report->status === 'pending' ? 'selected' : '' }}
                                                >
                                                    قيد المراجعة
                                                </option>


                                                <option
                                                    value="progress"
                                                    {{ $report->status === 'progress' ? 'selected' : '' }}
                                                >
                                                    قيد المعالجة
                                                </option>


                                                <option
                                                    value="done"
                                                    {{ $report->status === 'done' ? 'selected' : '' }}
                                                >
                                                    تم الحل
                                                </option>

                                            </select>

                                        </form>

                                    </td>


                                    <!-- الإجراءات -->

                                    <td>

                                        <div class="admin-actions">

                                            <!-- عرض -->

                                            <a
                                                href="{{ route('reports.show', $report) }}"
                                                class="view-btn"
                                            >
                                                عرض
                                            </a>


                                            <!-- حذف -->

                                            <form
                                                action="{{ route('admin.reports.destroy', $report) }}"
                                                method="POST"
                                                onsubmit="return confirm('هل أنت متأكد من حذف هذا البلاغ؟');"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="view-btn delete-btn"
                                                >
                                                    حذف
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <div class="empty-admin">

                        <div class="empty-admin-icon">
                            📋
                        </div>

                        <h3>
                            لا توجد بلاغات حاليًا
                        </h3>

                        <p style="margin-top: 8px;">
                            عندما يقوم المستخدمون بإرسال بلاغات ستظهر هنا.
                        </p>

                    </div>

                @endif

            </section>


            <!-- الروابط -->

            <div
                class="admin-footer"
                style="
                    display:flex;
                    gap:18px;
                    flex-wrap:wrap;
                "
            >

                <a href="/">
                    ← العودة إلى الموقع
                </a>

                <a href="/reports">
                    جميع البلاغات
                </a>

                <a href="/dashboard">
                    لوحة المستخدم
                </a>

            </div>

        </div>

    </main>


    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>