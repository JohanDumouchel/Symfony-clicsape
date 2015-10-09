<?php

namespace ClicSape\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ClicSapeUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
