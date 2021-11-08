<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use App\courses;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private $category, $course, $user;

    public function __construct(Category $category, courses $course, User $user)
    {
        $this->category = $category;
        $this->course = $course;
        $this->user = $user;
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $coursesList = $this->course->sum('subscriptions'); //đếm lượt đăng ký
        $user = $this->user::all()->count(); //đếm số người dùng
        $categories = $this->category::all()->count(); //đếm số danh mục
        $courses = $this->course::all()->count(); //đếm số khóa học
        $course_trends = $this->course::orderByDesc("subscriptions")->paginate(5); // 5 khóa học nhiều đăng ký nhất
        $course_news = $this->course->latest()->paginate(5); // 5 khóa học mới nhất
        return view('admin.dashboard', compact('categories', 'courses', 'course_trends', 'course_news', 'coursesList', 'user'));
    }

}
