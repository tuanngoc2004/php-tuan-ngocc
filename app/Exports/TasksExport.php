<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromCollection, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Database\Query\Builder
    */
    public function collection()
    {
        $tasks = Task::all();

        $tasks->transform(function ($task) {
            $task->status = $this->getStatusText($task->status);
            $task->priority = $this->getPriorityText($task->priority);

            $task->project_name = $task->project->name;
            $task->person_name = $task->person->full_name;

            return $task->only([
                'id',
                'project_name',
                'person_name',
                'name',
                'description',
                'start_time',
                'end_time',
                'priority',
                'status',
            ]);
        });

        return $tasks;
    }


    private function getStatusText($status)
    {
        switch ($status) {
            case 1:
                return 'New';
            case 2:
                return 'In Progress';
            case 3:
                return 'Completed';
            case 4:
                return 'On Hold';
            default:
                return '';
        }
    }


    private function getPriorityText($priority)
    {
        switch ($priority) {
            case 1:
                return 'High';
            case 2:
                return 'Medium';
            case 3:
                return 'Low';
            default:
                return '';
        }
    }


    public function headings(): array
    {
        return [
            'ID',
            'Project',
            'Person',
            'Name',
            'Description',
            'Start Time',
            'End Time',
            'Priority',
            'Status',
        ];
    }
}
