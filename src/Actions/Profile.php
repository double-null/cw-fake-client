<?php

namespace CW\Actions;

use CW\Core\OpenBox;
use CW\Services\Request;

class Profile
{
    public function save()
    {
        $time = time() + 3600;
        $query = [
            'action' => 'save',
            'expire' => $time,
            'sig' => md5(uniqid()),
        ];

        $url = OpenBox::get('server')."?".http_build_query($query);

        $postData = gzcompress(json_encode([
            'data' => [
                'repa' => 228148848,
                'hcWinCount' => 228,
                'killCount' => 148800,
                'deathCount' => 22800,
            ],
        ]));


        $postData = '{"data":{"social_id":"","username":"2111112554133378","nickname_color":"#[]","currentXP":225526.453125,"delta_xp":0,"delta_cr":0,"killCount":1257,"deathCount":736,"winCount":28,"lossCount":16,"hcCurrentXP":1850,"hcKillCount":14,"hcDeathCount":173,"hcWinCount":0,"hcLossCount":0,"cr":73780,"gp":76,"sp":46,"bg":0,"sp_available":8,"discount_id":75,"discount":73,"suitNameIndex":0,"votes":3,"permission":0,"repa":80000,"friendsAdded":100,"clanTag":"[#1a4875]OCEHb","clanID":546357,"renameCount":0,"clan_earn":0,"clan_earn_proc":0,"clan_role":8,"clan_place":1,"clan_name":"ETERNAL AUTUMN IN MY SOUL","clan_message":"Click to edit","clan_requests":0,"isClanLeader":true,"isWinner":false,"wl_perm":true,"wl_list":null,"podgon":{},"voteInfo":[],"info0":{"unlocked":true,"suitName":"SET1","chosenPistol":92,"chosenGun":27,"WtaskStates":[true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]},"info1":{"unlocked":false,"suitName":"SET2","chosenPistol":0,"chosenGun":127,"WtaskStates":[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]},"info2":{"unlocked":false,"suitName":"SET3","chosenPistol":0,"chosenGun":127,"WtaskStates":[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]},"info3":{"unlocked":false,"suitName":"SET4","chosenPistol":0,"chosenGun":127,"WtaskStates":[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]},"info4":{"unlocked":false,"suitName":"SET5","chosenPistol":0,"chosenGun":127,"WtaskStates":[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]},"unlockedSets":[1,1,1,1,0,0,0],"settings":{"res":{"width":1280,"height":720},"fullScreenOnStart":false,"gr":{"level":6,"shadowCascades":2,"pixelLightCount":3,"anisotropicFiltering":1,"shadowDistance":10,"smallDistance":35,"modelsLQ":true,"characterLQ":false,"softParticles":true,"postEffects":false,"textureQuality":3,"shadowQuality":0,"physics":0,"lighting":0,"bShowingContractProgress":true,"bAllwaysShowHP":false,"bAllwaysShowDef":false,"autorespawn":false,"hideInterface":false,"enableFullScreenInBattle":false,"secondaryEquiped":false,"weatherEffects":true,"favorites":false,"bShowSimpleContractProgress":true,"bIsTurnOnMaxQueuedFrames":false,"radioLoudness":0,"pro_kill_take_screen":false,"quad_kill_take_screen":false,"level_up_take_screen":false,"achievement_take_screen":false},"disableShadows":false,"disableBlur":false,"radarAlpha":1,"globalLoudness":0.41397801041603088,"soundLoudness":0.33871001005172729,"musicLoudness":1,"binds":{"left":97,"right":100,"up":119,"down":115,"sit":306,"walk":304,"interaction":102,"knife":101,"pistol":49,"weapon":50,"support":51,"mortar":52,"thermalVision":98,"hide_interface":107,"flashlight":108,"toggle":325,"reload":114,"burst":122,"fire":323,"aim":324,"jump":32,"grenade":103,"menu":291,"statistics":9,"fullscreen":293,"teamChoose":109,"talkAll":121,"talkTeam":116,"radio":113,"screenshot":286,"sens":0.26548385620117188,"invertMouse":false},"loaderSettings":0},"awards":{},"is_imported":false,"platform":0},"class":0}';
        $postData = gzcompress($postData);
        $response = Request::create()
            ->setUrl($url)
            ->setCookie(['PHPSESSID' => OpenBox::get('session')])
            ->setParams($postData)
            ->run();

        var_dump(gzuncompress($response['body']));

        return 1;

    }
}
