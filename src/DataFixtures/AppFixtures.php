<?php

namespace App\DataFixtures;

use App\Entity\Localizacion;
use App\Factory\HistorialFactory;
use App\Factory\LocalizacionFactory;
use App\Factory\MaterialFactory;
use App\Factory\PersonaFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        PersonaFactory::createMany(50);
        LocalizacionFactory::createMany(20);
        LocalizacionFactory::createMany(30, function(){
            return [
                'padre' => LocalizacionFactory::random()
            ];
        });
        MaterialFactory::createMany(30, function(){
            return [
                'localizacion' => LocalizacionFactory::random(),
                'persona' => PersonaFactory::random(),
                'prestadoPor' => PersonaFactory::random(),
                'responsable' => PersonaFactory::random()
            ];
        });
        MaterialFactory::createMany(30, function(){
            return [
                'localizacion' => LocalizacionFactory::random(),
                'persona' => PersonaFactory::random(),
                'prestadoPor' => PersonaFactory::random(),
                'responsable' => PersonaFactory::random(),
                'padre' => MaterialFactory::random()
            ];
        });
        HistorialFactory::createMany(50, function(){
            return [
                'material' => MaterialFactory::random(),
                'prestadoA' => PersonaFactory::random(),
                'prestadoPor' => PersonaFactory::random(),
                'devueltoPor' => PersonaFactory::random()
            ];
        });

        $manager->flush();
    }
}
