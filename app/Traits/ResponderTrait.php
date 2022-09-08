<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

trait ResponderTrait{

    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['data' => ['error' => $message, 'code' => $code]], $code);
    }

    protected function paginate(Collection $collection)
    {
        $page = LengthAwarePaginator::resolveCurrentPage();

        $perPage = 15;

        if (request()->has('per_page')) {
            $perPage = (int) request()->per_page;
        }

        $result = $collection->slice(($page - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator($result, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $paginated->appends(request()->all());

        return $paginated;
    }

    protected function showMessage($message, $code = 200)
    {
        return $this->successResponse(['data' => ['message' => $message]], $code);
    }

    protected function filterData(Collection $collection, $transformer)
    {
        foreach (request()->query as $query => $value) {
            $attribute = $transformer::originalAttribute($query);

            if (isset($attribute, $value)) {
                $collection = $collection->where($attribute, $value);
            }
        }

        return $collection;
    }

    protected function sortData(Collection $collection, $transformer)
    {
        if (request()->has('sort_by')) {
            $attribute = $transformer::originalAttribute(request()->sort_by);

            $collection = $collection->sortBy->{$attribute};
        }

        return $collection;
    }

    protected function transformData($data, $transformer)
    {
        return new $transformer($data);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        if ($collection->isEmpty()) {
            return $this->successResponse(['data' => $collection], $code);
        }

        $transformer = $collection->first()->allItems;

        $collection = $this->filterData($collection, $transformer);
        $collection = $this->sortData($collection, $transformer);

        if (request()->per_page > 0) {
            $collection = $this->paginate($collection);
        }

        $collection = $this->transformData($collection, $transformer);

        return $collection;
    }
}