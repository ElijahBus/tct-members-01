<?php

namespace Database\Utilities;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait EnableTruncate
{

    private function truncate(array $tables): static
    {
        collect($tables)->each(function ($tableName) {
            if (!is_string($tableName)) return;

            if (!DB::table($tableName)->exists()) return;

            DB::table($tableName)->truncate();
        });

        return $this;
    }

    private function enableTruncate(): static
    {
        Schema::disableForeignKeyConstraints();

        return $this;
    }

    private function disableTruncate(): static
    {
        Schema::enableForeignKeyConstraints();

        return $this;
    }

}
