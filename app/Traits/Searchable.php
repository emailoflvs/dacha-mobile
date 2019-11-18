<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;


trait Searchable
{
    public function getSearchable()
    {
        if (property_exists($this, 'searchable')) {
            return $this->searchable;
        } else {
            return DB::connection()->getSchemaBuilder()->getColumnListing($this->table);
        }
    }
}
