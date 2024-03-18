<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    /**
     * Создание новой задачи
     * @param $request
     * @return Task|null
     */
    public function storeTask($request): ?Task
    {
        try {
            $task = new Task();
            $task->name = $request->name;
            $task->description = $request->description;
            $task->status = $request->status;
            $task->save();

            return $task;

        } catch (\Exception $e) {

            info($e->getMessage());
        }

        return null;
    }

    /**
     * Обновление существующей задачи
     * @param $request
     * @param $id
     * @return Task|null
     */
    public function updateTask($request, $id): ?Task
    {
        try {
            $task = Task::find($id);
            $task->name = $request->name;
            $task->description = $request->description;
            $task->status = $request->status;
            $task->update();

            return $task;

        } catch (\Exception $e) {

            info($e->getMessage());
        }

        return null;
    }

    /**
     * Удаление существующей задачи
     * @param $id
     * @return Task|null
     */
    public function deleteTask($id): ?Task
    {
        try {
            $task = Task::find($id);
            $task->delete();

            return $task;

        } catch (\Exception $e) {

            info($e->getMessage());

        }

        return null;
    }
}
