<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LessonsRequest;
use App\Http\Resources\LessonsResource;
use App\Models\DTO\Lessons;

class LessonsController extends BaseController
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
            LessonsResource::collection(Lessons::all()),
            LIST_LESSON_MSG
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonsRequest $request)
    {
        //
        $lessons = new Lessons();

        $lessons->fill($request->all());

        if (!$lessons->save()) {
            return $this->sendError(SAVE_LESSON_FAIL_MSG);
        }

        return $this->sendResponse(
            new LessonsResource($lessons),
            SAVE_LESSON_SUCCESS_MSG
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
        $lesson = Lessons::find($id);

        if (!$lesson) {
            return $this->sendError(LESSON_NOT_FOUND_MSG);
        }

        return $this->sendResponse($lesson, LESSON_DETAIL_MSG);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LessonsRequest $request, $id)
    {
        //
        $lessons = Lessons::find($id);

        if (!$lessons) {
            return $this->sendError(LESSON_NOT_FOUND_MSG);
        }

        $lessons->fill($request->all());

        $lessons->save();

        return $this->sendResponse(
            new LessonsResource($lessons),
            SAVE_LESSON_SUCCESS_MSG
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
        $lesson = Lessons::find($id);

        if (!$lesson) {
            return $this->sendError(LESSON_NOT_FOUND_MSG);
        }

        if (!$lesson->delete()) {
            return $this->sendError(DELETE_LESSON_FAIL_MSG);
        }

        return $this->sendResponse(
            $lesson,
            DELETE_LESSON_SUCCESS_MSG
        );
    }
}
