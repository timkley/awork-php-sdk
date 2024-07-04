<?php

namespace Awork\Collections;

use Awork\Model\Task;
use Illuminate\Support\Collection;

class TaskCollection extends Collection
{
    /** @var Task[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new Task($item), $items));
    }

    public function grouped(): static
    {
        $subtasks = $this->filter(fn (Task $task) => $task->isSubtask());

        $subtasks->each(function (Task $subtask, int $key) {
            /** @var Task $parentTask */
            $parentTask = $this->first(fn (Task $task) => $task->getId() === $subtask->getParentId());
            if (! $parentTask) {
                return;
            }

            $parentTask->addSubtask($subtask);
            $this->forget($key);
        });

        return $this;
    }
}
