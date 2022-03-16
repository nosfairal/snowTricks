<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use App\Entity\User;
use App\Entity\GroupTrick;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class TrickFixtures extends Fixture implements DependentFixtureInterface
{
    public const TRICK_BLOODY_DRACULA = 'bloody_dracula';
    public const TRICK_CHICKEN_SALAD = 'chicken_salad';
    public const TRICK_TAIL_BLOCK = 'tail_block';
    public const TRICK_WILDCAT = 'wildcat';
    public const TRICK_FRONTSIDE_RODEO = 'frontside_rodeo';
    public const TRICK_MC_TWIST = 'mc_twist';
    public const TRICK_QUAD_CORK_1800 = 'quad_cork_1800';
    public const TRICK_NOSEPRESS = 'nosepress';
    public const TRICK_GUTTERBALL = 'gutterball';
    public const TRICK_AIR_TO_FAKIE = 'air_to_fakie';
    protected $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {

        $trick = new Trick();
        $trick->setName('Bloody Dracula');
        $trick->setDescription("Un trick dans lequel le rider attrape le tail de la planche avec les deux mains. La main arrière saisit la planche comme elle le ferait lors d'une prise de queue normale, mais la main avant atteint aveuglément la planche derrière le dos des riders.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-14 12:29:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_NOVA));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_GRAB));


        $manager->persist($trick);
        // other fixtures can get this object using the TrickFixtures::TRICK_BLOODY_DRACULA constant
        $this->addReference(self::TRICK_BLOODY_DRACULA, $trick);

        $trick = new Trick();
        $trick->setName('Chicken Salad');
        $trick->setDescription("La main arrière atteint entre les jambes et saisit le bord du talon entre les fixations tandis que la jambe avant est désossée. Le poignet est tourné vers l'intérieur pour terminer la saisie.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-29 17:40:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_GRAB));


        $manager->persist($trick);
        // other fixtures can get this object using the TrickFixtures::TRICK_CHICKEN_SALAD constant
        $this->addReference(self::TRICK_CHICKEN_SALAD, $trick);



        $trick = new Trick();
        $trick->setName('Tail-block');
        $trick->setDescription("Un Tail-bloc est un trick généralement exécuté sur la neige au sommet d'une transition, ou occasionnellement sur un objet, dans lequel le snowboarder bondit et se tient sur le tail de sa planche tout en saisissant le nez de la planche.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-11 16:33:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_STALL));


        $manager->persist($trick);
        // other fixtures can get this object using the TrickFixtures::TRICK_TAIL_BLOCK constant
        $this->addReference(self::TRICK_TAIL_BLOCK, $trick);

        $trick = new Trick();
        $trick->setName('Wildcat');
        $trick->setDescription("Un Wildcat est un backflip effectué sur un saut droit, avec un axe de rotation dans lequel le snowboarder effectue un flip vers l'arrière, comme une roue de charrette. Un double wildcat est appelé un supercat.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-11 16:41:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_NOVA));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_FLIP));


        $manager->persist($trick);
        // other fixtures can get this object using the TrickFixtures::TRICK_WILDCAT constant
        $this->addReference(self::TRICK_WILDCAT, $trick);


        $trick = new Trick();
        $trick->setName('Frontside Rodeo');
        $trick->setDescription("Le Frontside Rodeo de base est un 540. Il tombe essentiellement dans une zone grise entre un frontside 540 hors axe et un frontside 180 avec un back flip mélangé. Le choix de prise et les différents facteurs de ligne et de pop peuvent le rendre plus flipy ou plus un spin hors axe. Le Frontside Rodeo peut être fait sur les talons ou les orteils et avec un peu plus de rotation sur l'axe Z peut aller à 720 ou 900. Il est possible de le faire à un 1080 mais, s'il y a trop de flip dans la rotation, cela sera difficile de ne pas trop basculer lorsque vous dépassez 720 et 900. Plus le spin de l'axe Z est grand, plus la partie inversée de la rotation doit être tardive. Prendre le contrôle sur les gros rodéos en vrille peut conduire à un double cork ou à une deuxième rotation de flip dans la vrille, si le rider a développé un niveau de confort avec des doubles flips sur le tramp ou dans un autre environnement de gymnastique.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-29 17:51:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_FLIP));


        $manager->persist($trick);
        // other fixtures can get this object using the TrickFixtures::TRICK_FRONTSIDE_RODEO constant
        $this->addReference(self::TRICK_FRONTSIDE_RODEO, $trick);


        $trick = new Trick();
        $trick->setName('Mc Twist');
        $trick->setDescription("Un backside 540 avant-flip, exécuté dans un half-pipe, un quarterpipe ou un obstacle similaire. La rotation peut se poursuivre au-delà de 540° (par exemple, McTwist 720). L'origine de cette astuce vient du skateboard sur rampe verte, et a été réalisée pour la première fois sur un skateboard par Mike McGill.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-29 17:53:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_JEANNE));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_FLIP));


        $manager->persist($trick);
        // other fixtures can get this object using the TrickFixtures::TRICK_MC_TWIST constant
        $this->addReference(self::TRICK_MC_TWIST, $trick);


        $trick = new Trick();
        $trick->setName('Quad Cork 1800');
        $trick->setDescription("Pour ceux qui ont du mal à comprendre le truc, un Quad Cork 1800 est un raccourci pour un saut contenant quatre flips hors axe et cinq rotations complètes.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-11 16:50:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_SPIN));


        $manager->persist($trick);
        // other fixtures can get this object using the TrickFixtures::TRICK_QUAD_CORK_1800 constant
        $this->addReference(self::TRICK_QUAD_CORK_1800, $trick);


        $trick = new Trick();
        $trick->setName('Nosepress');
        $trick->setDescription("Un trick réalisé en glissant le long d'un obstacle, avec une pression exercée sur le nose de la planche, de sorte que le tail de la planche est soulevé dans les airs.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-14 16:15:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_SLIDE));

        $manager->persist($trick);
        // other fixtures can get this object using the TrickFixtures::TRICK_NOSEPRESS constant
        $this->addReference(self::TRICK_NOSEPRESS, $trick);

        $trick = new Trick();
        $trick->setName('Gutterball');
        $trick->setDescription("Le Gutterball est un board slide avant à un pied (le pied avant est attaché et le pied arrière est détaché) avec une ceinture de sécurité à l'avant, ressemblant à la position du corps que quelqu'un aurait après avoir relâché une boule de bowling sur un allié de bowling. Ce trick a été inventé et nommé par Jeremy Cameron qui lui a valu une première place au concours Morrow Snowboards FAME WAR Best Trick en 2009.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-29 17:59:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_SLIDE));


        $manager->persist($trick);
        // other fixtures can get this object using the TrickFixtures::TRICK_GUTTERBALL constant
        $this->addReference(self::TRICK_GUTTERBALL, $trick);


        $trick = new Trick();
        $trick->setName('Air-to-Fakie');
        $trick->setDescription("Sortie directe d'une transition verticale (halfpipe, quarterpipe) puis rentrée en fakie, sans rotation.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-14 16:19:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_STRAIGHT_AIR));


        $manager->persist($trick);
        // other fixtures can get this object using the TrickFixtures::TRICK_AIR_TO_FAKIE constant
        $this->addReference(self::TRICK_AIR_TO_FAKIE, $trick);
        
        $manager->flush();
        
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            GroupTrickFixtures::class,
        ];
    }
}
