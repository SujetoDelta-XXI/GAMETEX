<?php

namespace App\Console\Commands;

use Discord\Discord;
use Discord\WebSockets\Event;
use Illuminate\Console\Command;

class RunDiscordBot extends Command
{
    protected $signature = 'discord:run';
    protected $description = 'Run the Discord bot';

    public function handle()
    {
        $discord = new Discord([
            'token' => env('DISCORD_BOT_TOKEN'),
        ]);

        $discord->on('ready', function ($discord) {
            echo "Bot está activo\n";

            $discord->on(Event::MESSAGE_CREATE, function ($message) {
                if ($message->content === '!ping') {
                    $message->reply('Pong!');
                }
            });
        });

        $discord->run();
    }
}
