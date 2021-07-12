<?php

namespace App\DataFixtures;

use App\Entity\Offer;

use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OfferFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
       return [ContractFixtures::class, contractTypeFixtures::class];
    }
    public function load(ObjectManager $manager)
    {
        
        for($i = 0; $i < 10; $i++){
            $offer = new Offer();
            $offer->setTitle("Title $i")
                ->setDescription("Description $i")
                ->setAdress("22 avenue du haut leveque")
                ->setPostalCod("33600")
                ->setCity("Pessac")
                ->setCreatedAt(new DateTimeImmutable());

            $contract = $this->getReference(['contract_'.rand(0, 2)]);
            $offer ->setContract($contract);

            $contractType = $this->getReference(['contract_type'.rand(0, 1)]);
            $offer ->setContractType($contractType);
            
                $manager->persist($offer);
        }

        $manager->flush();
    }
}