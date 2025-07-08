<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseService
{
    /**
     * Return paginated list of all courses (default: 6 per page)
     */
    public function getAllCourses(int $perPage = 6)
    {
        return Course::orderBy('title')->paginate($perPage);
    }

    /**
     * Return courses by category (optional: paginate if needed)
     */
    public function getCoursesByCategory(string $slug, int $perPage = 6)
    {
        $courses = Course::where('category', $slug)->orderBy('title')->paginate($perPage);
        $categoryName = ucwords(str_replace('-', ' ', $slug));
        return compact('courses', 'categoryName');
    }

    /**
     * Return search results with pagination
     */
    public function searchCourses(Request $request, int $perPage = 6)
    {
        $query = Course::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        return $query->orderBy('title')->paginate($perPage)->withQueryString();
        // withQueryString keeps search term in URL when paginating
    }

    /**
     * Get single course by ID
     */
    public function getCourse($id)
    {
        return Course::findOrFail($id);
    }

    /**
     * Return user’s subscribed courses (can add pagination if needed)
     */
    public function getUserCourses($user, int $perPage = 9)
    {
        return $user->subscribedCourses()->orderBy('title')->paginate($perPage);
    }

    /**
     * Get a single course if the user is subscribed
     */
    public function getWatchableCourse($user, $id ,int $perPage = 9)
    {
        return $user->subscribedCourses()->findOrFail($id);
    }
    public function unsubscribeUserFromCourse($user, Course $course)
    {
        $user->subscribedCourses()->detach($course->id);
        return true;
    }
}
