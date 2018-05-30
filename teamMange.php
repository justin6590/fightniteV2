<?php
  function team_manage($button_id)
  {
    switch($button_id)
    {
      case "Invite":
           echo "Invite player";
           break;
      case "Kick":
           echo "Kick player";
           break;
      case "Promote":
            echo "Promote player";
            break;
      case "Disband":
            echo "Disband team";
            break;
      default:
          echo "An error has occurred";
    }
  }
?>
