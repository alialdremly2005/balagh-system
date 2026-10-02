<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>البلاغات | بلاغ</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .reports-page {
            min-height: 100vh;
            padding: 130px 0 70px;
        }

        .reports-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .reports-header h1 {
            font-size: 42px;
            margin-bottom: 12px;
        }

        .reports-header p {
            color: var(--muted);
        }

        .success-message {
            width: min(1100px, 92%);
            margin: 0 auto 25px;
            padding: 15px 20px;
            border-radius: 14px;
            background: rgba(34, 197, 94, 0.12);
            border: 1px solid rgba(34, 197, 94, 0.25);
            color: #4ade80;
            text-align: center;
            font-weight: 700;
        }

        .reports-tools {
            width: min(1100px, 92%);
            margin: auto auto 30px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
            padding: 15px 18px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: var(--card);
            color: white;
            font-family: inherit;
            outline: none;
        }

        .filter-box {
            padding: 15px 18px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: #0b1020;
            color: white;
            font-family: inherit;
            outline: none;
        }

        .reports-grid {
            width: min(1100px, 92%);
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .report-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            backdrop-filter: blur(18px);
            transition: 0.3s;
        }

        .report-card:hover {
            transform: translateY(-5px);
            background: var(--card-hover);
        }

        .report-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
        }

        .report-category {
            color: var(--cyan);
            font-size: 13px;
            font-weight: bold;
        }

        .status {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status.pending {
            background: rgba(245, 158, 11, 0.12);
            color: var(--orange);
        }

        .status.progress {
            background: rgba(99, 102, 241, 0.12);
            color: var(--primary-light);
        }

        .status.done {
            background: rgba(34, 197, 94, 0.12);
            color: var(--green);
        }

        .report-card h3 {
            margin-bottom: 12px;
            font-size: 20px;
        }

        .report-card p {
            color: var(--muted);
            line-height: 1.8;
            font-size: 14px;
        }

        .report-location {
            margin-top: 18px;
            padding-top: 15px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 13px;
        }

        .empty-state {
            display: none;
            text-align: center;
            color: var(--muted);
            padding: 50px;
        }

        .back-home {
            display: block;
            width: fit-content;
            margin: 35px auto 0;
            color: var(--muted);
        }

        .back-home:hover {
            color: white;
        }

        @media (max-width: 850px) {
            .reports-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 550px) {
            .reports-grid {
                grid-template-columns: 1fr;
            }

            .reports-header h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <main class="reports-page">

        <div class="reports-header">

            <h1>البلاغات</h1>

            <p>
                استعرض البلاغات والمشاكل التي تم الإبلاغ عنها في المجتمع.
            </p>

        </div>


        {{-- رسالة نجاح بعد إرسال البلاغ --}}
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif


        <div class="reports-tools">

            <input
                type="text"
                id="searchInput"
                class="search-box"
                placeholder="ابحث عن بلاغ..."
            >

            <select id="filterInput" class="filter-box">

                <option value="all">
                    كل البلاغات
                </option>

                <option value="pending">
                    قيد المراجعة
                </option>

                <option value="progress">
                    قيد المعالجة
                </option>

                <option value="done">
                    تم الحل
                </option>

            </select>

        </div>


        <section class="reports-grid" id="reportsGrid">

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

                    $statuses = [
                        'pending' => [
                            'class' => 'pending',
                            'label' => 'قيد المراجعة'
                        ],

                        'progress' => [
                            'class' => 'progress',
                            'label' => 'قيد المعالجة'
                        ],

                        'done' => [
                            'class' => 'done',
                            'label' => 'تم الحل'
                        ],
                    ];

                    $categoryName =
                        $categories[$report->category]
                        ?? $report->category;

                    $statusData =
                        $statuses[$report->status]
                        ?? $statuses['pending'];

                @endphp


                <article class="report-card">

                    <div class="report-top">

                        <span class="report-category">
                            {{ $categoryName }}
                        </span>

                        <span class="status {{ $statusData['class'] }}">
                            {{ $statusData['label'] }}
                        </span>

                    </div>

@if($report->image)
    <img
        src="{{ asset('storage/' . $report->image) }}"
        alt="{{ $report->title }}"
        style="
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 14px;
            margin-bottom: 18px;
        "
    >
@endif
                    <h3>
                        {{ $report->title }}
                    </h3>


                    <p>
                        {{ $report->description }}
                    </p>


                    <div class="report-location">
                        📍 {{ $report->location }}
                    </div>
<a
    href="{{ route('reports.show', $report) }}"
    style="
        display: inline-block;
        margin-top: 18px;
        color: var(--cyan);
        font-weight: 700;
        font-size: 14px;
    "
>
    عرض تفاصيل البلاغ ←
</a>
                </article>

            @empty

                <div
                    style="
                        grid-column: 1 / -1;
                        text-align: center;
                        color: var(--muted);
                        padding: 60px 20px;
                    "
                >
                    لا توجد بلاغات حاليًا.
                </div>

            @endforelse

        </section>


        <div class="empty-state" id="emptyState">
            لا توجد بلاغات مطابقة لعملية البحث.
        </div>


        <a href="/" class="back-home">
            ← العودة إلى الصفحة الرئيسية
        </a>

    </main>


    <script>

        const searchInput =
            document.getElementById("searchInput");

        const filterInput =
            document.getElementById("filterInput");

        const cards =
            document.querySelectorAll(".report-card");

        const emptyState =
            document.getElementById("emptyState");


        function filterReports() {

            const search =
                searchInput.value.toLowerCase();

            const filter =
                filterInput.value;

            let visible = 0;


            cards.forEach(card => {

                const text =
                    card.innerText.toLowerCase();

                const status =
                    card.querySelector(".status");


                let statusMatch = true;


                if (filter !== "all" && status) {

                    statusMatch =
                        status.classList.contains(filter);

                }


                const searchMatch =
                    text.includes(search);


                if (statusMatch && searchMatch) {

                    card.style.display = "block";

                    visible++;

                } else {

                    card.style.display = "none";

                }

            });


            emptyState.style.display =
                visible === 0 && cards.length > 0
                    ? "block"
                    : "none";

        }


        searchInput.addEventListener(
            "input",
            filterReports
        );


        filterInput.addEventListener(
            "change",
            filterReports
        );

    </script>


    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>