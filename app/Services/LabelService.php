<?php

namespace App\Services;

use App\Models\Label;

class LabelService
{
    public function createIfNotExists(string $labelName)
    {
        return Label::firstOrCreate(
            ['name' => $labelName],
            ['name' => $labelName]
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
        Label::query()->delete();
    }
}
