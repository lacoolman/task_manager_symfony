<?php
namespace Coolman\TaskManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name = "task")
 * @ORM\Entity
 */
class Task
{
    /**
     * @ORM\Column(name = "id", type = "integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy = "AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name = "description", type = "string")
     */
    protected $description;

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getId() {
        return $this->id;
    }
}