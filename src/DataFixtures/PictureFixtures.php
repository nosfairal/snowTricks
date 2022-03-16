<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\UserFixtures;
use App\DataFixtures\TrickFixtures;
use App\DataFixtures\GroupTrickFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PictureFixtures extends Fixture implements DependentFixtureInterface
{

    public const Picture_REFERENCE = 'Picture';

    public function load(ObjectManager $manager)
    {

        $picture = new Picture();
        $picture->setTitle('Bloddy Dracula Visuel 1');
        $picture->setFileName('bloody_dracula_1.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_BLOODY_DRACULA));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Bloddy Dracula Visuel 2');
        $picture->setFileName('bloody_dracula_2.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_BLOODY_DRACULA));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Chicken Salad Visuel 1');
        $picture->setFileName('chicken_salad_1.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_CHICKEN_SALAD));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Chicken Salad Visuel 2');
        $picture->setFileName('chicken_salad_2.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_CHICKEN_SALAD));


        $manager->persist($picture);


        $picture = new Picture();
        $picture->setTitle('Tail-block Visuel 1');
        $picture->setFileName('tail_block_1.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_TAIL_BLOCK));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Tail-block Visuel 2');
        $picture->setFileName('tail_block_2.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_TAIL_BLOCK));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Wildcat Visuel 1');
        $picture->setFileName('wildcat_1.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_WILDCAT));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Wildcat Visuel 2');
        $picture->setFileName('wildcat_2.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_WILDCAT));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Frontside Rodeo Visuel 1');
        $picture->setFileName('frontside_rodeo_1.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_FRONTSIDE_RODEO));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Frontside Rodeo Visuel 2');
        $picture->setFileName('frontside_rodeo_2.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_FRONTSIDE_RODEO));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Mc Twist Visuel 1');
        $picture->setFileName('mc_twist_1.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_MC_TWIST));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Mc Twist Visuel 2');
        $picture->setFileName('mc_twist_2.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_MC_TWIST));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Quad Cork 1800 Visuel 1');
        $picture->setFileName('quad_cork_1800_1.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_QUAD_CORK_1800));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Quad Cork 1800 Visuel 2');
        $picture->setFileName('quad_cork_1800_2.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_QUAD_CORK_1800));


        $manager->persist($picture);


        $picture = new Picture();
        $picture->setTitle('Nosepress Visuel 1');
        $picture->setFileName('nosepress_1.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_NOSEPRESS));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Nosepress Visuel 2');
        $picture->setFileName('nosepress_2.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_NOSEPRESS));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Gutterball Visuel 1');
        $picture->setFileName('gutterball_1.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_GUTTERBALL));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Gutterball Visuel 2');
        $picture->setFileName('gutterball_2.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_GUTTERBALL));


        $manager->persist($picture);


        $picture = new Picture();
        $picture->setTitle('Air-to-Fakie Visuel 1');
        $picture->setFileName('air_to_fakie_1.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_AIR_TO_FAKIE));


        $manager->persist($picture);

        $picture = new Picture();
        $picture->setTitle('Air-to-Fakie Visuel 2');
        $picture->setFileName('air_to_fakie_2.jpg');
        $picture->setDescription("Un exemple de ce trick");

        // this reference returns the Group object created in GroupFixtures
        $picture->setTrick($this->getReference(TrickFixtures::TRICK_AIR_TO_FAKIE));


        $manager->persist($picture);

        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            GroupTrickFixtures::class,
            TrickFixtures::class            
        ];
    }
}