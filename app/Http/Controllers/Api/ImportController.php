<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DTO\Exercise;
use App\Models\DTO\Nodes;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    const LIMIT_EXERCISE = 10;

    //
    public function exercise(Request $request)
    {
        $content = $request->file('exercies')->get();
        $node_id = $request->get('node_id', null);

        $parent_node = Nodes::byId($node_id)->first();

        $lines = explode(PHP_EOL, $content);
        if (!count($lines) || !$parent_node) {
            return 'fail';
        }

        array_shift($lines);

        // dd(array_chunk($lines, self::LIMIT_EXERCISE));
        foreach(array_chunk($lines, self::LIMIT_EXERCISE) as $index => $chunk_exercies) {
            $exercies = [];
            $offset = $index + 1;

            $node = new Nodes();
            $node->name = "Lesson {$offset}";
            $node->path = "{$parent_node->path}.{$parent_node->id}";
            $node->levels = $parent_node->levels + 1;

            $node->save();

            foreach($chunk_exercies as $item) {
                $data = explode(',', $item);

                $exercies[] = [
                    'original' => $data[0],
                    'romaji'   => $data[1],
                    'mean'     => $data[2],
                    'node_id'  => $node->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            Exercise::insert($exercies);
        }

        return "good";
    }
}
