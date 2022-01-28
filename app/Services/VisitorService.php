<?php

namespace App\Services;

use CyrildeWit\EloquentViewable\Visitor;
use Illuminate\Support\Facades\Cache;

class VisitorService extends Visitor
{
    /**
     * The visitor unique id
     *
     * @var string
     */
    public string $uniqueId;

    /**
     * Get the unique ID that represent's the visitor.
     *
     * @return string
     */
    public function id(): string
    {
        $uniqueId = $this->uniqueId ?: $this->request()->get('visitor_hash', $this->request()->header('VISITOR_HASH'));

        if (!empty($uniqueId)) {
            return $uniqueId;
        }

        return parent::id();
    }

    /**
     * Set the visitor unique id.
     *
     * @param $uniqueId
     *
     * @return VisitorService
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;

        return $this;
    }

    public function setViewsCount($modelId,$model)
    {


        $visitor = request()->ip();

        if (!empty($visitor) && !empty($model) && !empty($modelId)) {
            $hash = md5($visitor . $model . $modelId);
            $cached = Cache::get('views_count', []);

            if (empty($cached[$hash])) {
                $cached[$hash] = [
                    'viewable_type' => $model,
                    'viewable_id' => $modelId,
                    'visitor' => $visitor,
                    'viewed_at' => now(),
                ];

                Cache::put('views_count', $cached, now()->addHour());
            }
        }

    }
}
