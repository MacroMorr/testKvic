<?php

namespace App\Services\Api;

use App\Models\Task;
use Illuminate\Support\Collection;

class TaskService
{
    /**
     * @param $status
     * @param $createdAt
     * @return Collection
     */
    public function taskList($status,$createdAt): Collection
    {
        $query = Task::query();

        try {
            if ($status) {
                $query->where('status', $status);
            }

        } catch (\Exception $e) {
            info($e->getMessage());
        }

        try {
            if ($createdAt) {
                $query->whereDate('created_at', $createdAt);
            }

        } catch (\Exception $e) {
            info($e->getMessage());
        }

        return $query->get();
    }
}
