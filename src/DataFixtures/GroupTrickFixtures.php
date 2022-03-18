<?php

namespace App\DataFixtures;

use App\Entity\GroupTrick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\UserFixtures;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class GroupTrickFixtures extends Fixture 
{

    public const GROUPTRICK_STALL = 'Stalls';
    public const GROUPTRICK_STRAIGHT_AIR = 'Straight Airs';
    public const GROUPTRICK_GRAB = 'Grabs';
    public const GROUPTRICK_SPIN = 'Spins';
    public const GROUPTRICK_FLIP = 'Flips et rotations inversées';
    public const GROUPTRICK_SLIDE = 'Slides';
    public const GROUPTRICK_TWEAK = 'Tweaks et variations';
    public const GROUPTRICK_INVERTED_HAND_PLANT = 'Inverted hand plants';
    public const GROUPTRICK_AUTRES = 'Autres';
    

    protected $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {

        $groupTrick = new GroupTrick();
        $groupTrick->setName('Stalls');
        $groupTrick->setSlug(strtolower($this->slugger->slug($groupTrick->getName())));

        $manager->persist($groupTrick);

        // other fixtures can get this object using the GroupTrickFixtures::GROUPTRICK_STALL constant
        $this->addReference(self::GROUPTRICK_STALL, $groupTrick);

        $groupTrick = new GroupTrick();
        $groupTrick->setName('Straight Airs');
        $groupTrick->setSlug(strtolower($this->slugger->slug($groupTrick->getName())));

        $manager->persist($groupTrick);
        // other fixtures can get this object using the GroupTrickFixtures::GROUPTRICK_STRAIGHT_AIR constant
        $this->addReference(self::GROUPTRICK_STRAIGHT_AIR, $groupTrick);

        $groupTrick = new GroupTrick();
        $groupTrick->setName('Grabs');
        $groupTrick->setSlug(strtolower($this->slugger->slug($groupTrick->getName())));

        $manager->persist($groupTrick);
        // other fixtures can get this object using the GroupTrickFixtures::GROUPTRICK_GRAB constant
        $this->addReference(self::GROUPTRICK_GRAB, $groupTrick);

        $groupTrick = new GroupTrick();
        $groupTrick->setName('Spins');
        $groupTrick->setSlug(strtolower($this->slugger->slug($groupTrick->getName())));

        $manager->persist($groupTrick);
        // other fixtures can get this object using the GroupTrickFixtures::GROUPTRICK_SPIN constant
        $this->addReference(self::GROUPTRICK_SPIN, $groupTrick);

        $groupTrick = new GroupTrick();
        $groupTrick->setName('Flips et rotations inversées');
        $groupTrick->setSlug(strtolower($this->slugger->slug($groupTrick->getName())));

        $manager->persist($groupTrick);
        // other fixtures can get this object using the GroupTrickFixtures::GROUPTRICK_FLIP constant
        $this->addReference(self::GROUPTRICK_FLIP, $groupTrick);

        $groupTrick = new GroupTrick();
        $groupTrick->setName('Slides');
        $groupTrick->setSlug(strtolower($this->slugger->slug($groupTrick->getName())));

        $manager->persist($groupTrick);
        // other fixtures can get this object using the GroupTrickFixtures::GROUPTRICK_SLIDE constant
        $this->addReference(self::GROUPTRICK_SLIDE, $groupTrick);

        $groupTrick = new GroupTrick();
        $groupTrick->setName('Tweaks et variations');
        $groupTrick->setSlug(strtolower($this->slugger->slug($groupTrick->getName())));
        
        $manager->persist($groupTrick);
        // other fixtures can get this object using the GroupTrickFixtures::GROUPTRICK_TWEAK constant
        $this->addReference(self::GROUPTRICK_TWEAK, $groupTrick);

        $groupTrick = new GroupTrick();
        $groupTrick->setName('Inverted hand plants');
        $groupTrick->setSlug(strtolower($this->slugger->slug($groupTrick->getName())));
        
        $manager->persist($groupTrick);
        // other fixtures can get this object using the GroupTrickFixtures::GROUPTRICK_INVERTED_HAND_PLANT constant
        $this->addReference(self::GROUPTRICK_INVERTED_HAND_PLANT, $groupTrick);

        $groupTrick = new GroupTrick();
        $groupTrick->setName('Autres');
        $groupTrick->setSlug(strtolower($this->slugger->slug($groupTrick->getName())));
        
        $manager->persist($groupTrick);
        // other fixtures can get this object using the GroupTrickFixtures::GROUPTRICK_AUTRES constant
        $this->addReference(self::GROUPTRICK_AUTRES, $groupTrick);

        $manager->flush();

    }
}