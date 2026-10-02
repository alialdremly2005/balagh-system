<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>إرسال بلاغ | بلاغ</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .report-page {
            min-height: 100vh;
            padding: 130px 0 70px;
        }

        .report-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .report-header h1 {
            font-size: 42px;
            margin-bottom: 12px;
        }

        .report-header p {
            color: var(--muted);
            font-size: 17px;
        }

        .report-box {
            width: min(850px, 92%);
            margin: auto;
            padding: 35px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            backdrop-filter: blur(20px);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            font-weight: 700;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 15px 17px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.05);
            color: var(--text);
            outline: none;
            font-family: inherit;
            font-size: 15px;
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .form-group select option {
            background: #0b1020;
            color: white;
        }

        .upload-box {
            border: 2px dashed var(--border);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
        }

        .upload-box:hover {
            border-color: var(--primary);
            background: rgba(99,102,241,0.05);
        }

        .upload-box input {
            display: none;
        }

        .upload-icon {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .submit-report {
            width: 100%;
            border: none;
            padding: 16px;
            border-radius: 14px;
            background: linear-gradient(
                135deg,
                var(--primary),
                var(--cyan)
            );
            color: white;
            font-size: 17px;
            font-weight: 800;
            cursor: pointer;
            font-family: inherit;
            transition: 0.3s;
        }

        .submit-report:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99,102,241,0.25);
        }

        .back-home {
            display: block;
            width: fit-content;
            margin: 25px auto 0;
            color: var(--muted);
        }

        .back-home:hover {
            color: white;
        }

        @media (max-width: 600px) {
            .report-header h1 {
                font-size: 30px;
            }

            .report-box {
                padding: 22px;
            }
        }
    </style>
</head>

<body>

    <main class="report-page">

        <div class="report-header">
            <h1>إرسال بلاغ جديد</h1>

            <p>
                ساعدنا في تحسين المجتمع من خلال الإبلاغ عن المشاكل الموجودة حولك.
            </p>
        </div>

        <div class="report-box">

            <form action="/report" method="POST" enctype="multipart/form-data">
                

                @csrf

                <!-- عنوان البلاغ -->
                <div class="form-group">
                    <label for="title">عنوان البلاغ</label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="مثال: شارع متضرر بالقرب من المدرسة"
                        required
                    >
                </div>

                <!-- نوع البلاغ -->
                <div class="form-group">
                    <label for="category">نوع البلاغ</label>

                    <select
                        id="category"
                        name="category"
                        required
                    >
                        <option value="">اختر نوع البلاغ</option>

                        <option value="roads">
                            الطرق والشوارع
                        </option>

                        <option value="water">
                            المياه
                        </option>

                        <option value="electricity">
                            الكهرباء
                        </option>

                        <option value="lighting">
                            الإنارة
                        </option>

                        <option value="waste">
                            النظافة والنفايات
                        </option>

                        <option value="buildings">
                            المباني والمنشآت
                        </option>

                        <option value="other">
                            أخرى
                        </option>
                    </select>
                </div>

                <!-- وصف المشكلة -->
                <div class="form-group">
                    <label for="description">
                        وصف المشكلة
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="اكتب تفاصيل المشكلة ومكانها..."
                        required
                    ></textarea>
                </div>

                <!-- الصورة -->
                <div class="form-group">

                    <label>
                        إرفاق صورة
                    </label>

                    <label class="upload-box">

                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept="image/*"
                        >

                        <div class="upload-icon">
                            📷
                        </div>

                        <strong>
                            اضغط لاختيار صورة
                        </strong>

                        <p style="color: var(--muted); margin-top: 6px;">
                            يمكنك إرفاق صورة توضح المشكلة
                        </p>

                    </label>

                </div>

                <!-- الموقع -->
                <div class="form-group">

                    <label for="location">
                        الموقع
                    </label>

                    <input
                        type="text"
                        id="location"
                        name="location"
                        placeholder="مثال: شارع الجامعة - غزة"
                        required
                    >

                </div>

                <!-- زر الإرسال -->
                <button
                    type="submit"
                    class="submit-report"
                >
                    إرسال البلاغ
                </button>

            </form>

        </div>

        <a href="/" class="back-home">
            ← العودة إلى الصفحة الرئيسية
        </a>

    </main>

    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>