<?php

namespace App\Services;

use App\Models\Label;
use Illuminate\Support\Facades\Log;

class LabelService
{
    public function createIfNotExists(string $labelName)
    {
        return Label::firstOrCreate(
            ['name' => $labelName], // Condition to check for existence
            ['name' => $labelName] // Attributes to set when creating a new record
        );
    }

    public function mountLabelsData(array $labels): array
    {
        $labelsList = [];
        foreach ($labels as $label) {
            $labelsList[] = $label['name'];
        }

        return $labelsList;
    }

    public function deleteAll(): void
    {
        try {
            Label::query()->delete();
            Log::info('All labels have been successfully deleted.');
        } catch (\Exception $e) {
            Log::error('Error deleting all labels: ' . $e->getMessage());
        }
    }
}
