<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PostFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        foreach (range(1, 100) as $i) {
            $post = new Post();
            $post->setTitle($faker->sentence);
            $post->setContent($faker->paragraph);
            $post->setCreatedAt($faker->dateTimeBetween('-1 years', 'now'));
            $post->setIsPosted($faker->boolean());
            $manager->persist($post);
        }

        $manager->flush();
    }
}
