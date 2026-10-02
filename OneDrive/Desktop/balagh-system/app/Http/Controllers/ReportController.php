<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // عرض جميع البلاغات
    public function index()
    {
        $reports = Report::latest()->get();

        return view('reports', compact('reports'));
    }

    // عرض تفاصيل بلاغ
    public function show(Report $report)
    {
        $report->load('user');

        return view('report-details', compact('report'));
    }

    // استقبال بلاغ جديد
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',

            // إحداثيات الخريطة
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',

            // الصورة
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // مسار الصورة
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store(
                'reports',
                'public'
            );
        }

        // حفظ البلاغ
        Report::create([
            'user_id' => session('user_id'),

            'title' => $request->title,

            'category' => $request->category,

            'description' => $request->description,

            'location' => $request->location,

            'latitude' => $request->latitude,

            'longitude' => $request->longitude,

            'image' => $imagePath,

            'status' => 'pending',
        ]);

        return redirect('/reports')->with(
            'success',
            'تم إرسال البلاغ بنجاح ✅'
        );
    }

    // لوحة المستخدم
    public function dashboard()
    {
        $user = User::find(session('user_id'));

        if (!$user) {
            session()->flush();

            return redirect('/login');
        }

        // بلاغات المستخدم الحالي فقط
        $reports = Report::where(
            'user_id',
            $user->id
        )
        ->latest()
        ->get();

        // الإحصائيات
        $totalReports = $reports->count();

        $pendingReports = $reports->where(
            'status',
            'pending'
        )->count();

        $progressReports = $reports->where(
            'status',
            'progress'
        )->count();

        $doneReports = $reports->where(
            'status',
            'done'
        )->count();

        return view('dashboard', compact(
            'user',
            'reports',
            'totalReports',
            'pendingReports',
            'progressReports',
            'doneReports'
        ));
    }

    // لوحة الإدارة
    public function admin()
    {
        $reports = Report::with('user')
            ->latest()
            ->get();

        // إحصائيات البلاغات
        $totalReports = Report::count();

        $pendingReports = Report::where(
            'status',
            'pending'
        )->count();

        $progressReports = Report::where(
            'status',
            'progress'
        )->count();

        $doneReports = Report::where(
            'status',
            'done'
        )->count();

        // عدد المستخدمين
        $usersCount = User::count();

        return view('admin', compact(
            'reports',
            'totalReports',
            'pendingReports',
            'progressReports',
            'doneReports',
            'usersCount'
        ));
    }

    // تغيير حالة البلاغ
    public function updateStatus(
        Request $request,
        Report $report
    ) {
        $request->validate([
            'status' => 'required|in:pending,progress,done',
        ]);

        $report->update([
            'status' => $request->status,
        ]);

        return redirect('/admin')->with(
            'success',
            'تم تحديث حالة البلاغ بنجاح ✅'
        );
    }

    // حذف بلاغ
    public function destroy(Report $report)
    {
        // حذف صورة البلاغ من التخزين
        if ($report->image) {

            $imagePath = storage_path(
                'app/public/' . $report->image
            );

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // حذف البلاغ من قاعدة البيانات
        $report->delete();

        return redirect('/admin')->with(
            'success',
            'تم حذف البلاغ بنجاح ✅'
        );
    }
}