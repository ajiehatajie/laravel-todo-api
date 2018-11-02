<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Illuminate\Http\Resources\Json\JsonResource;


class Tasks extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       //return parent::toArray($request);

       return [
        'id' => $this->id,
        'task' => $this->name,
        'task_description' => $this->desc
    ];



    }
}
