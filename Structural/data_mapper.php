<?php

//class Worker
//{
//    public function __construct(private string $name)
//    {
//    }
//
//    /**
//     * @return string
//     */
//    public function getName(): string
//    {
//        return $this->name;
//    }
//
//    /**
//     * @param string $name
//     */
//    public function setName(string $name): void
//    {
//        $this->name = $name;
//    }
//
//    public static function make($string)
//    {
//        return new self($string);
//    }
//
//}
//
//class DataMapper
//{
//    public function __construct(private WorkerStorage $workerStorage)
//    {
//    }
//
//    public function findById($id): string|Worker
//    {
//        $res = $this->workerStorage->find($id);
//        if ($res == null) {
//            return 'Worker with this id does not exists';
//        }
//        return Worker::make($res['name']);
//    }
//}
//
//class WorkerStorage
//{
//    public function __construct(private array $data = [])
//    {
//    }
//
//    public function find($id)
//    {
//        if ($this->data[$id] == null) {
//            return null;
//        }
//        return $this->data[$id];
//    }
//}
//
//$data = [
//    1 => [
//        'name'=>'Boris'
//    ],
//];
//
//$workerStorage = new WorkerStorage($data);
//$dataMapper = new DataMapper($workerStorage);
//var_dump($dataMapper->findById(1));
