<?php

namespace E2N\candidateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@E2Ncandidate/Default/index.html.twig');
    }
}
