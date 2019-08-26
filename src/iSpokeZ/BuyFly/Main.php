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

namespace iSpokeZ\BuyFly;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;

use iSpokeZ\BuyFly\commands\BuyFly;
use iSpokeZ\BuyFly\commands\info;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase {

    /*
     * onEnable
     */
    public function onEnable(){
        $this->getLogger()->info("\n§8╔══════════════║ §aBuyFly§8 ║ ══════════════\n║ §8» §ePlugin Coding by iSpokeZ §8\n║ §8» §ePlugin Language Turkish §8\n║ §8» §ePlugin Version 1.0 §8\n╚══════════════════════════════════════════");
        $this->getServer()->getCommandMap()->register("fly", new BuyFly($this));
        $this->getServer()->getCommandMap()->register("bf", new info($this));
    }
}