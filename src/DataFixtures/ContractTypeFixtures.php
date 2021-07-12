<?php

namespace App\DataFixtures;

use App\Entity\ContractType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContarctTypeFixtures extends Fixture
{
    const CONTRACTS_TYPE = ["temps pleins", "temps partiel"];
    public function load(ObjectManager $manager)
    {
        foreach(self::CONTRACTS_TYPE as $key => $value){
            $contractType =new ContractType();
            $contractType->setName($value);

            $this->addReference("contract_type_$key", $contractType);

            $manager->persist($contractType);
        }

        $manager->flush();
    }
}
