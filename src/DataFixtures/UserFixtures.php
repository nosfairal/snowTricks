<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTimeImmutable;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{

    private $encoder;    
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public const USER_FRANCOIS = 'francois';
    public const USER_JEANNE = 'jeanne';
    public const USER_NOVA = 'nova';

    

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('Vernes');
        $user->setEmail('vernes@gmail.com');
        $user->setCreatedAt(new DateTimeImmutable('2022-02-28 11:28:00'));

        $password = $this->encoder->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);
        // other fixtures can get this object using the UserFixtures::USER_FRANCOIS constant
        $this->addReference(self::USER_FRANCOIS, $user);

        $user = new User();
        $user->setUsername('Jeanne');
        $user->setEmail('jeanne@gmail.com');
        $user->setCreatedAt(new DateTimeImmutable('2022-03-07 10:50:00'));

        $password = $this->encoder->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);
        // other fixtures can get this object using the UserFixtures::USER_JEANNE constant
        $this->addReference(self::USER_JEANNE, $user);

        $user = new User();
        $user->setUsername('Nova');
        $user->setEmail('nova@gmail.com');
        $user->setCreatedAt(new DateTimeImmutable('2022-03-07 11:14:00'));

        $password = $this->encoder->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);
        // other fixtures can get this object using the UserFixtures::USER_NOVA constant
        $this->addReference(self::USER_NOVA, $user);

        $manager->flush();

        
    }
}