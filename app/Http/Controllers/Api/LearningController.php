<?php

namespace App\Http\Controllers\Api;

use App\Models\DTO\Exercise;
use Illuminate\Http\Request;

class LearningController extends BaseController
{

    public function writing(Request $request)
    {
        $current_id = $request->get('current_id', null);
        $is_init    = $request->get('is_init');
        $node_id    = $request->get('node_id');

        $total_correct = session()->get(TOTAL_WRITING_CORRECT, []);
        $exclude_ids   = array_merge($total_correct, (array) $current_id);

        $question       = Exercise::generateExercise($exclude_ids, $node_id);
        $total_question = Exercise::totalQuestionByNode($node_id);
        $is_init = filter_var($is_init, FILTER_VALIDATE_BOOLEAN);

        if ($is_init) {
            session()->put(TOTAL_WRITING_CORRECT, []);
            return $this->sendResponse([
                'question'        => $question,
                'total_corect'    => 0,
                'isDone'          => true,
                'checkedExercise' => null,
                'oldExercise'     => null,
            ]);
        }

        $checked_exercise = Exercise::isCorrect($request->all());
        $old_exercise = Exercise::byId($current_id)->first();

        if (!$checked_exercise) {
            return $this->sendResponse([
                'question'        => $question,
                'total_corect'    => $total_correct,
                'isDone'          => false,
                'checkedExercise' => false,
                'oldExercise'     => $old_exercise,
            ]);
        }

        if ($current_id) {
            $total_correct[] = $current_id;
            $total_correct   = array_unique($total_correct);
        }

        session()->put(TOTAL_WRITING_CORRECT, $total_correct);

        if (count($total_correct) == $total_question) {

            session()->put(TOTAL_WRITING_CORRECT, []);

            return $this->sendResponse([
                'checkedExercise' => $checked_exercise ?? null,
                'isDone'          => true,
                'oldExercise'     => $old_exercise,
            ], LEARNING_PROCESS_COMPLETED_MSG);
        }

        return $this->sendResponse([
            'question'        => $question,
            'total_corect'    => $total_correct,
            'isDone'          => false,
            'checkedExercise' => true,
            'oldExercise'     => $old_exercise,
        ]);
    }
}
