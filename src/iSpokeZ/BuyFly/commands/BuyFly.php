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
use onebone\economyapi\EconomyAPI;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat as C;

use iSpokeZ\BuyFly\Main;
use iSpokeZ\BuyFly\forms\Form;
use iSpokeZ\BuyFly\forms\SimpleForm;
use iSpokeZ\BuyFly\forms\CustomForm;
use iSpokeZ\BuyFly\forms\ModalForm;
use iSpokeZ\BuyFly\forms\FormAPI;

use pocketmine\level\sound\AnvilUseSound;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class BuyFly extends Command {

    private $plugin;

    /*
     * Constructor
     */
    public function __construct(Main $plugin){
        parent::__construct("fly", "Buyfly command.", "/fly");
        $this->plugin = $plugin;
    }

    /*
     * Command
     */
    public function execute(CommandSender $sender, string $label, array $args){
        $form = new SimpleForm (function (Player $player, $data){

            if($data === null){
                return;
            }
            switch($data){
                case 0:
                    if(!$player->hasPermission("buyfly.use")){
                        $player->sendMessage(C::RED . "Paralı Uçuş Özelliğini Kullanmak Için Yetkilendirilmemişsin");
                    }else{
                        if(EconomyAPI::getInstance()->myMoney($player) >= 1000){
                            EconomyAPI::getInstance()->reduceMoney($player, 1000);
                            $player->setAllowFlight(true);
                            $player->setFlying(true);
                            $player->getLevel()->addSound(new AnvilUseSound($player));
                            $player->sendMessage("§8» §aParalı uçuş modu aktif.\n§cSunucudan çıktığın takdirde uçma özelliği devre dışı kalacaktır");
                        }else{
                            $player->sendMessage("§8» §cParan Yetersiz");
                        }
                    }
                    break;
                case 1:
                    break;
            }
        });
        $player = $sender->getPlayer();
        $name = $player->getName();
        $form->setTitle("BuyFly Menu");
        $form->setContent(C::GRAY . "BuyFly Menüsüne Hoşgeldin $name.\n\n'1.000TL' ücret karşılığında uçmak ister misin? aşağıdaki §a'Satın Al' §7butonuna basarak uçma özelliğine sahip olabilirsin.");
        $form->addButton("§aSatın Al");
        $form->addButton("§cAyrıl");
        $form->sendToPlayer($player);
    }
}