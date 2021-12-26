<?php

namespace AbdellahRamadan\BoltContentAuthor;

use Bolt\Extension\BaseExtension;
use Bolt\Repository\UserRepository;

class Extension extends BaseExtension
{
    public function getName(): string
    {
        return 'Bolt Content Author';
    }

    public function initialize(): void
    {
        $this->addWidget(new UsersWidget());
    }
}