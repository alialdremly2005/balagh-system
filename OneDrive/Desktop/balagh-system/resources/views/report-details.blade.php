<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $report->title }} | بلاغ</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    <style>
        .details-page {
            min-height: 100vh;
            padding: 120px 0 70px;
        }

        .details-container {
            width: min(900px, 92%);
            margin: auto;
        }

        .details-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            backdrop-filter: blur(20px);
        }

        .details-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
            display: block;
        }

        .details-content {
            padding: 35px;
        }

        .details-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .details-category {
            color: var(--cyan);
            font-size: 14px;
            font-weight: bold;
        }

        .status {
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
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

        .details-content h1 {
            font-size: 34px;
            margin-bottom: 18px;
        }

        .details-description {
            color: var(--muted);
            line-height: 2;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .details-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .info-box {
            padding: 18px;
            background: rgba(255,255,255,0.03);
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        .info-box span {
            display: block;
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 7px;
        }

        .info-box strong {
            font-size: 15px;
        }

        .back-link {
            display: block;
            width: fit-content;
            margin: 25px auto 0;
            color: var(--muted);
        }

        .back-link:hover {
            color: white;
        }

        @media (max-width: 600px) {
            .details-content {
                padding: 22px;
            }

            .details-content h1 {
                font-size: 27px;
            }

            .details-image {
                height: 230px;
            }

            .details-info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <main class="details-page">

        <div class="details-container">

            <div class="details-card">

                @if($report->image)

                    <img
                        src="{{ asset('storage/' . $report->image) }}"
                        alt="{{ $report->title }}"
                        class="details-image"
                    >

                @endif

                <div class="details-content">

                    <div class="details-top">

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

                        <span class="details-category">
                            {{ $categories[$report->category] ?? $report->category }}
                        </span>


                        @if($report->status === 'pending')

                            <span class="status pending">
                                قيد المراجعة
                            </span>

                        @elseif($report->status === 'progress')

                            <span class="status progress">
                                قيد المعالجة
                            </span>

                        @elseif($report->status === 'done')

                            <span class="status done">
                                تم الحل
                            </span>

                        @endif

                    </div>


                    <h1>
                        {{ $report->title }}
                    </h1>


                    <p class="details-description">
                        {{ $report->description }}
                    </p>


                    <div class="details-info">

                        <div class="info-box">

                            <span>
                                📍 الموقع
                            </span>

                            <strong>
                                {{ $report->location }}
                            </strong>

                        </div>


                        <div class="info-box">

                            <span>
                                📅 تاريخ البلاغ
                            </span>

                            <strong>
                                {{ $report->created_at->format('d/m/Y') }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            <a
                href="/reports"
                class="back-link"
            >
                ← العودة إلى جميع البلاغات
            </a>

        </div>

    </main>


    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>