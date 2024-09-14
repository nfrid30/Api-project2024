<?php

namespace App\Http\DTO;

readonly class CommonData
{
    public function toArray():array
    {
        return $this->toSnackCase(json_decode(json_encode($this), true));
    }

    public function toSnackCase(array $camelCaseArray): array {
        $snakeCaseArray = [];
        foreach ($camelCaseArray as $key => $value) {
            $snakeCaseArray[str($key)->snake()->toString()] = $value;
        }

        return $snakeCaseArray;
    }

}
