<?php

declare(strict_types=1);


namespace App\Scribo;


use App\Component\Action\Action;
use App\Component\Scenario\Scenario;
use App\Component\Scene\Scene;
use App\Component\Subject\SubjectInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Scribo
{
    private ?string $output = null;


    public function convertScenario(Scenario $scenario)
    {
        foreach ($scenario->getScenes() as $scene) {
            $this->convertScene($scene);
        }

        return $this->output;
    }

    public function convertScene(Scene $scene)
    {
        foreach ($scene->getActions() as $action) {
            $this->convertAction($action);
        }
    }

    public function convertAction(Action $action)
    {
        $source = $this->convertSources($action->getSources());
        $target = $this->convertTargets($action->getTargets());
        $destination = $this->convertDestination($action->getDestinations());

        $this->output .= $this->generateOuptut($source->getName(), $action->getTitle(), $target->getName(), $destination);
    }

    public function convertSources(array $sources)
    {
        return $sources[0];
    }

    public function convertTargets(?array $targets): ?SubjectInterface
    {
        if (count($targets) > 0) {
            return $targets[0];
        }
    }

    public function convertDestination(?array $destinations)
    {
        if (count($destinations) > 0) {
            return $destinations[0];
        }
    }

    public function generateOuptut(string $source, string $action, ?string $target, ?string $destination)
    {
        if ($target) {
            $output = $source.' '.$action.' '.$target.'.\n';
        } else {
            $output = $source.' '.$action.'.\n';
        }
        return $output;
    }
}