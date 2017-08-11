<?php

namespace HimbeersaftLP\DefaultLevelPM;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class main extends PluginBase implements Listener{
     
     public function onEnable(){
          $this->getServer()->getPluginManager()->registerEvents($this,$this);
     }

     public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
          switch($command->getName()){
               case "defaultlevel":
                    if(!isset($args[0])) return false;
                    $level = $this->getServer()->getLevelByName($args[0]);
                    if($level === null){
                         $sender->sendMessage("Level not found! Please be aware that this command is case sensitive.");
                    }else{
                         $this->getServer()->setDefaultLevel($level);
                         $sender->sendMessage("Set the default level successfully!");
                    }
               break;
          }
          return true;
     }
}
