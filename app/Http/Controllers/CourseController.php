<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use App\course_lectures;
use App\courses;
use App\Subscriptions;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CourseController extends Controller
{
    use StorageImageTrait;

    private $course;
    private $category;
    private $course_lecture;
    private $subscription;

    public function __construct(Category $category, courses $course, course_lectures $course_lectures, Subscriptions $subscriptions)
    {
        $this->category = $category;
        $this->course = $course;
        $this->course_lecture = $course_lectures;
        $this->subscription = $subscriptions;
        $this->middleware('auth');
    }


    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->CategoryRecursive_v2($parentId);
        return $htmlOption;
    }


    public function index()
    {
        $courses = $this->course->paginate(5);
        return view('admin.course.course-list', compact('courses'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.course.course-add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataCourse = [
                'name' => $request->course_name,
                'content' => $request->course_content,
                'subscriptions' => 0,
                'category_id' => $request->category_id
            ];
            $dataUpload = $this->storageTraitUpload($request, 'image_path', 'course');
            if (!empty($dataUpload)) {
                $dataCourse['image_name'] = $dataUpload['file_name'];
                $dataCourse['image_path'] = $dataUpload['file_path'];
            }
            $course = $this->course->create($dataCourse);
            //insert data vao course_lecture
            $countLec = count($request->lectureName);
            if ($request->has('lectureName') && $request->has('lectureLink')) {
                for ($i = 0; $i < $countLec; $i++) {
                    $lecture = $this->course_lecture->create([
                        'name' => $request->lectureName[$i],
                        'lecture_link' => $request->lectureLink[$i],
                        'course_id' => $course->id
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('courses-admin.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function getCourse($category_id)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->CategoryRecursive_v2($category_id);
        return $htmlOption;
    }

    public function edit($id)
    {
        $course = $this->course->find($id);
        $htmlOption = $this->getCourse($course->category_id);
        return view('admin.course.course-edit', compact('course', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $dataCourseUpdate = [
                'name' => $request->course_name,
                'content' => $request->course_content,
//            'subscriptions' => 0,
                'category_id' => $request->category_id
            ];
            $dataUpload = $this->storageTraitUpload($request, 'image_path', 'course');
            if (!empty($dataUpload)) {
                $dataCourseUpdate['image_name'] = $dataUpload['file_name'];
                $dataCourseUpdate['image_path'] = $dataUpload['file_path'];
            }
            $course = $this->course->find($id)->update($dataCourseUpdate);
            //insert data vao course_lecture
            $countLec = count($request->lectureName);
            if ($request->has('lectureName') && $request->has('lectureLink')) {
                $this->course_lecture->where('course_id', $id)->delete();
                for ($i = 0; $i < $countLec; $i++) {
                    $lecture = $this->course_lecture->create([
                        'name' => $request->lectureName[$i],
                        'lecture_link' => $request->lectureLink[$i],
                        'course_id' => $id
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('courses-admin.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $this->course->find($id)->delete();
            $this->course_lecture::where('course_id', $id)->delete();
            $this->subscription::where('course_id', $id)->delete();
            DB::commit();
//            return response()->json([
//                'code' => 200,
//                'message' => 'success'
//            ], 200);
            return $this->successResponse();
//            return redirect()->route('courses-admin.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            log::error('Message: ' . $exception->getMessage() . ' ---line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    public function search(Request $request){
        $input = $request->name;
        $names = $this->course::where('name', $input)
            ->orWhere('name', 'like', '%' . $input . '%')->paginate(5);
        return view('admin.course.course-search', compact('names','input'));
    }

}
