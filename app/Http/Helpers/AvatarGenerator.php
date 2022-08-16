<?php

namespace App\Http\Helpers;


trait AvatarGenerator {

    public function makeAvatar(string $name)
    {
        return "https://ui-avatars.com/api/?color=fff&bold=true&name={$name}&background=" . $this->bgColorGenerator()[rand(0, count($this->bgColorGenerator()) - 1)];
    }

    private function bgColorGenerator() {
        return [
            '264653', '606f49', '6f4e37', '686763', '608844', '6b705c', '5a189a', '9d4edd', '613dc1'
        ];
    }

}
