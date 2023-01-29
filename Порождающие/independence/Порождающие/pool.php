<?php

class Worker1
{
    public function work()
    {
        print_r('i am work');
    }
}
class workerPool
{
    private array $freeWorkers = [];
    private array $busyWorkers = [];

    public function getWorker(): Worker1
    {
        if (count($this->freeWorkers)===0) {
            $worker = new Worker1();

        } else {
            $worker = array_pop($this->freeWorkers);
        }
        $this->busyWorkers[spl_object_hash($worker)] = $worker;
        return $worker;
    }

    public function getRelease($worker)
    {
        $key = spl_object_hash($worker);
        if (isset($this->busyWorkers[$key])) {

        unset($this->busyWorkers[$key]);
        $this->freeWorkers[] = $worker;
        }
    }

    /**
     * @return array
     */
    public function getFreeWorkers(): array
    {
        return $this->freeWorkers;
    }

    /**
     * @param array $freeWorkers
     */
    public function setFreeWorkers(array $freeWorkers): void
    {
        $this->freeWorkers = $freeWorkers;
    }

    /**
     * @return array
     */
    public function getBusyWorkers(): array
    {
        return $this->busyWorkers;
    }

    /**
     * @param array $busyWorkers
     */
    public function setBusyWorkers(array $busyWorkers): void
    {
        $this->busyWorkers = $busyWorkers;
    }

}