<?php

namespace App\DataFixtures;

use App\Entity\Fortune;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->createFortune('The early bird gets the worm.', $manager);
        $this->createFortune('Fortune favors the bold.', $manager);
        $this->createFortune('The journey is the reward.', $manager);
        $this->createFortune('The only certainty is uncertainty.', $manager);
        $this->createFortune('The only way to do great work is to love what you do.', $manager);
        $this->createFortune('You must be the change you wish to see in the world.', $manager);
        $this->createFortune('You can do anything, but not everything.', $manager);
        $this->createFortune('You can never plan the future by the past.', $manager);
        $this->createFortune('You miss 100 percent of the shots you never take.', $manager);
        $this->createFortune('You must be the change you wish to see in the world.', $manager);
        $this->createFortune('The best way to predict the future is to invent it.', $manager);

        $manager->flush();
    }

    private function createFortune(string $message, ObjectManager $manager): void
    {
        $fortune = new Fortune();
        $fortune->setMessage($message);
        $manager->persist($fortune);
    }
}
