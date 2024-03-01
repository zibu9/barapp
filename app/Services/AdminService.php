<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class AdminService extends Service
{
    public function createPlan(array $data)
    {
        return DB::transaction(function () use ($data) {
            $plan = Plan::create($data);
            $plan->features()->attach($data['features']);

            return $plan;
        });
    }
}
