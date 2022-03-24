<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    public const Video_REFERENCE = 'Video';

    public function load(ObjectManager $manager)
    {
    $video = new Video();
        $video->setTitle('Bloddy Dracula video');
        $video->setVideoUrl('https://www.youtube.com/embed/UU9iKINvlyU');

        // this reference returns the Group object created in GroupFixtures
        $video->setTrick($this->getReference(TrickFixtures::TRICK_BLOODY_DRACULA));


        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Chicken Salad video');
        $video->setVideoUrl('https://www.youtube.com/embed/TTgeY_XCvkQ');

        // this reference returns the Group object created in GroupFixtures
        $video->setTrick($this->getReference(TrickFixtures::TRICK_CHICKEN_SALAD));

        $manager->persist($video);


        $video = new Video();
        $video->setTitle('Tail-block video');
        $video->setVideoUrl('https://www.youtube.com/embed/jPAsCuoRvoY');

        // this reference returns the Group object created in GroupFixtures
        $video->setTrick($this->getReference(TrickFixtures::TRICK_TAIL_BLOCK));


        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Wildcat video');
        $video->setVideoUrl('https://www.youtube.com/embed/7KUpodSrZqI');

        // this reference returns the Group object created in GroupFixtures
        $video->setTrick($this->getReference(TrickFixtures::TRICK_WILDCAT));


        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Frontside Rodeo video');
        $video->setVideoUrl('https://www.youtube.com/embed/vf9Z05XY79A');

        // this reference returns the Group object created in GroupFixtures
        $video->setTrick($this->getReference(TrickFixtures::TRICK_FRONTSIDE_RODEO));


        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Mc Twist video');
        $video->setVideoUrl('https://www.youtube.com/embed/k-CoAquRSwY');

        // this reference returns the Group object created in GroupFixtures
        $video->setTrick($this->getReference(TrickFixtures::TRICK_MC_TWIST));


        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Quad Cork 1800 video');
        $video->setVideoUrl('https://www.youtube.com/embed/pM_6bfQfDnw');

        // this reference returns the Group object created in GroupFixtures
        $video->setTrick($this->getReference(TrickFixtures::TRICK_QUAD_CORK_1800));


        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Nosepress video');
        $video->setVideoUrl('https://www.youtube.com/embed/Px2YuKQVS_g');

        // this reference returns the Group object created in GroupFixtures
        $video->setTrick($this->getReference(TrickFixtures::TRICK_NOSEPRESS));


        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Gutterball video');
        $video->setVideoUrl('https://www.youtube.com/embed/o_r-AuMbxz8');

        // this reference returns the Group object created in GroupFixtures
        $video->setTrick($this->getReference(TrickFixtures::TRICK_GUTTERBALL));


        $manager->persist($video);


        $video = new Video();
        $video->setTitle('Air-to-Fakie video');
        $video->setVideoUrl('https://www.youtube.com/embed/2fP_R0tXFAc');

        // this reference returns the Group object created in GroupFixtures
        $video->setTrick($this->getReference(TrickFixtures::TRICK_AIR_TO_FAKIE));


        $manager->persist($video);


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
