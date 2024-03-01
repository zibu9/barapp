<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class PlanService extends Service
{
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $plan = Plan::create($data);
            $plan->features()->attach($data['features']);

            return $plan;
        });
    }
}
