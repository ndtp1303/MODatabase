<?php

namespace SuSu\Platform;

class MODatabase
{

    /**
     * @var array $database
     */

    protected array $database;

    /**
     * @var array $data
     */

    protected array $data;

    /**
     * @var array $data
     */

    protected array $where;

    /**
     * @return mixed
     */

    public function first()
    {
        return $this->data[0];
    }

    /**
     * @return array
     */

    public function data(): array
    {
        return $this->get('data');
    }

    /**
     * @return array
     */

    public function columns(): array
    {
        return $this->get('columns');
    }

    /**
     * @param string $key
     * 
     * @return array
     */

    public function get(string $key): array
    {
        $this->setData($this->database[$key] ?? []);
        return $this->data;
    }

    /**
     * @param string $table
     * 
     * @return void
     */

    public function table(string $table): void
    {
        $this->database = $this->database[$table];
    }

    /**
     * @param array $array
     * 
     * @return void
     */

    protected function where(array $array): void
    {
        $this->where = $array;
    }

    /**
     * @param array $array
     * 
     * @return void
     */

    protected function setData(array $array): void
    {
        $this->data = $array;
    }

    /**
     * @param string $filePath
     * 
     * @return void
     */

    public function loadDatabase(string $filePath): void
    {
        if ($this->file_exists($filePath)) {
            $this->database = json_decode(file_get_contents($filePath), true)['tables'];
        }
    }

    /**
     * @param string $filePath
     * 
     * @return bool
     */

    protected function file_exists(string $filePath): bool
    {
        return file_exists($filePath);
    }
}
