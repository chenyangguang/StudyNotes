<?php
interface video{
    public function getVideo();
    public function getCount();
}

/**
 * 
 **/
class movie implements video
    
{
    
    public function getVideos()
    {
        echo 1;
    }

    public function getCount() {
        echo 2;
    }
}
movie::getVideos();
?>
