<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeasurementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'm_title' => $this->m_title,
            'slug' => $this->slug,
            'm_description' => $this->m_description,
            'm_date' => $this->m_date,
            'measurement_preference' => $this->measurement_preference,
            'image' => $this->user_meas_image,
            'image_extension' => $this->ext,
            'hips' => $this->hips,
            'waist' => $this->waist,
            'waist_front' => $this->waist_front,
            'bust' => $this->bust,
            'bust_front' => $this->bust_front,
            'bust_back' => $this->bust_back,
            'waist_to_underarm' => $this->waist_to_underarm,
            'armhole_depth' => $this->armhole_depth,
            'wrist_circumference' => $this->wrist_circumference,
            'forearm_circumference' => $this->forearm_circumference,
            'upperarm_circumference' => $this->upperarm_circumference,
            'shoulder_circumference' => $this->shoulder_circumference,
            'wrist_to_underarm' => $this->wrist_to_underarm,
            'wrist_to_elbow' => $this->wrist_to_elbow,
            'elbow_to_underarm' => $this->elbow_to_underarm,
            'wrist_to_top_of_shoulder' => $this->wrist_to_top_of_shoulder,
            'depth_of_neck' => $this->depth_of_neck,
            'neck_width' => $this->neck_width,
            'neck_circumference' => $this->neck_circumference,
            'neck_to_shoulder' => $this->neck_to_shoulder,
            'shoulder_to_shoulder' => $this->shoulder_to_shoulder,
            'created_at' => $this->created_at
        ];
    }
}
