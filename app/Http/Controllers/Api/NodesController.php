<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\NodesRequest;
use App\Http\Resources\DetailNodesResource;
use App\Http\Resources\NodesResource;
use App\Models\DTO\Nodes;
use Illuminate\Http\Request;

class NodesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(
            NodesResource::collection( Nodes::simple()->forRoot()->get()),
            LIST_NODES_MSG
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NodesRequest $request)
    {
        $node = new Nodes();

        $node->fill($request->all());

        $node->user_id = auth()->user()->id;

        if (!$node->save()) {
            return $this->sendError(SAVE_NODES_FAIL_MSG);
        }

        return $this->sendResponse(
            new DetailNodesResource($node),
            SAVE_NODE_SUCCESS_MSG
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
        return $this->sendResponse(
            new DetailNodesResource(Nodes::find($id)),
            DETAIL_NODES_MSG
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NodesRequest $request, $id)
    {
        $node = Nodes::find($id);

        if (!$node) {
            return $this->sendError(NODE_NOT_FOUND_MSG);
        }

        $node->fill($request->all());

        $node->user_id = auth()->user()->id;

        if (!$node->save()) {
            return $this->sendError(SAVE_NODES_FAIL_MSG);
        }

        return $this->sendResponse(
            new DetailNodesResource($node),
            SAVE_NODE_SUCCESS_MSG
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
        $node = Nodes::find($id);

        if (!$node) {
            return $this->sendError(NODE_NOT_FOUND_MSG);
        }

        if (!$node->delete()) {
            return $this->sendError(DELETE_NODE_FAIL_MSG);
        }

        return $this->sendResponse(
            new DetailNodesResource($node),
            DELETE_NODE_SUCCESS_MSG
        );
    }
}
