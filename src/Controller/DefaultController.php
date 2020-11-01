<?php

namespace App\Controller;

use App\Component\Action\Action;
use App\Component\Context\Context;
use App\Component\Output\Output;
use App\Component\Place\Place;
use App\Component\Place\Town;
use App\Component\Scenario\Scenario;
use App\Component\Scene\Scene;
use App\Component\Subject\Actor\Character;
use App\Component\Subject\Object\Boat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/cristo", name="monte-cristo")
     */
    public function cristo(): Response
    {
        $scenario = new Scenario();
        $scenario->setTitle('chapitre 1');

        //"Le 24 février 1815, la vigie de Notre-Dame de la Garde signala le trois-mâts le Pharaon, venant de Smyrne, Trieste et Naples."

        $date = new \DateTime('1815-02-24');
        $context = new Context();
        $context->setDate($date);

        $vigie = new Character('vigie de Notre-Dame de la Garde');
        $pharaon = new Boat(' trois-mâts le Pharaon');

        // the action : la vigie voit le Pharaon
        $action = new Action('see');
        $action->addSource($vigie);
        $action->addTarget($pharaon);

        // a scene with a date of 24 february
        $scene = new Scene();
        $scene->addAction($action, $context);
        $scenario->addScene($scene);


        // Comme d’habitude, un pilote côtier partit aussitôt du port, rasa le château d’If, et alla aborder le navire entre le cap de Morgion et l’île de Rion.
        $scene = new Scene();

        $character = new Character('pilote côtier');
        $port = new Place('port');
        $castle = new Place("château d'if");

        $action1 = new Action('go');
        $action1->addSource($character);
        $action1->addDestination($port);
        $scene->addAction($action1);

        $action2 = new Action('go');
        $action2->addSource($character);
        $action2->addDestination($castle);
        $scene->addAction($action2);

        $action3 = new Action('go');
        $action3->addSource($character);
        $action3->addTarget($pharaon);
        $positionBoat = new Place('entre le cap de Morgion et l’île de Rion');
        $action3->addDestination($positionBoat);
        $scene->addAction($action3);

        $scenario->addScene($scene);

        // scene 3 = Aussitôt, comme d’habitude encore, la plate-forme du fort Saint-Jean s’était couverte de curieux ; car c’est toujours une grande affaire à Marseille que l’arrivée d’un bâtiment, surtout quand ce bâtiment, comme le Pharaon, a été construit, gréé, arrimé sur les chantiers de la vieille Phocée, et appartient à un armateur de la ville.
        $scene = new Scene();

        $platform = new Place('plate-forme du fort Saint-Jean');
        $crow = new Character('curieux');
        $action = new Action('go');
        $action->addSource($crow);
        $action->addDestination($platform);
        $scene->addAction($action);

        $scenario->addScene($scene);

        // scene 4 : Cependant ce bâtiment s’avançait

        // scene 5 : il avait heureusement franchi le détroit que quelque secousse volcanique a creusé entre l’île de Calasareigne et l’île de Jaros ; il avait doublé Pomègue, et il s’avançait sous ses trois huniers, son grand foc et sa brigantine, mais si lentement et d’une allure si triste, que les curieux, avec cet instinct qui pressent un malheur, se demandaient quel accident pouvait être arrivé à bord.

        // scene 6 : Néanmoins les experts en navigation reconnaissaient que si un accident était arrivé, ce ne pouvait être au bâtiment lui-même ;

        // car il s’avançait dans toutes les conditions d’un navire parfaitement gouverné : son ancre était en mouillage, ses haubans de beaupré décrochés ; et près du pilote, qui s’apprêtait à diriger le Pharaon par l’étroite entrée du port de Marseille, était un jeune homme au geste rapide et à l’œil actif, qui surveillait chaque mouvement du navire et répétait chaque ordre du pilote.

        // La vague inquiétude qui planait sur la foule avait particulièrement atteint un des spectateurs de l’esplanade de Saint-Jean, de sorte qu’il ne put attendre l’entrée du bâtiment dans le port ; il sauta dans une petite barque et ordonna de ramer au-devant du Pharaon, qu’il atteignit en face de l’anse de la Réserve.

        dd($scenario);
    }

    //todo : test with madame Bovary
}
