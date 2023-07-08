<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ExerciseRequest;
use App\Http\Resources\ExerciseResource;
use App\Models\DTO\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->sendResponse(
            Exercise::all(),
            LIST_EXERCISE_MGS
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseRequest $request)
    {
        //
        $exercise = new Exercise();

        $exercise->fill($request->all());

        if (!$exercise->save()) {
            return $this->sendError(SAVE_EXERCISE_FAIL_MSG);
        }

        return $this->sendResponse(
            new ExerciseResource($exercise),
            SAVE_EXERCISE_SUCCESS_MSG
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return $this->sendError(EXERCISE_NOT_FOUND_MSG);
        }

        return $this->sendResponse(
            new ExerciseResource($exercise),
            EXERCISE_DETAIL_MSG
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExerciseRequest $request, $id)
    {
        //
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return $this->sendError(EXERCISE_NOT_FOUND_MSG);
        }

        $exercise->fill($request->all());

        if (!$exercise->save()) {
            return $this->sendError(SAVE_EXERCISE_FAIL_MSG);
        }

        return $this->sendResponse(
            new ExerciseResource($exercise),
            SAVE_EXERCISE_SUCCESS_MSG
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return $this->sendError(EXERCISE_NOT_FOUND_MSG);
        }

        if (!$exercise->delete()) {
            return $this->sendError(DELETE_EXERCISE_FAIL_MSG);
        }

        return $this->sendResponse(
            new ExerciseResource($exercise),
            DELETE_EXERCISE_SUCCESS_MSG
        );
    }
}
