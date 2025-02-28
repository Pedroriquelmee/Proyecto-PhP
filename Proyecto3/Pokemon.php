<?php
class Pokemon
{
    public $name;
    public $height;
    public $weight;
    public $types;
    public $image;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->height = $data['height'];
        $this->weight = $data['weight'];
        $this->types = array_map(function ($type) {
            return $type['type']['name'];
        }, $data['types']);
        $this->image = $data['sprites']['front_default'];
    }

    public function getInfo()
    {
        return [
            'name' => ucfirst($this->name),
            'height' => $this->height,
            'weight' => $this->weight,
            'types' => implode(', ', $this->types),
            'image' => $this->image
        ];
    }
}
