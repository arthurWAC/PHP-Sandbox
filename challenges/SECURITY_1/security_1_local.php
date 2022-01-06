<?php
namespace Challenges\SECURITY_1;

use Tainix\Html;

// ECHANTILLON ------------------------
$informations = ['louis.dumas@XXXXXXXX.com:abaeaa00b9586e8f511aa86cad89d4cfc66226ca75853bd30d4c660b55385557', 'anna.durand@XXXXXXXX.com:126af9a8ec8355188c9655134a7db0b7577d825ab72a9eaf720f8ddbc4348eb6', 'gabriel.boyer@XXXXXXXX.com:fd03086f299b382273d7f74a7939fecbe5be67dc5865f2c62e5cef39817c3426', 'chloe.sanchez@XXXXXXXX.com:b1584749e841a15aecedc9d1fcac0b577619657f4267f3231d42d30eaee67cad', 'raphael.noel@XXXXXXXX.com:ed47ef31c112ef46d3e30911f7c419c4203bf34f5783a55a0095a6f2aff0cfb5', 'gabin.vasseur@XXXXXXXX.com:7ffc16bcda76979ab444993b28c02c62d57ef7ccbb2de2a9fe93b2ec355fe1a0', 'leo.leclerq@XXXXXXXX.com:0817f1d381e0e5b051323f5e7ecf2a6f8a55034afe75d85b8c57057d4433ddbb', 'alix.vasseur@XXXXXXXX.com:34d92363c2e3b79552eeaabfe3dff287d2589ca7ba93707fb83f9f2368ea9097', 'lena.noel@XXXXXXXX.com:8b9f7e57440171b929db8c0c6970b7fc7d007b6830ca30406ee76498ef958f38', 'henri.durand@XXXXXXXX.com:f37d1c4b061f08e645ad7781e428e0d1cf62735d2d129dea80cd8cc90dbd2611'];

Html::debug($informations, '$informations');

// CODE DU CHALLENGE ------------------




// REPONSE ATTENDUE -------------------
Html::debug('chloeSAN@48O', 'Réponse attendue', 'success');