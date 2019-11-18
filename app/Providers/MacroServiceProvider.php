<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Builder::macro('search', function ($attributes, $default = null) {
            $attributes = Arr::wrap($attributes);
            $columns = $this->getModel()->getSearchable();

            if (null === $default) {
                $fields = array_intersect_key($attributes, array_flip($columns));
            } else {
                $fields = array_fill_keys($columns, $default);
                $fields = array_merge($fields, array_intersect_key($attributes, $fields));
            }

            collect($fields)->each(function ($value, $key) {
                $this->orWhereLike($key, $value);
            });

            return $this;
        });

        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                }
            });

            return $this;
        });

        Builder::macro('orWhereLike', function ($attributes, string $searchTerm) {
            $this->orWhere(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                }
            });

            return $this;
        });
    }
}
