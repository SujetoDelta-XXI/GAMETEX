<?php

namespace App\Services;

use Discord\Discord;

class DiscordService
{
    protected $discord;

    public function __construct()
    {
        $this->discord = new Discord([
            'token' => env('DISCORD_BOT_TOKEN'),
        ]);
    }

    /**
     * Crea un canal en un servidor específico.
     *
     * @param string $guildId ID del servidor donde se creará el canal.
     * @param string $channelName Nombre del canal a crear.
     */
    public function crearCanal($guildId, $channelName)
    {
        // Verificar que el ID del servidor sea válido
        if (!$guildId) {
            echo "El ID del servidor es requerido." . PHP_EOL;
            return;
        }

        // Obtener el servidor (guild) desde la API
        $this->discord->guilds->fetch($guildId)->then(
            function ($guild) use ($channelName) {
                // Crear el canal dentro del servidor
                $guild->channels->create([
                    'name' => $channelName,
                    'type' => 0, // Texto
                ])->then(
                    function ($channel) {
                        echo "Canal creado: " . $channel->name . PHP_EOL;
                    },
                    function ($error) {
                        echo "Error al crear el canal: " . $error->getMessage() . PHP_EOL;
                    }
                );
            },
            function ($error) {
                echo "Error al obtener el servidor: " . $error->getMessage() . PHP_EOL;
            }
        );
    }
}
