<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Lesson;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ContestController extends Controller
{
    protected $view_data;

    public function __construct()
    {
        $this->view_data = [];
    }

    public function index($lesson_id)
    {

        $lesson = Lesson::byId($lesson_id)->first();

        $this->view_data['lesson'] = $lesson;

        return view('contest.index', $this->view_data);
    }

    public function loadQA(Request $request, $lesson_id)
    {

        $vocabularies_idx = Vocabulary::byLessonId($lesson_id)->pluck('id')->toArray();

        $success_id = $request->get(SUCCESS_ID, INIT_QA_IDX);

        $take_confuse     = Helper::array_random($vocabularies_idx, 3);
        $remain_part      = array_diff($vocabularies_idx, $take_confuse);
        $main_question_id = [Helper::array_random($remain_part, 1)];


        if ($success_id != INIT_QA_IDX) {
            $success_ids = Session::get(SESSIOM_QA);

            $total_success = is_array($success_ids) ? count($success_ids) : 0;


            if ($total_success == TOTAL_QUESTION || $total_success == count($vocabularies_idx)) {
                Session::forget(SESSIOM_QA);
                $view = view('contest._partials.done_qa')->render();

                $res = [
                    'view'    => $view,
                    'is_done' => true
                ];

                return response()->json($res);
            } else {
                $success_ids[] = (int) $success_id;
                Session::put(SESSIOM_QA, $success_ids);
            }

            Log::info($remain_part, $success_ids);
            $remain_part = array_diff($remain_part, $success_ids);
            Log::info($remain_part);
            $main_question_id = [Helper::array_random($remain_part, 1)];
            log::info($main_question_id);
            Log::info('-------------------------------------');
        } else {
            Session::forget(SESSIOM_QA);
        }

        $question_idx     = array_merge($take_confuse, $main_question_id);

        $questions     = Vocabulary::generateQuestion($question_idx)->get();
        $question_type = Helper::array_random(QUESTION_TYPE, 1);

        $main_question = $questions->filter(function ($item) use ($main_question_id) {
            return $item->id == $main_question_id[0];
        })->first();
        $questions     = $questions->shuffle();


        $this->view_data['question_type'] = $question_type;
        $this->view_data['questions']     = $questions;
        $this->view_data['main_question'] = $main_question;


        $view = view('contest._partials.qa', $this->view_data)->render();

        $res = [
            'view' => $view,
        ];

        return response()->json($res);
    }
}
