<?php
    function drawPetProposal(AdoptionRequest $request, bool $isMyPetProposal): void {
        if($request->getOutcome() == 'pending') { ?>
            <div id="proposal"> 
                <?php if($isMyPetProposal) { ?>
                    <div id="proposal-header">
                        <a href="<?= PROTOCOL_SERVER_URL ?>/profile.php?username=<?=$request->getUserId()?>">
                            <img id="proposal-pic" src="../server/resources/img/profiles/<?=$request->getUserId()?>.jpg">
                        </a>
                    </div>
                <?php } ?>
            <div id="proposal-info">
                <?php if($isMyPetProposal) { ?>
                    <p><?=$request->getUserId()?> on <?=$request->getDate()?> for <a id="proposal-pet" href="<?= PROTOCOL_SERVER_URL ?>/pet.php?id=<?=$request->getPetId()?>"><?=$request->getPet()->getName()?></a></p>
                <?php } else { ?>
                    <p>                              <?=$request->getDate()?> for <a id="proposal-pet" href="<?= PROTOCOL_SERVER_URL ?>/pet.php?id=<?=$request->getPetId()?>"><?=$request->getPet()->getName()?></a></p>
                <?php } ?>
                
                <div id="proposal-message">
                    <textarea readonly><?=$request->getText()?></textarea>
                </div>  
                
                <?php if($isMyPetProposal) { ?>
                    <button onclick="location.href='<?= PROTOCOL_SERVER_URL ?>/actions/change_adoptionRequest_outcome.php?requestId=<?=$request->getId()?>&username=<?=$_SESSION['username']?>&outcome=accepted&petId=<?=$request->getPetId()?>'" id="acceptRequest">Accept Request</button>
                    <button onclick="location.href='<?= PROTOCOL_SERVER_URL ?>/adoptionMessages.php?id=<?=$request->getId()?>'"id="answerRequest">Answer Request</button>
                    <button onclick="location.href='<?= PROTOCOL_SERVER_URL ?>/actions/change_adoptionRequest_outcome.php?requestId=<?=$request->getId()?>&username=<?=$_SESSION['username']?>&outcome=rejected&petId=<?=$request->getPetId()?>'" id="refuseRequest">Refuse Request</button>
                <?php } else { ?>
                    <button onclick="location.href='<?= PROTOCOL_SERVER_URL ?>/actions/remove_proposal.php?id=<?=$request->getPetId()?>'"id="cancelRequest">Cancel Request</button>
                    <button onclick="location.href='<?= PROTOCOL_SERVER_URL ?>/adoptionMessages.php?id=<?=$request->getId()?>'"id="answerRequest">View Chat</button>
                <?php } ?>

            </div>
        </div>
       <?php } ?>  
    <?php } ?>

    <?php 

    function drawAdoptionRequestInitialMessage($adoptionRequest) { ?>
        <section id="proposal-container">
            <h1 id="proposal-title">Proposal chat</h1>
            <div id="proposal-msg"> 
                <input type="hidden" value="<?=$_SESSION['username'] == $adoptionRequest['user']?>">
                <div id="proposal-header">
                    <a href="<?= PROTOCOL_SERVER_URL ?>/profile.php?username=<?=$adoptionRequest['user']?>">
                        <img id="proposal-pic" src="../server/resources/img/profiles/<?=$adoptionRequest['user']?>.jpg">
                    </a>
                </div>
                <div id="proposal-info">
                        <p><?=$adoptionRequest['user']?> on <?=$adoptionRequest['messDate']?> for <a id="proposal-pet" href="<?= PROTOCOL_SERVER_URL ?>/pet.php?id=<?=$adoptionRequest['pet']?>"><?=$adoptionRequest['petName']?></a></p>
                    
                    <div id="proposal-message">
                        <textarea readonly>&nbsp;<?=$adoptionRequest['text']?></textarea>
                    </div>  
                </div>
            </div>
    <?php } ?>
    
    <?php 

    function drawAllOtherMessages($adoptionRequestMessages): void { 
        foreach($adoptionRequestMessages as $reqMessage) { ?>
            <div id="proposal-msg"> 
                <input type="hidden" value="<?=$_SESSION['username'] == $reqMessage['user']?>">
                <div id="proposal-header">
                    <a href="<?= PROTOCOL_SERVER_URL ?>/profile.php?username=<?=$reqMessage['user']?>">
                        <img id="proposal-pic" src="../server/resources/img/profiles/<?=$reqMessage['user']?>.jpg">
                    </a>
                </div>
                <div id="proposal-info">
                        <p><?=$reqMessage['user']?> on <?=$reqMessage['messDate']?> for <a id="proposal-pet" href="<?= PROTOCOL_SERVER_URL ?>/pet.php?id=<?=$reqMessage['pet']?>"><?=$reqMessage['petName']?></a></p>
                    
                    <div id="proposal-message">
                        <textarea readonly>&nbsp;<?=$reqMessage['text']?></textarea>
                    </div>  
                </div>
            </div>
        <?php } ?>      
    <?php } ?>

    <?php 

    function drawAnswerAdoptionRequest(): void { ?>
        <div id="proposal-msg"> 
            <input type="hidden" value="1">
            <input type="hidden" name="requestID" value="<?= $_GET['id']?>">
            <input type="hidden" name="username" value="<?= $_SESSION['username']?>">
            <div id="proposal-header">
                <a href="<?= PROTOCOL_SERVER_URL ?>/profile.php?username=<?=$_SESSION['username']?>">
                    <img id="proposal-pic" src="../server/resources/img/profiles/<?=$_SESSION['username']?>.jpg">
                </a>
            </div>
            <div id="proposal-info">
                    <p>&nbsp;</p>
                <div id="proposal-message-submit">
                    <textarea></textarea>
                    <button class="dark" onclick="addNewAdoptionRequestMsg()" id="submitAnswer">Submit</button>
                    <div id="proposal-messages-refresh"><button id="update" class="image" onclick="onClickedUpdateChat(this)"><img src="resources/img/update.svg"/></button></div>
                </div>  
            </div>
        </div>
    </section>
    <?php } ?>      

    <?php

    function drawProposals(array $adoptionRequests): void {
        foreach($adoptionRequests as $request) {
            if ($request->getOutcome() !== 'accepted')
                drawPetProposal($request, true);
            }    
    }

    function drawMyProposals(array $adoptionRequests): void {
        foreach($adoptionRequests as $request) 
            drawPetProposal($request, false);
    }