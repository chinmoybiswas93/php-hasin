<?php

/*
Create a class that represents a directory and allows inspecting directories recursively
$directory->getDirectory(0); to get all the directories in the first directory
$directory->getDirectory(0)->getDirectory(0); to get all the directories in the first directory of the first directory
$directory->getDirectory(0)->getDirectory(0)->getFiles(); to get all the files in the first directory of the first directory
*/

class Dir
{
    private $path;
    private $directories = [];
    private $files = [];

    public function __construct($path)
    {
        $this->path = $path;
        if (is_readable($path)) {
            $entry = scandir($path);
            foreach ($entry as $value) {
                if ($value != '.' && $value != '..') {
                    if (is_dir($path . DIRECTORY_SEPARATOR . $value)) {
                        $this->directories[] = $value;
                    } else {
                        $this->files[] = $value;
                    }
                }
            }
        } else {
            throw new Exception("Directory Path is not readable", 1);
        }
    }

    public function getDirectory($index)
    {
        if (!isset($this->directories[$index])) {
            throw new Exception("Directory not found", 1);
        }
        return new Dir($this->path . DIRECTORY_SEPARATOR . $this->directories[$index]);
    }

    public function getDirectories()
    {
        return $this->directories;
    }

    public function getFiles()
    {
        return $this->files;
    }
}

$directory = new Dir('/Users/support/Desktop/php-hasin');
print_r($directory->getDirectory(2)->getDirectory(2)->getDirectory(0)->getFiles());
