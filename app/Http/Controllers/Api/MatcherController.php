<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class MatcherController extends AbstractBasicController
{
    /**
     * @param Request $request
     *
     * @return object
     */
    public function create(Request $request)
    {
        return $this->save(function ($model) use ($request) {
            $model->fill([
                'p1_id'         => $request->p1_id,
                'p2_id'         => $request->p2_id,
                'p1_score'      => $request->p1_score,
                'p2_score'      => $request->p2_score,
                'video_link'    => $request->video_link,
                'note'          => $request->note,
            ]);

            return $model;
        });
    }

    /**
     * @param Request $request
     * @param int $id
     *
     * @return object
     */
    public function updateAction(Request $request, int $id)
    {
        return $this->update(function ($model) use ($request, $id) {
            $model = $model::find($id);
            $model->fill([
                'p1_id'         => $request->p1_id,
                'p2_id'         => $request->p2_id,
                'p1_score'      => $request->p1_score,
                'p2_score'      => $request->p2_score,
                'video_link'    => $request->video_link,
                'note'          => $request->note,
            ]);

            return $model;
        });
    }

    public function deleteAction(Request $request, int $id)
    {
        return $this->delete($id, function ($model) use ($request, $id) {
            return $model::find($id);
        });
    }
}
