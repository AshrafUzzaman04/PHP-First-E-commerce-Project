<?php 

  class dataBaseInput
{
    const host = "localhost";
    const user = "root";
    const pass = null;
    const dataBaseName = "user";
    public static object $connection;
    public function __construct()
    {
     dataBaseInput::$connection = mysqli_connect(dataBaseInput::host,dataBaseInput::user,dataBaseInput::pass,dataBaseInput::dataBaseName);
    }
}

new dataBaseInput;