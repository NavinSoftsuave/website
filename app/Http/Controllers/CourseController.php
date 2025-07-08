<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Models\User;
use App\Models\Course;

class CourseController extends Controller
{
    protected $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $courses = $this->service->getAllCourses();
        return view('courses.index', compact('courses'));
    }

    public function category($slug)
    {
        $data = $this->service->getCoursesByCategory($slug);
        return view('courses.category', $data);
    }

    public function allcourses(Request $request)
    {
        $courses = $this->service->searchCourses($request);
        return view('courses.allCourses', compact('courses'));
    }

    public function show($id)
    {
        $course = $this->service->getCourse($id);
        return view('courses.show', compact('course'));
    }

    public function myCourses()
    {
        $courses = $this->service->getUserCourses(auth()->user());
        return view('courses.mycourses', compact('courses'));
    }

    public function watch($id)
    {
        $course = $this->service->getWatchableCourse(auth()->user(), $id);
        return view('courses.watch', compact('course'));
    }

    public function unsubscribe(Course $course)
    {
        $user = auth()->user();
        $this->service->unsubscribeUserFromCourse($user, $course);

        return redirect()->route('courses.mycourses')->with('success', 'You have unsubscribed from the course.');
    }
}
