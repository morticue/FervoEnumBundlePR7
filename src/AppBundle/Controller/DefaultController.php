<?php

namespace AppBundle\Controller;

use AppBundle\Enum\Gender;
use Fervo\EnumBundle\Form\EnumType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $gender = Gender::FEMALE();

        $builder = $this->createFormBuilder()
            ->add('gender', EnumType::class, [
                'data_class' => Gender::class,
                'data' => $gender,
            ])
            ->add('submit', SubmitType::class)
        ;

        $form = $builder->getForm();

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
