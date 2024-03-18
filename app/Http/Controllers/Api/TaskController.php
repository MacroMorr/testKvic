<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Services\Api\TaskService;
use Illuminate\Http\Request;

class TaskController extends  Controller
{
    private TaskService $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskService();
    }

    /**
     * Отображения списка всех задач с возможной фильтрацией
     * @param StoreTaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $status = $request->query('status');
        $createdAt = $request->query('created_at');

        $tasks = $this->taskRepository->taskList($status, $createdAt);

        return response()->json($tasks);
    }

    /**
     * Создание новой задачи
     * @param StoreTaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTaskRequest $request): \Illuminate\Http\JsonResponse
    {
        $task = Task::create($request->all());
        return response()->json($task, 201);

    }

    /**
     * Отображение конкретной задачи
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    /**
     * Обновление существующей задачи
     * @param UpdateTaskRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTaskRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json($task, 200);
    }

    /**
     * Удаление существующей записи
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id):  \Illuminate\Http\JsonResponse
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }

}
