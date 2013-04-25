<?php
namespace Coolman\TaskManagerBundle\Controller;

use Coolman\TaskManagerBundle\Model\TaskModel;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        return $this->render(self::BASE_TEMPLATE_PATH . 'Default:index.html.twig');
    }

    /**
     * @return TaskModel
     */
    protected function getModel()
    {
       return $this->container->get('task_model');
    }
}