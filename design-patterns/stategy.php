<?php

# 策略者模式
interface logger {
    public function log($data);
}

class LogTofile implements Logger {
         
    public function log($data)
    {
        var_dump('Log the data to the file');
    }
}

class LogToDatabase implements Logger {
    public function log($data)
    {
        var_dump('Log the data to the database');
    }
        
}

class LogToXWebService implements Logger {
    public function log($data)
    {
        var_dump('Log the data to a Saas site.');
    }
        
}

class App {
    public function log($data, Logger $logger = null)
    {
        // $logger = new LogToFile;
        $logger = $logger ?: new LogToFile;

        $logger->log($data);
    }
}

$app =  new App;
$app->log('Some information here', new LogToXwebService);
$app->log('Some information here', new LogToDatabase);