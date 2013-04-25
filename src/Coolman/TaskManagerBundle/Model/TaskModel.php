<?php
namespace Coolman\TaskManagerBundle\Model;


use Coolman\TaskManagerBundle\Entity\Task;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\DependencyInjection\ContainerAware;

class TaskModel extends ContainerAware
{

    /**
     * @return EntityRepository
     */
    protected function getRepository()
    {
        return $this->getManager()->getRepository('CoolmanTaskManagerBundle:Task');
    }

    /**
     * @return EntityManager
     */
    protected function getManager()
    {
        return $this->container->get('doctrine')->getEntityManager();
    }

    public function insertTask(Task $task)
    {
        $manager = $this->getManager();
        $manager->persist($task);

        $manager->flush();
    }

    public function findAllTasks()
    {
        return $this->getRepository()->findAll();
    }

    public function getTasksByUser()
    {

    }

    public function getTaskById($id)
    {

    }
}