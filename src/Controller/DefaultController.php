<?php

namespace App\Controller;

use App\Component\Action\LocateAction;
use App\Component\Actor\Character;
use App\Component\Output\Output;
use App\Component\Place\Town;
use App\Component\Scenario\Scenario;
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
        $alban = new Character('Alban', 'Barius');
        $paris = new Town('Paris');
        $berlin = new Town('Berlin');
        $barcelone = new Town('Barcelone');

        $locate = new LocateAction();
        $action1 = $locate->locateActor($alban, $paris);
        $action2 = $locate->locateActor($alban, $berlin);
        $action3 = $locate->locateActor($alban, $barcelone);

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
     * @Route("/", name="demo")
     */
    public function cristo(): Response
    {
        $scenario = new Scenario();

        //"Le 24 février 1815, la vigie de Notre-Dame de la Garde signala le trois-mâts le Pharaon, venant de Smyrne, Trieste et Naples."

    }
}
