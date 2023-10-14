<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        // $product = new Product();
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            //$post->setTitle( $faker->sentence );
            //$post->setSlug( $faker->slug );
            //$post->setContent( $faker->text );
            //$post->setUser( $user );
           // $post->setImage( $faker->imageUrl(640, 480) );
            //$post->setCategory( $categories[random_int(0 , 4)] );
            $product->setCodeProduct($faker->regexify('[A-Z]{5}[0-4]{3}'));
            $product->setName($faker->name);
            $product->setPrice($faker->randomFloat(2,0,1000));
            $product->setDescription($faker->sentence);
            $product->setImageUrl($faker->imageUrl());
            //dateTimeThisYear('+2 months');
            //$product->setCreatedAt($faker->dateTimeThisYear('+2 months'));
            //$product->setUpdatedAt($faker->dateTimeThisMonth);

            $manager->persist($product);
        }
        // $manager->persist($product);

        $manager->flush();
    }
}
