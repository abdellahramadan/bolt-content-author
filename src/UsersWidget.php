<?php


namespace AbdellahRamadan\BoltContentAuthor;

use Bolt\Widget\BaseWidget;
use Bolt\Widget\TwigAwareInterface;
use Bolt\Widget\Injector\RequestZone;
use Bolt\Widget\Injector\AdditionalTarget;
use Bolt\Repository\UserRepository;

class UsersWidget extends BaseWidget implements TwigAwareInterface
{

    public function __construct(UserRepository $users)
    {
    }

    protected $name = 'Bolt Content Author';
    protected $target = ADDITIONALTARGET::WIDGET_BACK_EDITCONTENT_ASIDE_BOTTOM;
    protected $priority = 300;
    protected $template = '@bolt-content-author/users.html.twig';
    protected $zone = RequestZone::BACKEND;
    protected $cacheDuration = 0;

    public function run(array $params = []): ?string
    {
        $users = $this->getUsers();
        $time = new \DateTime();
        return parent::run(['time' => $time, 'users' => $users]);
    }

    protected function getUsers(UserRepository $userRepository): array
    {
        $users = $userRepository->findAll();

        return $users;
    }
}