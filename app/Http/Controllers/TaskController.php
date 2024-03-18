<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\View\View;

class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    /**
     * Вывод страницы с задачами
     * @return View
     */
    public function index(): View
    {
        $tasks = Task::paginate(15);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Страница создания задачи
     * @return View
     */
    public function create(): View
    {
        return view('tasks.create');
    }

    /**
     * Запись данных с формы в таблицу
     * @param StoreTaskRequest $request
     * @return mixed
     */
    public function store(StoreTaskRequest $request): mixed
    {
        $task = $this->taskService->storeTask($request);
        return redirect()->route('tasks.index')->withSuccess("Задача '$task->name' создана");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Страница редактирования задачи
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Обновить данные задачи
     * @param UpdateTaskRequest $request
     * @param string $id
     * @return mixed
     */
    public function update(UpdateTaskRequest $request, string $id): mixed
    {
        $task = $this->taskService->updateTask($request, $id);
        return redirect()->route('tasks.index')->withSuccess("Задача '$task->name' обновлена");
    }

    /**
     * Удаление задачи
     * @param string $id
     * @return mixed
     */
    public function destroy(string $id): mixed
    {
        $task = $this->taskService->deleteTask($id);
        return redirect()->route('tasks.index')->withSuccess("Задача '$task->name' удалена");
    }
}
