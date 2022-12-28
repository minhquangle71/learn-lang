<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $view_data = null;

    //
    public function __construct()
    {
        $this->view_data = collect();
    }

    public function index()
    {
        $param = collect();

        $param->lang = DEFAULT_LANGE;

        $lessons = Lesson::forList($param)->get();

        // dd($lessons);
        $this->view_data['lessons'] = $lessons;

        return view('lesson.list', $this->view_data);
    }

    public function create()
    {
        return view('lesson.create');
    }

    public function store(Request $request)
    {
        $lesson = new Lesson();

        $lesson->fill($request->all());

        if ($lesson->save()) {
            return redirect()->route('lesson.index')->with(SUCCESS_FLAG, MSG_SAVE_LESSON_SUCCESS);
        }

        return redirect()->route('lesson.index')->with(FAIL_FLAG, MSG_SAVE_LESSON_FAIL);
    }

    public function edit($id)
    {
        $lesson = Lesson::byId($id)->first();

        if ($lesson) {

            $this->view_data['lesson'] = $lesson;
            return view('lesson.edit', $this->view_data);
        }

        return redirect()->route('lesson.index')->with(FAIL_FLAG, MSG_NOT_FOUND_LESSON);
    }
}
