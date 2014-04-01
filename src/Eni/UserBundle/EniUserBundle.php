<?php

namespace Eni\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EniUserBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
