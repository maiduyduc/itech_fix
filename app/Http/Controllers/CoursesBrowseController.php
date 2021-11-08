<?php

namespace App\Http\Controllers;

use App\Category;
use App\course_lectures;
use App\courses;
use App\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class CoursesBrowseController extends Controller
{
    private $course;
    private $category;
    private $course_lecture;
    private $subscriptions;

    public function __construct(courses $course, Category $category, course_lectures $course_lectures, Subscriptions $subscriptions)
    {
        $this->course = $course;
        $this->category = $category;
        $this->course_lecture = $course_lectures;
        $this->subscriptions = $subscriptions;
    }

    public function index()
    {
        $categories_limit = $this->category::where('parent_id', 0)->get();
//        $courses = $this->course->paginate(4); //hiển thị 4 khóa học theo thứ tự trong database
        $courses = $this->course::inRandomOrder()->paginate(4); //hiển 4 thị khóa học ngẫu nhiên
        $course_news = $this->course->latest()->paginate(4);    //hiển 4 thị khóa học mới nhất
        $course_trends = $this->course->orderByDesc("subscriptions")->paginate(4); // hiển thị 4 khóa học nhiều người đăng ký nhất
        return view('users.index', compact('courses', 'course_news', 'course_trends', 'categories_limit'));
    }

    public function course()
    {
        $courses = $this->course->paginate(9); //lấy tất cả khóa học, 9 khóa/ trang
//        $categories = $this->category::where('parent_id', 0)->get();
        $categories_limit = $this->category::where('parent_id', 0)->get();
        return view('users.courses.index', compact('courses', 'categories_limit'));
    }

    public function course_info($id)
    {
        if (Auth::check()) {
            $subscription = $this->subscriptions::where(['user_id' => Auth::user()->id, 'course_id' => $id])->get(); //lấy tất cả dữ liệu đăng ký khóa học
        } else {
            $subscription = ""; //lấy tất cả dữ liệu đăng ký khóa học
        }
        $categories_limit = $this->category::where('parent_id', 0)->get(); //lấy dữ liệu menu
        $course = $this->course->find($id); //lấy dữ liệu khóa học
        $courses_random = $this->course::inRandomOrder()->paginate(4); //hiển 4 thị khóa học ngẫu nhiên
        return view('users.courses.course-info', compact('course', 'courses_random', 'categories_limit', 'subscription'));
    }

    public function list($slug, $category_id)
    {
//        $categories = $this->category::where('parent_id', 0)->get();
        $categories_limit = $this->category::where('parent_id', 0)->get();
        $courses = courses::where('category_id', $category_id)->paginate(9);
//        dd($courses);
        return view('users.courses.browse-course-fill', compact('categories_limit', 'courses'));
    }

    public function search(Request $request)
    {
        $input = $request->name;
        $categories_limit = $this->category::where('parent_id', 0)->get();
        $names = $this->course::where('name', $input)
            ->orWhere('name', 'like', '%' . $input . '%')->paginate(9);
//        dd($names);
        return view('users.courses.search', compact('names', 'input', 'categories_limit'));
    }
}
