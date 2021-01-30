<?php

class ContentContr extends Content {
    private function is_authorized()
    {
      if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
        return true;
      }
      return false;
    }

// test
}