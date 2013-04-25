<?php
namespace Coolman\TaskManagerBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AbstractController extends Controller
{

    const BASE_TEMPLATE_PATH = 'CoolmanTaskManagerBundle:';

    protected function renderTemplate($view, $params = null,Response $response = null)
    {
        $this->render($view, $params, $response);
    }
}