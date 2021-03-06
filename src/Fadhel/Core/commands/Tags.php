<?php

namespace Fadhel\Core\commands;

use Fadhel\Core\Main;
use Fadhel\Core\utils\form\SimpleForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\utils\TextFormat as C;
use Fadhel\Core\listeners\Ranks;

class Tags extends Command
{
    /**
     * @var Main
     */
    private $plugin;

    /**
     * Shop constructor.
     * @param Main $plugin
     */
    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
        parent::__construct("settag", "The tags you own", "", ["st", "set"]);
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return mixed|void
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender instanceof Player) {
            $sender->sendMessage(C::RED . "Run this command in-game!");
            return false;
        }
        $this->Shop($sender);
    }

    /**
     * @param Player $player
     * @param string $tag
     * @param int $price
     */
    public function purchase(Player $player, string $tag, int $price): void
    {
        if ($this->plugin->hasTag($player, $tag)) {

                         $ranks = new Ranks($this->plugin);
                $ranks->setTag($player, $tag);
            } else {
                $player->sendMessage(TextFormat::RED . "You don't have this tag");
            }
}

    public function test(Player $player, string $tag): string
    {
        if ($this->plugin->hasTag($player, $tag)) {

            return "§r§aUNLOCKED";
            } else {
             return "§r§cLOCKED";
            }
}

    /**
     * @param Player $player
     */
    public function Shop(Player $player): void
    {
        $form = new SimpleForm(function (Player $event, $data) {
            $player = $event->getPlayer();
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
                    $this->purchase($player, "Lit", 5000);
                    break;
                case 1:
                    $this->purchase($player, "Enhanced", 5000);
                    break;
                case 2:
                    $this->purchase($player, "MVP", 5000);
                    break;
                case 3:
                    $this->purchase($player, "Ultimate", 5000);
                    break;
                case 4:
                    $this->purchase($player, "Crusader", 5000);
                    break;
                case 5:
                    $this->purchase($player, "Legend", 5000);
                    break;
                case 6:
                    $this->purchase($player, "Injected", 5000);
                    break;
                case 7:
                    $this->purchase($player, "Bustdown", 5000);
                    break;
                case 8:
                    $this->purchase($player, "Pro", 5000);
                    break;
                case 9:
                    $this->purchase($player, "Gangbang", 5000);
                    break;
                case 10:
                    $this->purchase($player, "Overlord", 15000);
                    break;
                case 11:
                    $this->purchase($player, "Hacker", 15000);
                    break;
                case 12:
                    $this->purchase($player, "Chugnub", 15000);
                    break;
                case 13:
                    $this->purchase($player, "Experienced", 15000);
                    break;
                case 14:
                    $this->purchase($player, "King", 15000);
                    break;
                case 15:
                    $this->purchase($player, "Ez", 15000);
                    break;
                case 16:
                    $this->purchase($player, "Pyro", 25000);
                    break;
                case 17:
                    $this->purchase($player, "Gucci", 25000);
                    break;
                case 18:
                    $this->purchase($player, "CornHub", 25000);
                    break;
                case 19:
                    $this->purchase($player, "Elite", 25000);
                    break;
                case 20:
                    $this->purchase($player, "Windows10", 25000);
                    break;
                case 21:
                    $this->purchase($player, "Gangster", 25000);
                    break;
                case 22:
                    $this->purchase($player, "Fresh", 35000);
                    break;
                case 23:
                    $this->purchase($player, "Troll", 35000);
                    break;
                case 24:
                    $this->purchase($player, "AndroidGod", 35000);
                    break;
                case 25:
                    $this->purchase($player, "Emperor", 35000);
                    break;
                case 26:
                    $this->purchase($player, "HitMan", 35000);
                    break;
                case 27:
                    $this->purchase($player, "Mobster", 35000);
                    break;
                case 28:
                    $this->purchase($player, "Salty", 40000);
                    break;
                case 29:
                    $this->purchase($player, "NoU", 40000);
                    break;
                case 30:
                    $this->purchase($player, "IOSGOD", 40000);
                    break;
                case 31:
                    $this->purchase($player, "Pancakes", 40000);
                    break;
                case 32:
                    $this->purchase($player, "Loner", 40000);
                    break;
                case 33:
                    $this->purchase($player, "Horion", 40000);
                    break;
                case 34:
                    $this->purchase($player, "UwU", 45000);
                    break;
                case 35:
                    $this->purchase($player, "Zoomer", 45000);
                    break;
                case 36:
                    $this->purchase($player, "Dirt", 45000);
                    break;
                case 37:
                    $this->purchase($player, "God", 45000);
                    break;
                case 38:
                    $this->purchase($player, "Killer", 45000);
                    break;
            }
        });
        $form->setTitle("§l§bMy Tags Collection");
        $form->addButton("§7[§1L§4I§aT§7]\n" . $this->test($player, "lit"));
        $form->addButton("§7[§1En§9han§bced§7]\n" . $this->test($player, "enhanced"));
        $form->addButton("§7[§2M§aV§2P§7]\n" . $this->test($player, "mvp"));
        $form->addButton("§7[§4U§6l§2t§3i§1m§5a§ft§7e§7]\n" . $this->test($player, "ultimate"));
        $form->addButton("§7[§6Crusader§7]\n" . $this->test($player, "crusader"));
        $form->addButton("§7[§2Legend§7]\n" . $this->test($player, "legend"));
        $form->addButton("§7[§l§5Injected§7]\n" . $this->test($player, "injected"));
        $form->addButton("§7[§l§cBustdown§7]\n" . $this->test($player, "bustdown"));
        $form->addButton("§7[§l§bPro§r§7]\n" . $this->test($player, "pro"));
        $form->addButton("§7[§l§4Gang§cBang§r§7]\n" . $this->test($player, "gangbang"));
        $form->addButton("§7[§5Over§dlord§7]\n" . $this->test($player, "overlord"));
        $form->addButton("§7[§l§4Hacker§r§7]\n" . $this->test($player, "hacker"));
        $form->addButton("§7[§l§2Chug§aNub§r§7]\n" . $this->test($player, "chugnub"));
        $form->addButton("§7[§2Experienced§7]\n" . $this->test($player, "experienced"));
        $form->addButton("§7[§l§aKing§7]\n" . $this->test($player, "king"));
        $form->addButton("§7[§1E§9z§7]\n" . $this->test($player, "ez"));
        $form->addButton("§7[§2P§ry§2r§ro§7]\n" . $this->test($player, "pyro"));
        $form->addButton("§7[§l§4G§2u§4c§2c§4i§r§7]\n" . $this->test($player, "gucci"));
        $form->addButton("§7[§l§6Corn§0Hub§r§7]\n" . $this->test($player, "cornhub"));
        $form->addButton("§7[§2El§aite§7]\n" . $this->test($player, "elite"));
        $form->addButton("§7[§bWindows10§7]\n" . $this->test($player, "windows10"));
        $form->addButton("§7[§l§4Gangster§7]\n" . $this->test($player, "gangster"));
        $form->addButton("§7[§4F§cH§6R§eE§2S§aH§7]\n" . $this->test($player, "fresh"));
        $form->addButton("§7[§l§2Troll§r§7]\n" . $this->test($player, "troll"));
        $form->addButton("§7[§l§8Android§7God§r§7]\n" . $this->test($player, "androidgod"));
        $form->addButton("§7[§l§4Emperor§r§7]\n" . $this->test($player, "emperor"));
        $form->addButton("§7[§l§4Hit§cman§r§7]\n" . $this->test($player, "hitman"));
        $form->addButton("§7[§l§2Mobster§7\n" . $this->test($player, "mobster"));
        $form->addButton("§7[§1S§3al§9ty§7]\n" . $this->test($player, "salty"));
        $form->addButton("§7[§l§3No§9U§r§7]\n" . $this->test($player, "nou"));
        $form->addButton("§7[§l§3IOS§9GOD§r§7]\n" . $this->test($player, "iosgod"));
        $form->addButton("§7[§6Pan§dcake§7]\n" . $this->test($player, "pancakes"));
        $form->addButton("§7[§l§3Loner§7]\n" . $this->test($player, "loner"));
        $form->addButton("§7[§l§3Horion§bUser§7]\n" . $this->test($player, "horion"));
        $form->addButton("§7[§6U§ew§6U§7]\n" . $this->test($player, "uwu"));
        $form->addButton("§7[§6Zoo§amer§7]\n" . $this->test($player, "zoomer"));
        $form->addButton("§7[§0Dirt§7]\n" . $this->test($player, "dirt"));
        $form->addButton("§7[§6I§eAm§a2§9Gud§54§cYou§7]\n" . $this->test($player, "god"));
        $form->addButton("§7[§l§4Kill§cer§r§l.exe§r§7]\n" . $this->test($player, "killer"));
        $form->addButton("Exit");
        $form->sendToPlayer($player);
    }
}