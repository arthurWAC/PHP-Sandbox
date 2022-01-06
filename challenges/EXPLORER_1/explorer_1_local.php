<?php
namespace Challenges\EXPLORER_1;

use Tainix\Html;

// ECHANTILLON ------------------------
$planetes = ['CHB785:continental', 'JFO763:polaire glacial, froid, humide', 'RRW511:humide et moite', 'KUS027:froid venteux', 'EKT618:froid', 'VVV365:pluvieux', 'SRJ621:polaire', 'MNB475:continental cool', 'BNI492:pluvieux', 'YTH995:chaud fournaise', 'OEO191:humide', 'NDN545:humide', 'MMG003:humide, aride, chaud fournaise, continental cool', 'MIJ555:polaire glacial, froid, polaire', 'OHD364:tropical jungle, humide, aride sans vie, polaire glacial', 'TPQ853:tropical, continental cool', 'TYJ113:froid venteux'];
$climat = 'polaire';

Html::debug($planetes, '$planetes');
Html::debug($climat, '$climat');

// CODE DU CHALLENGE ------------------




// REPONSE ATTENDUE -------------------
Html::debug('SRJMIJ', 'Réponse attendue', 'success');