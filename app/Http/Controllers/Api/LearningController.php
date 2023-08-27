<?php

namespace App\Http\Controllers\Api;

use App\Models\DTO\Exercise;
use Illuminate\Http\Request;

class LearningController extends BaseController
{
    //

    // public function processLearning(Request $request)
    // {
    //     $current_question = $request->get('current_question', []);
    //     $is_init          = $request->get('is_init');
    //     $lesson_id        = $request->get('lesson_id');

    //     $total_correct = session()->get(TOTAL_CORRECT, []);

    //     if (
    //         !$is_init &&
    //         ($checked_exercise = Exercise::isCorrect($request->all())) &&
    //         $request->has('answer') &&
    //         $request->has('current_question') &&
    //         !in_array($current_question, $total_correct)
    //     ) {
    //         $total_correct[] = $current_question;
    //     }

    //     $total_question = Exercise::totalQuestionByLesson($lesson_id);

    //     $count_total_correct = count($total_correct);

    //     if ($count_total_correct == $total_question) {
    //         session()->forget(TOTAL_CORRECT);

    //         return $this->sendResponse([
    //             'checked_exercise' => $checked_exercise ?? null,
    //             'is_done'          => true
    //         ], LEARNING_PROCESS_COMPLETED_MSG);
    //     }

    //     session()->put(TOTAL_CORRECT, $total_correct);

    //     $generate_question = Exercise::generateExercise($current_question, $lesson_id);

    //     $data = [
    //         'generate_question'   => $generate_question,
    //         'checked_exercise'    => $checked_exercise ?? null,
    //         'count_total_correct' => $count_total_correct,
    //         'is_done'             => false,
    //     ];

    //     return $this->sendResponse($data, LEARNING_PROCESS_MSG);
    // }

    public function writing(Request $request)
    {
        $current_id = $request->get('current_id', null);
        $is_init    = $request->get('is_init');
        $node_id    = $request->get('node_id');

        $total_correct     = session()->get(TOTAL_WRITING_CORRECT, []);
        $exclude_ids = array_merge($total_correct, (array) $current_id);

        $generate_question = Exercise::generateExercise($exclude_ids, $node_id);
        $total_question    = Exercise::totalQuestionByNode($node_id);

        if ($is_init) {
            session()->put(TOTAL_WRITING_CORRECT, []);
            return [
                'generate_question' => $generate_question,
                'total_corect'      => 0,
                'is_done'           => false,
                'checked_exercise'  => false,
            ];
        }

        $checked_exercise = Exercise::isCorrect($request->all());

        if (!$checked_exercise) {
            return $this->sendResponse([
                'generate_question' => $generate_question,
                'total_corect'      => $total_correct,
                'is_done'           => false,
                'checked_exercise'  => false,
            ]);
        }

        if ($current_id) {
            $total_correct[] = $current_id;
            $total_correct = array_unique($total_correct);
        }

        session()->put(TOTAL_WRITING_CORRECT, $total_correct);

        if (count($total_correct) == $total_question) {

            session()->put(TOTAL_WRITING_CORRECT, []);

            return $this->sendResponse([
                'checked_exercise' => $checked_exercise ?? null,
                'is_done'          => true
            ], LEARNING_PROCESS_COMPLETED_MSG);
        }

        return $this->sendResponse([
            'generate_question' => $generate_question,
            'total_corect'      => $total_correct,
            'is_done'           => false,
            'checked_exercise'  => true,
        ]);
    }
}
