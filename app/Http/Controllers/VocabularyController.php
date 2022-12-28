<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Vocabulary;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    protected $view_data = null;

    public function __construct()
    {
        $this->view_data = [];
    }

    public function index($lesson_id)
    {
        $lesson = Lesson::byId($lesson_id)->first();

        $vocabularies = Vocabulary::byLessonId($lesson_id)->paginate(DEFAULT_LIMIT_PAGINATE);

        $this->view_data['lesson']       = $lesson;
        $this->view_data['vocabularies'] = $vocabularies;

        return view('vocabulary.list', $this->view_data);
    }

    public function create($lesson_id)
    {
        $this->view_data['lesson_id'] = $lesson_id;

        return view('vocabulary.create', $this->view_data);
    }

    public function store(Request $request, $lesson_id)
    {
        $vocabulary = new Vocabulary();
        $vocabulary->lesson_id = $lesson_id;

        $vocabulary->fill($request->all());

        if ($vocabulary->save()) {
            return redirect()->route('lesson-vocabulary.index', ['lesson_id' => $lesson_id])->with(SUCCESS_FLAG, MSG_SAVE_VOCABULARY_SUCCESS);
        }

        return redirect()->route('lesson-vocabulary.index', ['lesson_id' => $lesson_id])->with(FAIL_FLAG, MSG_SAVE_VOCABULARY_FAIL);
    }

    public function edit($lesson_id, $id)
    {
        $vocabulary = Vocabulary::byId($id)->first();

        $this->view_data['lesson_id']  = $lesson_id;
        $this->view_data['id']         = $id;
        $this->view_data['vocabulary'] = $vocabulary;


        return view('vocabulary.edit', $this->view_data);
    }

    public function update(Request $request, $lesson_id, $id)
    {
        $vocabulary = Vocabulary::byId($id)->first();

        if ($vocabulary) {

            $vocabulary->fill($request->all());

            if ($vocabulary->save()) {
                return redirect()->route('lesson-vocabulary.index', ['lesson_id' => $lesson_id])->with(SUCCESS_FLAG, MSG_SAVE_VOCABULARY_SUCCESS);
            }
        }

        return redirect()->route('lesson-vocabulary.index', ['lesson_id' => $lesson_id])->with(FAIL_FLAG, MSG_SAVE_VOCABULARY_FAIL);
    }
}
