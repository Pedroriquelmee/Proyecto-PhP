<?php

declare(strict_types=1);

class NextMovie
{
    public function __construct(
        private string $title,
        private int $days_until,
        private string $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview,
        private string $following_poster_url, // Nuevo atributo para el cartel de la producción siguiente
        private int $following_days_until, // Días hasta la producción siguiente
        private string $following_release_date, // Fecha de lanzamiento de la producción siguiente
        private string $following_overview // Resumen de la producción siguiente
    ) {
    }

    public function get_until_message(): string
    {
        $days = $this->days_until;

        return match (true) {
            $days === 0    => "¡Hoy se estrena! 🥳",
            $days === 1    => "Mañana se estrena 🚀",
            $days < 7      => "Esta semana se estrena 🫢",
            $days < 30     => "Este mes se estrena... 🗓️",
            default        => "$days días hasta el estreno 🗓️",
        };
    }

    public static function fetch_and_create_movie(string $api_url): NextMovie
    {
        $result = file_get_contents($api_url); 
        $data = json_decode($result, true);

        return new self(
            $data["title"],
            $data["days_until"],
            $data["following_production"]['title'] ?? "Desconocido",
            $data["release_date"],
            $data["poster_url"],
            $data["overview"],
            $data["following_production"]['poster_url'] ?? "Desconocido", // Agregar el cartel de la producción siguiente
            $data["following_production"]['days_until'] ?? 0, // Días hasta la producción siguiente
            $data["following_production"]['release_date'] ?? "Desconocido", // Fecha de lanzamiento de la producción siguiente
            $data["following_production"]['overview'] ?? "Desconocido" // Resumen de la producción siguiente
        );
    }

    public function get_data()
    {
        return get_object_vars($this); // Esto incluirá el nuevo atributo
    }

    // Métodos para obtener la información de la producción siguiente
    public function get_following_days_until(): int
    {
        return $this->following_days_until;
    }

    public function get_following_release_date(): string
    {
        return $this->following_release_date;
    }

    public function get_following_overview(): string
    {
        return $this->following_overview;
    }
}