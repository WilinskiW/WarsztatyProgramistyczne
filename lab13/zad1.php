<?php

interface Volume {
    public function increaseVolume();
    public function decreaseVolume();
}

interface Playable {
    public function play();
    public function stop();
}

class MusicPlayer implements Volume, Playable {
    private $volume;
    private $isPlaying;

    public function __construct() {
        $this->volume = 5;
        $this->isPlaying = false;
    }

    public function increaseVolume() {
        if ($this->volume < 10) {
            $this->volume++;
        }
    }

    public function decreaseVolume() {
        if ($this->volume > 0) {
            $this->volume--;
        }
    }

    public function play() {
        $this->isPlaying = true;
    }

    public function stop() {
        $this->isPlaying = false;
    }

    public function getVolume() {
        return $this->volume;
    }

    public function getStatus() {
        return $this->isPlaying ? "Playing" : "Stopped";
    }
}

?>

