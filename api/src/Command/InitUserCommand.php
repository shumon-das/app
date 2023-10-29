<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'init:user',
    description: 'Initialize User',
)]
class InitUserCommand extends Command
{
    public function __construct(
        protected EntityManagerInterface $entityManager,
        protected UserPasswordHasherInterface $hasher,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $user = new User();
        $user->setEmail('init.user@gmail.com')
            ->setPassword($this->hasher->hashPassword($user,'Is123456!'))
            ->setRoles(['ROLE_ADMIN, ROLE_USER'])
        ;
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success('User created successfully');

        return Command::SUCCESS;
    }
}
