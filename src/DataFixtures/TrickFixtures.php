<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class TrickFixtures extends Fixture implements DependentFixtureInterface
{
    protected $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $trick = new Trick();
        $trick->setName('Backside Air');
        $trick->setDescription('On commence tout simplement avec LE trick. Les mauvaises langues prétendent qu’un backside air suffit à reconnaître ceux qui savent snowboarder. Si c’est vrai, alors Nicolas Müller est le meilleur snowboardeur du monde. Personne ne sait s’étirer aussi joliment, ne demeure aussi zen, n’est aussi provocant dans la jouissance.');
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-03 09:40:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $author = $this->getReference(UserFixtures::USER_FRANCOIS);
        $trick->setAuthor($author);

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_GRAB));


        $manager->persist($trick);

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

        $trick = new Trick();
        $trick->setName('Drunk Driver');
        $trick->setDescription("Semblable à un Truck Driver, il s'agit d'un Stalefish Grab et d'un Mute Grab effectuée en même temps.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-29 17:46:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_NOVA));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_GRAB));


        $manager->persist($trick);


        $trick = new Trick();
        $trick->setName('Roast Beef');
        $trick->setDescription("La main arrière atteint entre les jambes et saisit le bord du talon entre les fixations tandis que la jambe arrière est désossée.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-29 17:47:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_GRAB));


        $manager->persist($trick);


        $trick = new Trick();
        $trick->setName('Tail-Grab');
        $trick->setDescription("La main arrière attrape la queue du snowboard. Les variations incluent le redressement, ou le « désossage » de la jambe avant, ou le « réglage » de la planche légèrement à l'avant ou à l'arrière.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-29 17:49:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_JEANNE));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_GRAB));


        $manager->persist($trick);


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

        $trick = new Trick();
        $trick->setName('Backflip');
        $trick->setDescription("Retourner en arrière (comme un backflip debout) après un saut.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-14 15:56:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_FLIP));


        $manager->persist($trick);


        $trick = new Trick();
        $trick->setName('Tamedog');
        $trick->setDescription("Un frontflip effectué sur un saut droit, avec un axe de rotation dans lequel le snowboarder effectue un flip vers l'avant, comme une roue de charrette.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-14 16:12:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_NOVA));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_FLIP));


        $manager->persist($trick);


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


        $trick = new Trick();
        $trick->setName('Bluntslide');
        $trick->setDescription("Une glissade effectuée lorsque le pied avant du rider passe sur le rail à l'approche, avec son snowboard se déplaçant perpendiculairement et le pied arrière directement au-dessus du rail ou d'un autre obstacle (comme un tailslide). Lors de l'exécution d'un frontside bluntslide, le snowboarder fait face à la montée. Lors de l'exécution d'un backside bluntslide, le snowboarder fait face à la descente.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-08 10:31:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_SLIDE));


        $manager->persist($trick);

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


        $trick = new Trick();
        $trick->setName('Lipslide');
        $trick->setDescription("Un slide effectué lorsque le pied arrière du rider passe sur le rail à l'approche, avec son snowboard se déplaçant perpendiculairement le long du rail ou d'un autre obstacle. Lors de l'exécution d'un lipslide frontside, le snowboarder fait face à la descente. Lors de l'exécution d'un lipslide arrière, un snowboarder fait face à la montée.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-29 18:00:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_SLIDE));


        $manager->persist($trick);


        $trick = new Trick();
        $trick->setName('Shifty');
        $trick->setDescription("Un Shifty est un trick aérien dans lequel un snowboarder fait contre-rotation avec le haut de son corps afin de déplacer sa planche d'environ 90° par rapport à sa position normale sous lui, puis ramène la planche à sa position d'origine avant d'atterrir. Ce tour peut être réalisé en frontside ou backside, mais aussi en variation avec d'autres tricks and spins.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-08 10:55:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_STRAIGHT_AIR));


        $manager->persist($trick);

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


        $trick = new Trick();
        $trick->setName('Poptart');
        $trick->setDescription("Diffusion du fakie vers l'avant sur un quarterpipe ou un halfpipe sans rotation.");
        $trick->setCreatedAt(new DateTimeImmutable('2022-03-14 16:21:00'));
        $trick->setSlug(strtolower($this->slugger->slug($trick->getName())));
        // this reference returns the User object created in UserFixtures
        $trick->setAuthor($this->getReference(UserFixtures::USER_FRANCOIS));

        // this reference returns the Group object created in GroupFixtures
        $trick->setGroupTrick($this->getReference(GroupTrickFixtures::GROUPTRICK_STRAIGHT_AIR));


        $manager->persist($trick);

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
