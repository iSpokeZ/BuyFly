<?php

/*
  _  _____             _        ______
 (_)/ ____|           | |      |___  /
  _| (___  _ __   ___ | | _____   / /
 | |\___ \| '_ \ / _ \| |/ / _ \ / /
 | |____) | |_) | (_) |   <  __// /__
 |_|_____/| .__/ \___/|_|\_\___/_____|
          | |
          |_|
*/

namespace iSpokeZ\BuyFly\commands;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

use iSpokeZ\BuyFly\Main;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class info extends Command {

    /*
     * Constructor
     */
    public function __construct(Main $plugin){
        parent::__construct("bf", "BuyFly info command.", "/bf");
        $this->plugin = $plugin;
    }

    /*
     * Command
     */
    public function execute(CommandSender $sender, string $label, array $args){
        $player = $sender->getPlayer();

        $player->sendMessage("§8» §eBuyFly Version 1.0\n§8» §eYouTube: iSpokeZ");
    }
}
