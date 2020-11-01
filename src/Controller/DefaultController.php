<?php

namespace App\Controller;

use App\Component\Action\Action;
use App\Component\Action\LocateAction;
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
     * @Route("/", name="demo")
     */
    public function objective1(): Response
    {
        $barius = new Character('Barius');
        $paris = new Town('Paris');
        $berlin = new Town('Berlin');
        $barcelone = new Town('Barcelone');

        $locate = new LocateAction();
        $action1 = $locate->locateActor($barius, $paris);
        $action2 = $locate->locateActor($barius, $berlin);
        $action3 = $locate->locateActor($barius, $barcelone);

        $output = new Output($action1);
        $output->addContent($action2);
        $output->addContent($action3);

        dd($output);
        // todo transform logs into the stori language

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }
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
        $character = new Character('pilote côtier');
        $port = new Place('port');
        $castle = new Place("château d'if");



        dd($scenario);
    }
}
